<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public $main_menu = 'Pengguna';

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "admin") {
            redirect('login');
        }
        $this->load->model('PenggunaModel');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $pengguna = $this->PenggunaModel->get_all();

        $data = array(
            'content' => 'pengguna/pengguna_list',
            'pengguna_data' => $pengguna,
        );
        $this->load->view('layout/static', $data);
    }

    public function read($id) 
    {
        $row = $this->PenggunaModel->get_by_id($id);
        if ($row) {
            $data = array(
                'main_menu' => $this->main_menu,
                'content' => 'pengguna/pengguna_read',
                'username' => $row->username,
                'password' => $row->password,
                'nama_pengguna' => $row->nama_pengguna,
                'hak_akses' => $row->hak_akses,
                'email' => $row->email,
            );
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pengguna'));
        }
    }

    public function create() 
    {
        $data = array(
            'main_menu' => $this->main_menu,
            'content' => 'pengguna/pengguna_form',
            'button' => 'Create',
            'action' => site_url('Pengguna/create_action'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'nama_pengguna' => set_value('nama_pengguna'),
	    'hak_akses' => set_value('hak_akses'),
	    'email' => set_value('email'),
	);
        //$this->load->view('pengguna/pengguna_form', $data);
        // #this
        $this->load->view('layout/static', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(  
                'username' => $this->input->post('username',TRUE),
                'password' => md5($this->input->post('password',TRUE)),
                'nama_pengguna' => $this->input->post('nama_pengguna',TRUE),
                'hak_akses' => $this->input->post('hak_akses',TRUE),
                'email' => $this->input->post('email',TRUE),
                );

            $this->PenggunaModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Pengguna'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->PenggunaModel->get_by_id($id);

        if ($row) {
            $data = array(
                'main_menu' => $this->main_menu,
                'content' => 'pengguna/pengguna_form',
                'button' => 'Update',
                'action' => site_url('Pengguna/update_action'),
                'username' => set_value('username', $row->username),
                'password' => set_value('password', $row->password),
                'nama_pengguna' => set_value('nama_pengguna', $row->nama_pengguna),
                'hak_akses' => set_value('hak_akses', $row->hak_akses),
                'email' => set_value('email', $row->email),
            );
            //$this->load->view('pengguna/pengguna_form', $data);
            // #this
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pengguna'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();       

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('username', TRUE));
        } else {

            $data = array(
                'password' => md5($this->input->post('password',TRUE)),
                'nama_pengguna' => $this->input->post('nama_pengguna',TRUE),
                'hak_akses' => $this->input->post('hak_akses',TRUE),
                'email' => $this->input->post('email',TRUE),
            );
            $this->PenggunaModel->update($this->input->post('username'), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Pengguna'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->PenggunaModel->get_by_id($id);

        if ($row) {
            $this->PenggunaModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Pengguna'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pengguna'));
        }
    }

    public function _rules(){
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('nama_pengguna', 'nama pengguna', 'trim|required');
        $this->form_validation->set_rules('hak_akses', 'hak akses', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
