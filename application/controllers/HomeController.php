<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __construct(){
        parent:: __construct();

        if ($this->session->userdata('level') != "admin") {
			redirect('login');
		}
    }

	public function index()
	{
		$this->load->view('layout/static', ['content' => 'home/index']);
	}
}
