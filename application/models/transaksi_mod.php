<?php
class transaksi_mod extends CI_Model {
	public function get_transaksi() {
		$hasil = $this->db->query("SELECT * from read_transaksi()");
		return $hasil->result_array();
	}
}

