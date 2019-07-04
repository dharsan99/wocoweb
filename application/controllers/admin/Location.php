<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/AdminController.php';

class Location extends AdminController{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('admin/location_model'));
    $this->isLoggedIn();

  }


  public function index()
  {
      if ($this->isAdmin() == TRUE) {
        redirect('accessDenied');
      }
      $data['test'] = 'test';
      $this->global['pageTitle'] = 'WoCo : Location Listing';
      $this->loadViews("location/listData", $this->global, $data, NULL);
  }

  public function getLocationList()
  {
    $json_data = $this->location_model->getLocationList($this->companyId, $this->vendorId);
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

    $company_id       = $this->companyId;
    $title            = $this->input->post('title');
    $description      = $this->input->post('description');
    $address_line_1   = $this->input->post('address_line_1');
    $address_line_2   = $this->input->post('address_line_2');
    $city             = $this->input->post('city');
    $state            = $this->input->post('state');
    $country          = $this->input->post('country');
    $min_radius       = $this->input->post('min_radius');
    $zip              = $this->input->post('zip');
    $lat              = $this->input->post('lat');
    $lng              = $this->input->post('lng');

    if (!$this->location_model->isValidCompany($company_id)) {
      echo json_encode(array('status' => 0, 'message' => "Your company doesn't exist or deactivated." ));
      die();
    }
    if ($this->location_model->isLocationExisting($title, $company_id)) {
      echo json_encode(array('status' => 0, 'message' => "Location title alredy existing in your system." ));
      die();
    }

    $dataArr = array(
      'company_id'    => $company_id,
      'title'         => $title,
      'description'   => $description,
      'address_line_1'=> $address_line_1,
      'address_line_2'=> $address_line_2,
      'city'          => $city,
      'state'         => $state,
      'country'       => $country,
      'created_by'    => $this->vendorId,
      'min_radius'    => $min_radius,
      'zip'           => $zip,
      'lat'           => $lat,
      'lng'           => $lng,
      'status'        => 1
    );

    $result = $this->location_model->createLocation($dataArr);
    if ($result > 0) {
      if (isset($_POST['device_type'])) {
        $deviceTypesArr   = $this->input->post('device_type');
        $deviceIdsArr     = $this->input->post('device_id');
        $deviceArr = array();
        foreach ($deviceIdsArr as $key => $value) {
          $item = array(
            'device_id'     => $value,
            'device_type'   => $deviceTypesArr[$key],
            'lat'           => $lat,
            'lng'           => $lng,
            'location_id'   => $result,
            'created_by'    => $this->vendorId,
            'company_id'    => $company_id,
          );
          $deviceArr[] = $item;
        }
        $this->location_model->insertDevices($deviceArr);
      }
      $this->nofifyUsersLocationUpdate();
       echo json_encode(array('status' => 1, 'message' => "New Location Successfully Created" ));
    }else {
      echo json_encode(array('status' => 0, 'message' => "Unable to create location." ));
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
                if (!$this->location_model->isValidLocationId($id, $this->companyId)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }
                $data = $this->location_model->getLocationInfo($id, $this->companyId);
                if (count($data) > 0) {
                  $data[0]->devices = $this->location_model->getDevicesByLocation($id, $this->companyId);
                  echo(json_encode(array('status'=>1,'message'=>'Success', 'data' => $data)));
                }else {
                  echo(json_encode(array('status'=>0, 'message' => 'Location detail not found')));
                }
            }
            else
            {
              $company_id       = $this->companyId;
              $title            = $this->input->post('title');
              $description      = $this->input->post('description');
              $address_line_1   = $this->input->post('address_line_1');
              $address_line_2   = $this->input->post('address_line_2');
              $city             = $this->input->post('city');
              $state            = $this->input->post('state');
              $country          = $this->input->post('country');
              $min_radius       = $this->input->post('min_radius');
              $zip              = $this->input->post('zip');
              $lat              = $this->input->post('lat');
              $lng              = $this->input->post('lng');

              if (!$this->location_model->isValidCompany($company_id)) {
                echo json_encode(array('status' => 0, 'message' => "Your company doesn't exist or deactivated." ));
                die();
              }
              if ($this->location_model->isEditLocationExisting($id, $title, $company_id)) {
                echo json_encode(array('status' => 0, 'message' => "Location title alredy existing in your system." ));
                die();
              }

              $dataArr = array(
                'title'         => $title,
                'description'   => $description,
                'address_line_1'=> $address_line_1,
                'address_line_2'=> $address_line_2,
                'city'          => $city,
                'state'         => $state,
                'country'       => $country,
                'updated_by'    => $this->vendorId,
                'min_radius'    => $min_radius,
                'zip'           => $zip,
                'lat'           => $lat,
                'lng'           => $lng
              );
                if (!$this->location_model->isValidLocationId($id, $company_id)) {
                  echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
                  die();
                }

                $result = $this->location_model->edit($dataArr, $id);
                if ($result) {
                  if (isset($_POST['device_type'])) {
                    $deviceTypesArr   = $this->input->post('device_type');
                    $deviceIdsArr     = $this->input->post('device_id');
                    $deviceArr = array();
                    foreach ($deviceIdsArr as $key => $value) {
                      $item = array(
                        'device_id'     => $value,
                        'device_type'   => $deviceTypesArr[$key],
                        'lat'           => $lat,
                        'lng'           => $lng,
                        'location_id'   => $id,
                        'updated_by'    => $this->vendorId,
                        'company_id'    => $company_id,
                      );
                      $deviceArr[] = $item;
                    }
                    if ($this->location_model->deleteDevices($id, $company_id)) {
                      $this->location_model->insertDevices($deviceArr);
                    }
                  }
                  $this->nofifyUsersLocationUpdate();
                   echo json_encode(array('status' => 1, 'message' => "Location Successfully updated" ));
                }else {
                  echo json_encode(array('status' => 0, 'message' => "Unable to update Location." ));
                }
            }
        }
    }

    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteLocation($id="")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->location_model->isValidLocationId($id, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }

          if ($this->location_model->deleteDevices($id, $this->companyId)) {
            $result = $this->location_model->deleteLocation($id);
            if ($result) {
              $this->nofifyUsersLocationUpdate();
              echo(json_encode(array('status'=>TRUE,'message'=>'Location deleted successfully')));
            }else {
              echo(json_encode(array('status'=>FALSE, 'message' => 'Location is not deleted')));
            }
          }
        }
    }

    /**
     * This function is used to blocked the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function blockLocation($id="")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
          if (!$this->location_model->isValidLocationId($id, $this->companyId)) {
            echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
            die();
          }
            $dataArr = array('status'=>2);
            $result = $this->location_model->blockLocation($id, $dataArr);
            if ($result) {
              $this->nofifyUsersLocationUpdate();
              echo(json_encode(array('status'=>TRUE,'message'=>'Location is Blocked ')));
            }else {
              echo(json_encode(array('status'=>FALSE, 'message' => 'Location is not Blocked')));
            }
        }
    }

    /**
     * This function is used to Active the company using id
     * @return boolean $result : TRUE / FALSE
     */
    function unblockLocation($id="")
    {
        if($this->isAdmin() == TRUE)
        {
          echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
          die();
        }
        else
        {
            if (!$this->location_model->isValidLocationId($id, $this->companyId)) {
              echo json_encode(array('status' => 0, 'message' => 'Access Denied' ));
              die();
            }
            $dataArr = array('status'=> 1);
            $result = $this->location_model->unblockLocation($id, $dataArr);
            if ($result) {
              $this->nofifyUsersLocationUpdate();
              echo(json_encode(array('status'=>TRUE,'message'=>'Location is Active ')));
            }else {
              echo(json_encode(array('status'=>FALSE, 'message' => 'Location is not Blocked')));
            }
        }
    }


    public function nofifyUsersLocationUpdate()
    {
      $allRows = $this->common_model->getAllUsersFbToken($this->companyId);
      $fbTokens  = array();
      foreach ($allRows as $key => $value) {
        $fbTokens[] = $value->fb_token;
      }
      $data = array('action' => 'LOCATION_UPDATED');
      $aPayload = array(
    		'data' => $data
    	);
      $this->common_model->sendNotifications($fbTokens,$aPayload);
      //$fbToken = 'ca4MyspytR0:APA91bH8oJ0Czgx3O3rBK-CdFClEzTz0uxL2EutjNfhO4ltyezQkaWxoQ29I5bQa7GIbRSo9fqHmElOOzkaiOft7ckotAmObUjXbDExPeFb8Zywq3w54u5GyNheORtkJtZImmdRvpefh';
      //$this->common_model->sendNotification($fbToken,$aPayload);
    }

}
