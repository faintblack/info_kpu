<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CalonPilpres extends CI_Controller{

    public $main_menu = 'Data Pemilu';
    public $sub_menu = 'PILPRES';

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "admin") {
            redirect('Login');
        }
        $this->load->model('CalonPilpresModel');
        $this->load->library('form_validation');
    }

    public function index(){
        $calonpilpres = $this->CalonPilpresModel->get_all();

        $data = array(
            'main_menu' => $this->main_menu,
            'content' => 'calonpilpres/calon_pilpres_list',
            'calonpilpres_data' => $calonpilpres,
        );
        $this->load->view('layout/static', $data);
    }

    public function read($id) 
    {
        $row = $this->CalonPilpresModel->get_by_id($id);
        if ($row) {
            $data = array(
                'main_menu' => $this->main_menu,
				'sub_menu' => $this->sub_menu,
				'detail_menu' => 'Data Calon Pilpres',
                'content' => 'calonpilpres/calon_pilpres_read',
                'id_calon_pilpres' => $row->id_calon_pilpres,
                'nama_calon' => $row->nama_calon,
                'gender' => $row->gender,
            );
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('CalonPilpres'));
        }
    }

    public function create() 
    {
        $data = array(
            'main_menu' => $this->main_menu,
            'sub_menu' => $this->sub_menu,
            'detail_menu' => 'Data Calon Pilpres',
            'content' => 'calonpilpres/calon_pilpres_form',
            'button' => 'Create',
            'action' => site_url('CalonPilpres/create_action'),
            'id_calon_pilpres' => set_value('id_calon_pilpres'),
            'nama_calon' => set_value('nama_calon'),
            'gender' => set_value('gender'),
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
            );

            $this->CalonPilpresModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('CalonPilpres'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->CalonPilpresModel->get_by_id($id);

        if ($row) {
            $data = array(
                'main_menu' => $this->main_menu,
                'sub_menu' => $this->sub_menu,
                'detail_menu' => 'Data Calon Pilpres',
                'content' => 'calonpilpres/calon_pilpres_form',
                'button' => 'Update',
                'action' => site_url('CalonPilpres/update_action'),
                'id_calon_pilpres' => set_value('id_calon_pilpres', $row->id_calon_pilpres),
                'nama_calon' => set_value('nama_calon', $row->nama_calon),
                'gender' => set_value('gender', $row->gender),
            );
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('CalonPilpres'));
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
            redirect(site_url('CalonPilpres'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->CalonPilpresModel->get_by_id($id);

        if ($row) {
            $this->CalonPilpresModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('CalonPilpres'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('CalonPilpres'));
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
