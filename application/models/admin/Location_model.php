<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location_model extends CI_Model{

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

  public function isLocationExisting($title = "", $companyId = "")
  {
    $this->db->select('*');
    $this->db->from('tbl_locations');
    $this->db->where('title', $title);
    $this->db->where('company_id', $companyId);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return true;
    }else {
      return false;
    }
  }

  public function createLocation($dataArr)
  {
    $this->db->insert('tbl_locations', $dataArr);
    return $this->db->insert_id();
  }

  public function insertDevices($deviceArr)
  {
    return $this->db->insert_batch('tbl_devices', $deviceArr);
  }

  public function deleteDevices($locationId, $companyId)
  {
    $this->db->where('company_id', $companyId);
    $this->db->where('location_id', $locationId);
    return $this->db->delete('tbl_devices');
  }


  public function getDevicesByLocation($locationId, $companyId)
  {
    $this->db->select('*');
    $this->db->from('tbl_devices');
    $this->db->where('company_id', $companyId);
    $this->db->where('location_id', $locationId);
    $query = $this->db->get();
    return $query->result();
  }


  function getLocationList($companyId = "", $userId = "")
 {
     $requestData= $_REQUEST;
     $columns = array(
                   0  => 'id',
                   1  => 'title',
                   2  => 'city',
                   3  => 'state',
                   4  => 'zip',
                   5  => 'created',
                   6  => 'status',
                   7  => 'action'
                  );

      $query = $this->db->select('*')->from('tbl_locations')->where('company_id', $companyId)->get();
      $totalData = $query->num_rows();
      $totalFiltered = $totalData;
      $this->db->flush_cache();

      $this->db->select('*');
      $this->db->from('tbl_locations');
      $this->db->where('company_id', $companyId);
    	$this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

      if( !empty($requestData['columns'][0]['search']['value']) ){
         $this->db->like('id', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
         $this->db->like('title', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
         $this->db->like('city', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
         $this->db->like('state', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
         $this->db->like('zip', $requestData['columns'][4]['search']['value']);
      }
      if( !empty($requestData['columns'][5]['search']['value']) ){
         $this->db->like('created', $requestData['columns'][5]['search']['value']);
      }
      if( !empty($requestData['columns'][6]['search']['value']) ){
         $this->db->like('status', $requestData['columns'][6]['search']['value']);
      }
      if( trim($requestData['columns'][7]['search']['value']) != '' ){
         $this->db->where('title', $requestData['columns'][7]['search']['value']);
      }
      if( !empty($requestData['search']['value']) ){
       $this->db->like('title', $requestData['search']['value']);
      }
      $query = $this->db->get();
      $totalFiltered = $query->num_rows();

      $this->db->flush_cache();

      $this->db->select("*");
      $this->db->from('tbl_locations');
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
         $this->db->like('city', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
         $this->db->like('state', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
         $this->db->like('zip', $requestData['columns'][4]['search']['value']);
      }
      if( !empty($requestData['columns'][5]['search']['value']) ){
         $this->db->like('created', $requestData['columns'][5]['search']['value']);
      }
      if( !empty($requestData['columns'][6]['search']['value']) ){
         $this->db->like('status', $requestData['columns'][6]['search']['value']);
      }
      if( trim($requestData['columns'][7]['search']['value']) != '' ){
         $this->db->where('title', $requestData['columns'][7]['search']['value']);
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


     function getLocationInfo($id= "", $companyId = "")
     {
       $this->db->select('*');
       $this->db->from('tbl_locations');
       $this->db->where('id',$id)->where('company_id', $companyId);
       $query = $this->db->get();
       $result = $query->result();
       return $result;
     }

     function isValidLocationId($id= "", $companyId = "")
     {
       $this->db->select('id');
       $this->db->from('tbl_locations');
       $this->db->where('id', $id);
       $this->db->where('company_id',$companyId);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
         return true;
       }else {
         return false;
       }
     }


     public function isEditLocationExisting($id = "", $title = "", $companyId = "")
     {
       $this->db->select('*');
       $this->db->from('tbl_locations');
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


     function edit($locationInfo, $id= "")
     {
       $this->db->where('id',$id);
       return $this->db->update('tbl_locations', $locationInfo);
     }


     /**
      * This function is used to delete the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function deleteLocation($id = "")
     {
         $this->db->where('id', $id);
         return $this->db->delete('tbl_locations');

     }

     /**
      * This function is used to blocked the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function blockLocation($id, $locationInfo)
     {
         $this->db->where('id', $id);
         $this->db->update('tbl_locations', $locationInfo);
         return $this->db->affected_rows();
     }


     /**
      * This function is used to active the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function unblockLocation($userId, $locationInfo)
     {
         $this->db->where('id', $userId);
         $this->db->update('tbl_locations', $locationInfo);
         return $this->db->affected_rows();
     }


}
