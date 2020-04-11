<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

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

	public function index()
	{
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));
		
		if ($q <> '') {
			$config['base_url'] = base_url() . 'paslonpilkada/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'paslonpilkada/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'paslonpilkada/index.html';
			$config['first_url'] = base_url() . 'paslonpilkada/index.html';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->PaslonPilkadaModel->total_rows($q);
		$paslonpilkada = $this->PaslonPilkadaModel->get_limit_data($config['per_page'], $start, $q);

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$paslonpilkada2 = $this->PaslonPilkadaModel->get_all();

		$data = array(
			'main_menu' => $this->main_menu,
			'content' => 'paslonpilkada/paslon_pilkada_list',
			'paslonpilkada_data' => $paslonpilkada2,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
		);
		$this->load->view('layout/static', $data);
//        $this->load->view('paslonpilkada/paslon_pilkada_list', $data);
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
			redirect(site_url('paslonpilkada'));
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
			'action' => site_url('paslonpilkada/create_action'),
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
//		$this->load->view('paslonpilkada/paslon_pilkada_form', $data);
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
			redirect(site_url('paslonpilkada'));
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
				'action' => site_url('paslonpilkada/update_action'),
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
//			$this->load->view('paslonpilkada/paslon_pilkada_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('paslonpilkada'));
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
			redirect(site_url('paslonpilkada'));
		}
	}
	
	public function delete($id) 
	{
		$row = $this->PaslonPilkadaModel->get_by_id($id);

		if ($row) {
			$this->PaslonPilkadaModel->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('paslonpilkada'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('paslonpilkada'));
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

/* End of file PaslonPilkada.php */
/* Location: ./application/controllers/PaslonPilkada.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-11 04:17:56 */
/* http://harviacode.com */