<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ParpolPaslonPilpresModel extends CI_Model
{

    public $table = 'parpol_paslon_pilpres';
    public $id = 'id_parpol_paslon_pilpres';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('paslon_pilpres a', 'parpol_paslon_pilpres.id_paslon_pilpres = a.id_paslon_pilpres');
        $this->db->join('parpol b', 'parpol_paslon_pilpres.id_parpol = b.id_parpol');
        return $this->db->get($this->table)->row();
    }

    function get_where($condition){
        $this->db->where($condition);
        $this->db->join('parpol b', 'parpol_paslon_pilpres.id_parpol = b.id_parpol');
        $this->db->order_by('no_urut_parpol', 'ASC');
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_parpol_paslon_pilpres', $q);
        $this->db->or_like('id_paslon_pilpres', $q);
        $this->db->or_like('id_parpol', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_parpol_paslon_pilpres', $q);
        $this->db->or_like('id_paslon_pilpres', $q);
        $this->db->or_like('id_parpol', $q);
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
