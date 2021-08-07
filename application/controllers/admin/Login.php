<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if (isset($_SESSION['user_id'])) {
			redirect("dashboard");
		}

		$data=[];
		if (isset($_SESSION['error'])) {
			$data['error']=$_SESSION['error'];
		}
		else {
			$data['error']="NO_ERROR";
		}

		$this->load->view('adminpanel/loginview',$data);
	}

	function login_post(){
		
		if (isset($_POST)) {
				$username=$_POST['username'];
				$password=$_POST['password'];

				$query = $this->db->query("SELECT * FROM `backendusers` WHERE `username`='$username' AND password='$password'");

				if ($query->num_rows()) {
					$result = $query->result_array();
					$this->session->set_userdata('user_id', $result[0]['uid']);

					redirect('admin/dashboard');
				}
				else{
					$this->session->set_flashdata('error', 'Invalid Credentials');
					redirect("admin/login");
				}

		}
		else{
			die("Invalid Input!");
		}
	}


	function logout(){
		session_destroy();

		redirect('admin/login');
	}
}
