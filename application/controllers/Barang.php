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

	public function insert_barang() {
		$id_barang = $this->input->post("id_barang");
		$nama_barang = $this->input->post("nama_barang");
		$harga = $this->input->post("harga");
		$stok = $this->input->post("stok");
		
		$query = $this->barang_mod->insert_barang($id_barang, $nama_barang, $harga, $stok);

		if($query==false) {
			$this->session->set_flashdata('error_input', 'error_input');
		} else {
			$this->session->set_flashdata('success_input', 'success_input');
		}

		redirect("Barang/view_barang");
	}
	
	public function edit_barang($id_barang) {
		$nama_barang = $this->input->post("nama_barang");
		$harga = $this->input->post("harga");
		$stok = $this->input->post("stok");
		
		$query = $this->barang_mod->edit_barang($id_barang, $nama_barang, $harga, $stok);

		if($query==false) {
			$this->session->set_flashdata('error_edit', 'error_edit');
		} else {
			$this->session->set_flashdata('success_edit', 'success_edit');
		}

		redirect("Barang/view_barang");
	}
	
	public function delete_barang($id_barang) {
		$query = $this->barang_mod->delete_barang($id_barang);

		if($query==false) {
			$this->session->set_flashdata('error_delete', 'error_delete');
		} else {
			$this->session->set_flashdata('success_delete', 'success_delete');
		}

		redirect("Barang/view_barang");
	}
}
