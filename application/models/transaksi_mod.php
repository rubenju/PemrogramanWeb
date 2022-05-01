<?php
class transaksi_mod extends CI_Model {
	public function get_transaksi() {
		$hasil = $this->db->query("SELECT * from read_transaksi()");
		return $hasil->result_array();
	}

	public function insert_transaksi($id_transaksi, $id_barang, $id_pembeli, $tanggal, $keterangan) {
		$hasil = $this->db->query("SELECT * FROM create_transaksi($id_transaksi, $id_barang, $id_pembeli, '$tanggal', '$keterangan')");
		return $hasil;
	}

	public function edit_transaksi($id_transaksi, $id_barang, $id_pembeli, $tanggal, $keterangan) {
		$hasil = $this->db->query("SELECT * FROM update_transaksi($id_transaksi, $id_barang, $id_pembeli, '$tanggal', '$keterangan')");
		return $hasil;
	}

	public function delete_transaksi($id_transaksi) {
		$hasil = $this->db->query("SELECT * FROM delete_transaksi($id_transaksi)");
		return $hasil;
	}
}

