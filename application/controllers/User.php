<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public $template 	= 'template/';
	public $folder 		= 'moduser/';
	public $menu 		= 'User';

	public function __construct(){
		parent::__construct();

		//Autentikasi Login
		IsAdmin();
		
		//Load Model
		$this->load->model('M_Department');
		$this->load->model('M_user');
	}

	public function index(){

		$data = [
			'title' 	=> $this->menu,
			'subtitle'	=> 'Lihat',
			'data'		=> $this->M_user->get()
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
			'data' 		=> $this->M_Department->get()
		];

		$this->load->view($this->template .'head', $data);
		$this->load->view($this->template .'sidebar', $data);
		$this->load->view($this->template .'header', $data);

		$this->load->view($this->folder .'add', $data);
		
		$this->load->view($this->template .'footer', $data);

	}

	public function save(){
		/*
			Validasi Simpan : 
			1. cek, apakah password berbeda?
			2. cek, apakah email sudah didaftarkan?
			3. cek, apakah upload image sudah sesuai kriteria?
		*/

		$password 		= md5($_POST['password']);
		$password_retry = md5($_POST['password_retry']);
		$email 			= $_POST['email'];

		//Pengecekan ke-1
		if ($password_retry != $password) {
			$this->error("Password Tidak Sama");

			redirect($this->uri->segment(1).'/add','refresh');
		
		}else{

			//Pengecekan ke-2
			$cek = $this->M_user->cek_email($email);
			if ($cek->num_rows() > 0) {
				$this->error("Email sudah digunakan");

				redirect($this->uri->segment(1).'/add','refresh');
			}else{

				$config['upload_path'] 	= './assets/user/';
				$config['allowed_types']= 'jpg|png'; // type yg diiznkan jpg & png
				$config['max_size']  	= '512'; // maxsize 512kb
				$config['file_name']	= 'user-'.date("Ymd-His"); //rename img yg diupload
				
				$this->load->library('upload', $config);
				
				//Pengecekan ke-3
				if ( ! $this->upload->do_upload('image')){
					//Jika gambar gagal diupload

					$error = array('error' => $this->upload->display_errors());

					$this->error($error['error']);

					redirect($this->uri->segment(1).'/add','refresh');
				}
				else{
					//Jika gambar berhasil diupload, maka lanjut pross simpan data	
					$upload_data = $this->upload->data();

					$data = [
							'email'			=> $email,
							'nama'			=> $_POST['nama'],
							'image'			=> $upload_data['orig_name'],
							'password'		=> $password,
							'department'	=> $_POST['department'],
							'is_active'		=> 1,
							'tanggal_input'	=> date('Y-m-d H:i:s'),
							'tanggal_update'=> date('Y-m-d H:i:s')
						];

					$this->M_user->save($data);

					redirect($this->uri->segment(1),'refresh');
				}
			}
		}
	}

	public function edit(){
		
		$id = $this->uri->segment(3);

		$data = [
			'title'		=> $this->menu,
			'subtitle'	=> 'Edit',
			'row' 		=> $this->M_user->edit($id),
			'data'		=> $this->M_kategori->get()
		];

		$this->load->view($this->template .'head', $data);
		$this->load->view($this->template .'sidebar', $data);
		$this->load->view($this->template .'header', $data);

		$this->load->view($this->folder .'edit', $data);
		
		$this->load->view($this->template .'footer', $data);

	}

	public function update(){
		/*
			Ada 2 kondisi update : 
			1. Gambar tidak diupdate
			2. Gambar diupdate

			Tidak ada proses update password
		*/

		$id = $this->uri->segment(3);

		if ($_FILES['image']['name'] == '') {
			
			$data = [
					'nama'		=> $_POST['nama'],
					'department'=> $_POST['department'],
					'is_active'	=> $_POST['is_active'],
					'tanggal_update'=> date('Y-m-d H:i:s')
				];

			$this->M_user->update($id, $data);

			redirect($this->menu, 'refresh');
		}else{
			$config['upload_path'] 	= './assets/user/';
			$config['allowed_types']= 'jpg|png'; // type yg diiznkan jpg & png
			$config['max_size']  	= '512'; // maxsize 512kb
			$config['file_name']	= 'user-'.date("Ymd-His"); //rename img yg diupload
			
			$this->load->library('upload', $config);
			
			//Pengecekan ke-3
			if ( ! $this->upload->do_upload('image')){
				//Jika gambar gagal diupload

				$error = array('error' => $this->upload->display_errors());

				$this->error($error['error']);

				redirect($this->uri->segment(1).'/add','refresh');
			}
			else{
				//Jika gambar berhasil diupload, maka lanjut pross simpan data	
				$upload_data = $this->upload->data();

				$data = [
						'nama'			=> $_POST['nama'],
						'image'			=> $upload_data['orig_name'],
						'department'	=> $_POST['department'],
						'is_active'		=> $_POST['is_active'],
						'tanggal_update'=> date('Y-m-d H:i:s')
					];

				$this->M_user->update($id, $data);

				redirect($this->uri->segment(1),'refresh');
			}
		}
	}

	public function error($message){
		$error = "
				<div class='col-lg-12 alert alert-danger' >		
						$message							
				</div>
			";

		return $this->session->set_flashdata('message', $error);
	}

	public function delete(){
		
		$id = $this->uri->segment(3);

		$this->M_user->delete($id);

		redirect($this->menu, 'refresh');
	}

	public function detail(){
		
		$id = $this->uri->segment(3);

		$data = [
			'title'		=> $this->menu,
			'subtitle'	=> 'Detail',
			'data' 		=> $this->M_user->edit($id)
		];

		$this->load->view($this->template .'head', $data);
		$this->load->view($this->template .'sidebar', $data);
		$this->load->view($this->template .'header', $data);

		$this->load->view($this->folder .'detail', $data);
		
		$this->load->view($this->template .'footer', $data);

	}

	public function reset(){
		
		$id = $this->uri->segment(3);

		$data = [
				'password'	=> md5('123456')
				];

		$this->M_user->update($id,$data);

		redirect($this->menu, 'refresh');

	}

	public function do_upload()
	{
		$config['upload_path'] = '.assets/latihan';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			echo "success";

			$this->load->view('upload_success', $data);
		}



	}
	public function latihan_upload_hapus(){
		define('PUBPATH', str_replace(SELF,'FCPATH'));
		$img = $this->url->segment(3); //nama filenya
		$path = PUBPATH .'assets/latihan/'.$img;
		unlink($path);

	}
}



/* End of file User.php */
/* Location: ./application/controllers/User.php */ 