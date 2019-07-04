<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model{

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

  public function isEmpIdExisting($emp_id = "")
  {
    $this->db->select('*');
    $this->db->from('tbl_users');
    $this->db->where('emp_id', $emp_id);
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

  function getEmployeeRoles()
  {
      $this->db->select('roleId');
      $this->db->from('tbl_users');
      $this->db->where('roleId !=', 1);
      $query = $this->db->get();
      return $query->result();
  }

  function getEmployeeGrades($companyId="")
  {
      $this->db->select('*');
      $this->db->from('tbl_grades');
      $this->db->where('company_id', $companyId);
      $query = $this->db->get();
      return $query->result();
  }


  function getDesignationList($companyId="")
  {
      $this->db->select('*');
      $this->db->from('tbl_designation');
      $this->db->where('company_id', $companyId);
      $query = $this->db->get();
      return $query->result();
  }


   function getManagerlist($companyId="")
   {
     $this->db->select('userId,name,email');
     $this->db->from('tbl_users');
     $this->db->where('roleId',4);
     $this->db->where('company_id', $companyId);
     $query = $this->db->get();
     return  $query->result();
   }


   function getTeamlist($companyId="")
   {
     $this->db->select('userId,name,email');
     $this->db->from('tbl_users');
     $this->db->where('roleId',4);
     $this->db->where('company_id', $companyId);
     $query = $this->db->get();
     return  $query->result();
   }


  function getDepartmentList($companyId="")
  {
      $this->db->select('*');
      $this->db->from('tbl_departments');
      $this->db->where('company_id', $companyId);
      $query = $this->db->get();
      return $query->result();
  }

  function getEmployeeType($companyId="")
  {
      $this->db->select('*');
      $this->db->from('tbl_employment_types');
      $this->db->where('company_id', $companyId);
      $query = $this->db->get();
      return $query->result();
  }

  function getOfficialTimings($companyId="")
  {
      $this->db->select('*');
      $this->db->from('tbl_shifts');
      $this->db->where('company_id', $companyId);
      $this->db->where('status', 1);
      $query = $this->db->get();
      return $query->result();
  }

  function getOffics($companyId="")
  {
      $this->db->select('*');
      $this->db->from('tbl_offices');
      $this->db->where('company_id', $companyId);
      $this->db->where('status', 1);
      $query = $this->db->get();
      return $query->result();
  }

  function getTeamIdFromManager($companyId , $mng_id)
  {
      $this->db->select('*');
      $this->db->from('tbl_teams');
      $this->db->where('company_id', $companyId);
      $this->db->where('head', $mng_id);
      $query = $this->db->get();
      $data = $query->result();
      if (count($data) > 0) {
        return $data[0]->id;
      }else {
        return 0;
      }
  }

  function checkin_comment($companyId="")
  {
      $this->db->select('*');
      $this->db->from('tbl_attendance');
      $this->db->where('company_id', $companyId);
      $query = $this->db->get();
      return $query->result();
  }

  function getEmployeeTeam($id="")
  {
      $this->db->select('title');
      $this->db->from('tbl_teams');
      $this->db->join('tbl_users', 'tbl_users.manager_id = tbl_teams.title', 'left');
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->result();
  }

  function getEmployeeStatus($companyId="")
  {
      $this->db->select('*');
      $this->db->from('tbl_employment_status');
      $this->db->where('company_id', $companyId);
      $query = $this->db->get();
      return $query->result();
  }

  function getDepartment($companyId="")
  {
      $this->db->select('*');
      $this->db->from('tbl_departments');
      $this->db->where('company_id', $companyId);
      $query = $this->db->get();

      return $query->result();
  }

  function getRequests($companyId, $vendorId, $userId, $queryParam)
  {
    $checkin_date = $queryParam['date'];
    $current_date  = date('Y-m');
    if ($checkin_date == '') {
      $checkin_date = $current_date;
    }
      $this->db->select('A.*, B.*');
      if ($queryParam['type'] == 2){
        $this->db->select('C.title as location, C.id as location_id');
      }
      $this->db->from('tbl_requests as A');
      if ($queryParam['type'] == 1) {
        $this->db->join('tbl_leaves as B', 'B.id = A.rq_action_id', 'left');
      }else if ($queryParam['type'] == 2){
        $this->db->join('tbl_attendance as B', 'B.id = A.rq_action_id', 'left');
        $this->db->join('tbl_locations as C', 'C.id = B.location', 'left');
      }else if ($queryParam['type'] == 3){
        $this->db->join('tbl_locations as B', 'B.id = A.rq_action_id', 'left');
      }
      $this->db->where('A.rq_company_id', $companyId);
      $this->db->where('A.rq_created_by', $userId);
      $this->db->where("SUBSTRING(CAST(A.rq_datetime AS DATE), 1, 7) =", $checkin_date);
      $this->db->where('A.rq_type', $queryParam['type']);
      $this->db->order_by('A.rq_id', 'DESC');
      $query = $this->db->get();
      return $query->result();
  }

  function getRequestById($companyId, $vendorId, $userId, $queryParam)
  {
      $this->db->select('A.*, B.*');
      if ($queryParam['type'] == 2){
        $this->db->select('C.title as location, C.id as location_id');
      }
      $this->db->from('tbl_requests as A');
      if ($queryParam['type'] == 1) {
        $this->db->join('tbl_leaves as B', 'B.id = A.rq_action_id', 'left');
      }else if ($queryParam['type'] == 2){
        $this->db->join('tbl_attendance as B', 'B.id = A.rq_action_id', 'left');
        $this->db->join('tbl_locations as C', 'C.id = B.location', 'left');
      }else if ($queryParam['type'] == 3){
        $this->db->join('tbl_locations as B', 'B.id = A.rq_action_id', 'left');
      }
      $this->db->where('A.rq_company_id', $companyId);
      $this->db->where('A.rq_created_by', $userId);
      $this->db->where('A.rq_id', $queryParam['reqId']);
      $this->db->where('A.rq_type', $queryParam['type']);
      $query = $this->db->get();
      $data = $query->result();
      if (count($data) > 0) {
        return $data[0];
      }else {
        return NULL;
      }
  }

  public function approveAttendance($reqId, $chekInId)
  {
    $this->db->where('rq_id', $reqId);
    $res = $this->db->update('tbl_requests', array('rq_status' => 2));
    if ($res) {
      $this->db->flush_cache();
      $this->db->where('id', $chekInId);
      $res = $this->db->update('tbl_attendance', array('status' => 1));
      return true;
    }else {
      return false;
    }
  }

  public function rejectAttendance($reqId, $chekInId, $comment)
  {
    $this->db->where('rq_id', $reqId);
    $res = $this->db->update('tbl_requests', array('rq_status' => 3));
    if ($res) {
      $this->db->flush_cache();
      $this->db->where('id', $chekInId);
      $res = $this->db->update('tbl_attendance', array('status' => 1, 'checkin_reject_comment' => $comment));
      return true;
    }else {
      return false;
    }
  }

  function getAttendanceData($companyId, $vendorId, $userId, $queryParam)
  {
      $checkin_date = $queryParam['date'];
      $current_date  = date('Y-m');
      if ($checkin_date == '') {
        $checkin_date = $current_date;
      }
      $sql = "SELECT a.*, b.title as location_name FROM tbl_attendance a LEFT JOIN tbl_locations b ON a.location = b.id WHERE a.user_id = $userId AND SUBSTRING(CAST(a.checkin_date AS DATE), 1, 7)='$checkin_date' ORDER BY a.checkin_timestamp ASC";
      //$sql = "SELECT * FROM tbl_attendance WHERE location = $locationId AND user_id = $user_id AND CAST(checkin_date AS DATE)='$checkin_date'  ORDER BY checkin_timestamp";
      $query = $this->db->query($sql);
      $data = $query->result();
      return $data;
  }

  function addNewEmployee($dataArr)
  {
      $this->db->insert('tbl_users', $dataArr);
      $insert_id = $this->db->insert_id();
      $this->db->trans_complete();
      return $insert_id;
  }

  /**
   * This function is used to get the user listing count
   * @param string $searchText : This is optional search text
   * @return number $count : This is row count
   */
   //fname=2019-03-12&department=5&team_id=4&designation=2&mobile=ertert&emp_status=3
  function userListingCount($queryParam,$searchText,$companyId,$userId)
  {
    $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.createdDtm, Role.role');
    $this->db->from('tbl_users as BaseTbl');
    $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');

    if(!empty($searchText)) {
      $this->db->group_start();
      $this->db->like('BaseTbl.name', $searchText, 'both');
      $this->db->or_like('BaseTbl.emp_id', $searchText, 'both');
      $this->db->or_like('BaseTbl.email', $searchText, 'both');
      $this->db->group_end();
    }

    if(!empty($queryParam['office_timing'])) {
      $this->db->where('BaseTbl.office_timing', $queryParam['office_timing']);
    }

    if(!empty($queryParam['department'])) {
      $this->db->where('BaseTbl.department_id', $queryParam['department']);
    }

    if(!empty($queryParam['designation'])) {
      $this->db->where('BaseTbl.designation', $queryParam['designation']);
    }

    if(!empty($queryParam['mobile'])) {
      $this->db->where('BaseTbl.mobile', $queryParam['mobile']);
    }

    if(!empty($queryParam['emp_status'])) {
      $this->db->where('BaseTbl.emp_status', $queryParam['emp_status']);
    }

    if(!empty($queryParam['manager_id'])) {
      $this->db->where('BaseTbl.manager_id', $queryParam['manager_id']);
    }

    $this->db->where('BaseTbl.roleId !=', 1)->where('BaseTbl.company_id', $companyId);
    $this->db->where('BaseTbl.isDeleted', 0);
    $query = $this->db->get();
    return $query->num_rows();
  }

  /**
   * This function is used to get the user listing count
   * @param string $searchText : This is optional search text
   * @param number $page : This is pagination offset
   * @param number $segment : This is pagination limit
   * @return array $result : This is result
   */
  function userListing($queryParam,$searchText, $page, $segment,$companyId,$userId)
  {
      $managerName = " (SELECT X.name FROM tbl_users as X WHERE X.userId = BaseTbl.manager_id LIMIT 1) AS manager ";
      $this->db->select('BaseTbl.*, Type.title as emp_type, Shift.title as office_timing, Role.role, '.$managerName);
      $this->db->from('tbl_users as BaseTbl');
      $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
      $this->db->join('tbl_employment_types as Type', 'Type.id = BaseTbl.emp_type','left');
      $this->db->join('tbl_shifts as Shift', 'Shift.id = BaseTbl.office_timing','left');

      if(!empty($searchText)) {
        $this->db->group_start();
        $this->db->like('BaseTbl.name', $searchText, 'both');
        $this->db->or_like('BaseTbl.emp_id', $searchText, 'both');
        $this->db->or_like('BaseTbl.email', $searchText, 'both');
        $this->db->group_end();
      }

      if(!empty($queryParam['office_timing'])) {
        $this->db->where('BaseTbl.office_timing', $queryParam['office_timing']);
      }

      if(!empty($queryParam['department'])) {
        $this->db->where('BaseTbl.department_id', $queryParam['department']);
      }

      if(!empty($queryParam['designation'])) {
        $this->db->where('BaseTbl.designation', $queryParam['designation']);
      }

      if(!empty($queryParam['mobile'])) {
        $this->db->where('BaseTbl.mobile', $queryParam['mobile']);
      }

      if(!empty($queryParam['emp_status'])) {
        $this->db->where('BaseTbl.emp_status', $queryParam['emp_status']);
      }

          if(!empty($queryParam['manager_id'])) {
            $this->db->where('BaseTbl.manager_id', $queryParam['manager_id']);
          }
       $this->db->where('BaseTbl.roleId !=', 1)->where('BaseTbl.company_id', $companyId);
      $this->db->where('BaseTbl.isDeleted', 0);
      $this->db->order_by('BaseTbl.userId', 'DESC');
      $this->db->limit($page, $segment);
      $query = $this->db->get();

      $result = $query->result();
      return $result;
  }

  /**
   * This function is used to get the user listing count
   * @param string $searchText : This is optional search text
   * @return number $count : This is row count
   */
   //fname=2019-03-12&department=5&team_id=4&designation=2&mobile=ertert&emp_status=3
  function userViewCount($queryParam,$searchText,$companyId,$userId)
  {
    $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.createdDtm, Role.role');
    $this->db->from('tbl_users as BaseTbl');
    $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
    if(!empty($searchText)) {
      $this->db->group_start();
      $this->db->like('BaseTbl.name', $searchText, 'both');
      $this->db->or_like('BaseTbl.emp_id', $searchText, 'both');
      $this->db->or_like('BaseTbl.email', $searchText, 'both');
      $this->db->group_end();
    }
    if(!empty($queryParam['office_timing'])) {
      $this->db->where('BaseTbl.office_timing', $queryParam['office_timing']);
    }

    if(!empty($queryParam['department'])) {
      $this->db->where('BaseTbl.department_id', $queryParam['department']);
    }

    if(!empty($queryParam['designation'])) {
      $this->db->where('BaseTbl.designation', $queryParam['designation']);
    }

    if(!empty($queryParam['mobile'])) {
      $this->db->where('BaseTbl.mobile', $queryParam['mobile']);
    }

    if(!empty($queryParam['emp_status'])) {
      $this->db->where('BaseTbl.emp_status', $queryParam['emp_status']);
    }

    $this->db->where('BaseTbl.roleId !=', 1)->where('BaseTbl.company_id', $companyId);
    $this->db->where('BaseTbl.isDeleted', 0);
    $query = $this->db->get();
    return $query->num_rows();
  }

  /**
   * This function is used to get the user listing count
   * @param string $searchText : This is optional search text
   * @param number $page : This is pagination offset
   * @param number $segment : This is pagination limit
   * @return array $result : This is result
   */
  function userView($queryParam,$searchText, $page, $segment,$companyId,$userId)
  {

      $this->db->select('BaseTbl.*, Type.title as emp_type, Shift.title as office_timing, Role.role');
      $this->db->from('tbl_users as BaseTbl');
      $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
      $this->db->join('tbl_employment_types as Type', 'Type.id = BaseTbl.emp_type','left');
      $this->db->join('tbl_shifts as Shift', 'Shift.id = BaseTbl.office_timing','left');
      if(!empty($searchText)) {
        $this->db->group_start();
        $this->db->like('BaseTbl.name', $searchText, 'both');
        $this->db->or_like('BaseTbl.emp_id', $searchText, 'both');
        $this->db->or_like('BaseTbl.email', $searchText, 'both');
        $this->db->group_end();
      }
      if(!empty($queryParam['office_timing'])) {
        $this->db->where('BaseTbl.office_timing', $queryParam['office_timing']);
      }

      if(!empty($queryParam['department'])) {
        $this->db->where('BaseTbl.department_id', $queryParam['department']);
      }

      if(!empty($queryParam['designation'])) {
        $this->db->where('BaseTbl.designation', $queryParam['designation']);
      }

      if(!empty($queryParam['mobile'])) {
        $this->db->where('BaseTbl.mobile', $queryParam['mobile']);
      }

      if(!empty($queryParam['emp_status'])) {
        $this->db->where('BaseTbl.emp_status', $queryParam['emp_status']);
      }
       $this->db->where('BaseTbl.roleId !=', 1)->where('BaseTbl.company_id', $companyId);
      $this->db->where('BaseTbl.isDeleted', 0);
      $this->db->order_by('BaseTbl.userId', 'DESC');
      $this->db->limit($page, $segment);
      $query = $this->db->get();

      $result = $query->result();
      return $result;
  }

  /**
   * This function is used to get the user roles information
   * @return array $result : This is result of the query
   */
  function getUserRoles()
  {
      $this->db->select('roleId, role');
      $this->db->from('tbl_roles');
      $this->db->where('roleId !=', 1);
      $query = $this->db->get();

      return $query->result();
  }

  /**
   * This function is used to check whether email id is already exist or not
   * @param {string} $email : This is email id
   * @param {number} $userId : This is user id
   * @return {mixed} $result : This is searched result
   */
  function checkEmailExists($email, $userId = 0)
  {
      $this->db->select("email");
      $this->db->from("tbl_users");
      $this->db->where("email", $email);
      $this->db->where("isDeleted", 0);
      if($userId != 0){
          $this->db->where("userId !=", $userId);
      }
      $query = $this->db->get();

      return $query->result();
  }


  /**
   * This function is used to add new user to system
   * @return number $insert_id : This is last inserted id
   */
  function addNewUser($userInfo)
  {
      $this->db->trans_start();
      $this->db->insert('tbl_users', $userInfo);

      $insert_id = $this->db->insert_id();

      $this->db->trans_complete();

      return $insert_id;
  }

  /**
   * This function used to get user information by id
   * @param number $userId : This is user id
   * @return array $result : This is user information
   */
  function getUserInfo($userId)
  {
      $this->db->select('userId, fname, name, email, mobile, roleId, fb_token');
      $this->db->from('tbl_users');
      $this->db->where('isDeleted', 0);
      $this->db->where('roleId !=', 1);
      $this->db->where('userId', $userId);
      $query = $this->db->get();
      return $query->row();
  }



   function getUserFbToken($userId= "")
   {
     $this->db->select('userId, fb_token');
     $this->db->from('tbl_users');
     $this->db->where('userId',$userId);
     $query = $this->db->get();
     $result = $query->result();
     if (count($result) > 0) {
       return $result[0]->fb_token;
     }else {
       return "";
     }
   }



  function getEmployeeList($companyId = "", $userId = "")
  {
     $requestData= $_REQUEST;
     $columns = array(
                   0  => 'userId',
                   1  => 'profile_image',
                   2  => 'name',
                   3  => 'emp_id',
                   4  => 'email',
                   5  => 'status',
                   6  => 'action'
                  );

      $query = $this->db->select('*')->from('tbl_users')->where('roleId !=', ROLE_SYSTEM_ADMIN)->where('company_id', $companyId)->where('userId !=', $userId)->get();
      $totalData = $query->num_rows();
      $totalFiltered = $totalData;
      $this->db->flush_cache();

      $this->db->select('*');
      $this->db->from('tbl_users');
      $this->db->where('roleId !=', ROLE_SYSTEM_ADMIN)->where('company_id', $companyId)->where('userId !=', $userId);
      $this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

      if( !empty($requestData['columns'][0]['search']['value']) ){
         $this->db->like('userId', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
         $this->db->like('profile_image', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
         $this->db->like('name', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
         $this->db->like('emp_id', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
         $this->db->like('email', $requestData['columns'][4]['search']['value']);
      }
      if( !empty($requestData['columns'][5]['search']['value']) ){
         $this->db->like('status', $requestData['columns'][5]['search']['value']);
      }
      if( trim($requestData['columns'][6]['search']['value']) != '' ){
         $this->db->where('action', $requestData['columns'][6]['search']['value']);
      }
      if( !empty($requestData['search']['value']) ){
       $this->db->like('name', $requestData['search']['value']);
      }
      $query = $this->db->get();
      $totalFiltered = $query->num_rows();

      $this->db->flush_cache();

      $this->db->select("*");
      $this->db->from('tbl_users');
      $this->db->where('roleId !=', ROLE_SYSTEM_ADMIN)->where('company_id', $companyId)->where('userId !=', $userId);
      $this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
      $this->db->limit($requestData['length'], $requestData['start']);


      if( !empty($requestData['columns'][0]['search']['value']) ){
          $this->db->like('userId', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
          $this->db->like('profile_image', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
          $this->db->like('name', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
          $this->db->like('emp_id', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
          $this->db->like('email', $requestData['columns'][4]['search']['value']);
      }
      if( !empty($requestData['columns'][5]['search']['value']) ){
          $this->db->like('status', $requestData['columns'][5]['search']['value']);
      }
      if( trim($requestData['columns'][6]['search']['value']) != '' ){
          $this->db->where('action', $requestData['columns'][6]['search']['value']);
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





     function getEmployeeInfo($id= "")
     {
       $this->db->select('A.*, B.name as company_name, Role.role');
       $this->db->from('tbl_users as A');
       $this->db->join('tbl_company as B', 'B.id = A.company_id');
       $this->db->join('tbl_roles as Role', 'Role.roleId = A.roleId','left');
       $this->db->where('A.userId',$id)->where('A.roleId !=', ROLE_SYSTEM_ADMIN);
       $query = $this->db->get();
       $result = $query->result();
       return $result;
     }

     function getManagerDetails($id= "")
     {
       $this->db->select('userId, name, email');
       $this->db->from('tbl_users');
       $this->db->where('userId',$id)->where('roleId', ROLE_MANAGER);
       $query = $this->db->get();
       $result = $query->result();
       if (count($result) > 0) {
         return $result[0];
       }else {
         return NULL;
       }
     }



     function isValidUserId($id= "", $companyId = "")
     {
       $this->db->select('userId');
       $this->db->from('tbl_users');
       $this->db->where('userId',$id);
       $this->db->where('company_id',$companyId)->where('roleId !=', ROLE_SYSTEM_ADMIN);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
         return true;
       }else {
         return false;
       }
     }

     function isValidEmployee($id= "", $companyId = "")
     {
       $this->db->select('id');
       $this->db->from('tbl_users');
       $this->db->where('id',$id);
       $this->db->where('company_id',$companyId);
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

     function edit($EmployeeInfo, $id= "")
     {
       $this->db->where('userId',$id);
       return $this->db->update('tbl_users', $EmployeeInfo);
     }


     /**
      * This function is used to delete the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function deleteEmployee($userId="")
     {
         $this->db->where('userId', $userId);
         return $this->db->delete('tbl_users');

     }

     /**
      * This function is used to blocked the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function blockEmployee($userId, $EmployeeInfo)
     {
         $this->db->where('userId', $userId);
         $this->db->update('tbl_users', $EmployeeInfo);

         return $this->db->affected_rows();
     }


     /**
      * This function is used to active the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function unblockEmployee($userId, $EmployeeInfo)
     {
         $this->db->where('userId', $userId);
         $this->db->update('tbl_users', $EmployeeInfo);
         return $this->db->affected_rows();
     }

     public function searchPrimaryManger($searchText = '', $companyId = "", $userId = "")
     {
       $sql = "SELECT userId, name, fname, lname, email, roleId FROM tbl_users WHERE status = '1' AND company_id = $companyId AND roleId = ".ROLE_MANAGER;
       if ($userId != "") {
         $sql .= " AND userId != $userId ";
         $sql .= " AND !FIND_IN_SET(userId, (SELECT GetFamilyTree(userId) FROM tbl_users WHERE userId=$userId)) ";
       }
       if ($searchText != '') {
         $sql .= " AND (name LIKE '%".$searchText."%' OR email LIKE '%".$searchText."%') ";
       }
       $sql .= " ORDER BY name ASC LIMIT 10";
       $query = $this->db->query($sql);
       return $query->result();
     }

     public function searchSecondryManger($searchText = '', $companyId = "", $pmId = "", $userId = "")
     {
       $sql = "SELECT userId, name, fname, lname, email, roleId FROM tbl_users WHERE status = '1' AND company_id = $companyId AND roleId = ".ROLE_MANAGER;
       if ($pmId != '') {
         $sql .= " AND userId != $pmId ";
         $sql .= " AND !FIND_IN_SET(userId, (SELECT GetParentNodes(userId) FROM tbl_users WHERE userId=$pmId)) ";
       }
       if ($userId != "") {
         $sql .= " AND userId != $userId ";
         $sql .= " AND !FIND_IN_SET(userId, (SELECT GetFamilyTree(userId) FROM tbl_users WHERE userId=$userId)) ";
       }
       if ($searchText != '') {
         $sql .= " AND (name LIKE '%".$searchText."%' OR email LIKE '%".$searchText."%') ";
       }
       $sql .= " ORDER BY name ASC LIMIT 10";
       $query = $this->db->query($sql);
       return $query->result();
     }

     public function isValidManagerId($id, $pmng_id, $companyId)
     {
       if ($pmng_id == 0) {
         return true;
       }
       $sql = "SELECT userId FROM tbl_users WHERE company_id = $companyId AND userId=$id AND (FIND_IN_SET($pmng_id, (SELECT GetFamilyTree(userId) FROM tbl_users WHERE userId=$id)) OR s_manager_id =$pmng_id OR userId =$pmng_id)";
       $query = $this->db->query($sql);
       $data = $query->result();
       if (count($data) > 0) {
         return false;
       }else {
         return true;
       }
     }

     public function isValidSManagerId($id, $smng_id, $companyId)
     {
       if ($smng_id == 0) {
         return true;
       }
       $sql = "SELECT userId FROM tbl_users WHERE company_id = $companyId AND userId=$id AND (FIND_IN_SET($smng_id, (SELECT GetFamilyTree(userId) FROM tbl_users WHERE userId=$id)) OR s_manager_id =$smng_id OR userId =$smng_id)";
       $query = $this->db->query($sql);
       $data = $query->result();
       if (count($data) > 0) {
         return false;
       }else {
         return true;
       }
     }

}
