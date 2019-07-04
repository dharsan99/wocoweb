<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model {

    public function insertAttendance($dataArr){
        $this->db->insert('tbl_attendance', $dataArr);
        $result = $this->db->insert_id();
        if($result > 0){
            $dataArr["id"] = $result;
            return array('status' => 200,'message' => 'Attendance marked Successfully.','data' => $dataArr);
        } else {
            return array('status' => 401,'message' => 'Unable to mark your Attendance.');
        }
    }

    public function addNewLocation($dataArr){
        $this->db->insert('tbl_locations', $dataArr);
        $result = $this->db->insert_id();
        if($result > 0){
            $dataArr["id"] = $result;
            return $dataArr;
        } else {
            return NULL;
        }
    }

    public function insertRequest($tempData){
        $this->db->insert('tbl_requests', $tempData);
        $result = $this->db->insert_id();
        if($result > 0){
            $dataArr["id"] = $result;
            return $dataArr;
        } else {
            return NULL;
        }
    }


    public function updateAttendance($dataArr, $id){
        $this->db->where('id', $id);
        $result = $this->db->update('tbl_attendance', $dataArr);
        if($result){
            $dataArr["id"] = $id;
            return array('status' => 200,'message' => 'Attendance updated Successfully.','data' => $dataArr);
        } else {
            return array('status' => 401,'message' => 'Unable to updated your Attendance.');
        }
    }


    public function checkAttendance($timestamp, $user_id, $company_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_attendance');
        $this->db->where('checkin_timestamp', $timestamp);
        $this->db->where('user_id', $user_id);
        $this->db->where('company_id', $company_id);
        $query = $this->db->get();
        $data = $query->row();
        if(!empty($data)){
            return $data;
        } else {
            return NULL;
        }
    }

    public function getWeekHourSum()
    {
      $user_id  = $this->input->get_request_header('User-ID', TRUE);
      $sql = "SELECT CAST(checkin_date AS DATE) as checkin_date, SUM(duration) as work_hour FROM tbl_attendance WHERE WEEKOFYEAR(checkin_date) = WEEKOFYEAR(NOW()) AND user_id = $user_id GROUP BY CAST(checkin_date AS DATE)";
      $query = $this->db->query($sql);
      return $query->result();
    }

    public function getLastCheckOut($checkin_date)
    {
      $user_id  = $this->input->get_request_header('User-ID', TRUE);
      $sql = "SELECT checkout_timestamp FROM tbl_attendance WHERE CAST(checkin_date AS DATE)='$checkin_date' AND checkout_date !='' AND user_id = $user_id ORDER BY ID DESC LIMIT 1";
      $query = $this->db->query($sql);
      $data = $query->result();
      if(count($data) > 0){
          return $data[0]->checkout_timestamp;
      } else {
          return 0;
      }
    }


/*********************************** OLD HOME DATA START ***************************************/
    public function getTodaysLocations()
    {
      $checkin_date = date('Y-m-d');
      $user_id  = $this->input->get_request_header('User-ID', TRUE);
      $sql = "SELECT b.id, b.title, COUNT(a.id) totalCount FROM tbl_attendance a LEFT JOIN tbl_locations b ON a.location = b.id WHERE a.user_id = $user_id AND CAST(a.checkin_date AS DATE)='$checkin_date' GROUP BY a.location ORDER BY b.id DESC";
      $query = $this->db->query($sql);
      $data = $query->result();
      return $data;
    }


    public function getTodaysAttandance($locationId)
    {
      $checkin_date = date('Y-m-d');
      $user_id  = $this->input->get_request_header('User-ID', TRUE);
      $sql = "SELECT * FROM tbl_attendance WHERE location = $locationId AND user_id = $user_id AND CAST(checkin_date AS DATE)='$checkin_date'  ORDER BY checkin_timestamp";
      $query = $this->db->query($sql);
      $data = $query->result();
      return $data;
    }
/*********************************** OLD HOME DATA END ***************************************/


    public function getLastCheckinLocations()
    {
        $checkin_date = date('Y-m-d');
        $current_date  = $this->input->post('current_date');
        if ($current_date != '') {
          $checkin_date = $current_date;
        }
        $user_id  = $this->input->get_request_header('User-ID', TRUE);
        $sql = "SELECT b.id, b.title FROM tbl_attendance a LEFT JOIN tbl_locations b ON a.location = b.id WHERE a.user_id = $user_id AND CAST(a.checkin_date AS DATE)='$checkin_date' ORDER BY a.checkin_timestamp DESC LIMIT 1";
        $query = $this->db->query($sql);
        $data = $query->result();
        return $data;
    }


    public function getTodaysTotalAttandance()
    {
      $checkin_date = date('Y-m-d');
      $current_date  = $this->input->post('current_date');
      if ($current_date != '') {
        $checkin_date = $current_date;
      }
      $user_id  = $this->input->get_request_header('User-ID', TRUE);
      $sql = "SELECT a.*, b.title as location_name FROM tbl_attendance a LEFT JOIN tbl_locations b ON a.location = b.id WHERE a.user_id = $user_id AND CAST(a.checkin_date AS DATE)='$checkin_date' ORDER BY a.checkin_timestamp";
      //$sql = "SELECT * FROM tbl_attendance WHERE location = $locationId AND user_id = $user_id AND CAST(checkin_date AS DATE)='$checkin_date'  ORDER BY checkin_timestamp";
      $query = $this->db->query($sql);
      $data = $query->result();
      return $data;
    }

}
