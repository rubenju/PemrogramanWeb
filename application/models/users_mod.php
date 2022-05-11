<?php

class users_mod extends CI_Model {
	
	public function sign_up_user($username, $email, $password, $user_level) {
		return $this->db->query("INSERT INTO users(nama_user, email, password, user_level) VALUES ('$username', '$email', '$password', $user_level)");
	}

	public function sign_in_user($username) {
		return $this->db->query("SELECT * FROM users JOIN user_level ON users.user_level = user_level.id_user_level WHERE users.nama_user = '$username'");
	}

}
