<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/HrController.php';

class Attendance extends HrController{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('hr/attendance_model'));
    $this->isLoggedIn();

  }


  public function index()
  {
      if ($this->isHr() == TRUE) {
        redirect('accessDenied');
      }
      $data['test'] = 'test';
      $this->global['pageTitle'] = 'WoCo : Attendance Listing';
      $this->loadViews("attendance/listData", $this->global, $data, NULL);
  }

  public function getAttendanceList()
  {
    $json_data = $this->attendance_model->getAttendanceList($this->companyId);
    echo json_encode($json_data);
  }







}
