<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shift_model extends CI_Model{

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

  public function isTimeExisting($title = "", $companyId = "", $start_time="", $end_time="")
  {
    $this->db->select('*');
    $this->db->from('tbl_shifts');
    $this->db->where('title', $title);
    $this->db->where("(end_time='$end_time' OR start_time='$start_time')");
    $this->db->where('company_id', $companyId);
    $query = $this->db->get();


  
    if ($query->num_rows() > 0) {
      return true;
    }else {
      return false;
    }
  }


  public function createshift($dataArr)
  {
    $this->db->insert('tbl_shifts', $dataArr);
    return $this->db->insert_id();
  }

  function getshiftList($companyId = "", $userId = "")
  {
     $requestData= $_REQUEST;
     $columns = array(
                   0  => 'id',
                   1  => 'title',
                   2  => 'shift_type',
                   3  => 'start_time',
                   4  => 'end_time',
                   5  => 'num_hours',
                   6  => 'status',
                   7  => 'action'
                  );

      $query = $this->db->select('*')->from('tbl_shifts')->where('company_id', $companyId)->get();
      $totalData = $query->num_rows();
      $totalFiltered = $totalData;
      $this->db->flush_cache();

      $this->db->select('*');
      $this->db->from('tbl_shifts');
      $this->db->where('company_id', $companyId);
      $this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

      if( !empty($requestData['columns'][0]['search']['value']) ){
         $this->db->like('id', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
         $this->db->like('title', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
         $this->db->like('shift_type', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
         $this->db->like('start_time', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
         $this->db->like('end_time', $requestData['columns'][4]['search']['value']);
      }
      if( !empty($requestData['columns'][5]['search']['value']) ){
         $this->db->like('num_hours', $requestData['columns'][5]['search']['value']);
      }
      if( !empty($requestData['columns'][6]['search']['value']) ){
         $this->db->like('status', $requestData['columns'][6]['search']['value']);
      }
      if( !empty($requestData['search']['value']) ){
       $this->db->like('title', $requestData['search']['value']);
      }
      $query = $this->db->get();
      $totalFiltered = $query->num_rows();

      $this->db->flush_cache();

      $this->db->select("*");
      $this->db->from('tbl_shifts');
      $this->db->where('company_id', $companyId);
      $this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
      $this->db->limit($requestData['length'], $requestData['start']);

      if( !empty($requestData['columns'][0]['search']['value']) ){
         $this->db->like('id', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
         $this->db->like('title', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
         $this->db->like('shift_type', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
         $this->db->like('start_time', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
         $this->db->like('end_time', $requestData['columns'][4]['search']['value']);
      }
      if( !empty($requestData['columns'][5]['search']['value']) ){
         $this->db->like('num_hours', $requestData['columns'][5]['search']['value']);
      }
      if( !empty($requestData['columns'][6]['search']['value']) ){
         $this->db->like('status', $requestData['columns'][6]['search']['value']);
      }
      if( !empty($requestData['search']['value']) ){
       $this->db->like('title', $requestData['search']['value']);
      }

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





     function getshiftInfo($id= "")
     {
       $this->db->select('A.*, B.name as company_name');
       $this->db->from('tbl_shifts as A');
       $this->db->join('tbl_company as B', 'B.id = A.company_id');
       $this->db->where('A.id',$id);
       $query = $this->db->get();
       $result = $query->result();
       return $result;
     }

     function isValidShiftId($id= "", $companyId = "")
     {
       $this->db->select('id');
       $this->db->from('tbl_shifts');
       $this->db->where('id',$id);
       $this->db->where('company_id',$companyId);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
         return true;
       }else {
         return false;
       }
     }

     public function isEditTimeExisting($id= "", $title = "", $companyId = "")
     {
       $this->db->select('*');
       $this->db->from('tbl_shifts');
       $this->db->where('title', $title);
       $this->db->where('company_id', $companyId);
       $this->db->where('id !=', $id);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
         return true;
       }else {
         return false;
       }
     }

     function edit($shiftInfo, $id= "")
     {
       $this->db->where('id',$id);
       return $this->db->update('tbl_shifts', $shiftInfo);
     }


     function deleteshift($id = "")
     {
         $this->db->where('id', $id);
         return $this->db->delete('tbl_shifts');

     }

     function blockshift($id, $shiftInfo)
     {
         $this->db->where('id', $id);
         $this->db->update('tbl_shifts', $shiftInfo);
         return $this->db->affected_rows();
     }

     function unblockshift($id, $shiftInfo)
     {
         $this->db->where('id', $id);
         $this->db->update('tbl_shifts', $shiftInfo);
         return $this->db->affected_rows();
     }

}
