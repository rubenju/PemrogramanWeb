<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("barang_mod");
	}


	public function view_barang()
	{
		$data["barang"] = $this->barang_mod->get_barang();
		$this->load->view('barang', $data);
	}
}
