<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SignIn extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_mod');
	}

	public function index()
	{
		$this->load->view('signin');
	}

	public function signin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->users_mod->sign_in_user($username);

		if ($user->num_rows() > 0) {
			$user = $user->row_array();
			if ($user['password'] == $password) {
				if ($user['id_user_level'] == 1) {
					$this->session->set_userdata('username', $user['nama_user']);
					$this->session->set_userdata('user_level', $user['nama_user_level']);
					$this->session->set_flashdata('staff_access', 'staff_access');
					redirect('Dashboard/index_staff');
				} else if ($user['id_user_level'] == 2) {
					$this->session->set_userdata('username', $user['nama_user']);
					$this->session->set_userdata('user_level', $user['nama_user_level']);
					$this->session->set_flashdata('supervisor_access', 'supervisor_access');
					redirect('Dashboard/index_supervisor');
				} else if ($user['id_user_level'] == 3) {
					$this->session->set_userdata('username', $user['nama_user']);
					$this->session->set_userdata('user_level', $user['nama_user_level']);
					$this->session->set_flashdata('manager_access', 'manager_access');
					redirect('Dashboard/index_manager');
				} else {
					$this->session->set_flashdata('error_access');
					redirect('SignIn/index');
				}
			} else {
				$this->session->set_flashdata('error_password', 'error_password');
				redirect('SignIn/index');
			}
		} else {
			$this->session->set_flashdata('error', 'error');
			redirect('SignIn/index');
		}
	}

	public function signout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('user_level');
		$this->session->set_flashdata('success_signout', 'success_signout');
		redirect('SignIn/index');
	}
}
