<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model{

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

  function getDepartmentList($companyId="")
  {
      $this->db->select('*');
      $this->db->from('tbl_departments');
      $this->db->where('company_id', $companyId);
      $query = $this->db->get();
      return $query->result();
  }

  function getHeadList($companyId="")
  {
      $this->db->select('*');
      $this->db->from('tbl_teams');
      $this->db->where('company_id', $companyId);
      $query = $this->db->get();
      return $query->result();
  }




  public function createTeam($dataArr)
  {
    $this->db->insert('tbl_teams', $dataArr);
    return $this->db->insert_id();
  }

  function getTeamList($companyId	 = "")
 {
     $requestData= $_REQUEST;
     $columns = array(
                   0  => 'id',
                   1  => 'title',
                   2  => 'department',
                   3  => 'head_name',
                   4  => 'description',
                   5  => 'created',
                   6  => 'action'
                  );
      $query = $this->db->select('tbl_teams.*,tbl_users.name as head_name ,tbl_departments.title as department')
                        ->from('tbl_teams')
                        ->join('tbl_users', 'tbl_users.userId = tbl_teams.head', 'left')
                        ->join('tbl_departments', 'tbl_departments.id = tbl_teams.department_id', 'left')
                        ->where('tbl_teams.company_id', $companyId)
                        ->get();
      $totalData = $query->num_rows();
      $totalFiltered = $totalData;
      $this->db->flush_cache();

      $this->db->select('tbl_teams.*,tbl_users.name as head_name ,tbl_departments.title as department');
      $this->db->from('tbl_teams');

      if ($requestData['order'][0]['column'] == 3) {
        $this->db->order_by('tbl_users.name', $requestData['order'][0]['dir']);
      }else if ($requestData['order'][0]['column'] == 2) {
        $this->db->order_by('tbl_departments.title', $requestData['order'][0]['dir']);
      }else {
      	$this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
      }

      if( !empty($requestData['columns'][0]['search']['value']) ){
         $this->db->like('CAST(tbl_teams.id AS CHAR)', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
         $this->db->like('tbl_teams.title', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
         $this->db->like('tbl_departments.title', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
         $this->db->like('tbl_users.name', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
         $this->db->like('tbl_teams.description', $requestData['columns'][4]['search']['value']);
      }
      if( !empty($requestData['columns'][5]['search']['value']) ){
         $this->db->like('tbl_teams.created', $requestData['columns'][5]['search']['value']);
      }

      if( !empty($requestData['search']['value']) ){
       $this->db->like('tbl_teams.title', $requestData['search']['value']);
      }

      $this->db->join('tbl_users', 'tbl_users.userId = tbl_teams.head', 'left');
      $this->db->join('tbl_departments', 'tbl_departments.id = tbl_teams.department_id', 'left');
      $this->db->where('tbl_teams.company_id', $companyId);
      $query = $this->db->get();
      $totalFiltered = $query->num_rows();

      $this->db->flush_cache();

      $this->db->select('tbl_teams.*,tbl_users.name as head_name ,tbl_departments.title as department');
      $this->db->from('tbl_teams');
      if ($requestData['order'][0]['column'] == 3) {
        $this->db->order_by('tbl_users.name', $requestData['order'][0]['dir']);
      }else if ($requestData['order'][0]['column'] == 2) {
        $this->db->order_by('tbl_departments.title', $requestData['order'][0]['dir']);
      }else {
        $this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
      }
        $this->db->limit($requestData['length'], $requestData['start']);


      if( !empty($requestData['columns'][0]['search']['value']) ){
          $this->db->like('CAST(tbl_teams.id AS CHAR)', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
          $this->db->like('tbl_teams.title', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
         $this->db->like('tbl_departments.title', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
         $this->db->like('tbl_users.name', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
          $this->db->like('tbl_teams.description', $requestData['columns'][4]['search']['value']);
      }
      if( !empty($requestData['columns'][5]['search']['value']) ){
         $this->db->like('tbl_teams.created', $requestData['columns'][5]['search']['value']);
      }
      if( !empty($requestData['search']['value']) ){
        $this->db->like('tbl_teams.title', $requestData['search']['value']);
      }

        $this->db->join('tbl_users', 'tbl_users.userId = tbl_teams.head', 'left');
        $this->db->join('tbl_departments', 'tbl_departments.id = tbl_teams.department_id', 'left');
        $this->db->where('tbl_teams.company_id', $companyId);
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

     function getTeamInfo($id= "")
     {
         $this->db->select("A.*, CONCAT(B.name, '(', B.email , ')') as head_name");
         $this->db->from('tbl_teams as A');
         $this->db->join('tbl_users as B', 'B.userId = A.head', 'left');
         $this->db->where('A.id',$id);
         $query = $this->db->get();
         $result = $query->result();
         return $result;
     }

     function isValidTeam($id= "", $companyId = "")
     {
       $this->db->select('id');
       $this->db->from('tbl_teams');
       $this->db->where('id',$id);
       $this->db->where('company_id',$companyId);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
         return true;
       }else {
         return false;
       }
     }


     function editTeam($teamInfo, $id= "")
     {
       $this->db->where('id',$id);
       return $this->db->update('tbl_teams', $teamInfo);
     }


     /**
      * This function is used to delete the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function deleteTeam($id="")
     {
         $this->db->where('id', $id);
         return $this->db->delete('tbl_teams');

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


     function getuserbydeaprtmentid($department_id, $companyId)
     {
         $this->db->select('userId,name,email,emp_id');
         $this->db->from('tbl_users');
         $this->db->where('department_id',$department_id);
         $this->db->where('company_id',$companyId);
         $this->db->where('status', 1);
         $query = $this->db->get();
         $result = $query->result();
         return $result;

     }

     public function searchManager($searchText = '', $companyId = "")
     {

       $roles = array(ROLE_MANAGER, ROLE_HR, ROLE_ADMIN);
       $this->db->select('A.userId, A.name, A.fname, A.lname, A.email, A.roleId');
       $this->db->from('tbl_users as A');
       $this->db->where_in('A.roleId',$roles);
       $this->db->where('A.company_id',$companyId);
       $this->db->where('A.status',1);
       $this->db->where("A.userId NOT IN (SELECT B.head FROM tbl_teams as B WHERE B.company_id = $companyId)");
        if ($searchText != '') {
          $this->db->group_start();
          $this->db->like('A.name', $searchText, 'both');
          $this->db->or_like('A.email', $searchText, 'both');
          $this->db->group_end();
        }
       $this->db->order_by('A.name', 'ASC');
       $this->db->limit('10');
       $query = $this->db->get();
       $result = $query->result();
       return $result;
     }


}
