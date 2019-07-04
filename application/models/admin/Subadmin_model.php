<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subadmin_model extends CI_Model{

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

  public function isEmailExisting($email = "")
  {
    $this->db->select('*');
    $this->db->from('tbl_users');
    $this->db->where('email', $email);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return true;
    }else {
      return false;
    }
  }

  public function isMobileExisting($mobile = "")
  {
    $this->db->select('*');
    $this->db->from('tbl_users');
    $this->db->where('mobile', $mobile);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return true;
    }else {
      return false;
    }
  }

  public function createSubAdmin($dataArr)
  {
    $this->db->insert('tbl_users', $dataArr);
    $id = $this->db->insert_id();
    $this->acl_model->insertAllUserPermissions($id, ROLE_ADMIN, $dataArr['company_id'], $dataArr['createdBy']);
    return $id;
  }

  function getSubAdminList($companyId = "", $userId = "")
 {
     $requestData= $_REQUEST;
     $columns = array(
                   0  => 'userId',
                   1  => 'name',
                   2  => 'email',
                   3  => 'phone_code',
                   4  => 'mobile',
                   5  => 'status',
                   6  => 'createdDtm',
                   7  => 'action'
                  );

      $query = $this->db->select('*')->from('tbl_users')->where('roleId', ROLE_ADMIN)->where('company_id', $companyId)->where('userId !=', $userId)->get();
      $totalData = $query->num_rows();
      $totalFiltered = $totalData;
      $this->db->flush_cache();

      $this->db->select('*');
      $this->db->from('tbl_users');
      $this->db->where('roleId', ROLE_ADMIN)->where('company_id', $companyId)->where('userId !=', $userId);
    	$this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

      if( !empty($requestData['columns'][0]['search']['value']) ){
         $this->db->like('userId', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
         $this->db->like('name', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
         $this->db->like('email', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
         $this->db->like('phone_code', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
         $this->db->like('mobile', $requestData['columns'][4]['search']['value']);
      }
      if( !empty($requestData['columns'][5]['search']['value']) ){
         $this->db->like('createdDtm', $requestData['columns'][5]['search']['value']);
      }
      if( !empty($requestData['columns'][6]['search']['value']) ){
         $this->db->like('status', $requestData['columns'][6]['search']['value']);
      }
      if( trim($requestData['columns'][7]['search']['value']) != '' ){
         $this->db->where('name', $requestData['columns'][7]['search']['value']);
      }
      if( !empty($requestData['search']['value']) ){
       $this->db->like('name', $requestData['search']['value']);
      }
      $query = $this->db->get();
      $totalFiltered = $query->num_rows();

      $this->db->flush_cache();

      $this->db->select("*");
      $this->db->from('tbl_users');
      $this->db->where('roleId', ROLE_ADMIN)->where('company_id', $companyId)->where('userId !=', $userId);
      $this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
      $this->db->limit($requestData['length'], $requestData['start']);


      if( !empty($requestData['columns'][0]['search']['value']) ){
          $this->db->like('userId', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
          $this->db->like('name', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
          $this->db->like('email', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
          $this->db->like('phone_code', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
          $this->db->like('mobile', $requestData['columns'][4]['search']['value']);
      }
      if( !empty($requestData['columns'][5]['search']['value']) ){
          $this->db->like('createdDtm', $requestData['columns'][5]['search']['value']);
      }
      if( !empty($requestData['columns'][6]['search']['value']) ){
          $this->db->like('status', $requestData['columns'][6]['search']['value']);
      }
      if( trim($requestData['columns'][7]['search']['value']) != '' ){
          $this->db->where('name', $requestData['columns'][7]['search']['value']);
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





     function getadminInfo($id= "")
     {
       $this->db->select('A.*, B.name as company_name');
       $this->db->from('tbl_users as A');
       $this->db->join('tbl_company as B', 'B.id = A.company_id');
       $this->db->where('A.userId',$id)->where('A.roleId', ROLE_ADMIN);
       $query = $this->db->get();
       $result = $query->result();
       return $result;
     }

     function isValidUserId($id= "", $companyId = "")
     {
       $this->db->select('userId');
       $this->db->from('tbl_users');
       $this->db->where('userId',$id);
       $this->db->where('company_id',$companyId)->where('roleId', ROLE_ADMIN);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
         return true;
       }else {
         return false;
       }
     }

     public function isEditEmailExisting($email = "", $id= "")
     {
       $this->db->select('*');
       $this->db->from('tbl_users');
       $this->db->where('email', $email);
       $this->db->where('userId !=', $id);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
         return true;
       }else {
         return false;
       }
     }

     public function isEditMobileExisting($mobile = "", $id= "")
     {
       $this->db->select('*');
       $this->db->from('tbl_users');
       $this->db->where('mobile', $mobile);
       $this->db->where('userId !=', $id);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
         return true;
       }else {
         return false;
       }
     }


     function editAdmin($adminInfo, $id= "")
     {
       $this->db->where('userId',$id);
       return $this->db->update('tbl_users', $adminInfo);
     }


     /**
      * This function is used to delete the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function deleteAdmin($userId="")
     {
         $this->db->where('userId', $userId);
         return $this->db->delete('tbl_users');

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
