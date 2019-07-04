<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function isValidCompany($company_id = '')
  {
    $sql = "SELECT * FROM tbl_company WHERE status = '1' AND id = $company_id";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return true;
    }else {
      return false;
    }
  }

  // function getAttendanceList($companyId)
  // {
  //     $this->db->select('A.userId, A.name, B.checkin_date, B.checkout_date, B.checkin_comment, A.profile_image');
  //     $this->db->from('tbl_users as A');
  //     $this->db->where('company_id', $companyId);
  //     $this->db->join('tbl_attendance as B', 'A.userId = B.emp_status', 'left');
  //     $query = $this->db->get();
  //     return $query->result();
  // }



  function getAttendanceList($companyId)
 {
     $requestData= $_REQUEST;
     $columns = array(
                     0  => 'id',
                     1  => 'name',
                     2  => 'checkin_date',
                     3  => 'checkout_date',
                     4  => 'checkin_comment',
                     5  => 'checkout_comment',
                     6  => 'action'
                  );
      $query = $this->db->select('B.id, A.userId, A.name, B.checkin_date, B.checkout_date, B.checkin_comment, B.checkout_comment')
                        ->from('tbl_users as A')
                        ->join('tbl_attendance as B', 'A.userId = B.user_id', 'left')
                        ->where('B.company_id', $companyId)
                        ->get();
      $totalData = $query->num_rows();
      $totalFiltered = $totalData;
      $this->db->flush_cache();

      $this->db->select('tbl_attendance.*,tbl_users.name');
      $this->db->from('tbl_users');

    if ($requestData['order'][0]['column'] == 5) {
      $this->db->order_by('tbl_users.name', $requestData['order'][0]['dir']);
    }else {
    	$this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
    }

      if( !empty($requestData['columns'][0]['search']['value']) ){
         $this->db->like('id', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
         $this->db->like('name', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
         $this->db->like('checkin_date', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
         $this->db->like('checkout_date', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
         $this->db->like('checkin_comment', $requestData['columns'][4]['search']['value']);
      }
      if( !empty($requestData['columns'][5]['search']['value']) ){
         $this->db->like('checkout_comment', $requestData['columns'][5]['search']['value']);
      }
      if( !empty($requestData['columns'][6]['search']['value']) ){
         $this->db->like('action', $requestData['columns'][6]['search']['value']);
      }

      if( !empty($requestData['search']['value']) ){
       $this->db->like('name', $requestData['search']['value']);
      }

      $this->db->join('tbl_attendance', 'tbl_users.userId = tbl_attendance.user_id', 'left');
      $this->db->where('tbl_attendance.company_id', $companyId);
      $query = $this->db->get();
      $totalFiltered = $query->num_rows();

      $this->db->flush_cache();

      $this->db->select('B.id, A.userId, A.name, B.checkin_date, B.checkout_date, B.checkin_comment, B.checkout_comment');
      $this->db->from('tbl_users as A');
      if ($requestData['order'][0]['column'] == 5) {
        $this->db->order_by('tbl_users.name', $requestData['order'][0]['dir']);
      }else {
        $this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
      }
      $this->db->limit($requestData['length'], $requestData['start']);

        if( !empty($requestData['columns'][0]['search']['value']) ){
           $this->db->like('id', $requestData['columns'][0]['search']['value']);
        }
        if( !empty($requestData['columns'][1]['search']['value']) ){
           $this->db->like('name', $requestData['columns'][1]['search']['value']);
        }
        if( !empty($requestData['columns'][2]['search']['value']) ){
           $this->db->like('checkin_date', $requestData['columns'][2]['search']['value']);
        }
        if( !empty($requestData['columns'][3]['search']['value']) ){
           $this->db->like('checkout_date', $requestData['columns'][3]['search']['value']);
        }if( !empty($requestData['columns'][4]['search']['value']) ){
           $this->db->like('checkin_comment', $requestData['columns'][4]['search']['value']);
        }
        if( !empty($requestData['columns'][5]['search']['value']) ){
           $this->db->like('checkout_comment', $requestData['columns'][5]['search']['value']);
        }
        if( !empty($requestData['columns'][6]['search']['value']) ){
           $this->db->like('action', $requestData['columns'][6]['search']['value']);
        }
        if( !empty($requestData['search']['value']) ){
          $this->db->like('name', $requestData['search']['value']);
        }
        $this->db->join('tbl_attendance as B', 'A.userId = B.user_id', 'left');
        $this->db->where('B.company_id', $companyId);
        $query = $this->db->get();

      $data = $query->result();
      $json_data = array(
                 "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
                 "recordsTotal"    => intval( $totalData ),  // total number of records
                 "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
                 "data"            => $data   // total data array
                 );

      return $json_data;

     }

     function getAttendanceInfo($id= "")
     {
       $this->db->select('*');
       $this->db->from('tbl_attendance');
         $this->db->where('id',$id);
         $query = $this->db->get();
         $result = $query->result();
         return $result;
     }

     function isValidAttendance($id= "", $companyId = "")
     {
       $this->db->select('id');
       $this->db->from('tbl_attendance');
       $this->db->where('id',$id);
       $this->db->where('company_id',$companyId);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
         return true;
       }else {
         return false;
       }
     }


     function editAttendance($attendanceInfo, $id= "")
     {
       $this->db->where('id',$id);
       return $this->db->update('tbl_attendance', $attendanceInfo);
     }


     /**
      * This function is used to delete the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function deleteAttendance($id="")
     {
         $this->db->where('id', $id);
         return $this->db->delete('tbl_attendance');

     }

     /**
      * This function is used to blocked the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function blockAdmin($userId, $adminInfo)
     {
         $this->db->where('userId', $userId);
         $this->db->update('tbl_users', $adminInfo);

         return $this->db->affected_rows();
     }


     /**
      * This function is used to active the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function unblockAdmin($userId, $adminInfo)
     {
         $this->db->where('userId', $userId);
         $this->db->update('tbl_users', $adminInfo);

         return $this->db->affected_rows();
     }


     function getuserbydeaprtmentid($attendance_id, $companyId)
     {
         $this->db->select('tbl_users.userId,tbl_users.name,tbl_users.email,tbl_users.emp_id');
         $this->db->from('tbl_users');
         $this->db->where('attendance_id',$attendance_id);
         $this->db->where('company_id',$companyId);
         $this->db->where('status', 1);
         $query = $this->db->get();
         $result = $query->result();
         return $result;

     }


}
