<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/HrController.php';

class Leave extends HrController{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('hr/leave_model'));
    $this->isLoggedIn();

  }


  public function index()
  {
      if ($this->isHr() == TRUE) {
        redirect('accessDenied');
      }
      $data['test'] = 'test';
      $this->global['pageTitle'] = 'WoCo : Leave Listing';
      $this->loadViews("leaves/listData", $this->global, $data, NULL);
  }

  public function getLeavesList()
  {
    $json_data = $this->leave_model->getLeavesList($this->companyId);
    echo json_encode($json_data);
  }


  /**
   * This function is used to load the add new form
   */
  function addNew()
  {
    if($this->isHr() == TRUE)
    {
        echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
        die();
    }

    $title       = $this->input->post('title');
    $description = $this->input->post('description');

    $dataArr = array(
      'title' => $title,
      'description' => $description,
      'company_id' => $this->companyId,
      'created_by' => $this->vendorId,
        );

    $result = $this->leave_model->createLeaves($dataArr);
    if ($result>0) {
       echo json_encode(array('status' => 1, 'message' => "New Employee Type Successfully Created" ));
    }else {
      echo json_encode(array('status' => 0, 'message' => "Unable to create Employee Type." ));
    }

  }

    /**
     * This function is used to edit the user information
     */
    function editLeaves($id = "")
    {
        if($this->isHR() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
            if(!isset($_POST['title']))
            {
                if (!$this->leave_model->isValidLeaves($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }
                $data = $this->leave_model->getLeavesInfo($id);
                if (count($data)>0) { echo(json_encode(array('status'=>1,'message'=>'Success', 'data' => $data))); }
                else { echo(json_encode(array('status'=>0, 'message' => 'Admin detail not found'))); }
            }
            else
            {
              $company_id = $this->companyId;
              $title      = $this->input->post('title');
              $description = $this->input->post('description');

                $leavesInfo = array(
                  'title' => $title,
                  'description' => $description,
                ) ;

                if (!$this->leave_model->isValidLeaves($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }

                $result = $this->leave_model->editLeaves($leavesInfo, $id);
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
    function deleteLeaves($id="")
    {
        if($this->isHR() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $result = $this->leave_model->deleteLeaves($id);
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
        if($this->isHR() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->leave_model->isValidUserId($userId, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $adminInfo = array('status'=>2);
            $result = $this->leave_model->blockAdmin($userId, $adminInfo);
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
        if($this->isHR() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->leave_model->isValidUserId($userId, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $adminInfo = array('status'=>1);
            $result = $this->leave_model->unblockAdmin($userId, $adminInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Admin is Active '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Admin is not Blocked'))); }
        }
    }

}
