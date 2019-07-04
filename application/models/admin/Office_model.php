<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getAllLocations($company_id = "")
  {
      $this->db->select('*');
      $this->db->from('tbl_locations');
      $this->db->where('company_id', $company_id);
      $this->db->where('status', 1);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
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


  public function isOfficeExisting($title, $company_id)
  {
    $this->db->select('*');
    $this->db->from('tbl_offices');
    $this->db->where('title', $title);
    $this->db->where('company_id', $company_id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return true;
    }else {
      return false;
    }
  }

  public function isValidLocation($locationId, $company_id)
  {
    $this->db->select('*');
    $this->db->from('tbl_locations');
    $this->db->where('id', $locationId);
    $this->db->where('company_id', $company_id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return true;
    }else {
      return false;
    }
  }

  public function createoffice($dataArr)
  {
    $this->db->insert('tbl_offices', $dataArr);
    return $this->db->insert_id();
  }

  function getofficeList($companyId = "", $userId = "")
  {
     $requestData= $_REQUEST;
     $columns = array(
                   0  => 'id',
                   1  => 'title',
                   2  => 'location',
                   3  => 'created',
                   4  => 'status',
                   5  => 'action'
                  );

      $this->db->select('tbl_offices.*')
                ->from('tbl_offices')
                ->join('tbl_locations', 'tbl_locations.id = tbl_offices.location_id')
                ->where('tbl_offices.company_id', $companyId);
      $query = $this->db->get();
      $totalData = $query->num_rows();
      $totalFiltered = $totalData;
      $this->db->flush_cache();

      $this->db->select('tbl_offices.*, tbl_locations.title as location')
                ->from('tbl_offices')
                ->join('tbl_locations', 'tbl_locations.id = tbl_offices.location_id')
                ->where('tbl_offices.company_id', $companyId);
      if ($requestData['order'][0]['column'] == 2) {
        $this->db->order_by('tbl_locations.title', $requestData['order'][0]['dir']);
      }else {
        $this->db->order_by('tbl_offices.'.$columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
      }

      if( !empty($requestData['columns'][0]['search']['value']) ){
         $this->db->like('tbl_offices.id', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
         $this->db->like('tbl_offices.title', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
         $this->db->like('tbl_locations.title', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
         $this->db->like('tbl_offices.created', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
         $this->db->like('tbl_offices.status', $requestData['columns'][4]['search']['value']);
      }

      if( !empty($requestData['search']['value']) ){
       $this->db->like('tbl_offices.title', $requestData['search']['value']);
      }
      $query = $this->db->get();
      $totalFiltered = $query->num_rows();

      $this->db->flush_cache();

      $this->db->select('tbl_offices.*, tbl_locations.title as location')
                ->from('tbl_offices')
                ->join('tbl_locations', 'tbl_locations.id = tbl_offices.location_id')
                ->where('tbl_offices.company_id', $companyId);
      if ($requestData['order'][0]['column'] == 2) {
        $this->db->order_by('tbl_locations.title', $requestData['order'][0]['dir']);
      }else {
        $this->db->order_by('tbl_offices.'.$columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
      }
      $this->db->limit($requestData['length'], $requestData['start']);

      if( !empty($requestData['columns'][0]['search']['value']) ){
         $this->db->like('tbl_offices.id', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
         $this->db->like('tbl_offices.title', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
         $this->db->like('tbl_locations.title', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
         $this->db->like('tbl_offices.created', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
         $this->db->like('tbl_offices.status', $requestData['columns'][4]['search']['value']);
      }

      if( !empty($requestData['search']['value']) ){
       $this->db->like('tbl_offices.title', $requestData['search']['value']);
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



     function getofficeInfo($id= "")
     {
       $this->db->select('tbl_offices.*, tbl_locations.title as location')
                 ->from('tbl_offices')
                 ->join('tbl_locations', 'tbl_locations.id = tbl_offices.location_id')
                 ->where('tbl_offices.id', $id);
       $query = $this->db->get();
       $result = $query->result();
       return $result;
     }

     function isValidOfficeId($id= "", $companyId = "")
     {
       $this->db->select('id');
       $this->db->from('tbl_offices');
       $this->db->where('id',$id);
       $this->db->where('company_id',$companyId);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
         return true;
       }else {
         return false;
       }
     }

     public function isEditOfficeExisting( $id, $title, $company_id)
     {
       $this->db->select('*');
       $this->db->from('tbl_offices');
       $this->db->where('title', $title);
       $this->db->where('company_id', $company_id);
       $this->db->where('id !=', $id);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
         return true;
       }else {
         return false;
       }
     }

     function edit($officeInfo, $id= "")
     {
       $this->db->where('id',$id);
       return $this->db->update('tbl_offices', $officeInfo);
     }


     /**
      * This function is used to delete the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function deleteoffice($id="")
     {
         $this->db->where('id', $id);
         return $this->db->delete('tbl_offices');
     }

     /**
      * This function is used to blocked the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function blockoffice($id, $officeInfo)
     {
         $this->db->where('id', $id);
         $this->db->update('tbl_offices', $officeInfo);
         return $this->db->affected_rows();
     }


     /**
      * This function is used to active the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function unblockoffice($id, $officeInfo)
     {
         $this->db->where('id', $id);
         $this->db->update('tbl_offices', $officeInfo);
         return $this->db->affected_rows();
     }

}
