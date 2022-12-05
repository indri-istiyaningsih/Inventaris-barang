<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $template 	= 'template/';
	public $folder 		= 'moddashboard/';
	public $menu 		= 'Dashboard';

	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		//Autentikasi Login
		IsAdmin();

		//Load Model
	}
	public function index(){

		$data = [
			'title' 	=> $this->menu,
			'subtitle'	=> 'Lihat',
			'data'		=> ''
		];

		$this->load->view($this->template .'head', $data);
		$this->load->view($this->template .'sidebar', $data);
		$this->load->view($this->template .'header', $data);

		$this->load->view($this->folder .'view', $data);
		
		$this->load->view($this->template .'footer', $data);
	
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */