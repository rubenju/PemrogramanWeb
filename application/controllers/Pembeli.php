<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembeli extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('SignIn/index');
		}
		$this->load->model("pembeli_mod");
	}


	public function view_pembeli()
	{
		$data["pembeli"] = $this->pembeli_mod->get_pembeli();
		$this->load->view('pembeli', $data);
	}

	public function insert_pembeli()
	{
		$id_pembeli = $this->input->post("id_pembeli");
		$nama_pembeli = $this->input->post("nama_pembeli");
		$jk = $this->input->post("jk");
		$no_telp = $this->input->post("no_telp");
		$alamat = $this->input->post("alamat");
		$nama_foto = md5($nama_pembeli . $no_telp);

		$path = './assets/foto/';
		$this->load->library('upload');
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '4048';  //2MB max
		$config['max_width'] = '4480'; // pixel
		$config['max_height'] = '4480'; // pixel
		$config['file_name'] = $nama_foto;

		$this->upload->initialize($config);
		$foto = $this->upload->do_upload('foto');
		if ($foto) {
			$foto_upload = $this->upload->data();
		} else {
			$this->session->set_flashdata('error_file_foto', 'error_file_foto');
			redirect('Pembeli/view_pembeli');
		}

		$query = $this->pembeli_mod->insert_pembeli($id_pembeli, $nama_pembeli, $jk, $no_telp, $alamat, $foto_upload['file_name']);

		if ($query == false) {
			$this->session->set_flashdata('error_input', 'error_input');
		} else {
			$this->session->set_flashdata('success_input', 'success_input');
		}

		redirect("Pembeli/view_pembeli");
	}

	public function edit_pembeli($id_pembeli)
	{
		$nama_pembeli = $this->input->post("nama_pembeli");
		$jk = $this->input->post("jk");
		$no_telp = $this->input->post("no_telp");
		$alamat = $this->input->post("alamat");
		$nama_foto = md5($nama_pembeli . $no_telp);

		$path = './assets/foto/';
		$this->load->library('upload');
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '4048';  //2MB max
		$config['max_width'] = '4480'; // pixel
		$config['max_height'] = '4480'; // pixel
		$config['file_name'] = $nama_foto;

		$this->upload->initialize($config);
		$foto = $this->upload->do_upload('foto');
		if ($foto) {
			$foto_upload = $this->upload->data();
		} else {
			$this->session->set_flashdata('error_file_foto', 'error_file_foto');
			redirect('Pembeli/view_pembeli');
		}

		$query = $this->pembeli_mod->edit_pembeli($id_pembeli, $nama_pembeli, $jk, $no_telp, $alamat, $foto_upload['file_name']);

		if ($query == false) {
			$this->session->set_flashdata('error_edit', 'error_edit');
		} else {
			$this->session->set_flashdata('success_edit', 'success_edit');
		}

		@unlink($path . $this->input->post('foto_old'));
		redirect("Pembeli/view_pembeli");
	}

	public function delete_pembeli($id_pembeli)
	{
		$path = './assets/foto/';
		$query = $this->pembeli_mod->delete_pembeli($id_pembeli);

		if ($query == false) {
			$this->session->set_flashdata('error_delete', 'error_delete');
		} else {
			$this->session->set_flashdata('success_delete', 'success_delete');
		}

		@unlink($path . $this->input->post('foto'));
		redirect("Pembeli/view_pembeli");
	}
}
