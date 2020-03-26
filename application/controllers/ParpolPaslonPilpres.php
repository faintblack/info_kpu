<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ParpolPaslonPilpres extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "admin") {
            redirect('login');
        }
        $this->load->model('ParpolPaslonPilpresModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'parpolpaslonpilpres/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'parpolpaslonpilpres/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'parpolpaslonpilpres/index.html';
            $config['first_url'] = base_url() . 'parpolpaslonpilpres/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->ParpolPaslonPilpresModel->total_rows($q);
        $parpolpaslonpilpres = $this->ParpolPaslonPilpresModel->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'parpolpaslonpilpres_data' => $parpolpaslonpilpres,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
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
            redirect(site_url('paslonpilpres/read/'.$id_paslon));
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
            redirect(site_url('parpolpaslonpilpres'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('parpolpaslonpilpres/create_action'),
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
            redirect(site_url('parpolpaslonpilpres'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->ParpolPaslonPilpresModel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('parpolpaslonpilpres/update_action'),
                'id_parpol_paslon_pilpres' => set_value('id_parpol_paslon_pilpres', $row->id_parpol_paslon_pilpres),
                'id_paslon_pilpres' => set_value('id_paslon_pilpres', $row->id_paslon_pilpres),
                'id_parpol' => set_value('id_parpol', $row->id_parpol),
            );
            $this->load->view('parpolpaslonpilpres/parpol_paslon_pilpres_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('parpolpaslonpilpres'));
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
            redirect(site_url('parpolpaslonpilpres'));
        }
    }
    
    public function delete($id, $id_paslon) 
    {
        $row = $this->ParpolPaslonPilpresModel->get_by_id($id);

        if ($row) {
            $this->ParpolPaslonPilpresModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('paslonpilpres/read/'.$id_paslon));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('parpolpaslonpilpres'));
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

/* End of file ParpolPaslonPilpres.php */
/* Location: ./application/controllers/ParpolPaslonPilpres.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-22 07:59:23 */
/* http://harviacode.com */