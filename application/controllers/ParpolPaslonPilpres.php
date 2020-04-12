<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParpolPaslonPilpres extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "admin") {
            redirect('Login');
        }
        $this->load->model('ParpolPaslonPilpresModel');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $parpolpaslonpilpres = $this->ParpolPaslonPilpresModel->get_all();

        $data = array(
            'parpolpaslonpilpres_data' => $parpolpaslonpilpres,
        );
        $this->load->view('parpolpaslonpilpres/parpol_paslon_pilpres_list', $data);
    }

    public function add($id_paslon){
        $parpol_pendukung = $this->input->post('parpol_pendukung');
        
        foreach ($parpol_pendukung as $key => $value) {
            $data = [
                'id_paslon_pilpres' => $id_paslon,
                'id_parpol' => $value
            ];
            $this->ParpolPaslonPilpresModel->insert($data);
        }
        $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('PaslonPilpres/read/'.$id_paslon));
    }

    public function read($id) 
    {
        $row = $this->ParpolPaslonPilpresModel->get_by_id($id);
        if ($row) {
            $data = array(
              'id_parpol_paslon_pilpres' => $row->id_parpol_paslon_pilpres,
              'id_paslon_pilpres' => $row->id_paslon_pilpres,
              'id_parpol' => $row->id_parpol,
          );
            $this->load->view('parpolpaslonpilpres/parpol_paslon_pilpres_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ParpolPaslonPilpres'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ParpolPaslonPilpres/create_action'),
            'id_parpol_paslon_pilpres' => set_value('id_parpol_paslon_pilpres'),
            'id_paslon_pilpres' => set_value('id_paslon_pilpres'),
            'id_parpol' => set_value('id_parpol'),
        );
        $this->load->view('parpolpaslonpilpres/parpol_paslon_pilpres_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'id_paslon_pilpres' => $this->input->post('id_paslon_pilpres',TRUE),
              'id_parpol' => $this->input->post('id_parpol',TRUE),
          );

            $this->ParpolPaslonPilpresModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ParpolPaslonPilpres'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->ParpolPaslonPilpresModel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ParpolPaslonPilpres/update_action'),
                'id_parpol_paslon_pilpres' => set_value('id_parpol_paslon_pilpres', $row->id_parpol_paslon_pilpres),
                'id_paslon_pilpres' => set_value('id_paslon_pilpres', $row->id_paslon_pilpres),
                'id_parpol' => set_value('id_parpol', $row->id_parpol),
            );
            $this->load->view('parpolpaslonpilpres/parpol_paslon_pilpres_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ParpolPaslonPilpres'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_parpol_paslon_pilpres', TRUE));
        } else {
            $data = array(
              'id_paslon_pilpres' => $this->input->post('id_paslon_pilpres',TRUE),
              'id_parpol' => $this->input->post('id_parpol',TRUE),
          );

            $this->ParpolPaslonPilpresModel->update($this->input->post('id_parpol_paslon_pilpres', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ParpolPaslonPilpres'));
        }
    }
    
    public function delete($id, $id_paslon) 
    {
        $row = $this->ParpolPaslonPilpresModel->get_by_id($id);

        if ($row) {
            $this->ParpolPaslonPilpresModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('PaslonPilpres/read/'.$id_paslon));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('PaslonPilpres/read/'.$id_paslon));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('id_paslon_pilpres', 'id paslon pilpres', 'trim|required');
       $this->form_validation->set_rules('id_parpol', 'id parpol', 'trim|required');

       $this->form_validation->set_rules('id_parpol_paslon_pilpres', 'id_parpol_paslon_pilpres', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

}
