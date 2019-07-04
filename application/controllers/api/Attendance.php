<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/ApiController.php';

class Attendance extends ApiController{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('api/user_model', 'api/attendance_model'));
  }

  function index()
  {
      $this->response();
  }

  public function checkInUser()
	{
    $this->validateAuthentication('POST', TRUE, TRUE);
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
      'company_id'        => $company_id
    );

    $response = $this->attendance_model->insertAttendance($dataArr);
    $this->response($response);
	}


    public function checkInUserOffSite()
  	{
      $this->validateAuthentication('POST', TRUE, TRUE);

      $imageName = "";
      if(!empty($_FILES['upload_img']['name'])) {
        $imageName = $this->upload_image('upload_img');
      }else {
        $this->response(array('status' => 401,'message' => "Please select location image"));
      }
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

      $location_data = json_decode($params['location_data'], TRUE);

      $tempData = array(
        'title' => "Unknown Location",
        'description' => $comment,
        'company_id' => $company_id,
        'created_by' => $user_id,
        'lat' => $location_data['lat'],
        'lng' => $location_data['lng'],
        'min_radius' => '50',
        'location_img' => $imageName,
        'status' => 0,
      );

      if (isset($location_data['address_line_1'])) {
        $tempData['address_line_1'] = $location_data['address_line_1'];
      }
      if (isset($location_data['address_line_2'])) {
        $tempData['address_line_2'] = $location_data['address_line_2'];
      }
      if (isset($location_data['city'])) {
        $tempData['city'] = $location_data['city'];
      }
      if (isset($location_data['state'])) {
        $tempData['state'] = $location_data['state'];
      }
      if (isset($location_data['country'])) {
        $tempData['country'] = $location_data['country'];
      }
      if (isset($location_data['zip'])) {
        $tempData['zip'] = $location_data['zip'];
      }

      $locationData = $this->attendance_model->addNewLocation($tempData);
      if ($locationData == NULL) {
        $this->response(array('status' => 401,'message' => "Unable to add your location"));
      }

      $dataArr = array(
        'user_id'           => $user_id,
        'checkin_timestamp' => $timestamp,
        'checkin_lat'       => $checkin_lat,
        'checkin_lng'       => $checkin_lng,
        'checkin_type'      => $checkin_type,
        'checkin_comment'   => $comment,
        'checkin_date'      => $in_date,
        'location'          => $locationData['id'],
        'site_type'         => $site_type,
        'company_id'        => $company_id,
        'status'            => 0
      );

      $response = $this->attendance_model->insertAttendance($dataArr);
      if ($response['status'] == 200) {
        $mData['attendance'] = $response['data'];
        $mData['location'] = $locationData;
        $response['data'] = $mData;
        $this->addCheckInRequest($mData);
      }
      $this->response($response);
  	}


    public function addCheckInRequest($mData)
    {
      $tempData = array(
        'rq_type' => 2,
        'rq_datetime' => date("Y-m-d H:i:s"),
        'rq_status' => 1,
        'rq_action_id' => $mData['attendance']['id'],
        'rq_created_by' => $mData['attendance']['user_id'],
        'rq_company_id' => $mData['attendance']['company_id'],
      );
      $this->attendance_model->insertRequest($tempData);
      $tempData['rq_type'] = 3;
      $tempData['rq_action_id'] = $mData['location']['id'];
      $this->attendance_model->insertRequest($tempData);
    }


	public function checkOutUser()
	{
    $this->validateAuthentication('POST', TRUE, TRUE);
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
      'location'          => $location,
      'site_type'         => $site_type,
      'company_id'        => $company_id,
      'updated_by'        => $user_id,
      'duration'        => $diffrence
    );

    $attendance = $this->attendance_model->checkAttendance($timestamp, $user_id, $company_id);
    if ($attendance != NULL) {
      $response = $this->attendance_model->updateAttendance($dataArr, $attendance->id);
      $this->response($response);
    }else {
      $response = $this->attendance_model->insertAttendance($dataArr);
      $this->response($response);
    }

	}

  public function updateAttendance()
  {
    $json_data = $this->input->post('json_data');
    $params = json_decode($json_data, true);

      //sendCustomEmail("aashutosh.kumar@woco.co.in","Attendance Data",$json_data);

    foreach ($params as $key => $item) {

      $in_date  = date("Y-m-d H:i:s", ($item['checkin_timestamp']/1000));

      $dataArr = array(
        'user_id'            => $item['user_id'],
        'checkin_timestamp'  => $item['checkin_timestamp'],
        'checkin_lat'        => $item['checkin_lat'],
        'checkin_lng'        => $item['checkin_lng'],
        'checkin_type'       => $item['checkin_type'],
        'checkin_comment'    => $item['checkin_comment'],
        'checkin_date'       => $in_date,
        'location'           => $item['location'],
        'site_type'          => $item['site_type'],
        'company_id'         => $item['company_id'],
        'updated_by'         => $item['user_id'],
      );

      if (array_key_exists("checkout_timestamp",$item)) {
        $out_date = date("Y-m-d H:i:s", ($item['checkout_timestamp']/1000));
        $diffrence = (int)(($item['checkout_timestamp'] - $item['checkin_timestamp'])/1000);
        $dataArr['checkout_timestamp'] = $item['checkout_timestamp'];
        $dataArr['checkout_lat']       = $item['checkout_lat'];
        $dataArr['checkout_lng']       = $item['checkout_lng'];
        $dataArr['checkout_type']      = $item['checkout_type'];
        $dataArr['checkout_comment']   = $item['checkout_comment'];
        $dataArr['checkout_date']      = $out_date;
        $dataArr['duration']           = $diffrence;
      }

      $attendance = $this->attendance_model->checkAttendance($item['checkin_timestamp'], $item['user_id'], $item['company_id']);
      if ($attendance != NULL) {
        $response = $this->attendance_model->updateAttendance($dataArr, $attendance->id);
      }else {
        $response = $this->attendance_model->insertAttendance($dataArr);
      }
    }

    $result = $this->user_model->auth();
    if ($result['status'] == 405) {
      $this->response($result);
    }else {
      $this->response(array('status' => 200,'message' => 'Attendance updated Successfully.','data' => $params));
    }
  }

  public function getHomeNewData()
  {
      $this->validateAuthentication('POST', TRUE, TRUE);
      $card_data = $this->attendance_model->getWeekHourSum();
      $dataArr = array();
      foreach ($card_data as $key => $card) {
        $card->check_out = $this->attendance_model->getLastCheckOut($card->checkin_date);
        $dataArr[] = $card;
      }
      $lastLocations = $this->attendance_model->getLastCheckinLocations();
      $locArr = array();
      foreach ($lastLocations as $key => $loc) {
        $loc->attendance_list = $this->attendance_model->getTodaysTotalAttandance();
        $locArr[] = $loc;
      }

      $data["card_data"] = $dataArr;
      $data["attendance_data"] = $locArr;
      $this->response(array('status' => 200,'message' => 'Success', 'data' => $data));
  }

  public function getTrailData()
  {
      $this->validateAuthentication('POST', TRUE, TRUE);
      $lastLocations = $this->attendance_model->getLastCheckinLocations();
      $locArr = array();
      foreach ($lastLocations as $key => $loc) {
        $loc->attendance_list = $this->attendance_model->getTodaysTotalAttandance();
        $locArr[] = $loc;
      }
      $data["attendance_data"] = $locArr;
      $this->response(array('status' => 200,'message' => 'Success', 'data' => $data));
  }

   public function upload_image($filename='')
   {
      $fileTmpPath = $_FILES[$filename]['tmp_name'];
      $fileName = $_FILES[$filename]['name'];
      $fileSize = $_FILES[$filename]['size'];
      $fileType = $_FILES[$filename]['type'];

      $pathUrl = './uploads/location/';
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

}
