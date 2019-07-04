<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/AdminController.php';

class Shift extends AdminController{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('admin/shift_model'));
    $this->isLoggedIn();

  }


  public function index()
  {
      if ($this->isAdmin() == TRUE) {
        redirect('accessDenied');
      }
      $data['test'] = 'test';
      $this->global['pageTitle'] = 'WoCo : Shift Listing';
      $this->loadViews("shift/listData", $this->global, $data, NULL);
  }

  public function getshiftList()
  {
    $json_data = $this->shift_model->getshiftList($this->companyId, $this->vendorId);
    echo json_encode($json_data);
  }


  /**
   * This function is used to load the add new form
   */
  function addNew()
  {
    if($this->isAdmin() == TRUE)
    {
        echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
        die();
    }

    $company_id = $this->companyId;
    $title      = $this->input->post('title');
    $description= $this->input->post('description');
    $shift_type = $this->input->post('shift_type');
    $start_time = $this->input->post('start_time');
    $end_time   = $this->input->post('end_time');
    $num_hours  = $this->input->post('num_hours');

    if (!$this->shift_model->isValidCompany($company_id)) {
      echo json_encode(array('status' => 0, 'message' => "Your company doesn't exist or deactivated." ));
      die();
    }
    if ($this->shift_model->isTimeExisting($title, $this->companyId, $start_time, $end_time)) {
      echo json_encode(array('status' => 0, 'message' => "Entered title alredy registered." ));
      die();
    }

    $dataArr = array(
      'company_id'  => $company_id,
      'title'       => $title,
      'description' => $description,
      'shift_type'  => $shift_type,
      'created_by'  => $this->vendorId
    );
    if ($shift_type == 1) {
      $dataArr['start_time'] = $start_time;
      $dataArr['end_time']   = $end_time;
    }else {
      $dataArr['num_hours']  = $num_hours;
    }

    $result = $this->shift_model->createshift($dataArr);
    if ($result > 0) {
       echo json_encode(array('status' => 1, 'message' => "New Office Time Successfully Created" ));
    }else {
      echo json_encode(array('status' => 0, 'message' => "Unable to create Office Time." ));
    }

  }

    /**
     * This function is used to edit the user information
     */
    function edit($id = "")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
            if(!isset($_POST['title']))
            {
                if (!$this->shift_model->isValidShiftId($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }
                $data = $this->shift_model->getshiftInfo($id);
                if (count($data)>0) { echo(json_encode(array('status'=>1,'message'=>'Success', 'data' => $data))); }
                else { echo(json_encode(array('status'=>0, 'message' => 'Office Time detail not found'))); }
            }
            else
            {
              $company_id = $this->companyId;
              $title      = $this->input->post('title');
              $description= $this->input->post('description');
              $shift_type = $this->input->post('shift_type');
              $start_time = $this->input->post('start_time');
              $end_time   = $this->input->post('end_time');
              $num_hours  = $this->input->post('num_hours');

              if (!$this->shift_model->isValidCompany($company_id)) {
                echo json_encode(array('status' => 0, 'message' => "Your company doesn't exist or deactivated." ));
                die();
              }
              if ($this->shift_model->isEditTimeExisting($id, $title, $company_id)) {
                echo json_encode(array('status' => 0, 'message' => "Entered Office Time alredy registered." ));
                die();
              }

                $dataArr = array(
                  'company_id'  => $company_id,
                  'title'       => $title,
                  'description' => $description,
                  'shift_type'  => $shift_type,
                  'updated_by'  => $this->vendorId
                );
                if ($shift_type == 1) {
                  $dataArr['start_time'] = $start_time;
                  $dataArr['end_time']   = $end_time;
                  $dataArr['num_hours']  = "";
                }else {
                  $dataArr['num_hours']  = $num_hours;
                  $dataArr['start_time'] = "";
                  $dataArr['end_time']   = "";
                }


                if (!$this->shift_model->isValidShiftId($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }

                $result = $this->shift_model->edit($dataArr, $id);
                if ($result) {
                   echo json_encode(array('status' => 1, 'message' => "Office Time Successfully updated" ));
                }else {
                  echo json_encode(array('status' => 0, 'message' => "Unable to update Office Time." ));
                }
            }
        }
    }

    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteshift($id="")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->shift_model->isValidShiftId($id, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $result = $this->shift_model->deleteshift($id);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Office Time deleted successfully'))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Office Time is not deleted'))); }
        }
    }

    /**
     * This function is used to blocked the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function blockshift($id="")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->shift_model->isValidShiftId($id, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $shiftInfo = array('status'=>2);
            $result = $this->shift_model->blockshift($id, $shiftInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Office Time is Blocked '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Office Time is not Blocked'))); }
        }
    }

    /**
     * This function is used to Active the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function unblockshift($id="")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->shift_model->isValidShiftId($id, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $shiftInfo = array('status'=>1);
            $result = $this->shift_model->unblockshift($id, $shiftInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Office Time is Active '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Office Time is not Active'))); }
        }
    }

}
