    <?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public $main_menu = 'Pengguna';

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "admin") {
            redirect('login');
        }
        $this->load->model('PenggunaModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pengguna/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pengguna/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pengguna/index.html';
            $config['first_url'] = base_url() . 'pengguna/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->PenggunaModel->total_rows($q);
        $pengguna = $this->PenggunaModel->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'content' => 'pengguna/pengguna_list',
            'pengguna_data' => $pengguna,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        //$this->load->view('pengguna/pengguna_list', $data);
        // #this
        $this->load->view('layout/static', $data);
    }

    public function read($id) 
    {
        $row = $this->PenggunaModel->get_by_id($id);
        if ($row) {
            $data = array(
                'main_menu' => $this->main_menu,
                'content' => 'pengguna/pengguna_read',
		'username' => $row->username,
		'password' => $row->password,
		'nama_pengguna' => $row->nama_pengguna,
		'hak_akses' => $row->hak_akses,
		'email' => $row->email,
	    );
            //$this->load->view('pengguna/pengguna_read', $data);
            // #this
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengguna'));
        }
    }

    public function create() 
    {
        $data = array(
            'main_menu' => $this->main_menu,
            'content' => 'pengguna/pengguna_form',
            'button' => 'Create',
            'action' => site_url('pengguna/create_action'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'nama_pengguna' => set_value('nama_pengguna'),
	    'hak_akses' => set_value('hak_akses'),
	    'email' => set_value('email'),
	);
        //$this->load->view('pengguna/pengguna_form', $data);
        // #this
        $this->load->view('layout/static', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(  
                'username' => $this->input->post('username',TRUE),
                'password' => md5($this->input->post('password',TRUE)),
                'nama_pengguna' => $this->input->post('nama_pengguna',TRUE),
                'hak_akses' => $this->input->post('hak_akses',TRUE),
                'email' => $this->input->post('email',TRUE),
                );

            $this->PenggunaModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pengguna'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->PenggunaModel->get_by_id($id);

        if ($row) {
            $data = array(
                'main_menu' => $this->main_menu,
                'content' => 'pengguna/pengguna_form',
                'button' => 'Update',
                'action' => site_url('pengguna/update_action'),
                'username' => set_value('username', $row->username),
                'password' => set_value('password', $row->password),
                'nama_pengguna' => set_value('nama_pengguna', $row->nama_pengguna),
                'hak_akses' => set_value('hak_akses', $row->hak_akses),
                'email' => set_value('email', $row->email),
            );
            //$this->load->view('pengguna/pengguna_form', $data);
            // #this
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengguna'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();       

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('username', TRUE));
        } else {

            $data = array(
                'password' => md5($this->input->post('password',TRUE)),
                'nama_pengguna' => $this->input->post('nama_pengguna',TRUE),
                'hak_akses' => $this->input->post('hak_akses',TRUE),
                'email' => $this->input->post('email',TRUE),
            );
            $this->PenggunaModel->update($this->input->post('username'), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengguna'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->PenggunaModel->get_by_id($id);

        if ($row) {
            $this->PenggunaModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengguna'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengguna'));
        }
    }

    public function _rules(){
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('nama_pengguna', 'nama pengguna', 'trim|required');
        $this->form_validation->set_rules('hak_akses', 'hak akses', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-19 16:36:04 */
/* http://harviacode.com */