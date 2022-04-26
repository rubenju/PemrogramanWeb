<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("transaksi_mod");
		$this->load->model("barang_mod");
		$this->load->model("pembeli_mod");
	}


	public function view_transaksi()
	{
		$data["transaksi"] = $this->transaksi_mod->get_transaksi();
		$data["barang"] = $this->barang_mod->get_barang();
		$data["pembeli"] = $this->pembeli_mod->get_pembeli();
		$this->load->view('transaksi', $data);
	}
}
