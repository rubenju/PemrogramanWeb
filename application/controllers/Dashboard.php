<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("barang_mod");
		$this->load->model("pembeli_mod");
		$this->load->model("transaksi_mod");
	}
	
	 public function index()
	{	
		$data['barang'] = $this->barang_mod->get_total_barang();
		$data['pembeli'] = $this->pembeli_mod->get_total_pembeli();
		$data['transaksi'] = $this->transaksi_mod->get_total_transaksi();

		$this->load->view('dashboard', $data);
	}
}
