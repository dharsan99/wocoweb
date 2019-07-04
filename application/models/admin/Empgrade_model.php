<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empgrade_model extends CI_Model{

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


  public function createEmpgrade($dataArr)
  {
    $this->db->insert('tbl_grades', $dataArr);
    return $this->db->insert_id();
  }

  function getEmpgradeList($companyId	 = "")
 {
     $requestData= $_REQUEST;
     $columns = array(
                   0  => 'id',
                   1  => 'title',
                   2  => 'leave_credits',
                   3  => 'description',
                   4  => 'created',
                   5  => 'created_by',
                   6  => 'action'
                  );
      $query = $this->db->select('tbl_grades.*,tbl_users.name as created_by')
                        ->from('tbl_grades')
                        ->join('tbl_users', 'tbl_users.userId = tbl_grades.created_by', 'left')
                        ->where('tbl_grades.company_id', $companyId)
                        ->get();
      $totalData = $query->num_rows();
      $totalFiltered = $totalData;
      $this->db->flush_cache();

      $this->db->select('tbl_grades.*,tbl_users.name as created_by');
      $this->db->from('tbl_grades');

    if ($requestData['order'][0]['column'] == 5) {
      $this->db->order_by('tbl_users.name', $requestData['order'][0]['dir']);
    }else {
    	$this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
    }

      if( !empty($requestData['columns'][0]['search']['value']) ){
         $this->db->like('tbl_grades.id', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
         $this->db->like('tbl_grades.title', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
         $this->db->like('tbl_grades.leave_credits', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
         $this->db->like('tbl_grades.description', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
         $this->db->like('tbl_grades.created_by', $requestData['columns'][4]['search']['value']);
      }
      if( !empty($requestData['columns'][5]['search']['value']) ){
         $this->db->like('tbl_users.name', $requestData['columns'][5]['search']['value']);
      }

      if( !empty($requestData['search']['value']) ){
       $this->db->like('tbl_grades.title', $requestData['search']['value']);
      }

      $this->db->join('tbl_users', 'tbl_users.userId = tbl_grades.created_by', 'left');
      $this->db->where('tbl_grades.company_id', $companyId);
      $query = $this->db->get();
      $totalFiltered = $query->num_rows();

      $this->db->flush_cache();

      $this->db->select('tbl_grades.*,tbl_users.name as created_by');
      $this->db->from('tbl_grades');
        if ($requestData['order'][0]['column'] == 5) {
          $this->db->order_by('tbl_users.name', $requestData['order'][0]['dir']);
        }else {
          $this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
        }
        $this->db->limit($requestData['length'], $requestData['start']);


      if( !empty($requestData['columns'][0]['search']['value']) ){
          $this->db->like('id', $requestData['columns'][0]['search']['value']);
      }
      if( !empty($requestData['columns'][1]['search']['value']) ){
          $this->db->like('tbl_grades.title', $requestData['columns'][1]['search']['value']);
      }
      if( !empty($requestData['columns'][2]['search']['value']) ){
          $this->db->like('tbl_grades.leave_credits', $requestData['columns'][2]['search']['value']);
      }
      if( !empty($requestData['columns'][3]['search']['value']) ){
          $this->db->like('tbl_grades.description', $requestData['columns'][3]['search']['value']);
      }
      if( !empty($requestData['columns'][4]['search']['value']) ){
          $this->db->like('tbl_grades.created_by', $requestData['columns'][4]['search']['value']);
      }
      if( !empty($requestData['columns'][5]['search']['value']) ){
         $this->db->like('tbl_users.name', $requestData['columns'][5]['search']['value']);
      }

      if( !empty($requestData['search']['value']) ){
        $this->db->like('tbl_grades.title', $requestData['search']['value']);
      }

        $this->db->join('tbl_users', 'tbl_users.userId = tbl_grades.created_by', 'left');
        $this->db->where('tbl_grades.company_id', $companyId);
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





     function getEmpgradeInfo($id= "")
     {
       $this->db->select('*');
       $this->db->from('tbl_grades');
         $this->db->where('id',$id);
         $query = $this->db->get();
         $result = $query->result();
         return $result;
     }

     function isValidEmpgrade($id= "", $companyId = "")
     {
       $this->db->select('id');
       $this->db->from('tbl_grades');
       $this->db->where('id',$id);
       $this->db->where('company_id',$companyId);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
         return true;
       }else {
         return false;
       }
     }


     function editEmpgrade($empgradeInfo, $id= "")
     {
       $this->db->where('id',$id);
       return $this->db->update('tbl_grades', $empgradeInfo);
     }


     /**
      * This function is used to delete the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
     function deleteEmpgrade($id="")
     {
         $this->db->where('id', $id);
         return $this->db->delete('tbl_grades');

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
