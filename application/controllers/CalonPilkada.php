<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CalonPilkada extends CI_Controller{

    public $main_menu = 'Data Pemilu';
    public $sub_menu = 'PILKADA';

    function __construct(){
        parent::__construct();
        if ($this->session->userdata('level') != "admin") {
			redirect('Login');
		}
        $this->load->model('CalonPilkadaModel');
        $this->load->library('form_validation');
    }

    public function index(){

        $calonpilkada = $this->CalonPilkadaModel->get_all();

        $data = array(
            'main_menu' => $this->main_menu,
            'content' => 'calonpilkada/calon_pilkada_list',
            'calonpilkada_data' => $calonpilkada
        );
        
        $this->load->view('layout/static', $data);
    }

    public function read($id) 
    {
        $row = $this->CalonPilkadaModel->get_by_id($id);
        if ($row) {
            $data = array(
                'main_menu' => $this->main_menu,
                'sub_menu' => $this->sub_menu,
                'detail_menu' => 'Data Calon Pilkada',
                'content' => 'calonpilkada/calon_pilkada_read',
                'id_calon_pilkada' => $row->id_calon_pilkada,
                'nama_calon' => $row->nama_calon,
                'gender' => $row->gender,
                'tgl_lahir' => $row->tgl_lahir,
                'alamat' => $row->alamat,
            );
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('CalonPilkada'));
        }
    }

    public function create() 
    {
        $data = array(
            'main_menu' => $this->main_menu,
            'sub_menu' => $this->sub_menu,
            'detail_menu' => 'Data Calon Pilkada',
            'content' => 'calonpilkada/calon_pilkada_form',
            'button' => 'Create',
            'action' => site_url('calonpilkada/create_action'),
            'id_calon_pilkada' => set_value('id_calon_pilkada'),
            'nama_calon' => set_value('nama_calon'),
            'gender' => set_value('gender'),
            'tgl_lahir' => set_value('tgl_lahir'),
            'alamat' => set_value('alamat'),
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
                'nama_calon' => $this->input->post('nama_calon',TRUE),
                'gender' => $this->input->post('gender',TRUE),
                'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
            );

            $this->CalonPilkadaModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('CalonPilkada'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->CalonPilkadaModel->get_by_id($id);

        if ($row) {
            $data = array(
                'main_menu' => $this->main_menu,
                'sub_menu' => $this->sub_menu,
                'detail_menu' => 'Data Calon Pilkada',
                'content' => 'calonpilkada/calon_pilkada_form',
                'button' => 'Update',
                'action' => site_url('calonpilkada/update_action'),
                'id_calon_pilkada' => set_value('id_calon_pilkada', $row->id_calon_pilkada),
                'nama_calon' => set_value('nama_calon', $row->nama_calon),
                'gender' => set_value('gender', $row->gender),
                'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
                'alamat' => set_value('alamat', $row->alamat),
            );
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('CalonPilkada'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_calon_pilkada', TRUE));
        } else {
            $data = array(
              'nama_calon' => $this->input->post('nama_calon',TRUE),
              'gender' => $this->input->post('gender',TRUE),
              'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
              'alamat' => $this->input->post('alamat',TRUE),
          );

            $this->CalonPilkadaModel->update($this->input->post('id_calon_pilkada', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('CalonPilkada'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->CalonPilkadaModel->get_by_id($id);

        if ($row) {
            $this->CalonPilkadaModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('CalonPilkada'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('CalonPilkada'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('nama_calon', 'nama calon', 'trim|required');
       $this->form_validation->set_rules('gender', 'gender', 'trim|required');
       $this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
       $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

       $this->form_validation->set_rules('id_calon_pilkada', 'id_calon_pilkada', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

}
