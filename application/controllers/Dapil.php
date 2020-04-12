<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dapil extends CI_Controller
{

    public $main_menu = 'Data Wilayah';
    public $sub_menu = 'Dapil';

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "admin") {
            redirect('Login');
        }
        $this->load->model('DapilModel');
        $this->load->model('KecamatanModel');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $dapil = $this->DapilModel->get_all();
        
        $data = array(
            'content' => 'dapil/dapil_list',
            'dapil_data' => $dapil,
        );
        $this->load->view('layout/static', $data);
    }

    public function read($id) 
    {
        $row = $this->DapilModel->get_by_id($id);
        if ($row) {
            $kecamatan_dapil = $this->KecamatanModel->get_where(['id_dapil' => $row->id_dapil]);

            $data = array(
                'main_menu' => $this->main_menu,
                'sub_menu' => $this->sub_menu,
                'kecamatan_dapil' => $kecamatan_dapil,
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
            'main_menu' => $this->main_menu,
            'sub_menu' => $this->sub_menu,
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
                'main_menu' => $this->main_menu,
                'sub_menu' => $this->sub_menu,
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
            redirect(site_url('Dapil'));
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
