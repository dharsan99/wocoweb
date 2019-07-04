<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }


  public function totalRecords()
  {
    $this->db->select('*');
    $this->db->from('tbl_users');
    $this->db->where('roleId', ROLE_ADMIN);
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function searchCompany($searchText = '')
  {
    $sql = "SELECT * FROM tbl_company WHERE status = '1' ";
    if ($searchText != '') {
      $sql .= " AND name LIKE '%".$searchText."%' ";
    }
    $sql .= " ORDER BY name ASC LIMIT 10";
    $query = $this->db->query($sql);
    return $query->result();
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

  public function createAdmin($dataArr)
  {
    $this->db->insert('tbl_users', $dataArr);
    $id = $this->db->insert_id();
    $this->acl_model->insertAllUserPermissions($id, ROLE_ADMIN, $dataArr['company_id'], $dataArr['createdBy']);
    $this->acl_model->insertAllUserPermissions($id, ROLE_HR, $dataArr['company_id'], $dataArr['createdBy']);
    return $id;
  }

  function getAdminList()
 {
         $requestData= $_REQUEST;
         $columns = array(
                       0  => 'userId',
                       1  => 'company_name',
                       2  => 'name',
                       3  => 'email',
                       4  => 'phone_code',
                       5  => 'mobile',
                       6  => 'status',
                       7  => 'createdDtm',
                       8  => 'action'
                      );

          $query = $this->db->select('tbl_users.*, tbl_company.id')
                            ->from('tbl_users')
                            ->join('tbl_company', 'tbl_company.id = tbl_users.company_id')
                            ->where('tbl_users.roleId', ROLE_ADMIN)
                            ->get();
            $totalData = $query->num_rows();
            $totalFiltered = $totalData;
            $this->db->flush_cache();

           $this->db->select('tbl_users.*, tbl_company.name AS company_name');
           $this->db->from('tbl_users')->where('tbl_users.roleId', ROLE_ADMIN);
    			 if( $requestData['order'][0]['column'] == 1){
                 $this->db->order_by('tbl_company.name', $requestData['order'][0]['dir']);
    			 }else{
    			      $this->db->order_by('tbl_users.'.$columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
    			 }

           if( !empty($requestData['columns'][0]['search']['value']) ){
               $this->db->like('tbl_users.userId', $requestData['columns'][0]['search']['value']);
           }
           if( !empty($requestData['columns'][1]['search']['value']) ){
               $this->db->like('tbl_company.name', $requestData['columns'][1]['search']['value']);
           }else if( !empty($requestData['search']['value']) ){
             $this->db->like('tbl_users.name', $requestData['search']['value']);
           }
           if( !empty($requestData['columns'][2]['search']['value']) ){
               $this->db->like('tbl_users.name', $requestData['columns'][2]['search']['value']);
           }
           if( !empty($requestData['columns'][3]['search']['value']) ){
               $this->db->like('tbl_users.email', $requestData['columns'][3]['search']['value']);
           }
           if( !empty($requestData['columns'][4]['search']['value']) ){
               $this->db->like('tbl_users.phone_code', $requestData['columns'][4]['search']['value']);
           }
           if( !empty($requestData['columns'][5]['search']['value']) ){
               $this->db->like('tbl_users.mobile', $requestData['columns'][5]['search']['value']);
           }
           if( !empty($requestData['columns'][6]['search']['value']) ){
               $this->db->like('tbl_users.createdDtm', $requestData['columns'][6]['search']['value']);
           }
           if( !empty($requestData['columns'][7]['search']['value']) ){
               $this->db->like('tbl_users.status', $requestData['columns'][7]['search']['value']);
           }
           if( trim($requestData['columns'][8]['search']['value']) != '' ){
               $this->db->where('tbl_users.name', $requestData['columns'][8]['search']['value']);
           }

          $this->db->join('tbl_company', 'tbl_company.id = tbl_users.company_id');
          $query = $this->db->get();
          $totalFiltered = $query->num_rows();

           $this->db->flush_cache();

           $this->db->select('tbl_users.*, tbl_company.name AS company_name');
           $this->db->from('tbl_users')->where('tbl_users.roleId', ROLE_ADMIN);
           if( $requestData['order'][0]['column'] == 1){
                 $this->db->order_by('tbl_company.name', $requestData['order'][0]['dir']);
           }else{
                $this->db->order_by('tbl_users.'.$columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
           }
          $this->db->limit($requestData['length'], $requestData['start']);


          if( !empty($requestData['columns'][0]['search']['value']) ){
              $this->db->like('tbl_users.userId', $requestData['columns'][0]['search']['value']);
          }
          if( !empty($requestData['columns'][1]['search']['value']) ){
              $this->db->like('tbl_company.name', $requestData['columns'][1]['search']['value']);
          }else if( !empty($requestData['search']['value']) ){
            $this->db->like('tbl_users.name', $requestData['search']['value']);
          }
          if( !empty($requestData['columns'][2]['search']['value']) ){
              $this->db->like('tbl_users.name', $requestData['columns'][2]['search']['value']);
          }
          if( !empty($requestData['columns'][3]['search']['value']) ){
              $this->db->like('tbl_users.email', $requestData['columns'][3]['search']['value']);
          }
          if( !empty($requestData['columns'][4]['search']['value']) ){
              $this->db->like('tbl_users.phone_code', $requestData['columns'][4]['search']['value']);
          }
          if( !empty($requestData['columns'][5]['search']['value']) ){
              $this->db->like('tbl_users.mobile', $requestData['columns'][5]['search']['value']);
          }
          if( !empty($requestData['columns'][6]['search']['value']) ){
              $this->db->like('tbl_users.createdDtm', $requestData['columns'][6]['search']['value']);
          }
          if( !empty($requestData['columns'][7]['search']['value']) ){
              $this->db->like('tbl_users.status', $requestData['columns'][7]['search']['value']);
          }
          if( trim($requestData['columns'][8]['search']['value']) != '' ){
              $this->db->where('tbl_users.name', $requestData['columns'][8]['search']['value']);
          }

         $this->db->join('tbl_company', 'tbl_company.id = tbl_users.company_id');
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
       $this->db->where('A.userId',$id);
       $query = $this->db->get();
       $result = $query->result();
       return $result;
     }


     function editAdmin($adminInfo, $id= "")
     {
       $this->db->where('userId',$id);
       $res = $this->db->update('tbl_users', $adminInfo);
       return $res;
     }


     /**
      * This function is used to delete the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function deleteAdmin($userId="")
     {
       $this->db->where('user_id', $userId);
       if ($this->db->delete('tbl_permissions_role')) {
         $this->db->flush_cache();
         $this->db->where('userId', $userId);
         return $this->db->delete('tbl_users');
       }else {
         return false;
       }
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
