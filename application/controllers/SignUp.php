<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignUp extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('users_mod');
	}
		
	public function index() {
		$this->load->view('signup');
	}

	public function signup() {
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$re_password = $this->input->post('repeat_password');
		$user_level = 1;

		if($password == $re_password) {
			$hasil = $this->users_mod->sign_up_user($username, $email, $password, $user_level);

			if($hasil == false) {
				$this->session->set_flashdata('error', 'error');
			} else {
				$this->session->set_flashdata('success', 'success');
				redirect('SignIn/index');
			}
		} else {
			$this->session->set_flashdata('error_pass', 'error_pass');
			redirect('SignUp/index');
		}
	}

}
