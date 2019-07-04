<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/AdminController.php';

class Feedback extends AdminController{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('admin/feedback_model'));
    $this->isLoggedIn();

  }


  public function index()
  {
      if ($this->isAdmin() == TRUE) {
        redirect('accessDenied');
      }
      $data['test'] = 'test';
      $this->global['pageTitle'] = 'WoCo : Feedback Listing';
      $this->loadViews("feedback/listData", $this->global, $data, NULL);
  }

  public function getFeedbackList()
  {
    $json_data = $this->feedback_model->getFeedbackList($this->companyId);
    echo json_encode($json_data);
  }

  /**
   * This function is used to delete the user using userId
   * @return boolean $result : TRUE / FALSE
   */
  function deleteFeedback($id="")
  {
      if($this->isAdmin() == TRUE)
      {
          echo(json_encode(array('status'=>'access')));
      }
      else
      {
          $result = $this->feedback_model->deleteFeedback($id);
          if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Feedback deleted successfully'))); }
          else { echo(json_encode(array('status'=>FALSE, 'message' => 'Feedback is not deleted'))); }
      }
  }

}
