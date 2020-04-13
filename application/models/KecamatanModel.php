<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class KecamatanModel extends CI_Model
{

    public $table = 'kecamatan';
    public $id = 'id_kecamatan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('dapil', 'dapil.id_dapil = kecamatan.id_dapil');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('dapil', 'dapil.id_dapil = kecamatan.id_dapil');
        return $this->db->get($this->table)->row();
    }

    function get_where($condition){
        $this->db->where($condition);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_kecamatan', $q);
        $this->db->or_like('nama_kecamatan', $q);
        $this->db->or_like('id_dapil', $q);
        $this->db->or_like('jumlah_penduduk', $q);
        $this->db->or_like('jumlah_dpt_lk', $q);
        $this->db->or_like('jumlah_dpt_pr', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kecamatan', $q);
        $this->db->or_like('nama_kecamatan', $q);
        $this->db->or_like('id_dapil', $q);
        $this->db->or_like('jumlah_penduduk', $q);
        $this->db->or_like('jumlah_dpt_lk', $q);
        $this->db->or_like('jumlah_dpt_pr', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

