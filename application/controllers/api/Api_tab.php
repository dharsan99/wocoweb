<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/ApiController.php';

class Api_tab extends ApiController{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('api/tab_model'));
  }

  function index()
  {
    $this->validateDeviceConfig('POST', TRUE, FALSE);
    $response = $this->tab_model->authenticateDevice();
    $this->response($response);
  }

  public function login()
	{
    $this->validateDeviceConfig('POST', TRUE, FALSE);
    $params = $this->input->post();
    $username = $params['username'];
    $password = $params['password'];
    $type     = $params['type'];
    $fbToken  = $params['fb_token'];
    $deviceId = $params['device_id'];
    $response = $this->tab_model->login($username,$password,$type,$fbToken, $deviceId);
    $this->response($response);
	}

  public function searchEmployee()
	{
    $this->validateDeviceConfig('POST', TRUE, FALSE);
    $params = $this->input->post();
    $search = $params['search_text'];
    $company_id = $params['company_id'];
    $location_id = $params['location_id'];
    $response = $this->tab_model->searchEmployee($search, $company_id, $location_id);
    $this->response($response);
	}

  public function getCheckInData()
	{
    $this->validateDeviceConfig('POST', TRUE, FALSE);
    $params = $this->input->post();
    $user_id     = $params['user_id'];
    $company_id  = $params['company_id'];
    $location_id = $params['location_id'];
    $response    = $this->tab_model->getCheckInData($user_id, $company_id, $location_id);
    $this->response($response);
	}

  public function getCheckIn()
	{
    $this->validateDeviceConfig('POST', TRUE, FALSE);

    $params = $this->input->post();
    $user_id      = $params['user_id'];
    $timestamp    = $params['checkin_timestamp'];
    $checkin_lat  = $params['checkin_lat'];
    $checkin_lng  = $params['checkin_lng'];
    $checkin_type = $params['checkin_type'];
    $comment      = $params['checkin_comment'];
    $location     = $params['location'];
    $site_type    = $params['site_type'];
    $company_id   = $params['company_id'];
    $in_date  = date("Y-m-d H:i:s", ($timestamp/1000));

    $imageName = "";
    if(!empty($_FILES['upload_img']['name'])) {
      $imageName = $this->upload_image('upload_img', 'checkin', $user_id);
    }else {
      $this->response(array('status' => 401,'message' => "Please select location image"));
    }

    $dataArr = array(
      'user_id' => $user_id,
      'checkin_timestamp' => $timestamp,
      'checkin_lat'       => $checkin_lat,
      'checkin_lng'       => $checkin_lng,
      'checkin_type'      => $checkin_type,
      'checkin_comment'   => $comment,
      'checkin_date'      => $in_date,
      'location'          => $location,
      'site_type'         => $site_type,
      'checkin_img'      => $imageName,
      'company_id'        => $company_id
    );

    $response = $this->tab_model->insertAttendance($dataArr);
    $this->response($response);
	}

  public function getCheckOut()
	{
    $this->validateDeviceConfig('POST', TRUE, FALSE);

    $params = $this->input->post();
    $user_id      = $params['user_id'];
    $timestamp    = $params['checkin_timestamp'];
    $checkin_lat  = $params['checkin_lat'];
    $checkin_lng  = $params['checkin_lng'];
    $checkin_type = $params['checkin_type'];
    $comment      = $params['checkin_comment'];

    $out_timestamp    = $params['checkout_timestamp'];
    $checkout_lat  = $params['checkout_lat'];
    $checkout_lng  = $params['checkout_lng'];
    $checkout_type = $params['checkout_type'];
    $out_comment      = $params['checkout_comment'];

    $location     = $params['location'];
    $site_type    = $params['site_type'];
    $company_id   = $params['company_id'];

    $imageName = "";
    if(!empty($_FILES['upload_img']['name'])) {
      $imageName = $this->upload_image('upload_img', 'checkout', $user_id);
    }else {
      $this->response(array('status' => 401,'message' => "Please select location image"));
    }

    $in_date  = date("Y-m-d H:i:s", ($timestamp/1000));
    $out_date = date("Y-m-d H:i:s", ($out_timestamp/1000));

    $diffrence = (int)(($out_timestamp - $timestamp)/1000);

    $dataArr = array(
      'user_id' => $user_id,
      'checkin_timestamp' => $timestamp,
      'checkin_lat'       => $checkin_lat,
      'checkin_lng'       => $checkin_lng,
      'checkin_type'      => $checkin_type,
      'checkin_comment'   => $comment,
      'checkin_date'      => $in_date,
      'checkout_timestamp' => $out_timestamp,
      'checkout_lat'       => $checkout_lat,
      'checkout_lng'       => $checkout_lng,
      'checkout_type'      => $checkout_type,
      'checkout_comment'   => $out_comment,
      'checkout_date'      => $out_date,
      'checkout_img'      => $imageName,
      'location'          => $location,
      'site_type'         => $site_type,
      'company_id'        => $company_id,
      'updated_by'        => $user_id,
      'duration'        => $diffrence
    );

    $attendance = $this->tab_model->checkAttendance($timestamp, $user_id, $company_id);
    if ($attendance != NULL) {
      $response = $this->tab_model->updateAttendance($dataArr, $attendance->id);
      $this->response($response);
    }else {
      $response = $this->tab_model->insertAttendance($dataArr);
      $this->response($response);
    }
	}

  public function validateUser()
	{
    $this->validateDeviceConfig('POST', TRUE, FALSE);
    $params = $this->input->post();
    $username = $params['username'];
    $type     = $params['type'];

    $response = $this->tab_model->validateUser($username,$type);
    $this->response($response);
	}

  public function changePassword()
	{
    $this->validateDeviceConfig('POST', TRUE, FALSE);
    $params = $this->input->post();
    $user_id      = $params['user_id'];
    $password     = $params['password'];
    if (isset($params['new_password'])) {
      $newPassword  = $params['new_password'];
      $response = $this->tab_model->changePassword($user_id,$password, $newPassword);
      $this->response($response);
    }else {
      $response = $this->tab_model->resetNewPassword($user_id,$password);
      $this->response($response);
    }
	}



    public function getProfileData()
  	{
      $this->validateDeviceConfig('POST', TRUE, TRUE);
      $response = $this->tab_model->getProfileData();
      $this->response($response);
  	}


  public function updateProfile()
	{
    $this->validateDeviceConfig('POST', TRUE, TRUE);
    $params = $this->input->post();
    $user_id        = $params['user_id'];
    $company_id     = $params['company_id'];
    $gender         = $this->input->post('gender');
    $dob            = $this->input->post('dob');
    $blood_group    = $this->input->post('blood_group');
    $marital_status = $this->input->post('marital_status');
    $spouse_name    = $this->input->post('spouse_name');
    $s_contact_num  = $this->input->post('s_contact_num');
    $address_line_1 = $this->input->post('address_line_1');
    $address_line_2 = $this->input->post('address_line_2');
    $state          = $this->input->post('state');
    $city           = $this->input->post('city');
    $zip            = $this->input->post('zip');
    $country        = $this->input->post('country');
    $previous_img   = $this->input->post('previous_img');

    $imageName = "";
    if(!empty($_FILES['profile_image']['name'])) {
      $imageName = $this->upload_image('profile_image');
    }

    $eContactsName = $this->input->post('emergency_contact_name');
    $eContactsNum  = $this->input->post('emergency_contact');
    $eContactsRel  = $this->input->post('emergency_contact_relation');

    $emgContacts = array();
    if ( $this->input->post('emergency_contact_name')) {
      for ($i=0; $i < count($eContactsName); $i++) {
        $emgContacts[] = array('name' => $eContactsName[$i], 'contact' => $eContactsNum[$i], 'relation' => $eContactsRel[$i]);//{"name":"demo","contact":"+9172472374","relation":"son"}
      }
    }


    $userInfo = array(
                        'gender'      =>  $gender,
                        'blood_group' =>  $blood_group,
                        'dob' =>  $dob,
                        'marital_status'  =>  $marital_status,
                        'spouse_name'     =>  $spouse_name,
                        's_contact_num'   =>  $s_contact_num,
                        'address_line_1'  =>$address_line_1,
                        'address_line_2'  =>$address_line_2,
                        'state' => $state,
                        'city'  =>  $city,
                        'zip' => $zip,
                        'country' => $country,
                      );
      $userInfo['emergency_contacts'] = json_encode($emgContacts);
      $fileUrl = "";
      if ($imageName != "") {
        $userInfo['profile_image'] = $imageName;
        $fileUrl = base_url()."uploads/user/".$previous_img;
        if ($previous_img != "" && file_exists($fileUrl))
          {
              unlink($fileUrl);
          }
      }
      $result = $this->tab_model->updateProfile($userInfo, $user_id, $company_id);
      $this->response($result);
	}


	public function logout()
	{
      $this->validateDeviceConfig('POST', TRUE, FALSE);
      $response = $this->tab_model->logout();
      $this->response($response);
	}

  /**
   * This function is used to add image information
   */
   public function upload_image($filename='', $path = '', $user_id = "")
   {
      $fileTmpPath = $_FILES[$filename]['tmp_name'];
      $fileName = $_FILES[$filename]['name'];
      $fileSize = $_FILES[$filename]['size'];
      $fileType = $_FILES[$filename]['type'];

      $current_date = date('d-m-Y');
      $pathUrl = "./uploads/attendance/$path/";
      $fileExt = explode(".", $_FILES[$filename]["name"]);
      $newfilename = $user_id."_".$current_date."_".round(microtime(true)) . '.' . end($fileExt);

      $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
      if (!in_array(end($fileExt), $allowedfileExtensions)) {
        $this->response(array('status' => 401,'message' => "Image Upload Error : Selected file type not allowed"));
      }

      $dest_path = $pathUrl . $newfilename;
      if(move_uploaded_file($fileTmpPath, $dest_path))
      {
        return $newfilename;
      }
      else
      {
        $this->response(array('status' => 401,'message' => 'There was some error moving the file to upload directory.'));
      }
   }


   public function cornjob()
   {
     $allRows = $this->common_model->getAllUsersToken();
     $fbTokens  = array();
     foreach ($allRows as $key => $value) {
       $fbTokens[] = $value->fb_token;
     }
     $data = array('action' => 'NO_ACTION');
     $aPayload = array(
      'data' => $data,
   		'notification' => array(
   			'title' => "Woco - Cron",
   			'body'  => "Ignore this notification, Only for testing",
   			'sound' => 'default'
   		)
    );
     $this->common_model->sendNotifications($fbTokens,$aPayload);
   }

}
