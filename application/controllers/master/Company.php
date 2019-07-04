<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/MasterController.php';

class Company extends MasterController{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('master/company_model'));
    $this->isLoggedIn();

  }


  public function index()
  {
     $searchText = $this->security->xss_clean($this->input->post('searchText'));
     $data['searchText'] = $searchText;
     $this->load->library('pagination');
    $count = $this->company_model->companyListingCount($searchText);
    $returns = $this->paginationCompress( "master/company/", $count, 10 );
    $data['companyRecords'] = $this->company_model->companyListing($searchText, $returns["page"], $returns["segment"]);

    $this->global['pageTitle'] = 'WoCo : Company Listing';
    $this->loadViews("company/listData", $this->global, $data, NULL);
  }


  /**
   * This function is used to load the add new form
   */
  function addNew()
  {
    if($this->isMaster() == TRUE)
    {
        $this->loadThis();
    }
    else
    {
      $this->global['pageTitle'] = 'WoCo : Add New Company';
      $this->loadViews("company/addNew", $this->global, NULL, NULL);
    }

  }


  /**
   * This function is used to add new user to the system
   */
  function addNewCompany()
  {


      if($this->isMaster() == TRUE)
      {
          $this->loadThis();
      }
      else
      {
          $this->load->library('form_validation');

          $this->form_validation->set_rules('name','Company Name','trim|required|max_length[128]');
          $this->form_validation->set_rules('website','Website URL','trim|max_length[128]');
          $this->form_validation->set_rules('address','Address','required|max_length[200]');



          if($this->form_validation->run() == FALSE)
          {
              $this->addNew();
          }
          else
          {

              $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
              $website = strtolower($this->security->xss_clean($this->input->post('website')));
              $address = $this->input->post('address');
              $imageName = "";
              if($_FILES['logo']['name'] != "") {
                $imageName = $this->upload_image('logo');
              }


              $companyInfo = array('website'=>$website,

               'address'=>$address,
               'name'=> $name ,
               'created_by' => $this->vendorId,
               'updated_by' => $this->vendorId);
               if ($imageName != "") {
                 $companyInfo['logo'] = $imageName;
               }

              $result = $this->company_model->addNewCompany($companyInfo);

              if ($result>0) {
                 echo json_encode(array('status' => 1, 'message' => "New Employee Type Successfully Created" ));
              }else {
                echo json_encode(array('status' => 0, 'message' => "Unable to create Employee Type." ));
              }
          }
      }
  }



public function upload_image($filename='')
{
  $config['upload_path']          = './uploads/company/';
  $config['allowed_types']        = 'gif|jpg|png|pdf';
  $config['max_size']             = 5000;
  $config['max_width']            = 1024;
  $config['max_height']           = 768;

  $temp = explode(".", $_FILES[$filename]["name"]);
  $newfilename = round(microtime(true)) . '.' . end($temp);

  $config['file_name']            = $newfilename;

  $this->load->library('upload', $config);

  if ( ! $this->upload->do_upload($filename))
  {
          $error = array('error' => $this->upload->display_errors());
          pre($error);
          die();
  }
  else
  {
          $data = array('upload_data' => $this->upload->data());
          return $this->upload->data('file_name');
  }
}


  /**
   * This function is used load user edit information
   * @param number $userId : Optional : This is user id
   */
  function edit($id = NULL)
  {
      if($this->isMaster() == TRUE || $id == 1)
      {
          $this->loadThis();
      }
      else
      {
          if($id == null)
          {
              redirect('master/company');
          }

          $data['companyInfo'] = $this->company_model->getcompanyInfo($id);

          $this->global['pageTitle'] = 'WoCo : Edit Company';

          $this->loadViews("company/editOld", $this->global, $data, NULL);
      }
  }


  /**
   * This function is used to edit the user information
   */
  function editCompany()
  {
      if($this->isMaster() == TRUE)
      {
          $this->loadThis();
      }
      else
      {
          $this->load->library('form_validation');

          $id = $this->input->post('id');

          $this->form_validation->set_rules('name','Company Name','trim|required|max_length[128]');
          $this->form_validation->set_rules('website','Website URL','trim|max_length[128]');
          $this->form_validation->set_rules('address','Address','required|max_length[200]');


          if($this->form_validation->run() == FALSE)
          {
              $this->edit($id);
          }
          else
          {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
            $website = strtolower($this->security->xss_clean($this->input->post('website')));
            $address = $this->input->post('address');

            $imageName = "";
              if(!empty($_FILES['logo']['name'])) {
              $imageName = $this->upload_image('logo');
            }


              $companyInfo = array('name' => $name,
                                  'website' => $website ,
                                  'address' => $address);
                                  if ($imageName != "") {
                                    $companyInfo['logo'] = $imageName;
                                  }

              $result = $this->company_model->editCompany($companyInfo, $id);

              if($result == true)
              {
                  $this->session->set_flashdata('success', 'User updated successfully');
              }
              else
              {
                  $this->session->set_flashdata('error', 'User updation failed');
              }

              redirect('master/company/edit/'.$id);
          }
      }
  }


  /**
   * This function is used to delete the user using userId
   * @return boolean $result : TRUE / FALSE
   */
  function deleteCompany($id="")
  {
      if($this->isMaster() == TRUE)
      {
          echo(json_encode(array('status'=>'access')));
      }
      else
      {
          $result = $this->company_model->deleteCompany($id);
          if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Company deleted successfully'))); }
          else { echo(json_encode(array('status'=>FALSE, 'message' => 'Company is not deleted'))); }
      }
  }


  /**
   * This function is used to blocked the company using id
   * @return boolean $result : TRUE / FALSE
   */
  function blockCompany($id="")
  {
      if($this->isMaster() == TRUE)
      {
          echo(json_encode(array('status'=>'access')));
      }
      else
      {
          $companyInfo = array('status'=>0);
          $result = $this->company_model->blockCompany($id, $companyInfo);
          if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Company is Blocked '))); }
          else { echo(json_encode(array('status'=>FALSE, 'message' => 'Company is not Blocked'))); }
      }
  }



  /**
   * This function is used to Active the company using id
   * @return boolean $result : TRUE / FALSE
   */
  function activeCompany($id="")
  {
      if($this->isMaster() == TRUE)
      {
          echo(json_encode(array('status'=>'access')));
      }
      else
      {
          $companyInfo = array('status'=>1);
          $result = $this->company_model->activeCompany($id, $companyInfo);
          if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Company is Active '))); }
          else { echo(json_encode(array('status'=>FALSE, 'message' => 'Company is not Blocked'))); }
      }
  }

}
