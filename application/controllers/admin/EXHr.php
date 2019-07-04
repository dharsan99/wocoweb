<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/AdminController.php';

class Hr extends AdminController{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('admin/hr_model'));
    $this->isLoggedIn();

  }


  public function index()
  {
      if ($this->isAdmin() == TRUE) {
        redirect('accessDenied');
      }
      $data['test'] = 'test';
      $data['permission'] = $this->acl_model->getAccessPermissions($this->vendorId, "ADMIN_HR_MNG");
      $this->global['pageTitle'] = 'WoCo : HR Listing';
      $this->loadViews("hr/listData", $this->global, $data, NULL);
  }

  public function getHrList()
  {
    $json_data = $this->hr_model->getHrList($this->companyId, $this->vendorId);
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

    $company_id = $this->companyId;
    $fname      = $this->input->post('fname');
    $lname      = $this->input->post('lname');
    $email      = $this->input->post('email');
    $phoneCode  = $this->input->post('phone_code');
    $mobile     = $this->input->post('mobile');
    $password   = generate_password(8);

    if (!$this->hr_model->isValidCompany($company_id)) {
      echo json_encode(array('status' => 0, 'message' => "Your company doesn't exist or deactivated." ));
      die();
    }
    if ($this->hr_model->isEmailExisting($email)) {
      echo json_encode(array('status' => 0, 'message' => "Entered email alredy registered." ));
      die();
    }
    if ($this->hr_model->isMobileExisting($mobile)) {
      echo json_encode(array('status' => 0, 'message' => "Entered mobile number alredy registered." ));
      die();
    }

    $dataArr = array(
      'company_id' => $company_id,
      'name' => $fname . " " . $lname,
      'fname' => $fname,
      'lname' => $lname,
      'email' => $email,
      'phone_code' => $phoneCode,
      'mobile' => $mobile,
      'roleId' => ROLE_HR,
      'createdBy' => $this->vendorId,
      'joining_date' => date('Y-m-d H:i:s'),
      'password' => getHashedPassword($password)
    );

    $result = $this->hr_model->createHr($dataArr);
    if ($result > 0) {

      $keyTxt = $this->encryption->encrypt($result . SEPARATOR . $email);
      $action_link = base_url()."verify-email/".urlencode($keyTxt);
      $data['data'] = array(
       'name' => $fname,
       'action_link' => $action_link,
       'email' => $email,
       'password' => $password
       );
       $message = $this->load->view('email/user-register', $data,TRUE);
       $subject = "WoCo - Welcome to the Work Companion Family! ";
       sendCustomEmail($email, $subject, $message);
       echo json_encode(array('status' => 1, 'message' => "New Hr Successfully Created" ));
    }else {
      echo json_encode(array('status' => 0, 'message' => "Unable to create hr." ));
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
            if(!isset($_POST['fname']))
            {
                if (!$this->hr_model->isValidUserId($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }
                $data = $this->hr_model->getHrInfo($id);
                if (count($data)>0) {
                  $data[0]->permissions = $this->acl_model->getUserPermissions($id);
                  echo(json_encode(array('status'=>1,'message'=>'Success', 'data' => $data)));
                }else {
                  echo(json_encode(array('status'=>0, 'message' => 'Hr detail not found')));
                }
            }
            else
            {
              $company_id = $this->companyId;
              $fname      = $this->input->post('fname');
              $lname      = $this->input->post('lname');
              $email      = $this->input->post('email');
              $phoneCode  = $this->input->post('phone_code');
              $mobile     = $this->input->post('mobile');
            //  $password   = generate_password(8);

              if (!$this->hr_model->isValidCompany($company_id, $id)) {
                echo json_encode(array('status' => 0, 'message' => "Your company doesn't exist or deactivated." ));
                die();
              }
              if ($this->hr_model->isEditEmailExisting($email, $id)) {
                echo json_encode(array('status' => 0, 'message' => "Entered email alredy registered." ));
                die();
              }
              if ($this->hr_model->isEditMobileExisting($mobile, $id)) {
                echo json_encode(array('status' => 0, 'message' => "Entered mobile number alredy registered." ));
                die();
              }


                $hrInfo = array(
                  'name' => $fname . " " . $lname,
                  'fname' => $fname,
                  'lname' => $lname,
                  'email' => $email,
                  'phone_code' => $phoneCode,
                  'mobile' => $mobile,
                  'updatedBy' => $this->vendorId,
                ) ;

                if (!$this->hr_model->isValidUserId($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }

                $result = $this->hr_model->edit($hrInfo, $id);
                if ($result) {

                  $permisions = $this->acl_model->getUserPermissions($id);
                  foreach ($permisions as $key => $value) {
                    $tempPrm = $this->input->post($value->permission);
                    $tempArr = array();
                    if (!empty($tempPrm)) {
                      // if (in_array("view", $tempPrm)) { $tempArr['view'] = 1; }else { $tempArr['view'] = 0; }
                      if (in_array("add", $tempPrm)) { $tempArr['add'] = 1; }else { $tempArr['add'] = 0; }
                      if (in_array("edit", $tempPrm)) { $tempArr['edit'] = 1; }else { $tempArr['edit'] = 0; }
                      if (in_array("delete", $tempPrm)) { $tempArr['delete'] = 1; }else { $tempArr['delete'] = 0; }
                      if (in_array("block", $tempPrm)) { $tempArr['block'] = 1; }else { $tempArr['block'] = 0; }
                      if (in_array("unblock", $tempPrm)) { $tempArr['unblock'] = 1; }else { $tempArr['unblock'] = 0; }
                    }else {
                      // $tempArr['view']    = 0;
                      $tempArr['add']    = 0;
                      $tempArr['edit']   = 0;
                      $tempArr['delete'] = 0;
                      $tempArr['block']  = 0;
                      $tempArr['unblock']= 0;
                    }
                    $tempArr['updated_by']= $this->vendorId;
                    $this->acl_model->updatePermissions($id, $value->id, $tempArr);
                  }

                   echo json_encode(array('status' => 1, 'message' => "Hr Successfully updated" ));
                }else {
                  echo json_encode(array('status' => 0, 'message' => "Unable to update hr." ));
                }
            }
        }
    }

    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteHr($userId="")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->hr_model->isValidUserId($userId, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $result = $this->hr_model->deleteHr($userId);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Hr deleted successfully'))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Hr is not deleted'))); }
        }
    }

    /**
     * This function is used to blocked the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function blockHr($userId="")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->hr_model->isValidUserId($userId, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $HrInfo = array('status'=>2);
            $result = $this->hr_model->blockHr($userId, $HrInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Hr is Blocked '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Hr is not Blocked'))); }
        }
    }

    /**
     * This function is used to Active the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function unblockHr($userId="")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->hr_model->isValidUserId($userId, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $HrInfo = array('status'=>1);
            $result = $this->hr_model->unblockHr($userId, $HrInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Hr is Active '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Hr is not Blocked'))); }
        }
    }

}
