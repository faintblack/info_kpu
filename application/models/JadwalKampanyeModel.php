<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class JadwalKampanyeModel extends CI_Model
{

    public $table = 'jadwal_kampanye';
    public $id = 'id_jadwal_kampanye';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all(){
        $this->db->join('paslon_pilpres a', 'jadwal_kampanye.id_paslon_pilpres = a.id_paslon_pilpres');
        $this->db->join('calon_pilpres b', 'a.id_capres = b.id_calon_pilpres');
        $this->db->join('calon_pilpres c', 'a.id_cawapres = c.id_calon_pilpres');
        $this->db->select('id_jadwal_kampanye, tanggal, a.id_paslon_pilpres, nomor_urut, tahun, b.nama_calon AS nama_capres, c.nama_calon AS nama_cawapres');
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id){
        $this->db->where($this->id, $id);
        $this->db->join('paslon_pilpres a', 'jadwal_kampanye.id_paslon_pilpres = a.id_paslon_pilpres');
        $this->db->join('calon_pilpres b', 'a.id_capres = b.id_calon_pilpres');
        $this->db->join('calon_pilpres c', 'a.id_cawapres = c.id_calon_pilpres');
        $this->db->select('id_jadwal_kampanye, tanggal, a.id_paslon_pilpres, nomor_urut, tahun, b.nama_calon AS nama_capres, c.nama_calon AS nama_cawapres');
        return $this->db->get($this->table)->row();
    }

    function get_where($condition){
        $this->db->where($condition);
        $this->db->join('paslon_pilpres a', 'jadwal_kampanye.id_paslon_pilpres = a.id_paslon_pilpres');
        $this->db->join('calon_pilpres b', 'a.id_capres = b.id_calon_pilpres');
        $this->db->join('calon_pilpres c', 'a.id_cawapres = c.id_calon_pilpres');
        $this->db->select('id_jadwal_kampanye, tanggal, a.id_paslon_pilpres, nomor_urut, tahun, b.nama_calon AS nama_capres, c.nama_calon AS nama_cawapres');
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_jadwal_kampanye', $q);
        $this->db->or_like('id_kecamatan', $q);
        $this->db->or_like('tanggal', $q);
        $this->db->or_like('id_paslon_pilpres', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_jadwal_kampanye', $q);
        $this->db->or_like('id_kecamatan', $q);
        $this->db->or_like('tanggal', $q);
        $this->db->or_like('id_paslon_pilpres', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert_batch($this->table, $data);
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
