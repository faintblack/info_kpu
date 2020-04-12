<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

	public function __construct(){ 
		parent::__construct();		
		$this->load->model('PenggunaModel');
	}

	public function index(){ 
		if ($this->session->userdata('level') == "admin") {
			redirect('HomeController');
		}else{
			$this->load->view('Login');
		}
	}

	public function validasi(){ //
		$where = array('username' => $this->input->post('username', TRUE),
						'password' => md5($this->input->post('password', TRUE)));
		$cek = $this->PenggunaModel->validasi($where);
		if($cek->num_rows() == 1){
			foreach($cek->result() as $a ){

			$data_session['isLogin'] = TRUE; 
			$data_session['username'] = $a->username;
			$data_session['nama'] = $a->nama_pengguna;
			$data_session['level'] = $a->hak_akses;
			$this->session->set_userdata($data_session);

			}
			if ($this->session->userdata('level') == 'admin') {
				redirect('HomeController');
			}

		}else{
			echo "<script>alert('GAGAL LOGIN: Username atau Password Anda Salah!');history.go(-1);</script>";
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('Login');
	}
}