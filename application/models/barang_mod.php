<?php
class barang_mod extends CI_Model {
	public function get_barang() {
		$hasil = $this->db->query("SELECT * from read_barang()");
		return $hasil->result_array();
	}
}

