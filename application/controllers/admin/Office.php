<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/AdminController.php';

class Office extends AdminController{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('admin/office_model'));
    $this->isLoggedIn();

  }


  public function index()
  {
      if ($this->isAdmin() == TRUE) {
        redirect('accessDenied');
      }
      $data['locations'] = $this->office_model->getAllLocations($this->companyId);
      $this->global['pageTitle'] = 'WoCo : Office Listing';
      $this->loadViews("office/listData", $this->global, $data, NULL);
  }

  public function getofficeList()
  {
    $json_data = $this->office_model->getofficeList($this->companyId, $this->vendorId);
    echo json_encode($json_data);
  }


  /**
   * This function is used to load the add new form
   */
  function addNew()
  {
    if($this->isAdmin() == TRUE)
    {
        echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
        die();
    }

    $company_id      = $this->companyId;
    $title           = $this->input->post('title');
    $description     = $this->input->post('description');
    $locationId      = $this->input->post('location_id');

    if (!$this->office_model->isValidCompany($company_id)) {
      echo json_encode(array('status' => 0, 'message' => "Your company doesn't exist or deactivated." ));
      die();
    }
    if ($this->office_model->isOfficeExisting($title, $company_id)) {
      echo json_encode(array('status' => 0, 'message' => "Entered Office alredy registered." ));
      die();
    }
    if (!$this->office_model->isValidLocation($locationId, $company_id)) {
      echo json_encode(array('status' => 0, 'message' => "Location doesn't existing" ));
      die();
    }

    $dataArr = array(
      'company_id' => $company_id,
      'title' => $title,
      'description' => $description,
      'location_id' => $locationId,
      'created_by' => $this->vendorId
    );

    $result = $this->office_model->createoffice($dataArr);
    if ($result > 0) {
       echo json_encode(array('status' => 1, 'message' => "New Office Successfully Created" ));
    }else {
      echo json_encode(array('status' => 0, 'message' => "Unable to create office." ));
    }

  }

    /**
     * This function is used to edit the user information
     */
    function edit($id = "")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
            if(!isset($_POST['title']))
            {
                if (!$this->office_model->isValidOfficeId($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }
                $data = $this->office_model->getofficeInfo($id);
                if (count($data)>0) { echo(json_encode(array('status'=>1,'message'=>'Success', 'data' => $data))); }
                else { echo(json_encode(array('status'=>0, 'message' => 'office detail not found'))); }
            }
            else
            {
              $company_id      = $this->companyId;
              $title           = $this->input->post('title');
              $description     = $this->input->post('description');
              $locationId      = $this->input->post('location_id');

              if (!$this->office_model->isValidCompany($company_id, $id)) {
                echo json_encode(array('status' => 0, 'message' => "Your company doesn't exist or deactivated." ));
                die();
              }
              if ($this->office_model->isEditOfficeExisting($id, $title, $company_id)) {
                echo json_encode(array('status' => 0, 'message' => "Entered Office alredy registered." ));
                die();
              }
              if (!$this->office_model->isValidLocation($locationId, $company_id)) {
                echo json_encode(array('status' => 0, 'message' => "Location doesn't existing" ));
                die();
              }


                $officeInfo = array(
                  'title' => $title,
                  'description' => $description,
                  'location_id' => $locationId,
                  'updated_by' => $this->vendorId
                );

                if (!$this->office_model->isValidOfficeId($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }

                $result = $this->office_model->edit($officeInfo, $id);
                if ($result) {
                   echo json_encode(array('status' => 1, 'message' => "Office Successfully updated" ));
                }else {
                  echo json_encode(array('status' => 0, 'message' => "Unable to update office." ));
                }
            }
        }
    }

    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteoffice($id="")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->office_model->isValidOfficeId($id, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $result = $this->office_model->deleteoffice($id);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Office deleted successfully'))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Office is not deleted'))); }
        }
    }

    /**
     * This function is used to blocked the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function blockoffice($id="")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->office_model->isValidOfficeId($id, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $officeInfo = array('status'=>2);
            $result = $this->office_model->blockoffice($id, $officeInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Office is Blocked '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Office is not Blocked'))); }
        }
    }

    /**
     * This function is used to Active the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function unblockoffice($id="")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->office_model->isValidOfficeId($id, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $officeInfo = array('status'=>1);
            $result = $this->office_model->unblockoffice($id, $officeInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Office is Active '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Office is not Blocked'))); }
        }
    }

}
