<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembeli extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("pembeli_mod");
	}


	public function view_pembeli()
	{
		$data["pembeli"] = $this->pembeli_mod->get_pembeli();
		$this->load->view('pembeli', $data);
	}
}
