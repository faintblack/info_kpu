<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CalonPilpres extends CI_Controller{

    public $main_menu = 'Data Pemilu';

    function __construct()
    {
        parent::__construct();
        $this->load->model('CalonPilpresModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'calonpilpres/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'calonpilpres/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'calonpilpres/index.html';
            $config['first_url'] = base_url() . 'calonpilpres/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->CalonPilpresModel->total_rows($q);
        $calonpilpres = $this->CalonPilpresModel->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'main_menu' => $this->main_menu,
            'content' => 'calonpilpres/calon_pilpres_list',
            'calonpilpres_data' => $calonpilpres,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('layout/static', $data);
        //$this->load->view('calonpilpres/calon_pilpres_list', $data);
    }

    public function read($id) 
    {
        $row = $this->CalonPilpresModel->get_by_id($id);
        if ($row) {
            $data = array(
                'content' => 'calonpilpres/calon_pilpres_read',
                'id_calon_pilpres' => $row->id_calon_pilpres,
                'nama_calon' => $row->nama_calon,
                'gender' => $row->gender,
            );
            $this->load->view('layout/static', $data);
            //$this->load->view('calonpilpres/calon_pilpres_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('calonpilpres'));
        }
    }

    public function create() 
    {
        $data = array(
            'content' => 'calonpilpres/calon_pilpres_form',
            'button' => 'Create',
            'action' => site_url('calonpilpres/create_action'),
            'id_calon_pilpres' => set_value('id_calon_pilpres'),
            'nama_calon' => set_value('nama_calon'),
            'gender' => set_value('gender'),
        );
        $this->load->view('layout/static', $data);
        //$this->load->view('calonpilpres/calon_pilpres_form', $data);
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
            );

            $this->CalonPilpresModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('calonpilpres'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->CalonPilpresModel->get_by_id($id);

        if ($row) {
            $data = array(
                'content' => 'calonpilpres/calon_pilpres_form',
                'button' => 'Update',
                'action' => site_url('calonpilpres/update_action'),
                'id_calon_pilpres' => set_value('id_calon_pilpres', $row->id_calon_pilpres),
                'nama_calon' => set_value('nama_calon', $row->nama_calon),
                'gender' => set_value('gender', $row->gender),
            );
            $this->load->view('layout/static', $data);
            //$this->load->view('calonpilpres/calon_pilpres_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('calonpilpres'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_calon_pilpres', TRUE));
        } else {
            $data = array(
              'nama_calon' => $this->input->post('nama_calon',TRUE),
              'gender' => $this->input->post('gender',TRUE),
          );

            $this->CalonPilpresModel->update($this->input->post('id_calon_pilpres', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('calonpilpres'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->CalonPilpresModel->get_by_id($id);

        if ($row) {
            $this->CalonPilpresModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('calonpilpres'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('calonpilpres'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('nama_calon', 'nama calon', 'trim|required');
       $this->form_validation->set_rules('gender', 'gender', 'trim|required');

       $this->form_validation->set_rules('id_calon_pilpres', 'id_calon_pilpres', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

   public function excel()
   {
    $this->load->helper('exportexcel');
    $namaFile = "calon_pilpres.xls";
    $judul = "calon_pilpres";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Calon");
    xlsWriteLabel($tablehead, $kolomhead++, "Gender");

    foreach ($this->CalonPilpresModel->get_all() as $data) {
        $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_calon);
        xlsWriteLabel($tablebody, $kolombody++, $data->gender);

        $tablebody++;
        $nourut++;
    }

    xlsEOF();
    exit();
}

}

/* End of file CalonPilpres.php */
/* Location: ./application/controllers/CalonPilpres.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-20 09:32:06 */
/* http://harviacode.com */