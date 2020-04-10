<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		if ($this->session->userdata('level') != "admin") {
			redirect('login');
		}
		$this->load->model('beritamodel');
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		$berita = $this->beritamodel->find($username);

		$this->load->view('layout/static', ['content' => 'berita/index', 'berita' => $berita]);
	}

	public function tambah()
	{
		$this->load->view('layout/static', ['content' => 'berita/tambahberita']);
	}
	public function tambahberita()
	{
		$config['upload_path'] = 'libraries/ubold/assets/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;
		$config['remove_space'] = TRUE;

		$this->load->library('upload', $config);

		if ( !$this->upload->do_upload('gambar') ){
			$gambar="";
		}else{
			$file1 = array('upload_data' => $this->upload->data());
			$gambar= $file1['upload_data']['file_name'];
		}

		$jenis = $this->input->post('jenis_berita');
		$isi = $this->input->post('isi_berita');
		$waktu = date("Y-m-d h:i:s");
		$username = $this->session->userdata('username');

		$data = array(
			'username' => $username,
			'jenis_berita' => $jenis,
			'isi_berita' => $isi, 
			'gambar_berita' => $gambar, 
			'waktu' => $waktu
		);
		//print_r($data1);exit();
		$this->beritamodel->tambah($data, 'berita');

		redirect('berita');
	}

	public function detail($id_berita)
	{
		$id = array('id_berita' => $id_berita);
		$detail = $this->beritamodel->detail($id)->result();

		$this->load->view('layout/static', ['content' => 'berita/detailberita', 'detail' => $detail]);
	}

	public function edit($id_berita)
	{
		$id = array('id_berita' => $id_berita);
		$edit = $this->beritamodel->detail($id)->result();

		$this->load->view('layout/static', ['content' => 'berita/editberita', 'edit' => $edit]);
	}

	public function editberita()
	{
		$config['upload_path'] = 'libraries/ubold/assets/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;
		$config['remove_space'] = TRUE;

		$this->load->library('upload', $config);

		$id = $this->input->post('id_berita');

		if ( !$this->upload->do_upload('gambar') ){
			$tmp = $this->beritamodel->detail(['id_berita' => $id])->result();
			$gambar = $tmp[0]->gambar_berita;
		}else{
			$file1 = array('upload_data' => $this->upload->data());
			$gambar= $file1['upload_data']['file_name'];

			// Jika update data gambar, hapus data gambar sebelumnya
			$tmp = $this->beritamodel->detail(['id_berita' => $id])->result();
			$old_gambar = $tmp[0]->gambar_berita;
			unlink($config['upload_path'].$old_gambar);
		}

		$data['gambar_berita'] = $gambar;
		$data['jenis_berita'] = $this->input->post('jenis_berita');
		$data['isi_berita'] = $this->input->post('isi_berita');		

		$where = array('id_berita' => $id);

		$this->beritamodel->edit($where, $data);

		redirect('berita');
	}

	public function hapus($id_berita)
	{
		$id = array('id_berita' => $id_berita);
		$this->beritamodel->hapus($id, 'berita');

		redirect('berita');
	}

	public function komentar($id_berita)
	{
		$id = $id_berita;
		$komentar = $this->beritamodel->komentar($id)->result();
		$id = array('id_berita' => $id_berita);
		$berita = $this->beritamodel->detail($id)->result();

		$this->load->view('layout/static', ['content' => 'berita/komentar', 'komentar' => $komentar, 'berita' => $berita]);
	}

	public function hapuskomentar($id_komentar)
	{
		$idberita = $id_komentar;
		$row = $this->beritamodel->cari_berita_id($idberita)->row();
		$ide = $row->id_berita;

		$id = array('id_komentar' => $id_komentar);
		$this->beritamodel->hapus($id, 'komentar');

		redirect(site_url('berita/komentar/'.$ide));
	}

}
