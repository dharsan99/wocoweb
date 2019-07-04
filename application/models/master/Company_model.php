<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function test($value='')
  {
    return $value;
  }


  /**
   * This function is used to add new user to system
   * @return number $insert_id : This is last inserted id
   */
  function addNewCompany($companyInfo)
  {
      $this->db->trans_start();
      $this->db->insert('tbl_company', $companyInfo);

      $insert_id = $this->db->insert_id();

      $this->db->trans_complete();

      return $insert_id;
  }



  /**
   * This function is used to get the user listing count
   * @param string $searchText : This is optional search text
   * @return number $count : This is row count
   */
  function companyListingCount($searchText = '')
  {
      $this->db->select('*');
      $this->db->from('tbl_company as A');
      if(!empty($searchText)) {
          $likeCriteria = "(A.name  LIKE '%".$searchText."%'
                          OR  A.website  LIKE '%".$searchText."%'
                          OR  A.address  LIKE '%".$searchText."%')";
          $this->db->where($likeCriteria);
      }
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
  function companyListing($searchText = '', $page, $segment)
  {
    $this->db->select('*');
    $this->db->from('tbl_company as A');
    if(!empty($searchText)) {
        $likeCriteria = "(A.name  LIKE '%".$searchText."%'
                        OR  A.website  LIKE '%".$searchText."%'
                        OR  A.address  LIKE '%".$searchText."%')";
        $this->db->where($likeCriteria);
    }
      $this->db->order_by('A.id', 'DESC');
      $this->db->limit($page, $segment);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
  }
  function getcompanyInfo($id= "")
  {
    $this->db->select('*');
    $this->db->from('tbl_company');
      $this->db->where('id',$id);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
  }
  function editCompany($companyInfo, $id= "")
  {
    $this->db->where('id',$id);
    return $this->db->update('tbl_company', $companyInfo);
  }


  /**
   * This function is used to delete the user information
   * @param number $userId : This is user id
   * @return boolean $result : TRUE / FALSE
   */
  function deleteCompany($id="")
  {
      $this->db->where('id', $id);
      return $this->db->delete('tbl_company');

  }


  /**
   * This function is used to blocked the user information
   * @param number $userId : This is user id
   * @return boolean $result : TRUE / FALSE
   */
  function blockCompany($id, $companyInfo)
  {
      $this->db->where('id', $id);
      $this->db->update('tbl_company', $companyInfo);

      return $this->db->affected_rows();
  }



  /**
   * This function is used to active the user information
   * @param number $userId : This is user id
   * @return boolean $result : TRUE / FALSE
   */
  function activeCompany($id, $companyInfo)
  {
      $this->db->where('id', $id);
      $this->db->update('tbl_company', $companyInfo);

      return $this->db->affected_rows();
  }


}
