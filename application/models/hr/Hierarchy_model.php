<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hierarchy_model extends CI_Model{

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

  public function createManager($dataArr)
  {
    $this->db->insert('tbl_users', $dataArr);
    $id = $this->db->insert_id();
    $this->acl_model->insertAllUserPermissions($id, ROLE_MANAGER, $dataArr['company_id'], $dataArr['createdBy']);
    return $id;
  }

  function getFullManagerTree($companyId, $managerId)
  {
      $this->db->select('A.userId, A.name, A.email, A.status, A.profile_image, A.roleId, B.role');
      $this->db->from('tbl_users as A');
      $this->db->join('tbl_roles as B', 'B.roleId = A.roleId', 'left');
      $this->db->where('A.company_id',$companyId)->where('A.manager_id', $managerId);
      $this->db->where('A.userId !=', $managerId);
      //$roles = array(ROLE_ADMIN);
      //$this->db->where_not_in('A.roleId', $roles);
      $query = $this->db->get();
      $data = $query->result();
      $this->db->flush_cache();
      foreach ($data as $key => $value) {
        $tempData = $this->getFullManagerTree($companyId, $value->userId);
        if (count($tempData) > 0) {
          $data[$key]->relationship = '111';
        }else {
          $data[$key]->relationship = '110';
        }
        $data[$key]->children = $tempData;
      }
      return $data;
  }

  function getManagerTree($companyId, $managerId)
  {
      $this->db->select('A.userId, A.name, A.email, A.status, A.profile_image, A.roleId, B.role');
      $this->db->from('tbl_users as A');
      $this->db->join('tbl_roles as B', 'B.roleId = A.roleId', 'left');
      $this->db->where('A.company_id',$companyId)->where('A.manager_id', $managerId);
      $this->db->where('A.userId !=', $managerId);
      //$roles = array(ROLE_ADMIN);
      //$this->db->where_not_in('A.roleId', $roles);
      $query = $this->db->get();
      $data = $query->result();
      $this->db->flush_cache();
      foreach ($data as $key => $value) {
        $tempData = $this->getChildCount($companyId, $value->userId);
        if (count($tempData) > 0) {
          $data[$key]->relationship = '111';
        }else {
          $data[$key]->relationship = '110';
        }
        //$data[$key]->children = $tempData;
      }
      return $data;
  }

  function getChildCount($companyId, $managerId)
  {
      $this->db->select('A.userId');
      $this->db->from('tbl_users as A');
      $this->db->join('tbl_roles as B', 'B.roleId = A.roleId', 'left');
      $this->db->where('A.company_id',$companyId)->where('A.manager_id', $managerId);
      $this->db->where('A.userId !=', $managerId);
      $query = $this->db->get();
      $data = $query->result();
      return $data;
  }


  function getUserInfo($companyId, $userId)
  {
      $this->db->select('A.userId, A.name, A.email, A.status, A.profile_image, A.roleId, B.role');
      $this->db->from('tbl_users as A');
      $this->db->join('tbl_roles as B', 'B.roleId = A.roleId', 'left');
      $this->db->where('A.company_id',$companyId);
      if ($userId != 0) {
        $this->db->where('A.userId', $userId);
      }else {
        $this->db->where('A.roleId',ROLE_ADMIN);
        $this->db->order_by('userId', 'ASC');
        $this->db->limit('1');
      }
      $query = $this->db->get();
      $data = $query->result();
      return $data[0];
  }

     function getManagerInfo($id= "")
     {
       $this->db->select('A.*, B.name as company_name');
       $this->db->from('tbl_users as A');
       $this->db->join('tbl_company as B', 'B.id = A.company_id');
       $this->db->where('A.userId',$id)->where('A.roleId', ROLE_MANAGER);
       $query = $this->db->get();
       $result = $query->result();
       return $result;
     }

     function isValidUserId($id= "", $companyId = "")
     {
       $this->db->select('userId');
       $this->db->from('tbl_users');
       $this->db->where('userId',$id);
       $this->db->where('company_id',$companyId)->where('roleId', ROLE_MANAGER);
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


     function edit($ManagerInfo, $id= "")
     {
       $this->db->where('userId',$id);
       return $this->db->update('tbl_users', $ManagerInfo);
     }


     /**
      * This function is used to delete the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function deleteManager($userId="")
     {
       $this->db->where('user_id', $userId);
       $this->db->where('role_id', ROLE_MANAGER);
       $this->db->delete('tbl_permissions_role');
       $this->db->flush_cache();
       $managerData = $this->getManagerInfo($userId);
       if (count($managerData) > 0) {
         $this->db->flush_cache();
         $this->db->where('manager_id',$userId);
         $this->db->update('tbl_users', array('manager_id' => $managerData[0]->manager_id));
       }
       $this->db->flush_cache();
       $this->db->where('s_manager_id',$userId);
       $this->db->update('tbl_users', array('s_manager_id' => 0));
       $this->db->flush_cache();
       $this->db->where('userId',$userId);
       return $this->db->update('tbl_users', array('roleId' => 5));
     }

     /**
      * This function is used to blocked the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function blockManager($userId, $HrInfo)
     {
         $this->db->where('userId', $userId);
         $this->db->update('tbl_users', $HrInfo);

         return $this->db->affected_rows();
     }


     /**
      * This function is used to active the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function unblockManager($userId, $HrInfo)
     {
         $this->db->where('userId', $userId);
         $this->db->update('tbl_users', $HrInfo);

         return $this->db->affected_rows();
     }


     function isValidEmpId($id= "", $companyId = "")
     {
       $this->db->select('userId');
       $this->db->from('tbl_users');
       $this->db->where('userId',$id);
       $this->db->where('company_id',$companyId)->where('roleId', 5)->where('status', 1);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
         return true;
       }else {
         return false;
       }
     }


    public function searchEmployee($searchText = '', $companyId = "")
    {
      $sql = "SELECT userId, name, fname, lname, email, roleId FROM tbl_users WHERE status = '1' AND company_id = $companyId AND roleId = 5";
      if ($searchText != '') {
        $sql .= " AND (name LIKE '%".$searchText."%' OR email LIKE '%".$searchText."%') ";
      }
      $sql .= " ORDER BY name ASC LIMIT 10";
      $query = $this->db->query($sql);
      return $query->result();
    }

    public function searchManager($searchText = '', $companyId = "")
    {
      $sql = "SELECT userId, name, fname, lname, email, roleId FROM tbl_users WHERE status = '1' AND company_id = $companyId AND roleId IN (2, 3, 4)";
      if ($searchText != '') {
        $sql .= " AND (name LIKE '%".$searchText."%' OR email LIKE '%".$searchText."%') ";
      }
      $sql .= " ORDER BY name ASC LIMIT 10";
      $query = $this->db->query($sql);
      return $query->result();
    }


}
