<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/MasterController.php';

class Permission extends MasterController{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('master/permission_model'));
    $this->isLoggedIn();

  }


  public function index()
  {
    $data['roles'] = $this->permission_model->getroles();
    $this->global['pageTitle'] = 'WoCo : Permission Listing';
    $this->loadViews("permission/listData", $this->global, $data, NULL);
  }

  public function getListData()
  {
      $json_data = $this->permission_model->getpermissionList();
      echo json_encode($json_data);  // send data as json format
  }


  /**
   * This function is used to load the add new form
   */
  function addNew()
  {
    if($this->isMaster() == TRUE)
    {
        echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
        die();
    }

    $role_id = $this->input->post('role_id');
    $permission = $this->input->post('permission');
    $description  = $this->input->post('description');

    if ($this->permission_model->isValidPermission($permission)) {
      echo json_encode(array('status' => 0, 'message' => "Entered permission is already existing" ));
      die();
    }
    $str = "";
    switch ($role_id) {
      case '1':
        $str = "SA_";
        break;
      case '2':
        $str = "ADMIN_";
        break;
      case '3':
        $str = "HR_";
        break;
      case '4':
        $str = "MANAGER_";
        break;
      case '5':
        $str = "EMPLOYEE_";
        break;
      default:
        $str = "";
        break;
    }

    $dataArr = array(
      'role_id' => $role_id,
      'permission' => $str."".$permission,
      'description' => $description,
      'created_by' => $this->vendorId
    );

    $result = $this->permission_model->createPermission($dataArr);
    if ($result > 0) {
      $allUsers = $this->permission_model->getAllUsersByRole($role_id);
      $pArr = array();
      unset($dataArr["description"]);
      foreach ($allUsers as $key => $user) {
        $dataArr['user_id']       = $user->userId;
        $dataArr['company_id']    = $user->company_id;
        $dataArr['permission_id'] = $result;
        $dataArr['view']    = 1;
        if ($user->roleId == ROLE_ADMIN) {
          $dataArr['add']     = 1;
          $dataArr['edit']    = 1;
          $dataArr['delete']  = 1;
          $dataArr['block']   = 1;
          $dataArr['unblock'] = 1;
        }else {
          $dataArr['add']     = 0;
          $dataArr['edit']    = 0;
          $dataArr['delete']  = 0;
          $dataArr['block']   = 0;
          $dataArr['unblock'] = 0;
        }
        $pArr[] = $dataArr;
      }
      if (count($pArr > 0)) {
        $this->permission_model->insertAllPermissions($pArr);
      }

      echo json_encode(array('status' => 1, 'message' => "New Permission Successfully Created" ));
    }else {
      echo json_encode(array('status' => 0, 'message' => "Unable to create Permission." ));
    }

  }

  public function companySearch()
  {
    if($this->isMaster() == TRUE)
    {
        echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
        die();
    }
    $searchText = $this->input->get('q');
    $result = $this->permission_model->searchCompany($searchText);
    $totalData = array();
    foreach ($result as $key => $row) {
      $data['id'] = $row->id;
      $data['text'] = $row->name;
      array_push($totalData, $data);
    }
    echo json_encode($totalData);
  }




    /**
     * This function is used to edit the Permission information
     */
    function editPermission($id = "")
    {
        if($this->isMaster() == TRUE)
        {
            $this->loadThis();
        }
        else
        {

            if(!isset($_POST['permission']))
            {
                $data = $this->permission_model->getpermissionInfo($id);
                if (count($data)>0) { echo(json_encode(array('status'=>1,'message'=>'Success', 'data' => $data))); }
                else { echo(json_encode(array('status'=>0, 'message' => 'Permission detail not found'))); }
            }
            else
            {
              $edit_role = $this->input->post('role_id');
              $edit_permission = $this->security->xss_clean($this->input->post('permission'));
              $edit_description= $this->security->xss_clean($this->input->post('description'));

              $permissionInfo = array('role_id' => $edit_role ,'permission' => $edit_permission , 'description' => $edit_description) ;


                $result = $this->permission_model->editPermission($permissionInfo, $id);

                if ($result) {
                   echo json_encode(array('status' => 1, 'message' => "Permission Successfully Updated" ));
                }else {
                  echo json_encode(array('status' => 0, 'message' => "Unable to Upadte Permission." ));
                }
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deletePermission($id="")
    {
        if($this->isMaster() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $result = $this->permission_model->deletePermission($id);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Permission deleted successfully'))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Permission is not deleted'))); }
        }
    }


    /**
     * This function is used to blocked the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function blockAdmin($userId="")
    {
        if($this->isMaster() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $adminInfo = array('status'=>2);
            $result = $this->permission_model->blockAdmin($userId, $adminInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Permission is Blocked '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Permission is not Blocked'))); }
        }
    }



    /**
     * This function is used to Active the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function unblockAdmin($userId="")
    {
        if($this->isMaster() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $adminInfo = array('status'=>1);
            $result = $this->permission_model->unblockAdmin($userId, $adminInfo);
            if ($result) { echo(json_encode(array('status'=>TRUE,'message'=>'Permission is Active '))); }
            else { echo(json_encode(array('status'=>FALSE, 'message' => 'Permission is not Blocked'))); }
        }
    }





}
