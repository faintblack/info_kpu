<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class CalonPilegModel extends CI_Model
{

	public $table = 'calon_pileg';
	public $id = 'id_calon_pileg';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

    // get all
	function get_all()
	{
		$this->db->order_by($this->id, $this->order);
		$this->db->join('dapil', 'dapil.id_dapil = calon_pileg.id_dapil');
		$this->db->join('parpol', 'parpol.id_parpol = calon_pileg.id_parpol');
		return $this->db->get($this->table)->result();
	}

    // get data by id
	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		$this->db->join('dapil', 'dapil.id_dapil = calon_pileg.id_dapil');
		$this->db->join('parpol', 'parpol.id_parpol = calon_pileg.id_parpol');
		return $this->db->get($this->table)->row();
	}

	function get_where($condition){
        $this->db->where($condition);
        $this->db->join('dapil', 'dapil.id_dapil = calon_pileg.id_dapil');
		$this->db->join('parpol', 'parpol.id_parpol = calon_pileg.id_parpol');
        return $this->db->get($this->table)->result();
    }
	
    // get total rows
	function total_rows($q = NULL) {
		$this->db->like('id_calon_pileg', $q);
		$this->db->or_like('id_dapil', $q);
		$this->db->or_like('id_parpol', $q);
		$this->db->or_like('no_urut', $q);
		$this->db->or_like('nama_calon', $q);
		$this->db->or_like('gender', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

    // get data with limit and search
	function get_limit_data($limit, $start = 0, $q = NULL) {
		$this->db->order_by($this->id, $this->order);
		$this->db->like('id_calon_pileg', $q);
		$this->db->or_like('id_dapil', $q);
		$this->db->or_like('id_parpol', $q);
		$this->db->or_like('no_urut', $q);
		$this->db->or_like('nama_calon', $q);
		$this->db->or_like('gender', $q);
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
