<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('KecamatanModel');
        $this->load->model('DapilModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kecamatan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kecamatan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kecamatan/index.html';
            $config['first_url'] = base_url() . 'kecamatan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->KecamatanModel->total_rows($q);
        $kecamatan = $this->KecamatanModel->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $kecamatan2 = $this->KecamatanModel->get_all();

        $data = array(
            'content' => 'kecamatan/kecamatan_list',
            'kecamatan_data' => $kecamatan2,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('layout/static', $data);
//        $this->load->view('kecamatan/kecamatan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->KecamatanModel->get_by_id($id);
        if ($row) {
            $data = array(
                'content' => 'kecamatan/kecamatan_read',
                'id_kecamatan' => $row->id_kecamatan,
                'nama_kecamatan' => $row->nama_kecamatan,
                'id_dapil' => $row->id_dapil,
                'nama_dapil' => $row->nama_dapil,
                'jumlah_penduduk' => $row->jumlah_penduduk,
                'jumlah_dpt_lk' => $row->jumlah_dpt_lk,
                'jumlah_dpt_pr' => $row->jumlah_dpt_pr,
            );
            $this->load->view('layout/static', $data);
            //$this->load->view('kecamatan/kecamatan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kecamatan'));
        }
    }

    public function create() 
    {
        $dapil = $this->DapilModel->get_all();
        $data = array(
            'dapil' => $dapil,
            'content' => 'kecamatan/kecamatan_form',
            'button' => 'Create',
            'action' => site_url('kecamatan/create_action'),
            'id_kecamatan' => set_value('id_kecamatan'),
            'nama_kecamatan' => set_value('nama_kecamatan'),
            'id_dapil' => set_value('id_dapil'),
            'jumlah_penduduk' => set_value('jumlah_penduduk'),
            'jumlah_dpt_lk' => set_value('jumlah_dpt_lk'),
            'jumlah_dpt_pr' => set_value('jumlah_dpt_pr'),
        );
        $this->load->view('layout/static', $data);
        //$this->load->view('kecamatan/kecamatan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_kecamatan' => $this->input->post('nama_kecamatan',TRUE),
                'id_dapil' => $this->input->post('id_dapil',TRUE),
                'jumlah_penduduk' => $this->input->post('jumlah_penduduk',TRUE),
                'jumlah_dpt_lk' => $this->input->post('jumlah_dpt_lk',TRUE),
                'jumlah_dpt_pr' => $this->input->post('jumlah_dpt_pr',TRUE),
            );

            $this->KecamatanModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kecamatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->KecamatanModel->get_by_id($id);

        if ($row) {
            $dapil = $this->DapilModel->get_all();
            $data = array(
                'dapil' => $dapil,
                'content' => 'kecamatan/kecamatan_form',
                'button' => 'Update',
                'action' => site_url('kecamatan/update_action'),
                'id_kecamatan' => set_value('id_kecamatan', $row->id_kecamatan),
                'nama_kecamatan' => set_value('nama_kecamatan', $row->nama_kecamatan),
                'id_dapil' => set_value('id_dapil', $row->id_dapil),
                'jumlah_penduduk' => set_value('jumlah_penduduk', $row->jumlah_penduduk),
                'jumlah_dpt_lk' => set_value('jumlah_dpt_lk', $row->jumlah_dpt_lk),
                'jumlah_dpt_pr' => set_value('jumlah_dpt_pr', $row->jumlah_dpt_pr),
            );
            $this->load->view('layout/static', $data);
            //$this->load->view('kecamatan/kecamatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kecamatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kecamatan', TRUE));
        } else {
            $data = array(
		'nama_kecamatan' => $this->input->post('nama_kecamatan',TRUE),
		'id_dapil' => $this->input->post('id_dapil',TRUE),
		'jumlah_penduduk' => $this->input->post('jumlah_penduduk',TRUE),
		'jumlah_dpt_lk' => $this->input->post('jumlah_dpt_lk',TRUE),
		'jumlah_dpt_pr' => $this->input->post('jumlah_dpt_pr',TRUE),
	    );

            $this->KecamatanModel->update($this->input->post('id_kecamatan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kecamatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->KecamatanModel->get_by_id($id);

        if ($row) {
            $this->KecamatanModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kecamatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kecamatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kecamatan', 'nama kecamatan', 'trim|required');
	$this->form_validation->set_rules('id_dapil', 'id dapil', 'trim|required');
	$this->form_validation->set_rules('jumlah_penduduk', 'jumlah penduduk', 'trim|required');
	$this->form_validation->set_rules('jumlah_dpt_lk', 'jumlah dpt lk', 'trim|required');
	$this->form_validation->set_rules('jumlah_dpt_pr', 'jumlah dpt pr', 'trim|required');

	$this->form_validation->set_rules('id_kecamatan', 'id_kecamatan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kecamatan.xls";
        $judul = "kecamatan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kecamatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Dapil");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Penduduk");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Dpt Lk");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Dpt Pr");

	foreach ($this->KecamatanModel->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kecamatan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_dapil);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_penduduk);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_dpt_lk);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_dpt_pr);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Kecamatan.php */
/* Location: ./application/controllers/Kecamatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-20 09:32:19 */
/* http://harviacode.com */