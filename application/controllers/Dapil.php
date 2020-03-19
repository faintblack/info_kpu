<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dapil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('DapilModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'dapil/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dapil/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dapil/index.html';
            $config['first_url'] = base_url() . 'dapil/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->DapilModel->total_rows($q);
        $dapil = $this->DapilModel->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'content' => 'dapil/dapil_list',
            'dapil_data' => $dapil,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        #this -> 'dapil/dapil_list' merupakan isi content
        //$this->load->view('dapil/dapil_list', $data);
        $this->load->view('layout/static', $data);
    }

    public function read($id) 
    {
        $row = $this->DapilModel->get_by_id($id);
        if ($row) {
            $data = array(
                'content' => 'dapil/dapil_read',
                'id_dapil' => $row->id_dapil,
                'nama_dapil' => $row->nama_dapil,
                'alokasi_kursi' => $row->alokasi_kursi,
            );
            //$this->load->view('dapil/dapil_read', $data);
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Dapil'));
        }
    }

    public function create() 
    {
        $data = array(
            'content' => 'dapil/dapil_form',
            'button' => 'Create',
            'action' => site_url('dapil/create_action'),
            'id_dapil' => set_value('id_dapil'),
            'nama_dapil' => set_value('nama_dapil'),
            'alokasi_kursi' => set_value('alokasi_kursi'),
        );
        //$this->load->view('dapil/dapil_form', $data);
        $this->load->view('layout/static', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_dapil' => $this->input->post('nama_dapil',TRUE),
		'alokasi_kursi' => $this->input->post('alokasi_kursi',TRUE),
	    );

            $this->DapilModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Dapil'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->DapilModel->get_by_id($id);

        if ($row) {
            $data = array(
                #this
                'content' => 'dapil/dapil_form',
                'button' => 'Update',
                'action' => site_url('dapil/update_action'),
                'id_dapil' => set_value('id_dapil', $row->id_dapil),
                'nama_dapil' => set_value('nama_dapil', $row->nama_dapil),
                'alokasi_kursi' => set_value('alokasi_kursi', $row->alokasi_kursi),
            );
            //$this->load->view('dapil/dapil_form', $data);
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Dapil'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dapil', TRUE));
        } else {
            $data = array(
		'nama_dapil' => $this->input->post('nama_dapil',TRUE),
		'alokasi_kursi' => $this->input->post('alokasi_kursi',TRUE),
	    );

            $this->DapilModel->update($this->input->post('id_dapil', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dapil/index'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->DapilModel->get_by_id($id);

        if ($row) {
            $this->DapilModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Dapil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Dapil'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_dapil', 'nama dapil', 'trim|required');
	$this->form_validation->set_rules('alokasi_kursi', 'alokasi kursi', 'trim|required');

	$this->form_validation->set_rules('id_dapil', 'id_dapil', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "dapil.xls";
        $judul = "dapil";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Dapil");
	xlsWriteLabel($tablehead, $kolomhead++, "Alokasi Kursi");

	foreach ($this->DapilModel->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_dapil);
	    xlsWriteNumber($tablebody, $kolombody++, $data->alokasi_kursi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Dapil.php */
/* Location: ./application/controllers/Dapil.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-19 16:18:29 */
/* http://harviacode.com */