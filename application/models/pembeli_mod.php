<?php
class pembeli_mod extends CI_Model {
	public function get_pembeli() {
		$hasil = $this->db->query("SELECT * from read_pembeli()");
		return $hasil->result_array();
	}

	public function insert_pembeli($id_pembeli, $nama_pembeli, $jk, $no_telp, $alamat, $foto) {
		$hasil = $this->db->query("SELECT * FROM create_pembeli($id_pembeli, '$nama_pembeli', '$jk', '$no_telp', '$alamat', '$foto')");
		return $hasil;
	}

	public function edit_pembeli($id_pembeli, $nama_pembeli, $jk, $no_telp, $alamat, $foto) {
		$hasil = $this->db->query("SELECT * FROM update_pembeli($id_pembeli, '$nama_pembeli', '$jk', '$no_telp', '$alamat', '$foto')");
		return $hasil;
	}

	public function delete_pembeli($id_pembeli) {
		$hasil = $this->db->query("SELECT * FROM delete_pembeli($id_pembeli)");
		return $hasil;
	}
}

