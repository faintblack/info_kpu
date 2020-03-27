<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SuaraCalonPileg extends CI_Controller{

    public $main_menu = 'Data Pemilu';
    public $sub_menu = 'PILEG';

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "admin") {
            redirect('login');
        }
        $this->load->model('SuaraCalonPilegModel');
        $this->load->model('CalonPilegModel');
        $this->load->model('KecamatanModel');
        $this->load->library('form_validation');
    }

    public function index(){

        $suaracalonpileg2 = $this->SuaraCalonPilegModel->get_all();

        $data = array(
            'main_menu' => $this->main_menu,
            'content' => 'suaracalonpileg/suara_calon_pileg_list',
            'suaracalonpileg_data' => $suaracalonpileg2
        );
        $this->load->view('layout/static', $data);
//        $this->load->view('suaracalonpileg/suara_calon_pileg_list', $data);
    }

    public function read($id){
        $row = $this->SuaraCalonPilegModel->get_by_id($id);
        if ($row) {
            $data = array(
                'main_menu' => $this->main_menu,
				'sub_menu' => $this->sub_menu,
				'detail_menu' => 'Suara Calon Pileg',
                'content' => 'suaracalonpileg/suara_calon_pileg_read',
                'id_suara_calon_pileg' => $row->id_suara_calon_pileg,
                'id_calon_pileg' => $row->id_calon_pileg,
                'nama_calon' => $row->nama_calon,
                'id_kecamatan' => $row->id_kecamatan,
                'nama_kecamatan' => $row->nama_kecamatan,
                'jumlah_suara' => $row->jumlah_suara,
                'tahun' => $row->tahun,
            );
            $this->load->view('layout/static', $data);
//            $this->load->view('suaracalonpileg/suara_calon_pileg_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('suaracalonpileg'));
        }
    }

    public function create(){
        
        $data = array(
            'main_menu' => $this->main_menu,
            'sub_menu' => $this->sub_menu,
            'detail_menu' => 'Suara Calon Pileg',
            'content' => 'suaracalonpileg/suara_calon_pileg_form',
            'button' => 'Create',
            'action' => site_url('suaracalonpileg/create_action'),
            'id_suara_calon_pileg' => set_value('id_suara_calon_pileg'),
            'id_calon_pileg' => set_value('id_calon_pileg'),
            'id_kecamatan' => set_value('id_kecamatan'),
            'jumlah_suara' => set_value('jumlah_suara'),
            'tahun' => set_value('tahun'),
        );
        $this->load->view('layout/static', $data);
//        $this->load->view('suaracalonpileg/suara_calon_pileg_form', $data);
    }
    
    public function create_action(){
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_calon_pileg' => $this->input->post('id_calon_pileg',TRUE),
		'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
		'jumlah_suara' => $this->input->post('jumlah_suara',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
	    );

            $this->SuaraCalonPilegModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('suaracalonpileg'));
        }
    }
    
    public function update($id){
        $row = $this->SuaraCalonPilegModel->get_by_id($id);

        if ($row) {
            $data = array(
                'main_menu' => $this->main_menu,
                'sub_menu' => $this->sub_menu,
                'detail_menu' => 'Suara Calon Pileg',
                'content' => 'suaracalonpileg/suara_calon_pileg_form',
                'button' => 'Update',
                'action' => site_url('suaracalonpileg/update_action'),
                'id_suara_calon_pileg' => set_value('id_suara_calon_pileg', $row->id_suara_calon_pileg),
                'id_calon_pileg' => set_value('id_calon_pileg', $row->id_calon_pileg),
                'id_kecamatan' => set_value('id_kecamatan', $row->id_kecamatan),
                'jumlah_suara' => set_value('jumlah_suara', $row->jumlah_suara),
                'tahun' => set_value('tahun', $row->tahun),
            );
            $this->load->view('layout/static', $data);
//            $this->load->view('suaracalonpileg/suara_calon_pileg_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('suaracalonpileg'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_suara_calon_pileg', TRUE));
        } else {
            $data = array(
		'id_calon_pileg' => $this->input->post('id_calon_pileg',TRUE),
		'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
		'jumlah_suara' => $this->input->post('jumlah_suara',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
	    );

            $this->SuaraCalonPilegModel->update($this->input->post('id_suara_calon_pileg', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('suaracalonpileg'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->SuaraCalonPilegModel->get_by_id($id);

        if ($row) {
            $this->SuaraCalonPilegModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('suaracalonpileg'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('suaracalonpileg'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_calon_pileg', 'id calon pileg', 'trim|required');
	$this->form_validation->set_rules('id_kecamatan', 'id kecamatan', 'trim|required');
	$this->form_validation->set_rules('jumlah_suara', 'jumlah suara', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');

	$this->form_validation->set_rules('id_suara_calon_pileg', 'id_suara_calon_pileg', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file SuaraCalonPileg.php */
/* Location: ./application/controllers/SuaraCalonPileg.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-25 02:41:09 */
/* http://harviacode.com */