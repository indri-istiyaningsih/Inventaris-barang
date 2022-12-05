<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public $template 	= '';
	public $folder 		= '';
	public $menu 		= 'Auth';

	public function __construct(){
		parent::__construct();

		//Load Model
		$this->load->model('M_auth');
	}

	public function index(){
		$data = [
			'title' 	=> $this->menu,
			'subtitle'	=> 'Login',
			'data'		=> ''
		];

		$this->load->view('auth', $data);
	}

	public function login(){
		
		$email 		= $_POST['email'];
		$password 	= md5($_POST['password']);

		$cek = $this->M_auth->cek($email, $password);

		if ($cek->num_rows() == 1) {
			
			$row = $cek->row_array();
			
			$session = [
					'nama' 		=> $row['nama'],
					'email'		=> $row['email'],
					'IsAdmin' 	=> 1
				];
			
			$this->session->set_userdata($session);

			redirect('Dashboard','refresh');
		}else{
			
			$this->session->set_flashdata('message', 'Gagal Login! Cek email & password');

			redirect('Auth','refresh');
		}

	}

	public function logout(){
		
		session_destroy();

		redirect('Auth','refresh');
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */