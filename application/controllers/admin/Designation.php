<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/AdminController.php';

class Designation extends AdminController{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('admin/designation_model'));
    $this->isLoggedIn();

  }


  public function index()
  {
      if ($this->isAdmin() == TRUE) {
        redirect('accessDenied');
      }
      $data['test'] = 'test';
      $this->global['pageTitle'] = 'WoCo : Designation Listing';
      $this->loadViews("designation/listData", $this->global, $data, NULL);
  }

  public function getDesignationList()
  {
    $json_data = $this->designation_model->getDesignationList($this->companyId);
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

    $title      = $this->input->post('title');
    $description     = $this->input->post('description');

    $dataArr = array(



      'title' => $title,
      'description' => $description,
      'company_id' => $this->companyId,
      'created_by' => $this->vendorId,
        );

    $result = $this->designation_model->createDesignation($dataArr);
    if ($result>0) {
       echo json_encode(array('status' => 1, 'message' => "New Designation Successfully Created" ));
    }else {
      echo json_encode(array('status' => 0, 'message' => "Unable to create Designation." ));
    }

  }

    /**
     * This function is used to edit the user information
     */
    function editDesignation($id = "")
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
                if (!$this->designation_model->isValidDesignation($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }
                $data = $this->designation_model->getDesignationInfo($id);
                if (count($data)>0) { echo(json_encode(array('status'=>1,'message'=>'Success', 'data' => $data))); }
                else { echo(json_encode(array('status'=>0, 'message' => 'Admin detail not found'))); }
            }
            else
            {
              $company_id = $this->companyId;
              $title      = $this->input->post('title');
              $description = $this->input->post('description');

                $designationInfo = array(
                  'title' => $title,
                  'description' => $description,
                  'updated_by' => $this->vendorId,
                ) ;

                if (!$this->designation_model->isValidDesignation($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }

                $result = $this->designation_model->editDesignation($designationInfo, $id);
                if ($result) {
                   echo json_encode(array('status' => 1, 'message' => "Designation Successfully updated" ));
                }else {
                  echo json_encode(array('status' => 0, 'message' => "Unable to update Designation" ));
                }
            }
        }
    }




    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteDesignation($id="")
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $result = $this->designation_model->deleteDesignation($id);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Company deleted successfully'))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Company is not deleted'))); }
        }
    }

    /**
     * This function is used to blocked the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function blockAdmin($userId="")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->designation_model->isValidUserId($userId, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $adminInfo = array('status'=>2);
            $result = $this->designation_model->blockAdmin($userId, $adminInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Admin is Blocked '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Admin is not Blocked'))); }
        }
    }

    /**
     * This function is used to Active the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function unblockAdmin($userId="")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->designation_model->isValidUserId($userId, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $adminInfo = array('status'=>1);
            $result = $this->designation_model->unblockAdmin($userId, $adminInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Admin is Active '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Admin is not Blocked'))); }
        }
    }

}
