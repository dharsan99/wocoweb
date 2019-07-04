<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/AdminController.php';

class Subadmin extends AdminController{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('admin/subadmin_model'));
    $this->isLoggedIn();

  }


  public function index()
  {
      if ($this->isAdmin() == TRUE || !$this->acl_model->hasAccess($this->vendorId, 'ADMIN_SUB_ADMIN', 'view')) {
        redirect('accessDenied');
      }
      $data['test'] = 'test';
      $data['permission'] = $this->acl_model->getAccessPermissions($this->vendorId, "ADMIN_SUB_ADMIN");

      $this->global['pageTitle'] = 'WoCo : Sub Admin Listing';
      $this->loadViews("subadmin/listData", $this->global, $data, NULL);
  }

  public function getSubAdminList()
  {
    $json_data = $this->subadmin_model->getSubAdminList($this->companyId, $this->vendorId);
    echo json_encode($json_data);
  }


  /**
   * This function is used to load the add new form
   */
  function addNew()
  {
    if($this->isAdmin() == TRUE || !$this->acl_model->hasAccess($this->vendorId, 'ADMIN_SUB_ADMIN', 'add'))
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
    $email = strtolower($email);

    if (!$this->subadmin_model->isValidCompany($company_id)) {
      echo json_encode(array('status' => 0, 'message' => "Your company doesn't exist or deactivated." ));
      die();
    }
    if ($this->subadmin_model->isEmailExisting($email)) {
      echo json_encode(array('status' => 0, 'message' => "Entered email alredy registered." ));
      die();
    }
    if ($this->subadmin_model->isMobileExisting($mobile)) {
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
      'emergency_contacts'   =>  '[]',
      'mobile' => $mobile,
      'roleId' => ROLE_ADMIN,
      'createdBy' => $this->vendorId,
      'manager_id' => $this->common_model->getCompanyAdminId($this->companyId),
      'joining_date' => date('Y-m-d H:i:s'),
      'password' => getHashedPassword($password)
    );

    $result = $this->subadmin_model->createSubAdmin($dataArr);
    if ($result > 0) {

      $keyTxt = $this->encryption->encrypt($result . SEPARATOR . $email);
      $action_link = base_url()."verify-email?token=".urlencode($keyTxt);
      $data['data'] = array(
       'name' => $fname,
       'action_link' => $action_link,
       'email' => $email,
       'password' => $password
       );
       $message = $this->load->view('email/user-register', $data,TRUE);
       $subject = "WoCo - Welcome to the Work Companion Family! ";
       sendCustomEmail($email, $subject, $message);
       echo json_encode(array('status' => 1, 'message' => "New Admin Successfully Created" ));
    }else {
      echo json_encode(array('status' => 0, 'message' => "Unable to create admin." ));
    }

  }

    /**
     * This function is used to edit the user information
     */
    function editAdmin($id = "")
    {
        if($this->isAdmin() == TRUE || !$this->acl_model->hasAccess($this->vendorId, 'ADMIN_SUB_ADMIN', 'edit'))
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
            if(!isset($_POST['fname']))
            {
                if (!$this->subadmin_model->isValidUserId($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }
                $data = $this->subadmin_model->getadminInfo($id);
                if (count($data)>0) {
                  $data[0]->permissions = $this->acl_model->getUserPermissions($id);
                  echo(json_encode(array('status'=>1,'message'=>'Success', 'data' => $data)));
                }else {
                  echo(json_encode(array('status'=>0, 'message' => 'Admin detail not found')));
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
              $email = strtolower($email);

              if (!$this->subadmin_model->isValidCompany($company_id, $id)) {
                echo json_encode(array('status' => 0, 'message' => "Your company doesn't exist or deactivated." ));
                die();
              }
              if ($this->subadmin_model->isEditEmailExisting($email, $id)) {
                echo json_encode(array('status' => 0, 'message' => "Entered email alredy registered." ));
                die();
              }
              if ($this->subadmin_model->isEditMobileExisting($mobile, $id)) {
                echo json_encode(array('status' => 0, 'message' => "Entered mobile number alredy registered." ));
                die();
              }


                $adminInfo = array(
                  'name' => $fname . " " . $lname,
                  'fname' => $fname,
                  'lname' => $lname,
                  'email' => $email,
                  'phone_code' => $phoneCode,
                  'mobile' => $mobile,
                  'updatedBy' => $this->vendorId,
                ) ;

                if (!$this->subadmin_model->isValidUserId($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }

                $result = $this->subadmin_model->editAdmin($adminInfo, $id);
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

                   echo json_encode(array('status' => 1, 'message' => "Sub Admin Successfully updated" ));
                }else {
                  echo json_encode(array('status' => 0, 'message' => "Unable to update admin." ));
                }
            }
        }
    }

    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteAdmin($userId="")
    {
        if($this->isAdmin() == TRUE || !$this->acl_model->hasAccess($this->vendorId, 'ADMIN_SUB_ADMIN', 'delete'))
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->subadmin_model->isValidUserId($userId, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $result = $this->subadmin_model->deleteAdmin($userId);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Admin deleted successfully'))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Admin is not deleted'))); }
        }
    }

    /**
     * This function is used to blocked the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function blockAdmin($userId="")
    {
        if($this->isAdmin() == TRUE || !$this->acl_model->hasAccess($this->vendorId, 'ADMIN_SUB_ADMIN', 'block'))
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->subadmin_model->isValidUserId($userId, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $adminInfo = array('status'=>2);
            $result = $this->subadmin_model->blockAdmin($userId, $adminInfo);
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
        if($this->isAdmin() == TRUE || !$this->acl_model->hasAccess($this->vendorId, 'ADMIN_SUB_ADMIN', 'unblock'))
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->subadmin_model->isValidUserId($userId, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $adminInfo = array('status'=>1);
            $result = $this->subadmin_model->unblockAdmin($userId, $adminInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Admin is Active '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Admin is not Blocked'))); }
        }
    }

}
