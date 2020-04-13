<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tps extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('TpsModel');
        $this->load->library('form_validation');
    }

    public function add($id_kecamatan){
        foreach ($this->input->post() as $key => $value) {
            $data[$key] = $value;
        }
        $this->TpsModel->insert($data);

        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('Kecamatan/read/'.$id_kecamatan));
    }

    public function getJson($id){
        $data_tps = $this->TpsModel->get_by_id($id);
        echo json_encode($data_tps);
    }

    public function update_action(){
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tps', TRUE));
        } else {
            $data = array(
                'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
                'nama_tps' => $this->input->post('nama_tps',TRUE),
                'lat' => $this->input->post('lat',TRUE),
                'long' => $this->input->post('long',TRUE),
            );
            $this->TpsModel->update($this->input->post('id_tps', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Kecamatan/read/'.$data['id_kecamatan']));
        }
    }
    
    public function delete($id, $id_kecamatan){
        $row = $this->TpsModel->get_by_id($id);

        if ($row) {
            $this->TpsModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Kecamatan/read/'.$id_kecamatan));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Kecamatan/read/'.$id_kecamatan));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('id_kecamatan', 'id kecamatan', 'trim|required');
        $this->form_validation->set_rules('nama_tps', 'nama tps', 'trim|required');
        $this->form_validation->set_rules('lat', 'lat', 'trim|required');
        $this->form_validation->set_rules('long', 'long', 'trim|required');

        $this->form_validation->set_rules('id_tps', 'id_tps', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
