<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/AdminController.php';

class Empgrade extends AdminController{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('admin/empgrade_model'));
    $this->isLoggedIn();

  }


  public function index()
  {
      if ($this->isAdmin() == TRUE) {
        redirect('accessDenied');
      }
      $data['test'] = 'test';
      $this->global['pageTitle'] = 'WoCo : Empgrade Listing';
      $this->loadViews("empgrade/listData", $this->global, $data, NULL);
  }

  public function getEmpgradeList()
  {
    $json_data = $this->empgrade_model->getEmpgradeList($this->companyId);
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

    $title       = $this->input->post('title');
    $leave      = $this->input->post('leave');
    $description = $this->input->post('description');

    $dataArr = array(
      'title' => $title,
      'leave_credits' => $leave,
      'description'   => $description,
      'company_id'    => $this->companyId,
      'created_by'    => $this->vendorId,
        );

    $result = $this->empgrade_model->createEmpgrade($dataArr);
    if ($result>0) {
       echo json_encode(array('status' => 1, 'message' => "New Employee Type Successfully Created" ));
    }else {
      echo json_encode(array('status' => 0, 'message' => "Unable to create Employee Type." ));
    }

  }

    /**
     * This function is used to edit the user information
     */
    function editEmpgrade($id = "")
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
                if (!$this->empgrade_model->isValidEmpgrade($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }
                $data = $this->empgrade_model->getEmpgradeInfo($id);
                if (count($data)>0) { echo(json_encode(array('status'=>1,'message'=>'Success', 'data' => $data))); }
                else { echo(json_encode(array('status'=>0, 'message' => 'Admin detail not found'))); }
            }
            else
            {
              $company_id  = $this->companyId;
              $title       = $this->input->post('title');
              $leave       = $this->input->post('leave');
              $description = $this->input->post('description');

                $empgradeInfo = array(
                  'title' => $title,
                  'leave_credits' => $leave,
                  'description' => $description,
                ) ;

                if (!$this->empgrade_model->isValidEmpgrade($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }

                $result = $this->empgrade_model->editEmpgrade($empgradeInfo, $id);
                if ($result) {
                   echo json_encode(array('status' => 1, 'message' => "Employee Type Successfully updated" ));
                }else {
                  echo json_encode(array('status' => 0, 'message' => "Unable to update Employee Type" ));
                }
            }
        }
    }




    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteEmpgrade($id="")
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $result = $this->empgrade_model->deleteEmpgrade($id);
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
          if (!$this->empgrade_model->isValidUserId($userId, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $adminInfo = array('status'=>2);
            $result = $this->empgrade_model->blockAdmin($userId, $adminInfo);
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
          if (!$this->empgrade_model->isValidUserId($userId, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $adminInfo = array('status'=>1);
            $result = $this->empgrade_model->unblockAdmin($userId, $adminInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Admin is Active '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Admin is not Blocked'))); }
        }
    }

}
