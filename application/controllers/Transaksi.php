<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('SignIn/index');
		}
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

	public function insert_transaksi()
	{
		$id_transaksi = $this->input->post("id_transaksi");
		$id_barang = $this->input->post("id_barang");
		$id_pembeli = $this->input->post("id_pembeli");
		$tanggal = $this->input->post("tanggal");
		$keterangan = $this->input->post("keterangan");

		$query = $this->transaksi_mod->insert_transaksi($id_transaksi, $id_barang, $id_pembeli, $tanggal, $keterangan);

		if ($query == false) {
			$this->session->set_flashdata('error_input', 'error_input');
		} else {
			$this->session->set_flashdata('success_input', 'success_input');
		}

		redirect("Transaksi/view_transaksi");
	}

	public function edit_transaksi($id_transaksi)
	{
		$id_barang = $this->input->post("id_barang");
		$id_pembeli = $this->input->post("id_pembeli");
		$tanggal = $this->input->post("tanggal");
		$keterangan = $this->input->post("keterangan");

		$query = $this->transaksi_mod->edit_transaksi($id_transaksi, $id_barang, $id_pembeli, $tanggal, $keterangan);

		if ($query == false) {
			$this->session->set_flashdata('error_edit', 'error_edit');
		} else {
			$this->session->set_flashdata('success_edit', 'success_edit');
		}

		redirect("Transaksi/view_transaksi");
	}

	public function delete_transaksi($id_transaksi)
	{
		$query = $this->transaksi_mod->delete_transaksi($id_transaksi);

		if ($query == false) {
			$this->session->set_flashdata('error_delete', 'error_delete');
		} else {
			$this->session->set_flashdata('success_delete', 'success_delete');
		}

		redirect("Transaksi/view_transaksi");
	}
}
