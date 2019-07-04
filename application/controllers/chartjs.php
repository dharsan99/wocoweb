<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chartjs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Codeigniter : Write Less Do More

		$this->load->model(array('welcome_model'));
	}

	public function index()
	{
		$this->load->view('website/index');
	}


	public function contactus()
	{

		$fname   = $this->security->xss_clean($this->input->post('fname'));
		$lname   = $this->security->xss_clean($this->input->post('lname'));
		$email   = $this->security->xss_clean($this->input->post('email'));
		$subject = $this->security->xss_clean($this->input->post('subject'));
		$message = $this->security->xss_clean($this->input->post('message'));

		if ($fname == '' || $lname == '' || $email == '' || $subject == '' || $message == '') {
			echo json_encode(array('status' => 0, 'message' => "All fields are mandatory"));
			die();
		}

		$dataArr = array('fname' => $fname, 'lname' => $lname, 'email' => $email, 'subject' => $subject, 'message' => $message);
		$result = $this->welcome_model->insertContactData($dataArr);
		if ($result > 0) {
			$dataArr['id'] = $result;
			$msg = $this->load->view('email/contactus-user', $dataArr, TRUE);
			$sendStatus = sendCustomEmail($email, "WoCo - Thank You", $msg);
			echo json_encode(array('status' => 1, 'message' => "Thanks for contacting us!\nWe will be in touch."));
		}else {
			echo json_encode(array('status' => 0, 'message' => "Unable to submit your details"));
		}

	}


	public function test()
	{
		$data['data'] = array(
			'name' => 'Aashutosh',
			'action_link' => base_url("verify-email"),
			'email' => 'aashutosh.kumar@woco.co.in',
			'roleId' => '2'
		);
		$this->load->view('email/email-verification-success', $data);
	}
}
