<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function cek($email, $password){
		
		return $this->db->query("
							SELECT * FROM user 
							WHERE
								email = '$email' AND
								password = '$password' AND
								is_active = 1
						");

	}

}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */