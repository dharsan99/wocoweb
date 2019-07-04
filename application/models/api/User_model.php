<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    var $client_service = "woco-client";
    var $auth_key       = "d1NIKX1OMV1zIzlNeXpANixZeVdAS1J6c0ViVTo7clUoTyVgJnNhdWJ3WDhSdT9G";

    public function check_auth_client(){
        $client_service = $this->input->get_request_header('Client-Service', TRUE);
        $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);
        if($client_service == $this->client_service && $auth_key == $this->auth_key){
            return NULL;
        } else {
            return array('status' => 401,'message' => 'Unauthorized.');
        }
    }

    public function auth()
    {
        $user_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('AccessToken', TRUE);
        $q  = $this->db->select('expired_at')->from('tbl_users_authentication')->where('user_id',$user_id)->where('token',$token)->get()->row();
        if($q == ""){
            return array('status' => 405,'message' => 'Your session has been expired.');
        } else {
          //  if($q->expired_at < date('Y-m-d H:i:s')){
            if(FALSE){
                return array('status' => 405,'message' => 'Your session has been expired.');
            } else {
                $updated_at = date('Y-m-d H:i:s');
                $expired_at = date("Y-m-d H:i:s", strtotime('+72 hours'));
                $this->db->where('user_id',$user_id)->where('token',$token)->update('tbl_users_authentication',array('expired_at' => $expired_at,'updated_at' => $updated_at));
                return array('status' => 200,'message' => 'Authorized.');
            }
        }
    }

    public function login($username,$password,$type,$fbToken, $deviceId)
    {
      $companyTitle = "(SELECT name FROM tbl_company WHERE tbl_company.id = BaseTbl.company_id) as company_name";
      $this->db->select("BaseTbl.*, Roles.role, $companyTitle");
      $this->db->from('tbl_users as BaseTbl');
      $this->db->join('tbl_roles as Roles','Roles.roleId = BaseTbl.roleId');
      if ($type == "email") {
        $this->db->where('BaseTbl.email', $username);
      }else {
        $this->db->where('BaseTbl.mobile', $username);
      }
      $this->db->where('BaseTbl.roleId !=', ROLE_SYSTEM_ADMIN);
      $this->db->where('BaseTbl.isDeleted', 0);
      $query = $this->db->get();
      $user = $query->row();
      if(!empty($user)){
          if(verifyHashedPassword($password, $user->password)){
              $id = $user->userId;

              if ($user->email_verified != 1 && $type == "email") {
                return array('status' => 204,'message' => 'Your email not verified.');
              }
              if ($user->mobile_verified != 1 && $type == "phone") {
                return array('status' => 204,'message' => 'Your mobile number not verified.');
              }
              if ($user->status != 1) {
                return array('status' => 204,'message' => "Your account is pending or may be suspended.\nContact to your manager.");
              }
              $last_login = date('Y-m-d H:i:s');
              $token = $this->getToken(64);
              $expired_at = date("Y-m-d H:i:s", strtotime('+72 hours'));
              $this->db->trans_start();
              $device_details = "";
              if (!empty($this->input->post('device_details'))) {
                $device_details = $this->input->post('device_details');
              }
              $sessionData = array('role' => $user->roleId, 'roleText' => $user->role, 'name' => $user->name, "companyId" => $user->company_id );
              $loginInfo = array("userId"=>$id, "sessionData" => json_encode($sessionData), "machineIp"=>$_SERVER['REMOTE_ADDR'], "userAgent"=>getBrowserAgent(),"device_id"=>$deviceId, "agentString"=>$this->agent->agent_string(), "platform"=>$device_details);
              $this->db->where('userId',$id)->update('tbl_users',array('last_login' => $last_login, "fb_token"=>$fbToken, 'device_details' => $device_details));
              $this->db->insert('tbl_last_login', $loginInfo);
              $this->db->where('user_id',$id)->delete('tbl_users_authentication');
              $this->db->insert('tbl_users_authentication',array('user_id' => $id,'token' => $token,'expired_at' => $expired_at));
              if ($this->db->trans_status() === FALSE){
                 $this->db->trans_rollback();
                 return array('status' => 500,'message' => 'Internal server error.');
              } else {
                 $this->db->trans_commit();
                 $user->login_token = $token;
                 $data['userInfo']  = $user;
                 $data['shiftData']   = $this->getShiftData($user->company_id, $user->office_timing);
                 $data['devices']   = $this->getAllDevices($user->company_id);
                 $data['locations'] = $this->getAllLocations($user->company_id);
                 return array('status' => 200,'message' => 'Successfully login.','data' => $data);
              }

          } else {
              return array('status' => 204,'message' => 'Wrong password.');
          }
      } else {
          return array('status' => 204,'message' => 'Username not found.');
      }
    }

    public function validateUser($username,$type)
    {
      $companyTitle = "(SELECT name FROM tbl_company WHERE tbl_company.id = BaseTbl.company_id) as company_name";
      $this->db->select("BaseTbl.*, Roles.role, $companyTitle");
      $this->db->from('tbl_users as BaseTbl');
      $this->db->join('tbl_roles as Roles','Roles.roleId = BaseTbl.roleId');
      if ($type == "email") {
        $this->db->where('BaseTbl.email', $username);
      }else {
        $this->db->where('BaseTbl.mobile', $username);
      }
      $this->db->where('BaseTbl.roleId !=', ROLE_SYSTEM_ADMIN);
      $this->db->where('BaseTbl.isDeleted', 0);
      $query = $this->db->get();
      $user = $query->row();
      if(!empty($user)){
          return array('status' => 200,'message' => 'Success','data' => $user);
      } else {
          return array('status' => 204,'message' => 'Username not found.');
      }
    }

    public function logout()
    {
        $user_id  = $this->input->get_request_header('User-ID', TRUE);
        $token    = $this->input->get_request_header('AccessToken', TRUE);
        $this->db->where('user_id',$user_id)->where('token',$token)->delete('tbl_users_authentication');

        $this->db->flush_cache();
        $this->db->where('userId',$user_id);
        $this->db->update('tbl_users', array('fb_token' => ''));

        return array('status' => 200,'message' => 'Successfully logout.');
    }

    public function getLocationData($company_id)
    {
      $data['locations'] = $this->getAllLocations($company_id);
      $data['devices']   = $this->getAllDevices($company_id);
      return array('status' => 200,'message' => 'Success','data' => $data);
    }

    public function getProfileData()
    {
        $user_id  = $this->input->get_request_header('User-ID', TRUE);
        $manager  = "(SELECT X.name FROM tbl_users as X WHERE X.userId = A.head) as department_head ";
        $teamLead = "(SELECT Y.name FROM tbl_users as Y WHERE Y.userId = B.head) as team_head ";

        $this->db->select("U.userId, A.title as department, $manager, B.title as team, $teamLead, C.title as shift, D.title as office, D.location_id as office_location, E.title as emp_grade, F.title as emp_status, G.title as emp_type, H.name as company_name, I.title as designation");
        $this->db->from('tbl_users as U');
        $this->db->join('tbl_departments as A','A.id = U.department_id', 'left');
        $this->db->join('tbl_teams as B','B.id = U.team_id', 'left');
        $this->db->join('tbl_shifts as C','C.id = U.office_timing', 'left');
        $this->db->join('tbl_offices as D','D.id = U.office_id', 'left');
        $this->db->join('tbl_grades as E','E.id = U.emp_grade', 'left');
        $this->db->join('tbl_employment_status as F','F.id = U.emp_status', 'left');
        $this->db->join('tbl_employment_types as G','G.id = U.emp_type', 'left');
        $this->db->join('tbl_company as H','H.id = U.company_id', 'left');
        $this->db->join('tbl_designation as I','I.id = U.designation', 'left');
        $this->db->where('U.userId', $user_id);
        $this->db->where('U.roleId !=', ROLE_SYSTEM_ADMIN);
        $this->db->where('U.isDeleted', 0);
        $query = $this->db->get();
        $user = $query->row();
        if(!empty($user)){
            return array('status' => 200,'message' => 'Success','data' => $user);
        } else {
            return array('status' => 204,'message' => 'Username not found.');
        }
    }

    function getToken($randomIdLength = 10)
    {
        $token = '';
        do {
            $bytes = generate_password($randomIdLength);
            $token .= str_replace(
                ['.','/','='],
                '',
                base64_encode($bytes)
            );
        } while (strlen($token) < $randomIdLength);
        return $token;
    }

    function getAllDevices($companyId='')
    {
      $this->db->select('*');
      $this->db->from('tbl_devices');
      $this->db->where('company_id', $companyId);
      $query = $this->db->get();
      return $query->result();
    }

    function getAllLocations($companyId='')
    {
      $this->db->select('*');
      $this->db->from('tbl_locations');
      $this->db->where('company_id', $companyId);
      $query = $this->db->get();
      return $query->result();
    }

    function getShiftData($companyId='' , $shiftId = '')
    {
      $row  = $this->db->select('*')->from('tbl_shifts')->where('id',$shiftId)->where('company_id',$companyId)->get()->row();
      return $row;
    }

    public function changePassword($user_id='', $password = '', $newPassword = '')
    {
      $this->db->select("*");
      $this->db->from('tbl_users');
      $this->db->where('userId', $user_id);
      $this->db->where('roleId !=', ROLE_SYSTEM_ADMIN);
      $query = $this->db->get();
      $user = $query->row();
      if(!empty($user)){
          if(verifyHashedPassword($password, $user->password)){

            if (verifyHashedPassword($password, getHashedPassword($newPassword))) {
              return array('status' => 401,'message' => 'For security reasons, you can\'t use an old password. Please enter a new password.');
            }
            $this->db->flush_cache();
            $this->db->where('userId', $user_id);
            $res = $this->db->update('tbl_users', array('password' => getHashedPassword($newPassword)));
            if ($res) {
              return array('status' => 200,'message' => 'Password Updated Successfully.');
            }else {
              return array('status' => 401,'message' => 'Unable to change your password.');
            }
          }else {
            return array('status' => 401,'message' => 'Wrong old password.');
          }
        }else {
          return array('status' => 401,'message' => 'User not existing');
        }
    }


    public function resetNewPassword($user_id='', $password = '')
    {
      $this->db->where('userId', $user_id);
      $res = $this->db->update('tbl_users', array('password' => getHashedPassword($password)));
      if ($res) {
        return array('status' => 200,'message' => 'Password Reset Successfully.');
      }else {
        return array('status' => 401,'message' => 'Unable to reset your password.');
      }
    }


    public function updateProfile($userInfo, $user_id, $companyId)
    {
      $this->db->where('userId', $user_id);
      $result = $this->db->update('tbl_users', $userInfo);
      if ($result) {
        $this->db->flush_cache();
        $row  = $this->db->select('*')->from('tbl_users')->where('userId',$user_id)->where('company_id',$companyId)->get()->row();
        return array('status' => 200,'message' => 'Your Profile Updated Successfully.', 'data' => $row);
      }else {
        return array('status' => 401,'message' => 'Unable to update your profile.');
      }
    }


    public function saveFeedBack($userInfo)
    {
      $this->db->insert('tbl_feedback', $userInfo);
      $id = $this->db->insert_id();
      if ($id > 0) {
        $userInfo['id'] = $id;
        return array('status' => 200,'message' => 'Thanks for your feedback', 'data' => $userInfo);
      }else {
        return array('status' => 401,'message' => 'Unable to submit your feedback.');
      }
    }

    public function checkRatedDay($userId, $companyId, $date)
    {
      $this->db->select('id');
      $this->db->from('tbl_rate_day');
      $this->db->where('user_id', $userId);
      $this->db->where('company_id', $companyId);
      $this->db->where('rating_date', $date);
      $query = $this->db->get();
      $data = $query->result();
      if (count($data) > 0) {
        return true;
      }else {
        return false;
      }
    }

    public function saveRateDay($userInfo)
    {
      $this->db->insert('tbl_rate_day', $userInfo);
      $id = $this->db->insert_id();
      if ($id > 0) {
        $userInfo['id'] = $id;
        return array('status' => 200,'message' => 'Thanks for your reting', 'data' => $userInfo);
      }else {
        return array('status' => 401,'message' => 'Unable to submit your rating.');
      }
    }

}
