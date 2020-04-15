<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class LokasiKampanye extends CI_Controller{

    public $main_menu = 'Data Pemilu';
    public $sub_menu = 'Lokasi Kampanye';

    function __construct()
    {
        parent::__construct();
        $this->load->model('LokasiKampanyeModel');
        $this->load->model('KecamatanModel');
        $this->load->library('form_validation');
    }

    public function index(){
        $lokasikampanye = $this->LokasiKampanyeModel->get_all();
        
        $data = array(
            'content' => 'lokasikampanye/lokasi_kampanye_list',
            'lokasikampanye_data' => $lokasikampanye,
        );
        $this->load->view('layout/static', $data);
    }

    public function read($id){
        $row = $this->LokasiKampanyeModel->get_by_id($id);
        if ($row) {
            $data = array(
                'main_menu' => $this->main_menu,
                'sub_menu' => $this->sub_menu,
                'content' => 'lokasikampanye/lokasi_kampanye_read',
                'id_lokasi_kampanye' => $row->id_lokasi_kampanye,
                'id_kecamatan' => $row->id_kecamatan,
                'nama_lokasi' => $row->nama_lokasi,
                'nama_kecamatan' => $row->nama_kecamatan,
            );
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('LokasiKampanye'));
        }
    }

    public function create(){
        $kecamatan = $this->KecamatanModel->get_all();
        
        $data = array(
            'main_menu' => $this->main_menu,
            'sub_menu' => $this->sub_menu,
            'kecamatan' => $kecamatan,
            'content' => 'lokasikampanye/lokasi_kampanye_form',
            'button' => 'Create',
            'action' => site_url('LokasiKampanye/create_action'),
            'id_lokasi_kampanye' => set_value('id_lokasi_kampanye'),
            'id_kecamatan' => set_value('id_kecamatan'),
            'nama_lokasi' => set_value('nama_lokasi'),
        );
        $this->load->view('layout/static', $data);
    }
    
    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
		'nama_lokasi' => $this->input->post('nama_lokasi',TRUE),
	    );

            $this->LokasiKampanyeModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('LokasiKampanye'));
        }
    }
    
    public function update($id){
        $row = $this->LokasiKampanyeModel->get_by_id($id);

        if ($row) {
            $kecamatan = $this->KecamatanModel->get_all();
            $data = array(
                'main_menu' => $this->main_menu,
                'sub_menu' => $this->sub_menu,
                'kecamatan' => $kecamatan,
                'content' => 'lokasikampanye/lokasi_kampanye_form',
                'button' => 'Update',
                'action' => site_url('LokasiKampanye/update_action'),
                'id_lokasi_kampanye' => set_value('id_lokasi_kampanye', $row->id_lokasi_kampanye),
                'id_kecamatan' => set_value('id_kecamatan', $row->id_kecamatan),
                'nama_lokasi' => set_value('nama_lokasi', $row->nama_lokasi),
            );
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('LokasiKampanye'));
        }
    }
    
    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lokasi_kampanye', TRUE));
        } else {
            $data = array(
                'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
                'nama_lokasi' => $this->input->post('nama_lokasi',TRUE),
            );

            $this->LokasiKampanyeModel->update($this->input->post('id_lokasi_kampanye', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('LokasiKampanye'));
        }
    }
    
    public function delete($id){
        $row = $this->LokasiKampanyeModel->get_by_id($id);

        if ($row) {
            $this->LokasiKampanyeModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('LokasiKampanye'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('LokasiKampanye'));
        }
    }

    public function _rules(){
        $this->form_validation->set_rules('id_kecamatan', 'id kecamatan', 'trim|required');
        $this->form_validation->set_rules('nama_lokasi', 'nama lokasi', 'trim|required');

        $this->form_validation->set_rules('id_lokasi_kampanye', 'id_lokasi_kampanye', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
