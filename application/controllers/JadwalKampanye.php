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
                'tanggal' => $row->tanggal,
                'id_paslon_pilpres' => $row->id_paslon_pilpres,
                'nomor_urut' => $row->nomor_urut,
                'nama_capres' => $row->nama_capres,
                'nama_cawapres' => $row->nama_cawapres,
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
                    'tanggal' => $tgl_fix,
                    'id_paslon_pilpres' => $id_paslon_pilpres
                ];
            }

            $this->JadwalKampanyeModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('JadwalKampanye'));
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

    public function getJson(){
        $data_jadwal_kampanye = $this->JadwalKampanyeModel->get_all();
        foreach ($data_jadwal_kampanye as $key => $value) {
            $data[] = [
                'title' => 'Paslon '.$value->nomor_urut,
                'paslon' => "{$value->nama_capres} & {$value->nama_cawapres}",
                'start' => $value->tanggal,
                'allDay' => true,
            ];
        }
        echo json_encode($data);
	}

    public function _rules(){
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('id_paslon_pilpres', 'paslon pilpres', 'trim|required');

        $this->form_validation->set_rules('id_jadwal_kampanye', 'id_jadwal_kampanye', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
