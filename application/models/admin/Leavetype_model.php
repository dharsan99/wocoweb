<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leavetype_model extends CI_Model{

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


  public function createLeavetype($dataArr)
  {
    $this->db->insert('tbl_leave_type', $dataArr);
    return $this->db->insert_id();
  }

  function getLeavetypeList($companyId	 = "")
 {
     $requestData= $_REQUEST;
     $columns = array(
                   0  => 'id',
                   1  => 'title',
                   2  => 'description',
                   3  => 'created',
                   4  => 'created_by',
                   5  => 'action'
                  );
      $query = $this->db->select('tbl_leave_type.*,tbl_users.name as created_by')
                        ->from('tbl_leave_type')
                        ->join('tbl_users', 'tbl_users.userId = tbl_leave_type.created_by', 'left')
                        ->where('tbl_leave_type.company_id', $companyId)
                        ->get();
      $totalData = $query->num_rows();
      $totalFiltered = $totalData;
      $this->db->flush_cache();

      $this->db->select('tbl_leave_type.*,tbl_users.name as created_by');
      $this->db->from('tbl_leave_type');

    if ($requestData['order'][0]['column'] == 4) {
      $this->db->order_by('tbl_users.name', $requestData['order'][0]['dir']);
    }else {
    	$this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
    }

      if( !empty($requestData['columns'][0]['search']['value']) ){
         $this->db->like('tbl_leave_type.id', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
         $this->db->like('tbl_leave_type.title', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
         $this->db->like('tbl_leave_type.description', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
         $this->db->like('tbl_leave_type.created_by', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
         $this->db->like('tbl_users.name', $requestData['columns'][4]['search']['value']);
      }

      if( !empty($requestData['search']['value']) ){
       $this->db->like('tbl_leave_type.title', $requestData['search']['value']);
      }

      $this->db->join('tbl_users', 'tbl_users.userId = tbl_leave_type.created_by', 'left');
      $this->db->where('tbl_leave_type.company_id', $companyId);
      $query = $this->db->get();
      $totalFiltered = $query->num_rows();

      $this->db->flush_cache();

      $this->db->select('tbl_leave_type.*,tbl_users.name as created_by');
      $this->db->from('tbl_leave_type');
        if ($requestData['order'][0]['column'] == 4) {
          $this->db->order_by('tbl_users.name', $requestData['order'][0]['dir']);
        }else {
          $this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
        }
        $this->db->limit($requestData['length'], $requestData['start']);


      if( !empty($requestData['columns'][0]['search']['value']) ){
          $this->db->like('id', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
          $this->db->like('tbl_leave_type.title', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
          $this->db->like('tbl_leave_type.description', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
          $this->db->like('tbl_leave_type.created_by', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
         $this->db->like('tbl_users.name', $requestData['columns'][4]['search']['value']);
      }
      if( !empty($requestData['search']['value']) ){
        $this->db->like('tbl_leave_type.title', $requestData['search']['value']);
      }

        $this->db->join('tbl_users', 'tbl_users.userId = tbl_leave_type.created_by', 'left');
        $this->db->where('tbl_leave_type.company_id', $companyId);
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





     function getLeavetypeInfo($id= "")
     {
       $this->db->select('*');
       $this->db->from('tbl_leave_type');
         $this->db->where('id',$id);
         $query = $this->db->get();
         $result = $query->result();
         return $result;
     }

     function isValidLeavetype($id= "", $companyId = "")
     {
       $this->db->select('id');
       $this->db->from('tbl_leave_type');
       $this->db->where('id',$id);
       $this->db->where('company_id',$companyId);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
         return true;
       }else {
         return false;
       }
     }


     function editLeavetype($leavetypeInfo, $id= "")
     {
       $this->db->where('id',$id);
       return $this->db->update('tbl_leave_type', $leavetypeInfo);
     }


     /**
      * This function is used to delete the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function deleteLeavetype($id="")
     {
         $this->db->where('id', $id);
         return $this->db->delete('tbl_leave_type');

     }

     /**
      * This function is used to blocked the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function blockLeavetype($userId, $adminInfo)
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
