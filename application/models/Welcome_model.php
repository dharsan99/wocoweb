<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login_model (Login Model)
 * Login model class to get to authenticate user credentials
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Welcome_model extends CI_Model
{

  public function insertContactData($data)
  {
    $this->db->insert('tbl_contact_us', $data);
    return $this->db->insert_id();
  }

}

?>
