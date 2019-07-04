<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/HrController.php';

class Employee extends HrController{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('hr/employee_model'));
    $this->isLoggedIn();
  }

  public function index()
  {
      $this->userListing();
  }

  public function getEmployeeList()
  {
    $json_data = $this->employee_model->getEmployeeList($this->companyId, $this->vendorId);
    echo json_encode($json_data);
  }

  /**
   * This function is used to load the user list
   */
  function userListing()
  {
      if($this->isHr() == TRUE)
      {
          $this->loadThis();
      }
      else
      {
        //fname=2019-03-12&department=5&team_id=4&designation=2&mobile=ertert&emp_status=3
          $queryParam = $this->input->get();
          $searchText = $this->security->xss_clean($this->input->post('searchText'));
          $data['searchText'] = $searchText;
          $this->load->library('pagination');
          $count = $this->employee_model->userListingCount($queryParam,$searchText,$this->companyId, $this->vendorId);
          $returns = $this->paginationCompress( "hr/employee/", $count, 10 );
          $data['userRecords'] = $this->employee_model->userListing($queryParam,$searchText, $returns["page"], $returns["segment"], $this->companyId, $this->vendorId);
          $this->global['pageTitle'] = 'WoCo : User Listing';

          $data['designations']      = $this->employee_model->getDesignationList($this->companyId);
          $data['emp_grades']        = $this->employee_model->getEmployeeGrades($this->companyId);
          $data['emp_status']        = $this->employee_model->getEmployeeStatus($this->companyId);
          $data['teams']             = $this->employee_model->getEmployeeTeam($this->companyId);
          $data['emp_types']         = $this->employee_model->getEmployeeType($this->companyId);
          $data['departments']       = $this->employee_model->getDepartment($this->companyId);
          $data['timings']           = $this->employee_model->getOfficialTimings($this->companyId);
          $data['managerlist']        = $this->employee_model->getManagerlist($this->companyId);
          $data['offices']           = $this->employee_model->getOffics($this->companyId);
          $data['permission']        = $this->acl_model->getAccessPermissions($this->vendorId, "HR_EMP_MNG");
          $this->loadViews("employee/listData", $this->global, $data, NULL);
      }
  }

  function userView()
  {
      if($this->isHr() == TRUE)
      {
          $this->loadThis();
      }
      else
      {
        //fname=2019-03-12&department=5&team_id=4&designation=2&mobile=ertert&emp_status=3
          $queryParam = $this->input->get();
          $searchText = $this->security->xss_clean($this->input->post('searchText'));
          $data['searchText'] = $searchText;
          $this->load->library('pagination');
          $count = $this->employee_model->userViewCount($queryParam,$searchText,$this->companyId, $this->vendorId);
          $returns = $this->paginationCompress( "hr/employee/", $count, 10 );
          $data['userRecords'] = $this->employee_model->userView($queryParam,$searchText, $returns["page"], $returns["segment"], $this->companyId, $this->vendorId);
          $this->global['pageTitle'] = 'WoCo : User Listing';

          $data['designations']      = $this->employee_model->getDesignationList($this->companyId);
          $data['emp_grades']        = $this->employee_model->getEmployeeGrades($this->companyId);
          $data['emp_status']        = $this->employee_model->getEmployeeStatus($this->companyId);
          $data['teams']             = $this->employee_model->getEmployeeTeam($this->companyId);
          $data['emp_types']         = $this->employee_model->getEmployeeType($this->companyId);
          $data['departments']       = $this->employee_model->getDepartment($this->companyId);
          $data['timings']           = $this->employee_model->getOfficialTimings($this->companyId);
          $data['managerlist']        = $this->employee_model->getManagerlist($this->companyId);
          $data['offices']           = $this->employee_model->getOffics($this->companyId);
          $data['permission']         = $this->acl_model->getAccessPermissions($this->vendorId, "HR_EMP_MNG");
          $this->loadViews("employee/listView", $this->global, $data, NULL);
      }
  }

  public function getRequest($userId  = '')
  {
    if($this->isHr() == TRUE)
    {
        echo json_encode(array('status' => 0, 'message' => "Access Denied"));
    }
    else
    {
        $queryParam = $this->input->get();
        $result = $this->employee_model->getRequests($this->companyId, $this->vendorId, $userId, $queryParam);
        echo json_encode(array('status' => 1, 'message' => "Success", 'data' => $result ));
    }
  }

  public function approveAttendance($userId = '')
  {
    if($this->isHr() == TRUE)
    {
        echo json_encode(array('status' => 0, 'message' => "Access Denied"));
    }
    else
    {
        $queryParam = $this->input->get();
        $result = $this->employee_model->getRequestById($this->companyId, $this->vendorId, $userId, $queryParam);
        if ($result == NULL) {
          echo json_encode(array('status' => 0, 'message' => "Request Not Found"));
          die();
        }
        if ($result->rq_status == 2) {
          echo json_encode(array('status' => 0, 'message' => "Request already approved.") );
          die();
        }
        $response = $this->employee_model->approveAttendance($queryParam['reqId'], $result->rq_action_id);
        if ($response) {
          $userData = $this->employee_model->getUserInfo($userId);
          $title = "Check-in Request is Approved ";
          $message = "Hi $userData->fname, Your Check-in Request dated ".date("d M, Y h:i A", strtotime($result->rq_datetime))." has been approved by your ".$this->global['role_text'].".";
          $this->sendNotification($userId, $userData->fb_token, $title, $message);
          echo json_encode(array('status' => 1, 'message' => "Request approved successfully."));
          die();
        }else {
          echo json_encode(array('status' => 0, 'message' => "Unable to approve request."));
          die();
        }

    }
  }

  public function rejectAttendance($userId = '')
  {
    if($this->isHr() == TRUE)
    {
        echo json_encode(array('status' => 0, 'message' => "Access Denied"));
    }else{
        $queryParam = $this->input->post();
        $result = $this->employee_model->getRequestById($this->companyId, $this->vendorId, $userId, $queryParam);
        if ($result == NULL) {
          echo json_encode(array('status' => 0, 'message' => "Request Not Found"));
          die();
        }
        if ($result->rq_status == 3) {
          echo json_encode(array('status' => 0, 'message' => "Request already rejected.") );
          die();
        }
        $response = $this->employee_model->rejectAttendance($queryParam['reqId'], $result->rq_action_id, $queryParam['comment']);
        if ($response) {
          $userData = $this->employee_model->getUserInfo($userId);
          $title = "Check-in Request is Rejected";
          $message = "Hi $userData->fname, Your Check-in Request dated ".date("d M, Y h:i A", strtotime($result->rq_datetime))." has been rejected by your ".$this->global['role_text'].".\nReason: ".$queryParam['comment']."\nPlease contact your ".$this->global['role_text']." for further info.";
          $this->sendNotification($userId, $userData->fb_token, $title, $message);
          echo json_encode(array('status' => 1, 'message' => "Request rejected successfully."));
          die();
        }else {
          echo json_encode(array('status' => 0, 'message' => "Unable to reject request."));
          die();
        }
    }
  }

  public function getAttendanceData($userId  = '')
  {
    if($this->isHr() == TRUE)
    {
        echo json_encode(array('status' => 0, 'message' => "Access Denied"));
    }
    else
    {
        $queryParam = $this->input->get();
        $result = $this->employee_model->getAttendanceData($this->companyId, $this->vendorId, $userId, $queryParam);

        $data = array();
        foreach ($result as $key => $item) {
          $date = substr($item->checkin_date, 0, 10);
          if (array_key_exists($date ,$data)) {
            $data[$date][] = $item;
          }else {
            $data[$date] = array($item);
          }
        }
        krsort($data);
        $htmText = $this->buildCheckInTrail($data);
        echo json_encode(array('status' => 1, 'message' => "Success", 'data' => $htmText ));
    }
  }

  public function buildCheckInTrail($data)
  {
    if (count($data) == 0) {
      return "<h3 class='text-center'>No Check In Data</h3>";
    }

    $temStr = "";

    foreach ($data as $key => $item) {
      $temStr .= "<li>\n";
      $temStr .= "<div id=\"content\" style=\"margin-left: 26px;\">\n";
      $temStr .= "  <div class=\"circle blue\"></div>\n";
      $temStr .= "</div>\n";
      $temStr .= "<div class=\"timeline-item\">\n";
      $temStr .= "  <div class=\"col-md-2\" style=\"margin-left: -25px;width:13.6%;\">\n";
      $temStr .= "    <p>".date("d M", strtotime($key))."<br>".date("D", strtotime($key))."</p>\n";
      $temStr .= "  </div>\n";
      $temStr .= "  <div class=\"col-md-12\" style=\"width:93%; margin-left:-66px;\">\n";
      $temStr .= "    <div class=\"row\">\n";
      $temStr .= "      <ul class=\"atndnc\">\n";
      $temStr .= "          <div class=\"box custom-box\" style=\"background-color: #ffffff;border-radius: 10px;height: auto;;box-shadow: 0 0 5px 5px #e6e2e266;\">\n";

    foreach ($item as $k => $subItem) {
      $temStr .= "            <div class=\"row\">\n";
      $temStr .= "              <li class=\"location-office\">\n";
      $temStr .= "                <a href=\"#\">\n";
      $temStr .= "                  <img src='".base_url()."assets/dist/img/location_variant.png' style=\"margin-top: -4px;height: 16px;margin-right: 6px;margin-left: 12px;\">\n";
      $temStr .= "                  <span style=\"color: #30388e;\">".$subItem->location_name."</span>\n";
      $temStr .= "                </a>\n";
      $temStr .= "              </li>\n";
      $temStr .= "             </div>\n";
      $temStr .= "              <div class=\"row\" style=\" margin-left: 24px;margin-top: 10px;\">\n";
      $temStr .= "                <li class=\"location-office\">\n";
      $temStr .= "                  <span><img src=\"".base_url()."assets/dist/img/ic_checkin_blue.png\" style=\"margin-top: -4px; height: 20px;margin-right: 6px;\"><a href=\"#\">".date("h:i:s A", strtotime($subItem->checkin_date))."</a>";
      if ($subItem->checkout_timestamp != '') {
        $temStr .= "                | <img src=\"".base_url()."assets/dist/img/ic_checkout_blue.png\" style=\"margin-top: -4px; height: 20px;margin-right: 6px;\"><a href=\"#\">".date("h:i:s A", strtotime($subItem->checkout_date))."</a>";
      }
      $temStr .= "                  </span>\n";
      $temStr .= "                </li>\n";
      $temStr .= "              </div>\n";
      $temStr .= "              <div class=\"row\" style=\"margin-left: 22px;margin-top: 10px;\">\n";
      $temStr .= "                <li class=\"location-office\">\n";
      $temStr .= "                  <div class=\"cntnt\">\n";
      $temStr .= "                    <p>".$subItem->checkin_comment."</p>\n";
      $temStr .= "                  </div>\n";
      $temStr .= "                </li>\n";
      $temStr .= "              </div>\n";
      if ($k < count($item)-1) {
        $temStr .= "<hr class=\"ç\" style=\"margin-top:0px !important; border-top: 1px solid #bfbfbf94 !important;\">\n";
      }
    }

    /*
          $temStr .= "              <div class=\"row\">\n";
          $temStr .= "                <li class=\"location-office\">\n";
          $temStr .= "                  <a href=\"#\">\n";
          $temStr .= "                    <img src='".base_url()."assets/dist/img/location_variant_blue.png' style=\"margin-top: -4px;height: 16px;margin-right: 6px;margin-left: 12px;\">\n";
          $temStr .= "                    <span style=\"color: #0fa89e;\">Impulse India Pvt Ltd</span>\n";
          $temStr .= "                  </a>\n";
          $temStr .= "                </li>\n";
          $temStr .= "               </div>\n";
          $temStr .= "                <div class=\"row\" style=\" margin-left: 24px;margin-top: 10px;\">\n";
          $temStr .= "                  <li class=\"location-office\">\n";
          $temStr .= "                    <span><img src=\"".base_url()."assets/dist/img/ic_checkin_blue.png\" style=\"margin-top: -4px; height: 20px;margin-right: 6px;\"><a href=\"#\">10:00 AM  | <span style=\"margin-left: 16px;\"><img src=\"<?php echo base_url(); ?>assets/dist/img/ic_checkout_blue.png\" style=\"margin-top: -4px; height: 20px;margin-right: 6px;\"></span></a><a href=\"#\">06:00 PM</a></span>\n";
          $temStr .= "                  </li>\n";
          $temStr .= "                </div>\n";
          $temStr .= "                <div class=\"row\" style=\"margin-left: 22px;margin-top: 10px;\">\n";
          $temStr .= "                  <li class=\"location-office\">\n";
          $temStr .= "                    <div class=\"cntnt\">\n";
          $temStr .= "                      <p>Hey Out bounders, Attaching the itinerary for the Outbound,</p>\n";
          $temStr .= "                    </div>\n";
          $temStr .= "                  </li>\n";
          $temStr .= "                </div>\n";
    */
      $temStr .= "          </div>\n";
      $temStr .= "        </ul>\n";
      $temStr .= "    </div>\n";
      $temStr .= "  </div>\n";
      $temStr .= " </div>\n";
      $temStr .= "</li>";

    }
    return $temStr;
  }

  //Image upload profile pic

  /**
   * This function is used to load the add new form
   */
  function addNew()
  {
      if($this->isHr() == TRUE)
      {
          $this->loadThis();
      }
      else
      {
          $data['designations']      = $this->employee_model->getDesignationList($this->companyId);
          $data['emp_grades']        = $this->employee_model->getEmployeeGrades($this->companyId);
          $data['emp_status']        = $this->employee_model->getEmployeeStatus($this->companyId);
          $data['teams']             = $this->employee_model->getEmployeeTeam($this->companyId);
          $data['emp_types']         = $this->employee_model->getEmployeeType($this->companyId);
          $data['departments']       = $this->employee_model->getDepartment($this->companyId);
          $data['timings']           = $this->employee_model->getOfficialTimings($this->companyId);
          $data['offices']           = $this->employee_model->getOffics($this->companyId);
          $data['permission']         = $this->acl_model->getAccessPermissions($this->vendorId, "HR_EMP_MNG");
          $this->global['pageTitle'] = 'WoCo : Add New User';
          $this->loadViews("employee/addNew", $this->global, $data, NULL);
      }
  }

  /**
   * This function is used to add new user to the system
   */
  function addNewEmployee()
  {
      if($this->isHr() == TRUE)
      {
          $this->loadThis();
      }
      else
      {
          if(!isset($_POST['fname']) || !isset($_POST['email']))
          {
            echo json_encode(array('status' => 0, 'message' => 'Please Fill All Required Fields' ));
            die();
          }
          else
          {

              $company_id     = $this->companyId;
              $fname          = $this->input->post('fname');
              $lname          = $this->input->post('lname');
              $gender         = $this->input->post('gender');
              $dob            = $this->input->post('dob');
              $blood_group    = $this->input->post('blood_group');
              $marital_status = $this->input->post('marital_status');
              $spouse_name    = $this->input->post('spouse_name');

              $email          = $this->input->post('email');
              $phone_code     = $this->input->post('phone_code');
              $mobile         = $this->input->post('mobile');
              $s_phone_code   = $this->input->post('s_phone_code');
              $s_contact_num  = $this->input->post('s_contact_num');
              $address_line_1 = $this->input->post('address_line_1');
              $address_line_2 = $this->input->post('address_line_2');
              $state          = $this->input->post('state');
              $city           = $this->input->post('city');
              $zip            = $this->input->post('zip');
              $country        = $this->input->post('country');

              $emp_id         = $this->input->post('emp_id');
              $department_id  = $this->input->post('department');
              $pmng_id        = $this->input->post('pmng_id');
              $smng_id        = $this->input->post('smng_id');
              $designation    = $this->input->post('designation');
              $emp_type       = $this->input->post('emp_type');
              $joining_date   = $this->input->post('joining_date');
              $annual_pkg     = $this->input->post('annual_pkg');
              $currency       = $this->input->post('currency');
              $office_timing  = $this->input->post('office_timing');
              $office_id      = $this->input->post('office');
              $emp_grade      = $this->input->post('emp_grade');
              $emp_status     = $this->input->post('emp_status');

              $team_id        = $this->employee_model->getTeamIdFromManager($this->companyId, $pmng_id);

              $email = strtolower($email);

              $imageName = "";
              if(!empty($_POST['profile_image'])) {
                $imageName = $this->upload_base64_image();
              }
              $eContactsName = $this->input->post('emergency_contact_name');
              $eContactsNum  = $this->input->post('emergency_contact');
              $eContactsRel  = $this->input->post('emergency_contact_relation');

              if (!$this->employee_model->isValidCompany($company_id)) {
                echo json_encode(array('status' => 0, 'message' => "Your company doesn't exist or deactivated." ));
                die();
              }
              if ($this->employee_model->isEmailExisting($email)) {
                echo json_encode(array('status' => 0, 'message' => "The entered email already exists." ));
                die();
              }

              if ($this->employee_model->isEmpIdExisting($emp_id)) {
                echo json_encode(array('status' => 0, 'message' => "The entered Employee Id already exists." ));
                die();
              }
              if ($this->employee_model->isMobileExisting($mobile)) {
                echo json_encode(array('status' => 0, 'message' => "The entered Mobile already exists." ));
                die();
              }

              $emgContacts = array();
              if ( $this->input->post('emergency_contact_name')) {
                for ($i=0; $i < count($eContactsName); $i++) {
                  $emgContacts[] = array('name' => $eContactsName[$i], 'contact' => $eContactsNum[$i], 'relation' => $eContactsRel[$i]);//{"name":"demo","contact":"+9172472374","relation":"son"}
                }
              }

              $password   =  generate_password(8);
              //$password   =  '123456';

              $userInfo = array(
                                  'emp_id' =>$emp_id,
                                  'password'=> getHashedPassword($password),
                                  'email' =>$email,
                                  'name'  => $fname." ".$lname,
                                  'fname' =>$fname,
                                  'lname' =>$lname,
                                  'phone_code'  =>  $phone_code,
                                  'mobile'      =>  $mobile,
                                  'gender'      =>  $gender,
                                  'blood_group' =>  $blood_group,
                                  'dob' =>  $dob,
                                  'marital_status'  =>  $marital_status,
                                  'spouse_name'     =>  $spouse_name,
                                  's_phone_code'    =>  $s_phone_code,
                                  's_contact_num'   =>  $s_contact_num,
                                  'emergency_contacts' =>  json_encode($emgContacts),
                                  'address_line_1'  =>$address_line_1,
                                  'address_line_2'  =>$address_line_2,
                                  'state' => $state,
                                  'city'  =>  $city,
                                  'zip' => $zip,
                                  'country' => $country,
                                  'department_id'=>$department_id,
                                  'team_id'=>$team_id,
                                  'designation'=>$designation,
                                  'joining_date'=>$joining_date,
                                  'annual_pkg'=>$annual_pkg,
                                  'currency'=>$currency,
                                  'office_timing'=>$office_timing,
                                  'office_id'=>$office_id,
                                  'emp_grade'=>$emp_grade,
                                  'emp_status'=>$emp_status,
                                  'emp_type'  =>$emp_type,
                                  'createdBy'=>$this->vendorId,
                                  'roleId'=>ROLE_EMPLOYEE,
                                  'company_id'=>$company_id,
                                  'status'=>0,
                                  'email_verified'=>0,
                                  'mobile_verified'=>0
                                );

                if ($imageName != "") {
                  $userInfo['profile_image'] = $imageName;
                }
                if ($pmng_id != "") {
                  if ($pmng_id == 0) {
                    $pmng_id = $this->common_model->getCompanyHrId($this->companyId);
                  }
                  $userInfo['manager_id'] = $pmng_id;
                }else {
                  $userInfo['manager_id'] = $this->common_model->getCompanyHrId($this->companyId);
                }

                if ($smng_id != "") {
                  $userInfo['s_manager_id'] = $smng_id;
                }

                $userInfo['team_id'] = $this->employee_model->getTeamIdFromManager($this->companyId, $userInfo['manager_id']);

                $result = $this->employee_model->addNewEmployee($userInfo);
                if ($result>0) {
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

                 echo json_encode(array('status' => 1, 'message' => "New Employee Successfully Created" ));
              }else {
                echo json_encode(array('status' => 0, 'message' => "Unable to create Employee" ));
              }
          }
      }
  }

  public function searchPrimaryManger($userId = "")
  {
    if($this->isHr() == TRUE)
    {
        echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
        die();
    }
    $searchText = $this->input->get('q');
    $result = $this->employee_model->searchPrimaryManger($searchText, $this->companyId, $userId);
    $totalData = array();
    $totalData[] = array('id' => 0, 'text' => 'Assign to HR');
    foreach ($result as $key => $row) {
      $data['id'] = $row->userId;
      $data['text'] = $row->name."(".$row->email.")";
      array_push($totalData, $data);
    }
    echo json_encode($totalData);
  }

  public function searchSecondryManger($pmId = "", $userId = "")
  {
    // echo "Pid : $pmId userId : $userId";
    // die();
    if($this->isHr() == TRUE)
    {
        echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
        die();
    }
    $searchText = $this->input->get('q');
    $result = $this->employee_model->searchSecondryManger($searchText, $this->companyId, $pmId, $userId);
    $totalData = array();
    $totalData[] = array('id' => 0, 'text' => 'Select NaN');
    foreach ($result as $key => $row) {
      $data['id'] = $row->userId;
      $data['text'] = $row->name."(".$row->email.")";
      array_push($totalData, $data);
    }
    echo json_encode($totalData);
  }

  /**
   * This function is used to add image information
   */
   public function upload_image($filename='')
   {
     $config['upload_path']          = './uploads/user/';
     $config['allowed_types']        = 'gif|jpg|png|jpeg';
     $config['max_size']             = 5150;
     $config['max_width']            = 2024;
     $config['max_height']           = 2024;


     $temp = explode(".", $_FILES[$filename]["name"]);
     $newfilename = round(microtime(true)) . '.' . end($temp);

     $config['file_name']    = $newfilename;

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
   * This function is used to add image information
   */
   public function upload_base64_image()
   {
       $newfilename = round(microtime(true)) . '.png';
       $image_parts = explode(";base64,", $_POST['profile_image']);
      $image_type_aux = explode("image/", $image_parts[0]);
      $image_type = $image_type_aux[1];
      $image_base64 = base64_decode($image_parts[1]);
      file_put_contents('uploads/user/' . $newfilename, $image_base64);
       return $newfilename;
   }

  /**
   * This function is used to edit the user information
   */
  function edit($id = "")
  {
      if($this->isHr() == TRUE)
      {
        echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
        die();
      }
      else
      {
          if(!isset($_POST['fname']))
          {
              if (!$this->employee_model->isValidUserId($id, $this->companyId)) {
                echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                die();
              }
              $data = $this->employee_model->getEmployeeInfo($id);
              $data['manager_details'] = $this->employee_model->getManagerDetails($data[0]->manager_id);
              $data['s_manager_details'] = $this->employee_model->getManagerDetails($data[0]->s_manager_id);
              if (count($data)>0) { echo(json_encode(array('status'=>1,'message'=>'Success', 'data' => $data))); }
              else { echo(json_encode(array('status'=>0, 'message' => 'Employee detail not found'))); }
          }
          else
          {
            $company_id     = $this->companyId;
            $fname          = $this->input->post('fname');
            $lname          = $this->input->post('lname');
            $gender         = $this->input->post('gender');
            $dob            = $this->input->post('dob');
            $blood_group    = $this->input->post('blood_group');
            $marital_status = $this->input->post('marital_status');
            $spouse_name    = $this->input->post('spouse_name');

            $email          = $this->input->post('email');
            $phone_code     = $this->input->post('phone_code');
            $mobile         = $this->input->post('mobile');
            $s_phone_code   = $this->input->post('s_phone_code');
            $s_contact_num  = $this->input->post('s_contact_num');
            $address_line_1 = $this->input->post('address_line_1');
            $address_line_2 = $this->input->post('address_line_2');
            $state          = $this->input->post('state');
            $city           = $this->input->post('city');
            $zip            = $this->input->post('zip');
            $country        = $this->input->post('country');

            $emp_id         = $this->input->post('emp_id');
            $department_id  = $this->input->post('department');
            //$team_id        = $this->input->post('team_id');
            $pmng_id        = $this->input->post('pmng_id');
            $smng_id        = $this->input->post('smng_id');
            $designation    = $this->input->post('designation');
            $emp_type       = $this->input->post('emp_type');
            $joining_date   = $this->input->post('joining_date');
            $annual_pkg     = $this->input->post('annual_pkg');
            $currency       = $this->input->post('currency');
            $office_timing  = $this->input->post('office_timing');
            $office_id      = $this->input->post('office');
            $emp_grade      = $this->input->post('emp_grade');
            $emp_status     = $this->input->post('emp_status');

            $team_id        = $this->employee_model->getTeamIdFromManager($this->companyId, $pmng_id);

            $imageName = "";
            if(!empty($_POST['profile_image'])) {
              $imageName = $this->upload_base64_image();
            }


            $eContactsName = $this->input->post('emergency_contact_name');
            $eContactsNum  = $this->input->post('emergency_contact');
            $eContactsRel  = $this->input->post('emergency_contact_relation');
          //  $password   = generate_password(8);



          $emgContacts = array();
          if ( $this->input->post('emergency_contact_name')) {
            for ($i=0; $i < count($eContactsName); $i++) {
              $emgContacts[] = array('name' => $eContactsName[$i], 'contact' => $eContactsNum[$i], 'relation' => $eContactsRel[$i]);//{"name":"demo","contact":"+9172472374","relation":"son"}
            }
          }

              $employeeInfo = array(
                 'emp_id' =>$emp_id,
                // 'password'=> getHashedPassword($password),
                'email'           =>strtolower($email),
                'name'            => $fname." ".$lname,
                'fname'           =>$fname,
                'lname'           =>$lname,
                'phone_code'      =>  $phone_code,
                'mobile'          =>  $mobile,
                'gender'          =>  $gender,
                'blood_group'     =>  $blood_group,
                'dob'             =>  $dob,
                'marital_status'  =>  $marital_status,
                'spouse_name'     =>  $spouse_name,
                's_phone_code'    =>  $s_phone_code,
                's_contact_num'   =>  $s_contact_num,
                'emergency_contacts'   =>  json_encode($emgContacts),
                'address_line_1'  =>$address_line_1,
                'address_line_2'  =>$address_line_2,
                'state' => $state,
                'city'  =>  $city,
                'zip' => $zip,
                'country' => $country,
                'department_id'=>$department_id,
                'team_id'=>$team_id,
                'designation'=>$designation,
                'joining_date'=>$joining_date,
                'annual_pkg'=>$annual_pkg,
                'currency'=>$currency,
                'office_timing'=>$office_timing,
                'office_id'=>$office_id,
                'emp_grade'=>$emp_grade,
                'emp_status'=>$emp_status,
                'emp_type'  =>$emp_type,
                'updatedBy'=>$this->vendorId,
                'company_id'=>$company_id
              ) ;

              if ($imageName != "") {
                $employeeInfo['profile_image'] = $imageName;
              }
              if ($pmng_id != "") {
                if (!$this->employee_model->isValidManagerId($id, $pmng_id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Somthing Wrong, Please reload page.' ));
                  die();
                }
                if ($pmng_id == 0) {
                  $pmng_id = $this->common_model->getCompanyHrId($this->companyId);
                }
                $employeeInfo['manager_id'] = $pmng_id;
              }else {
                $employeeInfo['manager_id'] = $this->common_model->getCompanyHrId($this->companyId);
              }
              if ($smng_id != "") {
                if (!$this->employee_model->isValidSManagerId($id, $smng_id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Somthing Wrong, Please reload page.' ));
                  die();
                }
                $employeeInfo['s_manager_id'] = $smng_id;
              }else {
                $employeeInfo['s_manager_id'] = 0;
              }

              if (!$this->employee_model->isValidUserId($id, $this->companyId)) {
                echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                die();
              }

              $employeeInfo['team_id'] = $this->employee_model->getTeamIdFromManager($this->companyId, $employeeInfo['manager_id']);

              $result = $this->employee_model->edit($employeeInfo, $id);
              if ($result) {
                 echo json_encode(array('status' => 1, 'message' => "Employee Successfully updated" ));
              }else {
                echo json_encode(array('status' => 0, 'message' => "Unable to update Employee." ));
              }
          }
      }
  }


  function editHierarchy($id = "")
  {
      if($this->isHr() == TRUE)
      {
        echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
        die();
      }
      else
      {
          if(!isset($_POST['user_id']))
          {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
          else
          {
            $company_id     = $this->companyId;
            $user_id        = $this->input->post('user_id');
            $pmng_id        = $this->input->post('pmng_id');
            $smng_id        = $this->input->post('smng_id');

              $employeeInfo = array(
                'updatedBy'=>$this->vendorId
              ) ;
              if ($pmng_id != "") {
                if (!$this->employee_model->isValidManagerId($id, $pmng_id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Somthing Wrong, Please reload page.' ));
                  die();
                }
                if ($pmng_id == 0) {
                  $pmng_id = $this->common_model->getCompanyHrId($this->companyId);
                }
                $employeeInfo['manager_id'] = $pmng_id;
              }else {
                $employeeInfo['manager_id'] = $this->common_model->getCompanyHrId($this->companyId);
              }
              if ($smng_id != "") {
                if (!$this->employee_model->isValidSManagerId($id, $smng_id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Somthing Wrong, Please reload page.' ));
                  die();
                }
                $employeeInfo['s_manager_id'] = $smng_id;
              }else {
                $employeeInfo['s_manager_id'] = 0;
              }

              if (!$this->employee_model->isValidUserId($id, $this->companyId)) {
                echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                die();
              }

              $result = $this->employee_model->edit($employeeInfo, $id);
              if ($result) {
                 echo json_encode(array('status' => 1, 'message' => "Manager Successfully updated" ));
              }else {
                echo json_encode(array('status' => 0, 'message' => "Unable to update Employee." ));
              }
          }
      }
  }

  /**
   * This function is used to delete the user using userId
   * @return boolean $result : TRUE / FALSE
   */
  function deleteEmployee($userId="")
  {
      if($this->isHr() == TRUE)
      {
        echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
        die();
      }
      else
      {
        if (!$this->employee_model->isValidUserId($userId, $this->companyId)) {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
          $result = $this->employee_model->deleteEmployee($userId);
          if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Employee deleted successfully'))); }
          else { echo(json_encode(array('status'=>FALSE, 'message' => 'Employee is not deleted'))); }
      }
  }

  /**
   * This function is used to blocked the company using id
   * @return boolean $result : TRUE / FALSE
   */
  function blockEmployee($id="")
  {
      if($this->isHr() == TRUE)
      {
        echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
        die();
      }
      else
      {
        if (!$this->employee_model->isValidUserId($id, $this->companyId)) {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
          $employeeInfo = array('status'=>2);
          $result = $this->employee_model->blockEmployee($id, $employeeInfo);
          if ($result>0) {
            $userData = $this->employee_model->getUserInfo($id);
            $title = "Woco: Account Blocked";
            $message = "Hi $userData->fname, Your woco account has been blocked by your ".$this->global['role_text'].".\nPlease contact your ".$this->global['role_text']." for further info.";
            $this->sendNotification($id, $userData->fb_token, $title, $message);
            echo(json_encode(array('status'=>TRUE,'message'=>'Employee is Blocked ')));
          }else {
            echo(json_encode(array('status'=>FALSE, 'message' => 'Employee is not Blocked')));
          }
      }
  }

  /**
   * This function is used to Active the company using id
   * @return boolean $result : TRUE / FALSE
   */
  function unblockEmployee($userId="")
  {
      if($this->isHr() == TRUE)
      {
        echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
        die();
      }
      else
      {
        if (!$this->employee_model->isValidUserId($userId, $this->companyId)) {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
          $employeeInfo = array('status'=>1);
          $result = $this->employee_model->unblockEmployee($userId, $employeeInfo);
          if ($result>0) {
            $userData = $this->employee_model->getUserInfo($userId);
            $title = "Woco: Account Active";
            $message = "Hi $userData->fname,  Your woco account has been unblocked by your ".$this->global['role_text'].".\nNow you are able to use woco app.";
            $this->sendNotification($userId, $userData->fb_token, $title, $message);
            echo(json_encode(array('status'=>TRUE,'message'=>'Employee is Active ')));
          }else {
            echo(json_encode(array('status'=>FALSE, 'message' => 'Employee is not Blocked')));
          }
      }
  }

  /**
   * This function is used to edit the user information
   */
  function profile($id = "")
  {
      if($this->isHr() == TRUE)
      {
          $this->loadThis();
      }
      else
      {
        if (!$this->employee_model->isValidUserId($id, $this->companyId)) {
            $this->loadThis();
        }else {
          $result = $this->employee_model->getEmployeeInfo($id);
          if (count($result)>0) {
            $data['userInfo'] = $result[0];
            $data['designations']      = $this->employee_model->getDesignationList($this->companyId);
            $data['emp_grades']        = $this->employee_model->getEmployeeGrades($this->companyId);
            $data['emp_status']        = $this->employee_model->getEmployeeStatus($this->companyId);
            $data['teams']             = $this->employee_model->getEmployeeTeam($this->companyId);
            $data['emp_types']         = $this->employee_model->getEmployeeType($this->companyId);
            $data['departments']       = $this->employee_model->getDepartment($this->companyId);
            $data['timings']           = $this->employee_model->getOfficialTimings($this->companyId);
            $data['offices']           = $this->employee_model->getOffics($this->companyId);
            $data['checkin_comment']   = $this->employee_model->checkin_comment($this->companyId);
            $data['permission']         = $this->acl_model->getAccessPermissions($this->vendorId, "HR_EMP_MNG");
            $this->global['pageTitle'] = 'WoCo :User Profile';
            $this->loadViews("employee/empprofile", $this->global, $data, NULL);
          }else {
            redirect('hr/employee');
          }
        }

      }
  }

  public function sendNotification($userId, $sDeviceToken, $title, $message, $data = array())
  {
  	$aPayload = array(
  		'data' => $data,
  		'notification' => array(
  			'title' => $title,
  			'body'  => $message,
  			'sound' => 'default'
  		)
  	);
    $this->common_model->sendNotification($sDeviceToken, $aPayload);
  	//var_dump($aResult);
  }

}
