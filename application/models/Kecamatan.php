<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Model {

    public $id_kecamatan;
    public $nama_kecamatan;
    public $id_dapil;

    public function find(){
        $this->db->select('*');
        $this->db->from('kecamatan a');
        $this->db->join('dapil b', 'b.id_dapil = a.id_dapil', 'left');        
        $this->db->order_by('nama_kecamatan','asc');

        return $this->db->get()->result();
    }


}

?>