<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataKecamatan extends CI_Model {

    public $id_data_kecamatan;
    public $id_kecamatan;
    public $jumlah_pendudk;
    public $jumlah_dpt_lk;
    public $jumlah_dpt_pr;

    public function find(){
        $this->db->select('*');
        $this->db->from('data_kecamatan a');
        $this->db->join('kecamatan b', 'b.id_kecamatan = a.id_kecamatan', 'left');        
        $this->db->order_by('nama_kecamatan','asc');

        return $this->db->get()->result();
    }


}

?>