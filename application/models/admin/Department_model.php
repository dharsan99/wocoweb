<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends CI_Model{

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

  public function isTitleExisting($title = "", $company_id = "")
  {
    $this->db->select('*');
    $this->db->from('tbl_departments');
    $this->db->where('title', $title);
    $this->db->where('company_id',$company_id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return true;
    }else {
      return false;
    }
  }

  public function createDepartment($dataArr)
  {
    $this->db->insert('tbl_departments', $dataArr);
    return $this->db->insert_id();
  }

  function getDepartmentList($companyId	 = "")
 {
     $requestData= $_REQUEST;
     $columns = array(
                   0  => 'id',
                   1  => 'title',
                   2  => 'description',
                   5  => 'head',
                   6  => 'created',
                   7  => 'action'
                  );

      $query = $this->db->select('*')->from('tbl_departments')->where('company_id', $companyId)->get();
      $totalData = $query->num_rows();
      $totalFiltered = $totalData;
      $this->db->flush_cache();

      $this->db->select('*');
      $this->db->from('tbl_departments');
      $this->db->where('company_id', $companyId);
    	$this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

      if( !empty($requestData['columns'][0]['search']['value']) ){
         $this->db->like('id', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
         $this->db->like('title', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
         $this->db->like('description', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
         $this->db->like('phone_code', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
         $this->db->like('created', $requestData['columns'][4]['search']['value']);
      }

      if( !empty($requestData['search']['value']) ){
       $this->db->like('name', $requestData['search']['value']);
      }
      $query = $this->db->get();
      $totalFiltered = $query->num_rows();

      $this->db->flush_cache();

      $this->db->select("*");
      $this->db->from('tbl_departments');
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
          $this->db->like('description', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
          $this->db->like('phone_code', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
          $this->db->like('created', $requestData['columns'][4]['search']['value']);
      }

      if( !empty($requestData['search']['value']) ){
        $this->db->like('name', $requestData['search']['value']);
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





     function getDepartmentInfo($id= "")
     {
       $this->db->select('*');
       $this->db->from('tbl_departments');
         $this->db->where('id',$id);
         $query = $this->db->get();
         $result = $query->result();
         return $result;
     }

     function isValidDepartment($id= "", $companyId = "")
     {
       $this->db->select('id');
       $this->db->from('tbl_departments');
       $this->db->where('id',$id);
       $this->db->where('company_id',$companyId);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
         return true;
       }else {
         return false;
       }
     }


     function editDepartment($departmentInfo, $id= "")
     {
       $this->db->where('id',$id);
       return $this->db->update('tbl_departments', $departmentInfo);
     }


     /**
      * This function is used to delete the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function deleteDepartment($id="")
     {
         $this->db->where('id', $id);
         return $this->db->delete('tbl_departments');

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


}
