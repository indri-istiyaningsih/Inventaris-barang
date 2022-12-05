<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public $template 	= 'template/';
	public $folder 		= 'modbarang/';
	public $menu 		= 'Barang';

	public function __construct(){
		parent::__construct();

		//Autentikasi Login
		IsAdmin();
		
		//Load Model
		$this->load->model('M_barang');
		$this->load->model('M_kategori');
	}

	public function index(){

		$data = [
			'title' 	=> $this->menu,
			'subtitle'	=> 'Lihat',
			'data'		=> $this->M_barang->get()
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
			'kategori'	=> $this->M_kategori->get()
		];

		$this->load->view($this->template .'head', $data);
		$this->load->view($this->template .'sidebar', $data);
		$this->load->view($this->template .'header', $data);

		$this->load->view($this->folder .'add', $data);
		
		$this->load->view($this->template .'footer', $data);

	}

	public function save(){
		$config['upload_path'] 	= './assets/barang/';
		$config['allowed_types']= 'jpg|png'; // type yg diiznkan jpg & png
		$config['max_size']  	= '512'; // maxsize 512kb
		$config['file_name']	= 'barang-'.date("Ymd-His"); //rename img yg diupload
		
		$this->load->library('upload', $config);
		
		//Pengecekan ke-3
		if ( ! $this->upload->do_upload('image')){
			//Jika gambar gagal diupload

			$error = array('error' => $this->upload->display_errors());

			$this->error($error['error'],'success');

			redirect($this->uri->segment(1).'/add','refresh');
		}
		else{
			//Jika gambar berhasil diupload, maka lanjut pross simpan data	
			$upload_data = $this->upload->data();

			$data = [
					'nama_barang'	=> $_POST['nama_barang'],
					'id_kategori'	=> $_POST['id_kategori'],
					'nama_admin'		=> $_POST['nama_admin'],
					'nama_pembuat'		=> $_POST['nama_pembuat'],
					'tahun_terbit'	=> $_POST['tahun_terbit'],
					'barecode'			=> $_POST['hasil_isbn'],
					'stok'				=> $_POST['stok'],
					'barang_masuk'		=> 0,
					'barang_keluar'		=> 0,
					'image'			=> $upload_data['orig_name'],
					'tanggal_input'	=> date('Y-m-d H:i:s'),
					'tanggal_update'=> date('Y-m-d H:i:s')
				];

			$this->M_barang->save($data); 	

			//Informasi setelah data tersimpan
			$this->error("Data Berhasil Disimpan","success");

			redirect($this->uri->segment(1),'refresh');
		}
	}

	public function delete(){

		//Menghapus data & file gambar

		define('PUBPATH',str_replace(SELF,'',FCPATH));
		
		$id 	= $this->uri->segment(3);
		$data 	= $this->M_barang->edit($id);

		$path = PUBPATH .'assets/barang/'.$data['image'];
		unlink($path);

		$this->M_barang->delete($id);

		//Informasi setelah data dihapus
		$this->error("Data Berhasil Dihapus","danger");

		redirect($this->menu, 'refresh');
	}

	public function edit(){

		$id = $this->uri->segment(3);
		
		$data = [
			'title'		=> $this->menu,
			'subtitle'	=> 'Edit',
			'data' 		=> $this->M_barang->edit($id),
			'kategori'	=> $this->M_kategori->get()
		];

		$this->load->view($this->template .'head', $data);
		$this->load->view($this->template .'sidebar', $data);
		$this->load->view($this->template .'header', $data);

		$this->load->view($this->folder .'edit', $data);
		
		$this->load->view($this->template .'footer', $data);

	}

	public function update(){

		$id = $this->uri->segment(3);

		if ($_FILES['image']['name'] == '') {
			
			$data = [
					'nama_barang'	=> $_POST['nama_barang'],
					'id_kategori'	=> $_POST['id_kategori'],
					'nama_admin'		=> $_POST['nama_admin'],
					'nama_pembuat'		=> $_POST['nama_pembuat'],
					'tahun_terbit'	=> $_POST['tahun_terbit'],
					'barecode'			=> $_POST['hasil_isbn'],
					'stok'			=> $_POST['stok'],
					'tanggal_update'=> date('Y-m-d H:i:s')
				];

			$this->M_barang->update($id, $data);

			//Informasi setelah data dihapus
			$this->error("Data Berhasil Diupdate","success");

			redirect($this->menu, 'refresh');
		}else{						
			//File image buku dihapus terlebih dahulu			
			define('PUBPATH',str_replace(SELF,'',FCPATH));
			$data 	= $this->M_barang->edit($id);
			$path 	= PUBPATH .'assets/barang/'.$data['image'];
			if (file_exists($path)) {
				unlink($path);
			}

			$config['upload_path'] 	= './assets/barang/';
			$config['allowed_types']= 'jpg|png'; // type yg diiznkan jpg & png
			$config['max_size']  	= '512'; // maxsize 512kb
			$config['file_name']	= 'barang-'.date("Ymd-His"); //rename img yg diupload
			
			$this->load->library('upload', $config);
			
			//Pengecekan ke-3
			if ( ! $this->upload->do_upload('image')){
				//Jika gambar gagal diupload

				$error = array('error' => $this->upload->display_errors());

				$this->error($error['error']);

				redirect($this->uri->segment(1).'/add','refresh');
			}else{				

				//Jika gambar berhasil diupload, maka lanjut pross simpan data	
				$upload_data = $this->upload->data();				

				$data = [
						'nama_barang'	=> $_POST['nama_barang'],
						'id_kategori'	=> $_POST['id_kategori'],
						'nama_admin'		=> $_POST['nama_admin'],
						'nama_pembuat'		=> $_POST['nama_pembuat'],
						'tahun_terbit'	=> $_POST['tahun_terbit'],
						'barecode'			=> $_POST['hasil_isbn'],
						'stok'			=> $_POST['stok'],
						'image'			=> $upload_data['orig_name'],
						'tanggal_update'=> date('Y-m-d H:i:s')
					];

				$this->M_barang->update($id, $data);

				//Informasi setelah data dihapus
				$this->error("Data Berhasil Diupdate","success");

				redirect($this->uri->segment(1),'refresh');
			}
		}
	}

	public function detail(){

		$id = $this->uri->segment(3);
		
		$data = [
			'title'		=> $this->menu,
			'subtitle'	=> 'Detail',
			'data' 		=> $this->M_barang->edit($id)
		];

		$this->load->view($this->template .'head', $data);
		$this->load->view($this->template .'sidebar', $data);
		$this->load->view($this->template .'header', $data);

		$this->load->view($this->folder .'detail', $data);
		
		$this->load->view($this->template .'footer', $data);

	}

	public function error($message, $alert){
		
		#alert = success / danger

		$error = "
				<div class='col-lg-12 alert alert-$alert' >		
						$message							
				</div>
			";

		return $this->session->set_flashdata('message', $error);
	}
}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */