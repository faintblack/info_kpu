<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ParpolPaslonPilkada extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ParpolPaslonPilkadaModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'parpolpaslonpilkada/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'parpolpaslonpilkada/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'parpolpaslonpilkada/index.html';
            $config['first_url'] = base_url() . 'parpolpaslonpilkada/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->ParpolPaslonPilkadaModel->total_rows($q);
        $parpolpaslonpilkada = $this->ParpolPaslonPilkadaModel->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'parpolpaslonpilkada_data' => $parpolpaslonpilkada,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('parpolpaslonpilkada/parpol_paslon_pilkada_list', $data);
    }

    public function read($id) 
    {
        $row = $this->ParpolPaslonPilkadaModel->get_by_id($id);
        if ($row) {
            $data = array(
		'id_parpol_paslon_pilkada' => $row->id_parpol_paslon_pilkada,
		'id_paslon' => $row->id_paslon,
		'id_parpol' => $row->id_parpol,
	    );
            $this->load->view('parpolpaslonpilkada/parpol_paslon_pilkada_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('parpolpaslonpilkada'));
        }
    }

    public function add($id_paslon){
        $parpol_pendukung = $this->input->post('parpol_pendukung');
        
        foreach ($parpol_pendukung as $key => $value) {
            $data = [
                'id_paslon' => $id_paslon,
                'id_parpol' => $value
            ];
            $this->ParpolPaslonPilkadaModel->insert($data);
        }
        $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('paslonpilkada/read/'.$id_paslon));
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('parpolpaslonpilkada/create_action'),
	    'id_parpol_paslon_pilkada' => set_value('id_parpol_paslon_pilkada'),
	    'id_paslon' => set_value('id_paslon'),
	    'id_parpol' => set_value('id_parpol'),
	);
        $this->load->view('parpolpaslonpilkada/parpol_paslon_pilkada_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_paslon' => $this->input->post('id_paslon',TRUE),
		'id_parpol' => $this->input->post('id_parpol',TRUE),
	    );

            $this->ParpolPaslonPilkadaModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('parpolpaslonpilkada'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->ParpolPaslonPilkadaModel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('parpolpaslonpilkada/update_action'),
		'id_parpol_paslon_pilkada' => set_value('id_parpol_paslon_pilkada', $row->id_parpol_paslon_pilkada),
		'id_paslon' => set_value('id_paslon', $row->id_paslon),
		'id_parpol' => set_value('id_parpol', $row->id_parpol),
	    );
            $this->load->view('parpolpaslonpilkada/parpol_paslon_pilkada_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('parpolpaslonpilkada'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_parpol_paslon_pilkada', TRUE));
        } else {
            $data = array(
		'id_paslon' => $this->input->post('id_paslon',TRUE),
		'id_parpol' => $this->input->post('id_parpol',TRUE),
	    );

            $this->ParpolPaslonPilkadaModel->update($this->input->post('id_parpol_paslon_pilkada', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('parpolpaslonpilkada'));
        }
    }
    
    public function delete($id, $id_paslon) 
    {
        $row = $this->ParpolPaslonPilkadaModel->get_by_id($id);

        if ($row) {
            $this->ParpolPaslonPilkadaModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('paslonpilkada/read/'.$id_paslon));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paslonpilkada/read/'.$id_paslon));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_paslon', 'id paslon', 'trim|required');
	$this->form_validation->set_rules('id_parpol', 'id parpol', 'trim|required');

	$this->form_validation->set_rules('id_parpol_paslon_pilkada', 'id_parpol_paslon_pilkada', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file ParpolPaslonPilkada.php */
/* Location: ./application/controllers/ParpolPaslonPilkada.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-11 05:57:47 */
/* http://harviacode.com */