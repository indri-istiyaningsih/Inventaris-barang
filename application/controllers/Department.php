<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

	public $template 	= 'template/';
	public $folder 		= 'modDepartment/';
	public $menu 		= 'Department';

	public function __construct(){
		parent::__construct();

		//Autentikasi Login
		IsAdmin();
		
		//Load Model
		$this->load->model('M_Department');
	}

	public function index(){

		$data = [
			'title' 	=> $this->menu,
			'subtitle'	=> 'Lihat',
			'data'		=> $this->M_Department->get()
		];

		$this->load->view($this->template .'head', $data);
		$this->load->view($this->template .'sidebar', $data);
		$this->load->view($this->template .'header', $data);

		$this->load->view($this->folder .'view', $data);
		
		$this->load->view($this->template .'footer', $data);
	
	}

	public function add(){
		
		$data = [
			'title'		=> $this->menu,
			'subtitle'	=> 'Tambah Data',
			'data' 		=> ''
		];

		$this->load->view($this->template .'head', $data);
		$this->load->view($this->template .'sidebar', $data);
		$this->load->view($this->template .'header', $data);

		$this->load->view($this->folder .'add', $data);
		
		$this->load->view($this->template .'footer', $data);

	}

	public function save(){
		
		$data = [
				'department'	=> $_POST['department']
			];

		$this->M_Department->save($data);

		redirect($this->menu, 'refresh');
	}

	public function delete(){
		
		$id = $this->uri->segment(3);

		$this->M_Department->delete($id);

		redirect($this->menu, 'refresh');
	}

	public function edit(){

		$id = $this->uri->segment(3);
		
		$data = [
			'title'		=> $this->menu,
			'subtitle'	=> 'Edit',
			'data' 		=> $this->M_Department->edit($id)
		];

		$this->load->view($this->template .'head', $data);
		$this->load->view($this->template .'sidebar', $data);
		$this->load->view($this->template .'header', $data);

		$this->load->view($this->folder .'edit', $data);
		
		$this->load->view($this->template .'footer', $data);

	}

	public function update(){

		$id = $this->uri->segment(3);
		
		$data = [
				'department'	=> $_POST['department']
			];

		$this->M_Department->update($id, $data);

		redirect($this->menu, 'refresh');
	}

	public function detail(){

		$id = $this->uri->segment(3);
		
		$data = [
			'title'		=> $this->menu,
			'subtitle'	=> 'Detail',
			'data' 		=> $this->M_Department->edit($id)
		];

		$this->load->view($this->template .'head', $data);
		$this->load->view($this->template .'sidebar', $data);
		$this->load->view($this->template .'header', $data);

		$this->load->view($this->folder .'detail', $data);
		
		$this->load->view($this->template .'footer', $data);

	}

}

/* End of file Department.php */
/* Location: ./application/controllers/Department.php */