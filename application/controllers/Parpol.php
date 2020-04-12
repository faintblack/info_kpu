<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parpol extends CI_Controller
{

    public $main_menu = 'Parpol';

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "admin") {
            redirect('Login');
        }
        $this->load->model('ParpolModel');
        $this->load->model('PaslonPilpresModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $parpol2 = $this->ParpolModel->get_all();

        $data = array(
            'content' => 'parpol/parpol_list',
            'parpol_data' => $parpol2,
        );
        $this->load->view('layout/static', $data);
    }

    public function read($id) 
    {
        $row = $this->ParpolModel->get_by_id($id);
        if ($row) {
            $data = array(
                'main_menu' => $this->main_menu,
                'content' => 'parpol/parpol_read',
                'id_parpol' => $row->id_parpol,
                'no_urut_parpol' => $row->no_urut_parpol,
                'nama_parpol' => $row->nama_parpol,
            );
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Parpol'));
        }
    }

    public function create() 
    {
        $data_paslon_pilpres = $this->PaslonPilpresModel->get_all();
        $data = array(
            'main_menu' => $this->main_menu,
            'data_paslon_pilpres' => $data_paslon_pilpres,
            'content' => 'parpol/parpol_form',
            'button' => 'Create',
            'action' => site_url('parpol/create_action'),
            'id_parpol' => set_value('id_parpol'),
            'no_urut_parpol' => set_value('no_urut_parpol'),
            'nama_parpol' => set_value('nama_parpol'),
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
          );

            $this->ParpolModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Parpol'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->ParpolModel->get_by_id($id);

        if ($row) {
            $data_paslon_pilpres = $this->PaslonPilpresModel->get_all();
            $data = array(
                'main_menu' => $this->main_menu,
                'data_paslon_pilpres' => $data_paslon_pilpres,
                'content' => 'parpol/parpol_form',
                'button' => 'Update',
                'action' => site_url('parpol/update_action'),
                'id_parpol' => set_value('id_parpol', $row->id_parpol),
                'no_urut_parpol' => set_value('no_urut_parpol', $row->no_urut_parpol),
                'nama_parpol' => set_value('nama_parpol', $row->nama_parpol),
            );
            $this->load->view('layout/static', $data);
//            $this->load->view('parpol/parpol_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Parpol'));
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
            );

            $this->ParpolModel->update($this->input->post('id_parpol', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Parpol'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->ParpolModel->get_by_id($id);

        if ($row) {
            $this->ParpolModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Parpol'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Parpol'));
        }
    }

    public function _rules($type = '') {
        if ($type == '') {
            $this->form_validation->set_rules('no_urut_parpol', 'no urut parpol', 'trim|required|is_unique[parpol.no_urut_parpol]');
        }
        
        $this->form_validation->set_rules('nama_parpol', 'nama parpol', 'trim|required');

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
