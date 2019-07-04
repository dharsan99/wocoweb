<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/ApiController.php';

class Authentication extends ApiController{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('api/user_model'));
  }

  function index()
  {
      $this->response();
  }

  public function login()
	{
    $this->validateAuthentication('POST', TRUE, FALSE);
    $params = $this->input->post();
    $username = $params['username'];
    $password = $params['password'];
    $type     = $params['type'];
    $fbToken  = $params['fb_token'];
    $deviceId = $params['device_id'];
    $response = $this->user_model->login($username,$password,$type,$fbToken, $deviceId);
    $this->response($response);
	}

  public function getLocationData()
	{
    $this->validateAuthentication('POST', TRUE, TRUE);
    $params = $this->input->post();
    $user_id = $params['user_id'];
    $company_id = $params['company_id'];
    $response = $this->user_model->getLocationData($company_id);
    $this->response($response);
	}

  public function validateUser()
	{
    $this->validateAuthentication('POST', TRUE, FALSE);
    $params = $this->input->post();
    $username = $params['username'];
    $type     = $params['type'];

    $response = $this->user_model->validateUser($username,$type);
    $this->response($response);
	}

  public function changePassword()
	{
    $this->validateAuthentication('POST', TRUE, FALSE);
    $params = $this->input->post();
    $user_id      = $params['user_id'];
    $password     = $params['password'];
    if (isset($params['new_password'])) {
      $newPassword  = $params['new_password'];
      $response = $this->user_model->changePassword($user_id,$password, $newPassword);
      $this->response($response);
    }else {
      $response = $this->user_model->resetNewPassword($user_id,$password);
      $this->response($response);
    }
	}

  public function saveFeedBack()
	{
    $this->validateAuthentication('POST', TRUE, TRUE);
    $params = $this->input->post();
    $user_id      = $params['user_id'];
    $company_id   = $params['company_id'];
    $note         = $params['note'];

    $dataInfo = array('user_id' => $user_id, 'company_id' => $company_id, 'note' => $note);
    $response = $this->user_model->saveFeedBack($dataInfo);
    $this->response($response);
	}

  public function saveRateDay()
	{
    $this->validateAuthentication('POST', TRUE, TRUE);
    $params = $this->input->post();
    $user_id      = $params['user_id'];
    $company_id   = $params['company_id'];
    $note         = $params['note'];
    $rate         = $params['rate'];
    $date         = date("Y-m-d");

    $dataInfo = array('user_id' => $user_id, 'company_id' => $company_id, 'note' => $note, 'rate' => $rate, 'rating_date' => $date);
    if (!$this->user_model->checkRatedDay($user_id, $company_id, $date)) {
      $response = $this->user_model->saveRateDay($dataInfo);
      $this->response($response);
    }else {
      $response = array('status' => 401,'message' => "You have already submited today's rating.");
      $this->response($response);
    }

	}



    public function getProfileData()
  	{
      $this->validateAuthentication('POST', TRUE, TRUE);
      $response = $this->user_model->getProfileData();
      $this->response($response);
  	}


  public function updateProfile()
	{
    $this->validateAuthentication('POST', TRUE, TRUE);
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
      $result = $this->user_model->updateProfile($userInfo, $user_id, $company_id);
      $this->response($result);
	}


	public function logout()
	{
      $this->validateAuthentication('POST', TRUE, FALSE);
      $response = $this->user_model->logout();
      $this->response($response);
	}

  /**
   * This function is used to add image information
   */
   public function upload_image($filename='')
   {
      $fileTmpPath = $_FILES[$filename]['tmp_name'];
      $fileName = $_FILES[$filename]['name'];
      $fileSize = $_FILES[$filename]['size'];
      $fileType = $_FILES[$filename]['type'];

      $pathUrl = './uploads/user/';
      $fileExt = explode(".", $_FILES[$filename]["name"]);
      $newfilename = round(microtime(true)) . '.' . end($fileExt);

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
     $data = array('action' => 'NO_ACTION');
     $aPayload = array(
      'data' => $data
    );
    //  $aPayload = array(
    //   'data' => $data,
   	// 	'notification' => array(
   	// 		'title' => "Woco - Cron",
   	// 		'body'  => "Ignore this notification, Only for testing",
   	// 		'sound' => 'default'
   	// 	)
    // );
     $this->common_model->sendNotificationsAll('allDevices', $aPayload);
   }

}
