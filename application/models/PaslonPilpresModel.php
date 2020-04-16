<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PaslonPilpresModel extends CI_Model
{

    public $table = 'paslon_pilpres';
    public $id = 'id_paslon_pilpres';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_last(){
        $this->db->select('id_paslon_pilpres');
        return $this->db->get($this->table)->last_row();
    }

    // get all
    function get_all()
    {
        $this->db->join('calon_pilpres a', 'paslon_pilpres.id_capres = a.id_calon_pilpres');
        $this->db->join('calon_pilpres b', 'paslon_pilpres.id_cawapres = b.id_calon_pilpres');
        $this->db->select('id_paslon_pilpres, nomor_urut, a.nama_calon AS id_capres, b.nama_calon AS id_cawapres, tahun');
        $this->db->order_by('nomor_urut', 'ASC');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('calon_pilpres a', 'paslon_pilpres.id_capres = a.id_calon_pilpres');
        $this->db->join('calon_pilpres b', 'paslon_pilpres.id_cawapres = b.id_calon_pilpres');
        $this->db->select('*, a.nama_calon AS nama_capres, b.nama_calon AS nama_cawapres');
        return $this->db->get($this->table)->row();
    }

    function get_where($condition){
        $this->db->where($condition);
        $this->db->join('calon_pilpres a', 'paslon_pilpres.id_capres = a.id_calon_pilpres');
        $this->db->join('calon_pilpres b', 'paslon_pilpres.id_cawapres = b.id_calon_pilpres');
        $this->db->select('id_paslon_pilpres, nomor_urut, a.nama_calon AS id_capres, b.nama_calon AS id_cawapres, tahun');
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_paslon_pilpres', $q);
        $this->db->or_like('nomor_urut', $q);
        $this->db->or_like('id_capres', $q);
        $this->db->or_like('id_cawapres', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by('nomor_urut', 'ASC');
        $this->db->like('id_paslon_pilpres', $q);
        $this->db->or_like('nomor_urut', $q);
        $this->db->or_like('id_capres', $q);
        $this->db->or_like('id_cawapres', $q);
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

