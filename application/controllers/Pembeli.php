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

	public function insert_pembeli() {
		$id_pembeli = $this->input->post("id_pembeli");
		$nama_pembeli = $this->input->post("nama_pembeli");
		$jk = $this->input->post("jk");
		$no_telp = $this->input->post("no_telp");
		$alamat = $this->input->post("alamat");
		
		$query = $this->pembeli_mod->insert_pembeli($id_pembeli, $nama_pembeli, $jk, $no_telp, $alamat);

		if($query==false) {
			$this->session->set_flashdata('error_input', 'error_input');
		} else {
			$this->session->set_flashdata('success_input', 'success_input');
		}

		redirect("Pembeli/view_pembeli");
	}
	
	public function edit_pembeli($id_pembeli) {
		$nama_pembeli = $this->input->post("nama_pembeli");
		$jk = $this->input->post("jk");
		$no_telp = $this->input->post("no_telp");
		$alamat = $this->input->post("alamat");
		
		$query = $this->pembeli_mod->edit_pembeli($id_pembeli, $nama_pembeli, $jk, $no_telp, $alamat);

		if($query==false) {
			$this->session->set_flashdata('error_edit', 'error_edit');
		} else {
			$this->session->set_flashdata('success_edit', 'success_edit');
		}

		redirect("Pembeli/view_pembeli");
	}

	public function delete_pembeli($id_pembeli) {
		$query = $this->pembeli_mod->delete_pembeli($id_pembeli);

		if($query==false) {
			$this->session->set_flashdata('error_delete', 'error_delete');
		} else {
			$this->session->set_flashdata('success_delete', 'success_delete');
		}

		redirect("Pembeli/view_pembeli");
	}
}
