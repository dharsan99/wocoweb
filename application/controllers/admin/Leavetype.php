<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/AdminController.php';

class Leavetype extends AdminController{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('admin/leavetype_model'));
    $this->isLoggedIn();

  }


  public function index()
  {
      if ($this->isAdmin() == TRUE) {
        redirect('accessDenied');
      }
      $data['test'] = 'test';
      $this->global['pageTitle'] = 'WoCo : Leavetype Listing';
      $this->loadViews("leavetype/listData", $this->global, $data, NULL);
  }

  public function getLeavetypeList()
  {
    $json_data = $this->leavetype_model->getLeavetypeList($this->companyId);
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
      'description'   => $description,
      'company_id'    => $this->companyId,
      'created_by'    => $this->vendorId,
        );

    $result = $this->leavetype_model->createLeavetype($dataArr);
    if ($result>0) {
       echo json_encode(array('status' => 1, 'message' => "New Employee Type Successfully Created" ));
    }else {
      echo json_encode(array('status' => 0, 'message' => "Unable to create Employee Type." ));
    }

  }

    /**
     * This function is used to edit the user information
     */
    function editLeavetype($id = "")
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
                if (!$this->leavetype_model->isValidLeavetype($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }
                $data = $this->leavetype_model->getLeavetypeInfo($id);
                if (count($data)>0) { echo(json_encode(array('status'=>1,'message'=>'Success', 'data' => $data))); }
                else { echo(json_encode(array('status'=>0, 'message' => 'Admin detail not found'))); }
            }
            else
            {
              $company_id  = $this->companyId;
              $title       = $this->input->post('title');
              $description = $this->input->post('description');

                $leavetypeInfo = array(
                  'title' => $title,
                  'description' => $description,
                ) ;

                if (!$this->leavetype_model->isValidLeavetype($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }

                $result = $this->leavetype_model->editLeavetype($leavetypeInfo, $id);
                if ($result) {
                   echo json_encode(array('status' => 1, 'message' => "Employee Type Successfully updated" ));
                }else {
                  echo json_encode(array('status' => 0, 'message' => "Unable to update Employee Type" ));
                }
            }
        }
    }




    /**
     * This function is used to delete the Leavetype using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteLeavetype($id="")
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $result = $this->leavetype_model->deleteLeavetype($id);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Company deleted successfully'))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Company is not deleted'))); }
        }
    }

    /**
     * This function is used to blocked the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function blockLeavetype($userId="")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->leavetype_model->isValidUserId($userId, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $adminInfo = array('status'=>2);
            $result = $this->leavetype_model->blockAdmin($userId, $adminInfo);
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
          if (!$this->leavetype_model->isValidUserId($userId, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $adminInfo = array('status'=>1);
            $result = $this->leavetype_model->unblockAdmin($userId, $adminInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Admin is Active '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Admin is not Blocked'))); }
        }
    }

}
