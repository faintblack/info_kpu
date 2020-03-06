<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tps extends CI_Model {

    public $id_tps;
    public $id_kecamatan;
    public $nama_tps;
    public $lat;
    public $long;

    public function find(){
        $this->db->select('*');
        $this->db->from('tps a');
        $this->db->join('kecamatan b', 'b.id_kecamatan = a.id_kecamatan', 'left');        
        $this->db->order_by('nama_kecamatan','asc');

        return $this->db->get()->result();
    }


}

?>