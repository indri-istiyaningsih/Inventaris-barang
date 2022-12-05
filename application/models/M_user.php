<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	private $table = 'user';
	private $id    = 'email';

	public function get(){
		
		return $this->db->get($this->table);

	}

	public function save($data){
		
		return $this->db->insert($this->table, $data);

	}

	public function delete($id){
		
		$this->db->where($this->id, $id);
		
		return $this->db->delete($this->table);

	}

	public function edit($id){
		
		$this->db->select('*');

		$this->db->where($this->id, $id);
		
		$this->db->join('department', 'user.department = department.id');

		return $this->db->get($this->table)->row_array();

	}

	public function update($id, $data){
		
		$this->db->where($this->id, $id);
		
		return $this->db->update($this->table, $data);

	}


	//Tambahan
	public function cek_email($email){
		
		$this->db->where('email', $email);
		
		return $this->db->get($this->table);

	}

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */