<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends CI_Model{

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


  function getFeedbackList($companyId)
  {
      $requestData= $_REQUEST;
      $columns = array(
                    0  => 'id',
                    1  => 'name',
                    2  => 'note',
                    3  => 'status',
                    4  => 'created',
                    5 =>  'action'
                   );
       $query = $this->db->select('B.id,B.user_id,B.created,B.note,B.status,A.userId,A.name')
                         ->from('tbl_feedback as B')
                         ->join('tbl_users as A', 'A.userId = B.user_id', 'left')
                         ->where('A.company_id', $companyId)
                         ->get();
       $totalData = $query->num_rows();
       $totalFiltered = $totalData;
       $this->db->flush_cache();

       $this->db->select('tbl_feedback.*,tbl_users.name');
       $this->db->from('tbl_feedback');

     if ($requestData['order'][0]['column'] == 4) {
       $this->db->order_by('tbl_users.name', $requestData['order'][0]['dir']);
     }else {
      $this->db->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
     }

       if( !empty($requestData['columns'][0]['search']['value']) ){
          $this->db->like('id', $requestData['columns'][0]['search']['value']);
       }
       if( !empty($requestData['columns'][1]['search']['value']) ){
          $this->db->like('name', $requestData['columns'][1]['search']['value']);
       }
       if( !empty($requestData['columns'][2]['search']['value']) ){
          $this->db->like('note', $requestData['columns'][2]['search']['value']);
       }
       if( !empty($requestData['columns'][3]['search']['value']) ){
          $this->db->like('status', $requestData['columns'][3]['search']['value']);
       }
       if( !empty($requestData['columns'][4]['search']['value']) ){
          $this->db->like('name', $requestData['columns'][4]['search']['value']);
       }

       if( !empty($requestData['search']['value']) ){
        $this->db->like('name', $requestData['search']['value']);
       }

       $this->db->join('tbl_users', 'tbl_users.userId = tbl_feedback.user_id', 'left');
       $this->db->where('tbl_users.company_id', $companyId);
       $query = $this->db->get();
       $totalFiltered = $query->num_rows();

       $this->db->flush_cache();

       $this->db->select('B.id,B.created,B.user_id,B.note,B.status,A.userId,A.name');
       $this->db->from('tbl_feedback as B');
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
            $this->db->like('name', $requestData['columns'][1]['search']['value']);
         }
         if( !empty($requestData['columns'][2]['search']['value']) ){
            $this->db->like('note', $requestData['columns'][2]['search']['value']);
         }
         if( !empty($requestData['columns'][3]['search']['value']) ){
            $this->db->like('status', $requestData['columns'][3]['search']['value']);
         }

         if( !empty($requestData['columns'][4]['search']['value']) ){
            $this->db->like('name', $requestData['columns'][4]['search']['value']);
         }
         if( !empty($requestData['search']['value']) ){
          $this->db->like('name', $requestData['search']['value']);
         }

         $this->db->join('tbl_users as A', 'A.userId = B.user_id', 'left');
         $this->db->where('A.company_id', $companyId);
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





     function deleteFeedback($id="")
     {
       $this->db->where('id', $id);
         return $this->db->delete('tbl_feedback');

     }



}
