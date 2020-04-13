<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CalonPileg extends CI_Controller{

	public $main_menu = 'Data Pemilu';
	public $sub_menu = 'PILEG';

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') != "admin") {
			redirect('Login');
		}
		$this->load->model('CalonPilegModel');
		$this->load->model('DapilModel');
		$this->load->model('ParpolModel');
		$this->load->model('KecamatanModel');
		$this->load->library('form_validation');
	}

	public function index(){

		$calonpileg2 = $this->CalonPilegModel->get_all();

		$data = array(
			'main_menu' => $this->main_menu,
			'content' => 'calonpileg/calon_pileg_list',
			'calonpileg_data' => $calonpileg2
		);
		$this->load->view('layout/static', $data);
	}

	public function read($id){
		$row = $this->CalonPilegModel->get_by_id($id);
		if ($row) {
			$data = array(
				'main_menu' => $this->main_menu,
				'sub_menu' => $this->sub_menu,
				'detail_menu' => 'Data Calon Pileg',
				'content' => 'calonpileg/calon_pileg_read',
				'id_calon_pileg' => $row->id_calon_pileg,
				'id_dapil' => $row->id_dapil,
				'nama_dapil' => $row->nama_dapil,
				'id_parpol' => $row->id_parpol,
				'nama_parpol' => $row->nama_parpol,
				'no_urut' => $row->no_urut,
				'nama_calon' => $row->nama_calon,
				'gender' => $row->gender,
			);
			$this->load->view('layout/static', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('CalonPileg'));
		}
	}

	public function create() 
	{
		$data = array(
			'main_menu' => $this->main_menu,
			'sub_menu' => $this->sub_menu,
			'detail_menu' => 'Data Calon Pileg',
			'content' => 'calonpileg/calon_pileg_form',
			'button' => 'Create',
			'action' => site_url('CalonPileg/create_action'),
			'id_calon_pileg' => set_value('id_calon_pileg'),
			'id_dapil' => set_value('id_dapil'),
			'id_parpol' => set_value('id_parpol'),
			'no_urut' => set_value('no_urut'),
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
				'id_dapil' => $this->input->post('id_dapil',TRUE),
				'id_parpol' => $this->input->post('id_parpol',TRUE),
				'no_urut' => $this->input->post('no_urut',TRUE),
				'nama_calon' => $this->input->post('nama_calon',TRUE),
				'gender' => $this->input->post('gender',TRUE),
			);

			$this->CalonPilegModel->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			$this->index();
			redirect(site_url('CalonPileg'));
		}
	}
	
	public function update($id) 
	{
		$row = $this->CalonPilegModel->get_by_id($id);

		if ($row) {
			$data = array(
				'main_menu' => $this->main_menu,
				'sub_menu' => $this->sub_menu,
				'detail_menu' => 'Data Calon Pileg',
				'content' => 'calonpileg/calon_pileg_form',
				'button' => 'Update',
				'action' => site_url('CalonPileg/update_action'),
				'id_calon_pileg' => set_value('id_calon_pileg', $row->id_calon_pileg),
				'id_dapil' => set_value('id_dapil', $row->id_dapil),
				'id_parpol' => set_value('id_parpol', $row->id_parpol),
				'no_urut' => set_value('no_urut', $row->no_urut),
				'nama_calon' => set_value('nama_calon', $row->nama_calon),
				'gender' => set_value('gender', $row->gender),
			);
			$this->load->view('layout/static', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('CalonPileg'));
		}
	}
	
	public function update_action() 
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_calon_pileg', TRUE));
		} else {
			$data = array(
				'id_dapil' => $this->input->post('id_dapil',TRUE),
				'id_parpol' => $this->input->post('id_parpol',TRUE),
				'no_urut' => $this->input->post('no_urut',TRUE),
				'nama_calon' => $this->input->post('nama_calon',TRUE),
				'gender' => $this->input->post('gender',TRUE),
			);

			$this->CalonPilegModel->update($this->input->post('id_calon_pileg', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('CalonPileg'));
		}
	}
	
	public function delete($id) 
	{
		$row = $this->CalonPilegModel->get_by_id($id);

		if ($row) {
			$this->CalonPilegModel->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('CalonPileg'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('CalonPileg'));
		}
	}

	public function getJson($id = ''){
		if ($id == '') {
			echo json_encode([]);
		} else {
			$data_calon_pileg = $this->CalonPilegModel->get_by_id($id);
			$data_kecamatan = $this->KecamatanModel->get_where(['id_dapil' => $data_calon_pileg->id_dapil]);
			echo json_encode($data_kecamatan);
		}
	}

	public function _rules(){
		$this->form_validation->set_rules('id_dapil', 'id dapil', 'trim|required');
		$this->form_validation->set_rules('id_parpol', 'id parpol', 'trim|required');
		$this->form_validation->set_rules('no_urut', 'no urut', 'trim|required');
		$this->form_validation->set_rules('nama_calon', 'nama calon', 'trim|required');
		$this->form_validation->set_rules('gender', 'gender', 'trim|required');

		$this->form_validation->set_rules('id_calon_pileg', 'id_calon_pileg', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

}
