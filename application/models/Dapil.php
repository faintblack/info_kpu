<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dapil extends CI_Model {

    public $id_dapil;
    public $nama_dapil;
    public $alokasi_kursi;

    public function find(){
        $this->db->select('*');
        $this->db->from('dapil');
        $this->db->order_by('nama_dapil','asc');

        return $this->db->get()->result();
    }

    public function getWhere($condition){
        $query = $this->db->get_where('dapil', $condition)->result();
        return $query;
    }

}

?>