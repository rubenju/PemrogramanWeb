<?php
class barang_mod extends CI_Model {
	public function get_barang() {
		$hasil = $this->db->query("SELECT * FROM read_barang()");
		return $hasil->result_array();
	}

	public function insert_barang($id_barang, $nama_barang, $harga, $stok) {
		$hasil = $this->db->query("SELECT * FROM create_barang($id_barang, '$nama_barang', $harga, $stok)");
		return $hasil;
	}

	public function edit_barang($id_barang, $nama_barang, $harga, $stok) {
		$hasil = $this->db->query("SELECT * FROM update_barang($id_barang, '$nama_barang', $harga, $stok)");
		return $hasil;
	}

	public function delete_barang($id_barang) {
		$hasil = $this->db->query("SELECT * FROM delete_barang($id_barang)");
		return $hasil;
	}
}

