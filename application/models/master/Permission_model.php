<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }


  public function getroles()
  {
    $this->db->select('*');
    $this->db->from('tbl_roles');
    $query = $this->db->get();
    return $query->result();
  }

  public function getAllUsersByRole($role_id)
  {
    $this->db->select('userId, roleId, status, company_id');
    $this->db->from('tbl_users');
    $this->db->where('roleId', $role_id);
    if ($role_id == ROLE_HR) {
      $this->db->or_where('is_hr', 1);
    }
    $query = $this->db->get();
    return $query->result();
  }

  public function isValidPermission($permission = '')
  {
    $sql = "SELECT * FROM tbl_permissions WHERE permission = '$permission'";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return true;
    }else {
      return false;
    }
  }

  public function createPermission($dataArr)
  {
    $this->db->insert('tbl_permissions', $dataArr);
    return $this->db->insert_id();
  }

  public function insertAllPermissions($pArr)
  {
    $this->db->insert_batch('tbl_permissions_role', $pArr);
    return true;
  }

  function getpermissionList()
 {
         $requestData= $_REQUEST;
         $columns = array(
                       0  => 'id',
                       1  => 'role',
                       2  => 'permission',
                       3  => 'descrition',
                       4  => 'created',
                       5  => 'action'
                      );


            $query = $this->db->select('tbl_permissions.*, tbl_roles.role')
                              ->from('tbl_permissions')
                              ->join('tbl_roles', 'tbl_roles.roleId = tbl_permissions.role_id')
                              ->get();

            $totalData = $query->num_rows();
            $totalFiltered = $totalData;
            $this->db->flush_cache();

           $this->db->select('tbl_permissions.*, tbl_roles.role');
           $this->db->from('tbl_permissions');
    			 if( $requestData['order'][0]['column'] == 1){
                 $this->db->order_by('tbl_roles.role', $requestData['order'][0]['dir']);
    			 }else{
    			      $this->db->order_by('tbl_permissions.'.$columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
    			 }

           if( !empty($requestData['columns'][0]['search']['value']) ){
               $this->db->like('tbl_permissions.id', $requestData['columns'][0]['search']['value']);
           }
           if( !empty($requestData['columns'][1]['search']['value']) ){
               $this->db->like('tbl_roles.role', $requestData['columns'][1]['search']['value']);
           }
           if( !empty($requestData['columns'][2]['search']['value']) ){
               $this->db->like('tbl_permissions.permission', $requestData['columns'][2]['search']['value']);
           }
           if( !empty($requestData['columns'][3]['search']['value']) ){
               $this->db->like('tbl_permissions.description', $requestData['columns'][3]['search']['value']);
           }
           if( !empty($requestData['columns'][4]['search']['value']) ){
               $this->db->like('tbl_permissions.created', $requestData['columns'][4]['search']['value']);
           }

           if( !empty($requestData['search']['value']) ){
             $this->db->like('tbl_permissions.permission', $requestData['search']['value']);
           }


          $this->db->join('tbl_roles', 'tbl_roles.roleId = tbl_permissions.role_id');
          $query = $this->db->get();
          $totalFiltered = $query->num_rows();

           $this->db->flush_cache();

           $this->db->select('tbl_permissions.*, tbl_roles.role');
           $this->db->from('tbl_permissions');
    			 if( $requestData['order'][0]['column'] == 1){
                 $this->db->order_by('tbl_roles.role', $requestData['order'][0]['dir']);
    			 }else{
    			      $this->db->order_by('tbl_permissions.'.$columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
    			 }
          $this->db->limit($requestData['length'], $requestData['start']);


          if( !empty($requestData['columns'][0]['search']['value']) ){
              $this->db->like('tbl_permissions.id', $requestData['columns'][0]['search']['value']);
          }
          if( !empty($requestData['columns'][1]['search']['value']) ){
              $this->db->like('tbl_roles.role', $requestData['columns'][1]['search']['value']);
          }
          if( !empty($requestData['columns'][2]['search']['value']) ){
              $this->db->like('tbl_permissions.permission', $requestData['columns'][2]['search']['value']);
          }
          if( !empty($requestData['columns'][3]['search']['value']) ){
              $this->db->like('tbl_permissions.description', $requestData['columns'][3]['search']['value']);
          }
          if( !empty($requestData['columns'][4]['search']['value']) ){
              $this->db->like('tbl_permissions.created', $requestData['columns'][4]['search']['value']);
          }
          if( !empty($requestData['search']['value']) ){
            $this->db->like('tbl_permissions.permission', $requestData['search']['value']);
          }

         $this->db->join('tbl_roles', 'tbl_roles.roleId = tbl_permissions.role_id');
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





     function getpermissionInfo($id= "")
     {
       $this->db->select('A.*, B.role');
       $this->db->from('tbl_permissions as A');
       $this->db->join('tbl_roles as B', 'B.roleId = A.role_id');
       $this->db->where('A.id',$id);
       $query = $this->db->get();
       $result = $query->result();
       return $result;
     }


     function editPermission($permissionInfo, $id= "")
     {
       $this->db->where('id',$id);
       return $this->db->update('tbl_permissions', $permissionInfo);
     }


     /**
      * This function is used to delete the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function deletePermission($id="")
     {
         $this->db->where('id', $id);
         $this->db->delete('tbl_permissions');
         $this->db->flush_cache();
         $this->db->where('permission_id', $id);
         return $this->db->delete('tbl_permissions_role');
     }

}
