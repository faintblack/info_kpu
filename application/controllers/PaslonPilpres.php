<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaslonPilpres extends CI_Controller{

    public $main_menu = 'Data Pemilu';
    public $sub_menu = 'PILPRES';

    function __construct(){
        parent::__construct();
        if ($this->session->userdata('level') != "admin") {
            redirect('login');
        }
        $this->load->model('PaslonPilpresModel');
        $this->load->model('ParpolPaslonPilpresModel');
        $this->load->model('CalonPilpresModel');
        $this->load->model('ParpolModel');
        $this->load->library('form_validation');
    }

    public function index(){
        $paslonpilpres = $this->PaslonPilpresModel->get_all();

        $data = array(
            'main_menu' => $this->main_menu,
            'content' => 'paslonpilpres/paslon_pilpres_list',
            'paslonpilpres_data' => $paslonpilpres,
        );
        $this->load->view('layout/static', $data);
    }

    public function read($id) 
    {
        $row = $this->PaslonPilpresModel->get_by_id($id);
        
        if ($row) {
            
            $parpol_data = $this->ParpolPaslonPilpresModel->get_where(['id_paslon_pilpres' => $id]);
            $data = array(
                'main_menu' => $this->main_menu,
				'sub_menu' => $this->sub_menu,
				'detail_menu' => 'Paslon Pilpres',
                'parpol_data' => $parpol_data,
                'content' => 'paslonpilpres/paslon_pilpres_read',
                'id_paslon_pilpres' => $row->id_paslon_pilpres,
                'nomor_urut' => $row->nomor_urut,
                'id_capres' => $row->id_capres,
                'id_cawapres' => $row->id_cawapres,
                'capres' => $row->nama_capres,
                'cawapres' => $row->nama_cawapres,
                'tahun' => $row->tahun
            );
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('PaslonPilpres'));
        }
    }

    public function create() 
    {
        $calon_pilpres = $this->CalonPilpresModel->get_all();
        
        $data = array(
            'main_menu' => $this->main_menu,
            'sub_menu' => $this->sub_menu,
            'detail_menu' => 'Paslon Pilpres',
            'calon_pilpres' => $calon_pilpres,
            'content' => 'paslonpilpres/paslon_pilpres_form',
            'button' => 'Create',
            'action' => site_url('PaslonPilpres/create_action'),
            'id_paslon_pilpres' => set_value('id_paslon_pilpres'),
            'nomor_urut' => set_value('nomor_urut'),
            'id_capres' => set_value('id_capres'),
            'id_cawapres' => set_value('id_cawapres'),
            'tahun' => set_value('tahun')
        );
        $this->load->view('layout/static', $data);
    }
    
    public function create_action() 
    {
        
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nomor_urut' => $this->input->post('nomor_urut',TRUE),
                'id_capres' => $this->input->post('id_capres',TRUE),
                'id_cawapres' => $this->input->post('id_cawapres',TRUE),
                'tahun' => $this->input->post('tahun',TRUE),
            );
            $data_parpol_pendukung = $this->input->post('parpol_pilpres');

            // Input paslon
            $this->PaslonPilpresModel->insert($data);

            $last_paslon = $this->PaslonPilpresModel->get_last();
            foreach ($data_parpol_pendukung as $key => $value) {
                $data2 = [
                    'id_paslon_pilpres' => $last_paslon->id_paslon_pilpres,
                    'id_parpol' => $value
                ];
                // input parpol pendukung paslon
                $this->ParpolPaslonPilpresModel->insert($data2);
            }
            
            
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('PaslonPilpres'));
        }
    }
    
    public function update($id){

        $row = $this->PaslonPilpresModel->get_by_id($id);

        if ($row) {
            $calon_pilpres = $this->CalonPilpresModel->get_all();
            $data = array(
                'main_menu' => $this->main_menu,
				'sub_menu' => $this->sub_menu,
				'detail_menu' => 'Paslon Pilpres',
                'calon_pilpres' => $calon_pilpres,
                'content' => 'paslonpilpres/paslon_pilpres_form',
                'button' => 'Update',
                'action' => site_url('PaslonPilpres/update_action'),
                'id_paslon_pilpres' => set_value('id_paslon_pilpres', $row->id_paslon_pilpres),
                'nomor_urut' => set_value('nomor_urut', $row->nomor_urut),
                'id_capres' => set_value('id_capres', $row->id_capres),
                'id_cawapres' => set_value('id_cawapres', $row->id_cawapres),
                'tahun' => set_value('tahun', $row->tahun)
            );
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('PaslonPilpres'));
        }
    }
    
    public function update_action() 
    {
        // Jika update nomor urut 
        if ($this->input->post('nomor_urut-lama',TRUE) != $this->input->post('nomor_urut',TRUE)) {
            $this->_rules();
        } else {
            $this->_rules('skip_nomor_urut');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_paslon_pilpres', TRUE));
        } else {
            $data = array(
                'nomor_urut' => $this->input->post('nomor_urut',TRUE),
                'id_capres' => $this->input->post('id_capres',TRUE),
                'id_cawapres' => $this->input->post('id_cawapres',TRUE),
                'tahun' => $this->input->post('tahun',TRUE),
            );

            $this->PaslonPilpresModel->update($this->input->post('id_paslon_pilpres', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('PaslonPilpres'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->PaslonPilpresModel->get_by_id($id);

        if ($row) {
            $this->PaslonPilpresModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('PaslonPilpres'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('PaslonPilpres'));
        }
    }

    public function _rules($type = '') 
    {
        if ($type == '') {
            $this->form_validation->set_rules('nomor_urut', 'nomor urut', 'trim|required|is_unique[paslon_pilpres.nomor_urut]');
        }
        
        $this->form_validation->set_rules('id_capres', 'id capres', 'trim|required');
        $this->form_validation->set_rules('id_cawapres', 'id cawapres', 'trim|required|callback_nomatches[id_capres]');
        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');

        $this->form_validation->set_rules('id_paslon_pilpres', 'id_paslon_pilpres', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function nomatches($first, $second){
        if ($first == $this->input->post($second)) {
            $this->form_validation->set_message('nomatches', 'Capres dan Cawapres tidak bisa orang yang sama');
            return false;
        }
        return true;
    }

}
