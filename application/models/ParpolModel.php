<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ParpolModel extends CI_Model
{

    public $table = 'parpol';
    public $id = 'id_parpol';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET ALL FOR LIST ONLY
    function get_all()
    {
        $this->db->order_by('no_urut_parpol', 'ASC');
        //$this->db->join('paslon_pilpres a', 'parpol.pendukung_capres = a.id_paslon_pilpres');
        //$this->db->join('calon_pilpres b', 'a.id_capres = b.id_calon_pilpres');
        //$this->db->join('calon_pilpres c', 'a.id_cawapres = c.id_calon_pilpres');
        //$this->db->select('id_parpol, no_urut_parpol, nama_parpol, b.nama_calon AS id_capres, c.nama_calon AS id_cawapres');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        //$this->db->join('paslon_pilpres a', 'parpol.pendukung_capres = a.id_paslon_pilpres');
        //$this->db->join('calon_pilpres b', 'a.id_capres = b.id_calon_pilpres');
        //$this->db->join('calon_pilpres c', 'a.id_cawapres = c.id_calon_pilpres');
        //$this->db->select('id_parpol, no_urut_parpol, nama_parpol, a.nomor_urut AS no_urut_capres, b.nama_calon AS id_capres, c.nama_calon AS id_cawapres, pendukung_capres');
        return $this->db->get($this->table)->row();
    }

    function get_where($condition){
        $this->db->where($condition);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_parpol', $q);
        $this->db->or_like('no_urut_parpol', $q);
        $this->db->or_like('nama_parpol', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_parpol', $q);
        $this->db->or_like('no_urut_parpol', $q);
        $this->db->or_like('nama_parpol', $q);
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
