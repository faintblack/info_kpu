<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Parpol extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ParpolModel');
        $this->load->model('PaslonPilpresModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'parpol/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'parpol/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'parpol/index.html';
            $config['first_url'] = base_url() . 'parpol/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->ParpolModel->total_rows($q);
        $parpol = $this->ParpolModel->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $parpol2 = $this->ParpolModel->get_all();

        $data = array(
            'content' => 'parpol/parpol_list',
            'parpol_data' => $parpol2,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('layout/static', $data);
//        $this->load->view('parpol/parpol_list', $data);
    }

    public function read($id) 
    {
        $row = $this->ParpolModel->get_by_id($id);
        if ($row) {
            $data = array(
                'content' => 'parpol/parpol_read',
                'id_parpol' => $row->id_parpol,
                'no_urut_parpol' => $row->no_urut_parpol,
                'no_urut_capres' => $row->no_urut_capres,
                'capres' => $row->id_capres,
                'cawapres' => $row->id_cawapres,
                'nama_parpol' => $row->nama_parpol,
                'pendukung_capres' => $row->pendukung_capres,
            );
            $this->load->view('layout/static', $data);
//            $this->load->view('parpol/parpol_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('parpol'));
        }
    }

    public function create() 
    {
        $data_paslon_pilpres = $this->PaslonPilpresModel->get_all();
        $data = array(
            'data_paslon_pilpres' => $data_paslon_pilpres,
            'content' => 'parpol/parpol_form',
            'button' => 'Create',
            'action' => site_url('parpol/create_action'),
            'id_parpol' => set_value('id_parpol'),
            'no_urut_parpol' => set_value('no_urut_parpol'),
            'nama_parpol' => set_value('nama_parpol'),
            'pendukung_capres' => set_value('pendukung_capres'),
        );
        $this->load->view('layout/static', $data);
//        $this->load->view('parpol/parpol_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'no_urut_parpol' => $this->input->post('no_urut_parpol',TRUE),
              'nama_parpol' => $this->input->post('nama_parpol',TRUE),
              'pendukung_capres' => $this->input->post('pendukung_capres',TRUE),
          );

            $this->ParpolModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('parpol'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->ParpolModel->get_by_id($id);

        if ($row) {
            $data_paslon_pilpres = $this->PaslonPilpresModel->get_all();
            $data = array(
                'data_paslon_pilpres' => $data_paslon_pilpres,
                'content' => 'parpol/parpol_form',
                'button' => 'Update',
                'action' => site_url('parpol/update_action'),
                'id_parpol' => set_value('id_parpol', $row->id_parpol),
                'no_urut_parpol' => set_value('no_urut_parpol', $row->no_urut_parpol),
                'nama_parpol' => set_value('nama_parpol', $row->nama_parpol),
                'pendukung_capres' => set_value('pendukung_capres', $row->pendukung_capres),
            );
            $this->load->view('layout/static', $data);
//            $this->load->view('parpol/parpol_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('parpol'));
        }
    }
    
    public function update_action() 
    {
        // Jika update nomor urut parpol
        if ($this->input->post('no_urut_parpol-lama',TRUE) != $this->input->post('no_urut_parpol',TRUE)) {
            $this->_rules();
        } else {
            $this->_rules('skip_nomor_urut');
        }        

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_parpol', TRUE));
        } else {
            $data = array(
                'no_urut_parpol' => $this->input->post('no_urut_parpol',TRUE),
                'nama_parpol' => $this->input->post('nama_parpol',TRUE),
                'pendukung_capres' => $this->input->post('pendukung_capres',TRUE),
            );

            $this->ParpolModel->update($this->input->post('id_parpol', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('parpol'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->ParpolModel->get_by_id($id);

        if ($row) {
            $this->ParpolModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('parpol'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('parpol'));
        }
    }

    public function _rules($type = '') {
        if ($type == '') {
            $this->form_validation->set_rules('no_urut_parpol', 'no urut parpol', 'trim|required|is_unique[parpol.no_urut_parpol]');
        }
        
        $this->form_validation->set_rules('nama_parpol', 'nama parpol', 'trim|required');
        $this->form_validation->set_rules('pendukung_capres', 'pendukung capres', 'trim|required');

        $this->form_validation->set_rules('id_parpol', 'id_parpol', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "parpol.xls";
        $judul = "parpol";
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
        xlsWriteLabel($tablehead, $kolomhead++, "No Urut Parpol");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Parpol");
        xlsWriteLabel($tablehead, $kolomhead++, "Pendukung Capres");

        foreach ($this->ParpolModel->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->no_urut_parpol);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_parpol);
            xlsWriteNumber($tablebody, $kolombody++, $data->pendukung_capres);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Parpol.php */
/* Location: ./application/controllers/Parpol.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-20 15:06:38 */
/* http://harviacode.com */