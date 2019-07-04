<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController{

  private $isLoggedIn = FALSE;

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->isLoggedIn = $this->session->userdata('isLoggedIn');
  }

  function index()
  {
    if(!isset($this->isLoggedIn) || $this->isLoggedIn != TRUE)
    {
        redirect('/login');
    }
    else
    {
        $roleId = $this->session->userdata('role');
        switch ($roleId) {
          case ROLE_SYSTEM_ADMIN:
            $this->systemAdminDashboard();
            break;

          case ROLE_ADMIN:
            $this->adminDashboard();
            break;

          case ROLE_HR:
            $this->hrDashboard();
            break;

          case ROLE_MANAGER:
            $this->managerDashboard();
            break;

          case ROLE_EMPLOYEE:
            $this->managerDashboard();
            break;

          default:
            redirect('/welcome');
            break;
        }
    }
  }


  public function systemAdminDashboard()
  {
      $this->global['pageTitle'] = 'WoCo : Dashboard';
      $this->loadViews("dashboard", $this->global, NULL , NULL);
  }

}
