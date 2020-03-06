<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DapilController extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model('Dapil');
        $this->load->model('Kecamatan');
        $this->load->model('DataKecamatan');
        $this->load->model('Tps');
    }
    
	public function index()
	{
        $dapil = $this->Dapil->find();
        $dapil2 = $this->Dapil->getKecamatans(1);
        $kecamatan = $this->Kecamatan->find();
        $dkc = $this->DataKecamatan->find();
        $x = $this->Tps->find();
        
        print_r($x);exit();
		$this->load->view('layout/static', ['content' => 'dapil/index']);
	}
}
