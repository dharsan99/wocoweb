<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/HrController.php';

class Reports extends HrController{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('hr/reports_model'));
    $this->isLoggedIn();

  }


  public function index()
  {
      if ($this->isHr() == TRUE) {
        redirect('accessDenied');
      }
      $data['test'] = 'test';
      $data['department']      = $this->reports_model->getDepartmentList($this->companyId);
      $this->global['pageTitle'] = 'WoCo : Team Listing';
      $this->loadViews("reports/listData", $this->global, $data, NULL);
  }

  public function getLeaverequestList()
  {
    $json_data = $this->reports_model->getLeaverequestList($this->companyId);
    echo json_encode($json_data);
  }

  /**
   * This function is used to load the add new form
   */

  /**
   * This function is used to load the add new form
   */
  function addNew()
  {
    if($this->isHr() == TRUE)
    {
        echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
        die();
    }

    $title       = $this->input->post('title');
    $department  = $this->input->post('department');
    $head  = $this->input->post('head');
    $description = $this->input->post('description');

    $dataArr = array(
      'title' => $title,
      'department_id' => $department,
      'head' => $head,
      'description' => $description,
      'company_id' => $this->companyId,
      'created_by' => $this->vendorId,
        );

    $result = $this->reports_model->createTeam($dataArr);
    if ($result>0) {
       echo json_encode(array('status' => 1, 'message' => "New Team Successfully Created" ));
    }else {
      echo json_encode(array('status' => 0, 'message' => "Unable to create Team." ));
    }

  }

    /**
     * This function is used to User view in head the user information
     */
     function getuserbydeaprtmentid($department_id="")
     {
           if($this->isHr() == TRUE)
           {
               $this->loadThis();
           }

            $data['head']      = $this->reports_model->getDepartmentList($this->companyId);
           $data = $this->reports_model->getuserbydeaprtmentid($department_id, $this->companyId);
           if (count($data)>0) {
             echo(json_encode(array('status'=>1,'message'=>'Success', 'data' => $data)));
           }else{
               echo(json_encode(array('status'=>0, 'message' => 'No user Found')));
            }

     }

    /**
     * This function is used to edit the user information
     */
    function editTeam($id = "")
    {
        if($this->isHr() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
            if(!isset($_POST['title']))
            {
                if (!$this->reports_model->isValidTeam($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }
                $data = $this->reports_model->getTeamInfo($id);
                if (count($data)>0) { echo(json_encode(array('status'=>1,'message'=>'Success', 'data' => $data))); }
                else { echo(json_encode(array('status'=>0, 'message' => 'Team detail not found'))); }
            }
            else
            {
              $company_id = $this->companyId;
              $title      = $this->input->post('title');
              $department  = $this->input->post('department');
              $head  = $this->input->post('head');
              $description = $this->input->post('description');

                $teamInfo = array(
                  'title' => $title,
                  'description' => $description,
                  'department_id' => $department,
                  'head' => $head,
                ) ;

                if (!$this->reports_model->isValidTeam($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }

                $result = $this->reports_model->editTeam($teamInfo, $id);
                if ($result) {
                   echo json_encode(array('status' => 1, 'message' => "Team Successfully updated" ));
                }else {
                  echo json_encode(array('status' => 0, 'message' => "Unable to update Team" ));
                }
            }
        }
    }




    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteTeam($id="")
    {
        if($this->isHr() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $result = $this->reports_model->deleteTeam($id);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Team deleted successfully'))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Team is not deleted'))); }
        }
    }

    /**
     * This function is used to blocked the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function blockTeam($userId="")
    {
        if($this->isHr() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->reports_model->isValidUserId($userId, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $teamInfo = array('status'=>2);
            $result = $this->reports_model->blockTeam($userId, $teamInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Admin is Blocked '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Admin is not Blocked'))); }
        }
    }

    /**
     * This function is used to Active the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function unblockTeam($userId="")
    {
        if($this->isHr() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->reports_model->isValidUserId($userId, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $teamInfo = array('status'=>1);
            $result = $this->reports_model->unblockTeam($userId, $adminInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Team is Active '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Team is not Blocked'))); }
        }
    }

}
