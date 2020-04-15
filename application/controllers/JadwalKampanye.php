<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class JadwalKampanye extends CI_Controller{

    public $main_menu = 'Data Pemilu';
    public $sub_menu = 'Jadwal Kampanye';

    function __construct()
    {
        parent::__construct();
        $this->load->model('JadwalKampanyeModel');
        $this->load->model('KecamatanModel');
        $this->load->model('PaslonPilpresModel');
        $this->load->library('form_validation');
    }

    public function index(){
        $jadwalkampanye = $this->JadwalKampanyeModel->get_all();
        
        $data = array(
            'content' => 'jadwalkampanye/jadwal_kampanye_list',
            'jadwalkampanye_data' => $jadwalkampanye,
        );
        $this->load->view('layout/static', $data);
    }

    public function read($id) {
        $row = $this->JadwalKampanyeModel->get_by_id($id);
        if ($row) {
            $data = array(
                'main_menu' => $this->main_menu,
                'sub_menu' => $this->sub_menu,
                'content' => 'jadwalkampanye/jadwal_kampanye_read',
                'id_jadwal_kampanye' => $row->id_jadwal_kampanye,
                'id_kecamatan' => $row->id_kecamatan,
                'tanggal' => $row->tanggal,
                'id_paslon_pilpres' => $row->id_paslon_pilpres,
                'nomor_urut' => $row->nomor_urut,
                'nama_capres' => $row->nama_capres,
                'nama_cawapres' => $row->nama_cawapres,
                'nama_kecamatan' => $row->nama_kecamatan,
            );
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('JadwalKampanye'));
        }
    }

    public function create() {
        $kecamatan = $this->KecamatanModel->get_all();
        $paslon_pilpres = $this->PaslonPilpresModel->get_all();
        
        $data = array(
            'main_menu' => $this->main_menu,
            'sub_menu' => $this->sub_menu,
            'kecamatan' => $kecamatan,
            'paslon_pilpres' => $paslon_pilpres,
            'content' => 'jadwalkampanye/jadwal_kampanye_form',
            'button' => 'Create',
            'action' => site_url('JadwalKampanye/create_action'),
            'id_jadwal_kampanye' => set_value('id_jadwal_kampanye'),
            'id_kecamatan' => set_value('id_kecamatan'),
            'tanggal' => set_value('tanggal'),
            'id_paslon_pilpres' => set_value('id_paslon_pilpres'),
        );
        $this->load->view('layout/static', $data);
    }
    
    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $id_kecamatan = $this->input->post('id_kecamatan',TRUE);
            $tanggal = $this->input->post('tanggal',TRUE);
            $id_paslon_pilpres = $this->input->post('id_paslon_pilpres',TRUE);

            $split_tanggal = explode(',', $tanggal);    

            foreach ($split_tanggal as $key => $value) {
                $split_value = explode('/', $value);
                $tahun = $split_value[2];
                $bulan = $split_value[0];
                $tgl = $split_value[1];

                $tgl_fix = "{$tahun}-{$bulan}-{$tgl}";

                $data[$key] = [
                    'id_kecamatan' => $id_kecamatan,
                    'tanggal' => $tgl_fix,
                    'id_paslon_pilpres' => $id_paslon_pilpres
                ];
            }

            $this->JadwalKampanyeModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jadwalkampanye'));
        }
    }
    
    public function update($id){
        $row = $this->JadwalKampanyeModel->get_by_id($id);

        if ($row) {
            $kecamatan = $this->KecamatanModel->get_all();
            $paslon_pilpres = $this->PaslonPilpresModel->get_all();

            $data = array(
                'main_menu' => $this->main_menu,
                'sub_menu' => $this->sub_menu,
                'kecamatan' => $kecamatan,
                'paslon_pilpres' => $paslon_pilpres,
                'content' => 'jadwalkampanye/jadwal_kampanye_form_update',
                'button' => 'Update',
                'action' => site_url('JadwalKampanye/update_action'),
                'id_jadwal_kampanye' => set_value('id_jadwal_kampanye', $row->id_jadwal_kampanye),
                'id_kecamatan' => set_value('id_kecamatan', $row->id_kecamatan),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'id_paslon_pilpres' => set_value('id_paslon_pilpres', $row->id_paslon_pilpres),
            );
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('JadwalKampanye'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jadwal_kampanye', TRUE));
        } else {
            $data = array(
		'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'id_paslon_pilpres' => $this->input->post('id_paslon_pilpres',TRUE),
	    );

            $this->JadwalKampanyeModel->update($this->input->post('id_jadwal_kampanye', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('JadwalKampanye'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->JadwalKampanyeModel->get_by_id($id);

        if ($row) {
            $this->JadwalKampanyeModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('JadwalKampanye'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('JadwalKampanye'));
        }
    }

    public function _rules(){
        $this->form_validation->set_rules('id_kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('id_paslon_pilpres', 'paslon pilpres', 'trim|required');

        $this->form_validation->set_rules('id_jadwal_kampanye', 'id_jadwal_kampanye', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
