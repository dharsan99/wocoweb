<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/FCMPushNotification.php';

class Common_model extends CI_Model{

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

   function getAllUsersFbToken($companyId = "")
   {
     $this->db->select('userId, fb_token');
     $this->db->from('tbl_users');
     $this->db->where('company_id',$companyId);
     $this->db->where('fb_token !=','');
     $query = $this->db->get();
     return $query->result();
   }


    function getCompanyAdminId($companyId = "")
    {
      $this->db->select('userId');
      $this->db->from('tbl_users');
      $this->db->where('company_id',$companyId);
      $this->db->where('roleId', ROLE_ADMIN);
      $this->db->order_by('userId', 'ASC');
      $this->db->limit('1');
      $query = $this->db->get();
      $data = $query->result();
      if (count($data) > 0) {
        return $data[0]->userId;
      }else {
        return 0;
      }
    }

    function getCompanyHrId($companyId = "")
    {
      $this->db->select('userId');
      $this->db->from('tbl_users');
      $this->db->where('company_id',$companyId);
      $this->db->where('roleId', ROLE_HR);
      $this->db->order_by('userId', 'ASC');
      $this->db->limit('1');
      $query = $this->db->get();
      $data = $query->result();
      if (count($data) > 0) {
        return $data[0]->userId;
      }else {
        return $this->getCompanyAdminId($companyId);
      }
    }

   function getAllUsersToken()
   {
     $this->db->select('userId, fb_token');
     $this->db->from('tbl_users');
     $this->db->where('fb_token !=','');
     $query = $this->db->get();
     return $query->result();
   }

   public function sendNotification($sDeviceToken = "", $aPayload = array())
   {
     $FCMPushNotification = new \BD\FCMPushNotification(GOOGLE_FIREBASE_APIKEY);
     if ($sDeviceToken == "") { return; }
    $aOptions = array( 'time_to_live' => 0, 'priority' => 'high' );
    $aResult = $FCMPushNotification->sendToDevice($sDeviceToken, $aPayload, $aOptions);
    //var_dump($aResult);
   }

   public function sendNotifications($sDeviceToken = array(), $aPayload = array())
   {
     $FCMPushNotification = new \BD\FCMPushNotification(GOOGLE_FIREBASE_APIKEY);
     if (count($sDeviceToken) == 0) { return; }
    $aOptions = array( 'time_to_live' => 0, 'priority' => 'high');
    $aResult = $FCMPushNotification->sendToDevices($sDeviceToken, $aPayload, $aOptions);
   }

   public function sendNotificationsAll($topic = 'allDevices', $aPayload = array())
   {
    $FCMPushNotification = new \BD\FCMPushNotification(GOOGLE_FIREBASE_APIKEY);
    $aOptions = array( 'time_to_live' => 0, 'priority' => 'high');
    $aResult = $FCMPushNotification->sendToTopic($topic, $aPayload, $aOptions);
   }


}
