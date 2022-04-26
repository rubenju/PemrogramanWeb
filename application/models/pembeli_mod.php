<?php
class pembeli_mod extends CI_Model {
	public function get_pembeli() {
		$hasil = $this->db->query("SELECT * from read_pembeli()");
		return $hasil->result_array();
	}
}

