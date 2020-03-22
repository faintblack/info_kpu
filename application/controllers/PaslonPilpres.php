    <?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PaslonPilpres extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('PaslonPilpresModel');
        $this->load->model('ParpolPaslonPilpresModel');
        $this->load->model('CalonPilpresModel');
        $this->load->model('ParpolModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'paslonpilpres/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'paslonpilpres/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'paslonpilpres/index.html';
            $config['first_url'] = base_url() . 'paslonpilpres/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->PaslonPilpresModel->total_rows($q);
        $paslonpilpres = $this->PaslonPilpresModel->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $paslonpilpres2 = $this->PaslonPilpresModel->get_all();

        $data = array(
            'content' => 'paslonpilpres/paslon_pilpres_list',
            'paslonpilpres_data' => $paslonpilpres2,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('layout/static', $data);
        //$this->load->view('paslonpilpres/paslon_pilpres_list', $data);
    }

    public function read($id) 
    {
        $row = $this->PaslonPilpresModel->get_by_id($id);
        
        if ($row) {
            $parpol_data = $this->ParpolPaslonPilpresModel->get_where(['id_paslon_pilpres' => $id]);
            $data = array(
                'parpol_data' => $parpol_data,
                'content' => 'paslonpilpres/paslon_pilpres_read',
                'id_paslon_pilpres' => $row->id_paslon_pilpres,
                'nomor_urut' => $row->nomor_urut,
                'id_capres' => $row->id_capres,
                'id_cawapres' => $row->id_cawapres,
                'capres' => $row->nama_capres,
                'cawapres' => $row->nama_cawapres,
            );
            $this->load->view('layout/static', $data);
//            $this->load->view('paslonpilpres/paslon_pilpres_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paslonpilpres'));
        }
    }

    public function create() 
    {
        $calon_pilpres = $this->CalonPilpresModel->get_all();
        
        $data = array(
            'calon_pilpres' => $calon_pilpres,
            'content' => 'paslonpilpres/paslon_pilpres_form',
            'button' => 'Create',
            'action' => site_url('paslonpilpres/create_action'),
            'id_paslon_pilpres' => set_value('id_paslon_pilpres'),
            'nomor_urut' => set_value('nomor_urut'),
            'id_capres' => set_value('id_capres'),
            'id_cawapres' => set_value('id_cawapres'),
        );
        $this->load->view('layout/static', $data);
//        $this->load->view('paslonpilpres/paslon_pilpres_form', $data);
    }
    
    public function create_action() 
    {
        
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nomor_urut' => $this->input->post('nomor_urut',TRUE),
                'id_capres' => $this->input->post('id_capres',TRUE),
                'id_cawapres' => $this->input->post('id_cawapres',TRUE),
            );
            $data_parpol_pendukung = $this->input->post('parpol_pilpres');

            // Input paslon
            $this->PaslonPilpresModel->insert($data);

            $last_paslon = $this->PaslonPilpresModel->get_last();
            foreach ($data_parpol_pendukung as $key => $value) {
                $data2 = [
                    'id_paslon_pilpres' => $last_paslon->id_paslon_pilpres,
                    'id_parpol' => $value
                ];
                // input parpol pendukung paslon
                $this->ParpolPaslonPilpresModel->insert($data2);
            }
            
            
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('paslonpilpres'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->PaslonPilpresModel->get_by_id($id);

        if ($row) {
            $calon_pilpres = $this->CalonPilpresModel->get_all();
            $data = array(
                'calon_pilpres' => $calon_pilpres,
                'content' => 'paslonpilpres/paslon_pilpres_form',
                'button' => 'Update',
                'action' => site_url('paslonpilpres/update_action'),
                'id_paslon_pilpres' => set_value('id_paslon_pilpres', $row->id_paslon_pilpres),
                'nomor_urut' => set_value('nomor_urut', $row->nomor_urut),
                'id_capres' => set_value('id_capres', $row->id_capres),
                'id_cawapres' => set_value('id_cawapres', $row->id_cawapres),
            );
            $this->load->view('layout/static', $data);
//            $this->load->view('paslonpilpres/paslon_pilpres_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paslonpilpres'));
        }
    }
    
    public function update_action() 
    {
        // Jika update nomor urut 
        if ($this->input->post('nomor_urut-lama',TRUE) != $this->input->post('nomor_urut',TRUE)) {
            $this->_rules();
        } else {
            $this->_rules('skip_nomor_urut');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_paslon_pilpres', TRUE));
        } else {
            $data = array(
                'nomor_urut' => $this->input->post('nomor_urut',TRUE),
                'id_capres' => $this->input->post('id_capres',TRUE),
                'id_cawapres' => $this->input->post('id_cawapres',TRUE),
            );

            $this->PaslonPilpresModel->update($this->input->post('id_paslon_pilpres', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('paslonpilpres'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->PaslonPilpresModel->get_by_id($id);

        if ($row) {
            $this->PaslonPilpresModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('paslonpilpres'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paslonpilpres'));
        }
    }

    public function _rules($type = '') 
    {
        if ($type == '') {
            $this->form_validation->set_rules('nomor_urut', 'nomor urut', 'trim|required|is_unique[paslon_pilpres.nomor_urut]');
        }
        
        $this->form_validation->set_rules('id_capres', 'id capres', 'trim|required');
        $this->form_validation->set_rules('id_cawapres', 'id cawapres', 'trim|required|callback_nomatches[id_capres]');

        $this->form_validation->set_rules('id_paslon_pilpres', 'id_paslon_pilpres', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function nomatches($first, $second){
        if ($first == $this->input->post($second)) {
            $this->form_validation->set_message('nomatches', 'Capres dan Cawapres tidak bisa orang yang sama');
            return false;
        }
        return true;
    }

}

/* End of file PaslonPilpres.php */
/* Location: ./application/controllers/PaslonPilpres.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-20 11:15:32 */
/* http://harviacode.com */