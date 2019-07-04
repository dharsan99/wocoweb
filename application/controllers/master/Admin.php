<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/MasterController.php';

class Admin extends MasterController{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('master/admin_model'));
    $this->isLoggedIn();

  }


  public function index()
  {
    $data['test'] = 'test data';
    $data['permission'] = $this->acl_model->getAccessPermissions($this->vendorId, 'SA_ADMIN');
    $this->global['pageTitle'] = 'WoCo : Admin Listing';
    $this->loadViews("admin/listData", $this->global, $data, NULL);
  }

  public function getListData()
  {
      $json_data = $this->admin_model->getAdminList();
      echo json_encode($json_data);  // send data as json format
  }


  /**
   * This function is used to load the add new form
   */
  function addNew()
  {
    if($this->isMaster() == TRUE || !$this->acl_model->hasAccess($this->vendorId, 'SA_ADMIN', 'add'))
    {
        echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
        die();
    }

    $company_id = $this->input->post('company_id');
    $fname      = $this->input->post('fname');
    $lname      = $this->input->post('lname');
    $email      = $this->input->post('email');
    $phoneCode  = $this->input->post('phone_code');
    $mobile     = $this->input->post('mobile');
    $password   = generate_password(8);
    $email = strtolower($email);

    if (!$this->admin_model->isValidCompany($company_id)) {
      echo json_encode(array('status' => 0, 'message' => "Selected company doesn't exist or deactivated." ));
      die();
    }
    if ($this->admin_model->isEmailExisting($email)) {
      echo json_encode(array('status' => 0, 'message' => "Entered email alredy registered." ));
      die();
    }
    if ($this->admin_model->isMobileExisting($mobile)) {
      echo json_encode(array('status' => 0, 'message' => "Entered mobile number alredy registered." ));
      die();
    }

    $dataArr = array(
      'company_id' => $company_id,
      'name' => $fname . " " . $lname,
      'fname' => $fname,
      'lname' => $lname,
      'email' => strtolower($email),
      'phone_code' => $phoneCode,
      'mobile' => $mobile,
      'emergency_contacts'   =>  '[]',
      'roleId' => ROLE_ADMIN,
      'is_hr' => 1,
      'createdBy' => $this->vendorId,
      'joining_date' => date('Y-m-d H:i:s'),
      'password' => getHashedPassword($password)
    );

    $result = $this->admin_model->createAdmin($dataArr);
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

  public function companySearch()
  {
    if($this->isMaster() == TRUE)
    {
        echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
        die();
    }
    $searchText = $this->input->get('q');
    $result = $this->admin_model->searchCompany($searchText);
    $totalData = array();
    foreach ($result as $key => $row) {
      $data['id'] = $row->id;
      $data['text'] = $row->name;
      array_push($totalData, $data);
    }
    echo json_encode($totalData);
  }



  /**
   * This function is used to edit the Permission information
   */
  function editAdmin($userId = "")
  {
      if($this->isMaster() == TRUE || !$this->acl_model->hasAccess($this->vendorId, 'SA_ADMIN', 'edit'))
      {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
      }
      else
      {

          if(!isset($_POST['company_name']))
          {
            $data = $this->admin_model->getadminInfo($userId);
            if (count($data)>0) {
              $data[0]->permissions = $this->acl_model->getUserPermissions($userId);
              echo(json_encode(array('status'=>1,'message'=>'Success', 'data' => $data)));
            }else {
              echo(json_encode(array('status'=>0, 'message' => 'Admin detail not found')));
            }
          }
          else
          {
            $company_id = $this->input->post('company_id');
            $edit_fname = $this->input->post('fname');
            $edit_lname = $this->input->post('lname');
            $edit_email = $this->input->post('email');
            $edit_phone_code = $this->input->post('phone_code');
            $edit_mobile = $this->input->post('mobile');
            $edit_email = strtolower($edit_email);

            $adminInfo = array(
                      'company_id' => $company_id ,
                      'name' => $edit_fname . ' ' . $edit_lname ,
                      'fname' => $edit_fname ,
                      'lname' => $edit_lname ,
                      'phone_code' => $edit_phone_code,
                      'updatedBy' => $this->vendorId,
                      'mobile' => $edit_mobile
                    ) ;

              $result = $this->admin_model->editAdmin($adminInfo, $userId);

              if ($result) {

                $permisions = $this->acl_model->getUserPermissions($userId);
                foreach ($permisions as $key => $value) {
                  $tempPrm = $this->input->post($value->permission);
                  $tempArr = array();
                  if (!empty($tempPrm)) {
                    if (in_array("add", $tempPrm)) { $tempArr['add'] = 1; }else { $tempArr['add'] = 0; }
                    if (in_array("edit", $tempPrm)) { $tempArr['edit'] = 1; }else { $tempArr['edit'] = 0; }
                    if (in_array("delete", $tempPrm)) { $tempArr['delete'] = 1; }else { $tempArr['delete'] = 0; }
                    if (in_array("block", $tempPrm)) { $tempArr['block'] = 1; }else { $tempArr['block'] = 0; }
                    if (in_array("unblock", $tempPrm)) { $tempArr['unblock'] = 1; }else { $tempArr['unblock'] = 0; }
                  }else {
                    $tempArr['add']    = 0;
                    $tempArr['edit']   = 0;
                    $tempArr['delete'] = 0;
                    $tempArr['block']  = 0;
                    $tempArr['unblock']= 0;
                  }
                  $tempArr['updated_by']= $this->vendorId;
                  $this->acl_model->updatePermissions($userId, $value->id, $tempArr);
                }

                 echo json_encode(array('status' => 1, 'message' => "Admin Successfully updated" ));
              }else {
                echo json_encode(array('status' => 0, 'message' => "Unable to Update admin." ));
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
        if($this->isMaster() == TRUE || !$this->acl_model->hasAccess($this->vendorId, 'SA_ADMIN', 'delete'))
        {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
        }
        else
        {
            $result = $this->admin_model->deleteAdmin($userId);
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
        if($this->isMaster() == TRUE || !$this->acl_model->hasAccess($this->vendorId, 'SA_ADMIN', 'block'))
        {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
        }
        else
        {
            $adminInfo = array('status'=>2);
            $result = $this->admin_model->blockAdmin($userId, $adminInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Company is Blocked '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Company is not Blocked'))); }
        }
    }



    /**
     * This function is used to Active the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function unblockAdmin($userId="")
    {
        if($this->isMaster() == TRUE || !$this->acl_model->hasAccess($this->vendorId, 'SA_ADMIN', 'unblock'))
        {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
        }
        else
        {
            $adminInfo = array('status'=>1);
            $result = $this->admin_model->unblockAdmin($userId, $adminInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Company is Active '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Company is not Blocked'))); }
        }
    }





}
