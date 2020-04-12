<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaslonPilkada extends CI_Controller{

	public $main_menu = 'Data Pemilu';
	public $sub_menu = 'PILKADA';

	function __construct()
	{
		parent::__construct();
        $this->load->model('PaslonPilkadaModel');
        $this->load->model('ParpolModel');
        $this->load->model('ParpolPaslonPilkadaModel');
        $this->load->model('CalonPilkadaModel');
		$this->load->library('form_validation');
	}

	public function index(){
		$paslonpilkada = $this->PaslonPilkadaModel->get_all();

		$data = array(
			'main_menu' => $this->main_menu,
			'content' => 'paslonpilkada/paslon_pilkada_list',
			'paslonpilkada_data' => $paslonpilkada,
		);
		$this->load->view('layout/static', $data);
	}

	public function read($id) 
	{
		$row = $this->PaslonPilkadaModel->get_by_id($id);
		if ($row) {
            
			$data = array(
                'main_menu' => $this->main_menu,
                'sub_menu' => $this->sub_menu,
                'detail_menu' => 'Paslon Pilkada',
                'content' => 'paslonpilkada/paslon_pilkada_read',
				'id_paslon' => $row->id_paslon,
				'jenis_pemilihan' => $row->jenis_pemilihan,
				'nomor_urut' => $row->nomor_urut,
				'id_kepala_daerah' => $row->id_kepala_daerah,
                'id_wakil_kepala_daerah' => $row->id_wakil_kepala_daerah,
                'nama_kepala_daerah' => $row->nama_kepala_daerah,
                'nama_wakil_kepala_daerah' => $row->nama_wakil_kepala_daerah,
				'jenis_calon' => $row->jenis_calon,
				'status_penetapan' => $row->status_penetapan,
				'keterangan' => $row->keterangan,
				'tahun' => $row->tahun,
            );
            if ($data['jenis_calon'] == 'Parpol') {
                $daftar_parpol = $this->ParpolPaslonPilkadaModel->get_where(['id_paslon' => $data['id_paslon']]);
                $data['parpol_data'] = $daftar_parpol;
            }
            
            $this->load->view('layout/static', $data);
			//$this->load->view('paslonpilkada/paslon_pilkada_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('PaslonPilkada'));
		}
	}

	public function create(){
        $calon_pilkada = $this->CalonPilkadaModel->get_all();

		$data = array(
            'main_menu' => $this->main_menu,
            'sub_menu' => $this->sub_menu,
            'detail_menu' => 'Paslon Pilkada',
            'calon_pilkada' => $calon_pilkada,
            'content' => 'paslonpilkada/paslon_pilkada_form',
			'button' => 'Create',
			'action' => site_url('PaslonPilkada/create_action'),
			'id_paslon' => set_value('id_paslon'),
			'jenis_pemilihan' => set_value('jenis_pemilihan'),
			'nomor_urut' => set_value('nomor_urut'),
			'id_kepala_daerah' => set_value('id_kepala_daerah'),
			'id_wakil_kepala_daerah' => set_value('id_wakil_kepala_daerah'),
			'jenis_calon' => set_value('jenis_calon'),
			'status_penetapan' => set_value('status_penetapan'),
			'keterangan' => set_value('keterangan'),
			'tahun' => set_value('tahun'),
        );
        $this->load->view('layout/static', $data);
	}
	
	public function create_action(){
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'jenis_pemilihan' => $this->input->post('jenis_pemilihan',TRUE),
				'nomor_urut' => $this->input->post('nomor_urut',TRUE),
				'id_kepala_daerah' => $this->input->post('id_kepala_daerah',TRUE),
				'id_wakil_kepala_daerah' => $this->input->post('id_wakil_kepala_daerah',TRUE),
				'jenis_calon' => $this->input->post('jenis_calon',TRUE),
				'status_penetapan' => $this->input->post('status_penetapan',TRUE),
				'keterangan' => $this->input->post('keterangan',TRUE),
				'tahun' => $this->input->post('tahun',TRUE),
            );

			$this->PaslonPilkadaModel->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('PaslonPilkada'));
		}
	}
	
	public function update($id) 
	{
		$row = $this->PaslonPilkadaModel->get_by_id($id);

		if ($row) {
            $calon_pilkada = $this->CalonPilkadaModel->get_all();

			$data = array(
                'main_menu' => $this->main_menu,
                'sub_menu' => $this->sub_menu,
                'detail_menu' => 'Paslon Pilkada',
                'calon_pilkada' => $calon_pilkada,
                'content' => 'paslonpilkada/paslon_pilkada_form',
				'button' => 'Update',
				'action' => site_url('PaslonPilkada/update_action'),
				'id_paslon' => set_value('id_paslon', $row->id_paslon),
				'jenis_pemilihan' => set_value('jenis_pemilihan', $row->jenis_pemilihan),
				'nomor_urut' => set_value('nomor_urut', $row->nomor_urut),
				'id_kepala_daerah' => set_value('id_kepala_daerah', $row->id_kepala_daerah),
				'id_wakil_kepala_daerah' => set_value('id_wakil_kepala_daerah', $row->id_wakil_kepala_daerah),
				'jenis_calon' => set_value('jenis_calon', $row->jenis_calon),
				'status_penetapan' => set_value('status_penetapan', $row->status_penetapan),
				'keterangan' => set_value('keterangan', $row->keterangan),
				'tahun' => set_value('tahun', $row->tahun),
            );
            $this->load->view('layout/static', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('PaslonPilkada'));
		}
	}
	
	public function update_action() 
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_paslon', TRUE));
		} else {
			$data = array(
				'jenis_pemilihan' => $this->input->post('jenis_pemilihan',TRUE),
				'nomor_urut' => $this->input->post('nomor_urut',TRUE),
				'id_kepala_daerah' => $this->input->post('id_kepala_daerah',TRUE),
				'id_wakil_kepala_daerah' => $this->input->post('id_wakil_kepala_daerah',TRUE),
				'jenis_calon' => $this->input->post('jenis_calon',TRUE),
				'status_penetapan' => $this->input->post('status_penetapan',TRUE),
				'keterangan' => $this->input->post('keterangan',TRUE),
				'tahun' => $this->input->post('tahun',TRUE),
			);

			$this->PaslonPilkadaModel->update($this->input->post('id_paslon', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('PaslonPilkada'));
		}
	}
	
	public function delete($id) 
	{
		$row = $this->PaslonPilkadaModel->get_by_id($id);

		if ($row) {
			$this->PaslonPilkadaModel->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('PaslonPilkada'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('PaslonPilkada'));
		}
	}

	public function _rules() 
	{
		$this->form_validation->set_rules('jenis_pemilihan', 'jenis pemilihan', 'trim|required');
		$this->form_validation->set_rules('nomor_urut', 'nomor urut', 'trim|required');
		$this->form_validation->set_rules('id_kepala_daerah', 'id kepala daerah', 'trim|required');
		$this->form_validation->set_rules('id_wakil_kepala_daerah', 'id wakil kepala daerah', 'trim|required|callback_nomatches[id_kepala_daerah]');
		$this->form_validation->set_rules('jenis_calon', 'jenis calon', 'trim|required');
		$this->form_validation->set_rules('status_penetapan', 'status penetapan', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim');
		$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');

		$this->form_validation->set_rules('id_paslon', 'id_paslon', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
    public function nomatches($first, $second){
        if ($first == $this->input->post($second)) {
            $this->form_validation->set_message('nomatches', 'Calon Kepala Daerah dan Wakil Kepala Daerah tidak bisa orang yang sama');
            return false;
        }
        return true;
    }

}
