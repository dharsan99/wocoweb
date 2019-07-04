<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */

class User_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */

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

    function userListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
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
    function userListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
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
    function getDesignationList($companyId="")
    {
        $this->db->select('*');
        $this->db->from('tbl_designation');
        $this->db->where('company_id', $companyId);
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
        $this->db->select('title');
        $this->db->from('tbl_employment_types');
        $this->db->where('company_id', $companyId);
        $query = $this->db->get();
        return $query->result();
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

    function getEmployeeTeam($companyId="")
    {
        $this->db->select('*');
        $this->db->from('tbl_teams');
        $this->db->where('company_id', $companyId);
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

    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfo($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
		$this->db->where('roleId !=', 1);
        $this->db->where('userId', $userId);
        $query = $this->db->get();

        return $query->row();
    }


    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);

        return TRUE;
    }



    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);

        return $this->db->affected_rows();
    }


    /**
     * This function is used to match users password for change password
     * @param number $userId : This is user id
     */
    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');

        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);

        return $this->db->affected_rows();
    }


    /**
     * This function is used to get user login history
     * @param number $userId : This is user id
     */
    function loginHistoryCount($userId, $searchText, $fromDate, $toDate)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        if($userId >= 1){
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->from('tbl_last_login as BaseTbl');
        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * This function is used to get user login history
     * @param number $userId : This is user id
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function loginHistory($userId, $searchText, $fromDate, $toDate, $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        $this->db->from('tbl_last_login as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        if($userId >= 1){
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfoById($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
        $this->db->where('userId', $userId);
        $query = $this->db->get();

        return $query->row();
    }

    /**
     * This function used to get user information by id with role
     * @param number $userId : This is user id
     * @return aray $result : This is user information
     */
    function getUserInfoWithRole($userId)
    {
        $this->db->select('BaseTbl.*, Roles.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Roles','Roles.roleId = BaseTbl.roleId');
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();

        return $query->row();
    }


// dashboard
// dashboard

    function activeusercount($companyId)
     {
       $this->db->select('userId');
       $this->db->from('tbl_users');
       $this->db->where('company_id', $companyId);
       $query = $this->db->get();
       return $query->num_rows();
  }
    function activeuserscount($companyId)
     {
       $this->db->select('userId');
       $this->db->from('tbl_users');
       $this->db->where('company_id', $companyId);
       $this->db->where('status', 1);
       $query = $this->db->get();
       return $query->num_rows();
  }

  function getmale($companyId) {
        $this->db->select('gender');
        $this->db->from('tbl_users');
        $this->db->where('gender', 'Male');
       $this->db->where('company_id', $companyId);
        $query = $this->db->get();
        return $query->num_rows();
   }
   function getfemale($companyId) {
       $this->db->select('gender');
       $this->db->from('tbl_users');
       $this->db->where('gender', 'Female');
      $this->db->where('company_id', $companyId);
       $query = $this->db->get();
       return $query->num_rows();
   }


   function empstatuscount($companyId)
    {
      $this->db->select('emp_status');
      $this->db->from('tbl_users');
      $this->db->where('company_id', $companyId);
      $query = $this->db->get();
      return $query->num_rows();
 }



 function getempstatus($companyId)
     {
       $color = "Right( MD5(A.id), 6 ) as color";
       $this->db->select("A.id, A.title, COUNT(B.userId) as total, $color");
       $this->db->from('tbl_employment_status as A');
       $this->db->join('tbl_users as B', 'A.id = B.emp_status', 'left');
       $this->db->where('A.company_id', $companyId);
       $this->db->group_by('A.id');
       $query = $this->db->get();
       $result = $query->result();
       return $result;
     }

 function gettodaylist($companyId)
     {


       $date = new DateTime("now");
       $curr_date = $date->format('Y-m-d');
       $this->db->select('*');
       $this->db->from('tbl_attendance as A');
       $this->db->where('DATE(checkin_date)',$curr_date);
       $this->db->where('company_id', $companyId);
       $this->db->group_by('A.user_id');
       $query = $this->db->get();
       return $query->num_rows();
     }


     function getpercent($companyId)
     {
       $totalUsers = $this->activeuserscount($companyId);
       $this->db->flush_cache();
       $todayUsers = $this->gettodaylist($companyId);
       $percent =ROUND(($todayUsers / $totalUsers) * 100);
       return $percent;

     }

     function getsitetype($companyId,$site_type)
         {
           $date = new DateTime("now");
           $curr_date = $date->format('Y-m-d ');
           $this->db->select("A.id, A.site_type, COUNT(B.userId) as total");
           $this->db->from('tbl_attendance as A');
           $this->db->join('tbl_users as B', 'A.id = B.emp_status', 'left');
           $this->db->where('DATE(checkin_date)',$curr_date);
           $this->db->where('site_type',$site_type);
           $this->db->where('A.company_id', $companyId);
           $this->db->group_by('A.user_id');
           $query = $this->db->get();
           return $query->num_rows();
         }

         function getbirthday($companyId)
         {
            $date = date("m-d");
            $this->db->select("userId, name, email, profile_image,dob, status, emp_id,gender");
            $this->db->from('tbl_users');
            $this->db->like('dob',$date);
            $this->db->where('company_id', $companyId);
            $query = $this->db->get();
            $result = $query->result();
           return $result;
        }

    //     public function monthlylogin($companyId)
    //     {
    //
    //   $this->db->select('*');
    //   $this->db->from('tbl_attendance');
    //   $this->db->where('MONTH(checkin_date)', date('m')); //For current month
    //   $this->db->where('YEAR(checkin_date)', date('Y')); // For current year
    //   $this->db->where('company_id', $companyId);
    //   $this->db->group_by('A.user_id');
    //    echo $this->db->last_query();
    //    $res   = $query->result();
    //   return $res->num_rows();
    //
    // }

}
