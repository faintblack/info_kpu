<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PaslonPilkadaModel extends CI_Model
{

    public $table = 'paslon_pilkada';
    public $id = 'id_paslon';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->join('calon_pilkada a', 'paslon_pilkada.id_kepala_daerah = a.id_calon_pilkada');
        $this->db->join('calon_pilkada b', 'paslon_pilkada.id_wakil_kepala_daerah = b.id_calon_pilkada');
        $this->db->select('id_paslon,jenis_pemilihan, nomor_urut, a.nama_calon AS id_kepala_daerah, b.nama_calon AS id_wakil_kepala_daerah, jenis_calon, status_penetapan, keterangan, tahun');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('calon_pilkada a', 'paslon_pilkada.id_kepala_daerah = a.id_calon_pilkada');
        $this->db->join('calon_pilkada b', 'paslon_pilkada.id_wakil_kepala_daerah = b.id_calon_pilkada');
        $this->db->select('*, a.nama_calon AS nama_kepala_daerah, b.nama_calon AS nama_wakil_kepala_daerah');
        return $this->db->get($this->table)->row();
    }

    function get_where($condition){
        $this->db->where($condition);
        $this->db->join('calon_pilkada a', 'paslon_pilkada.id_kepala_daerah = a.id_calon_pilkada');
        $this->db->join('calon_pilkada b', 'paslon_pilkada.id_wakil_kepala_daerah = b.id_calon_pilkada');
        $this->db->select('id_paslon,jenis_pemilihan, nomor_urut, a.nama_calon AS id_kepala_daerah, b.nama_calon AS id_wakil_kepala_daerah, jenis_calon, status_penetapan, keterangan, tahun');
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_paslon', $q);
        $this->db->or_like('jenis_pemilihan', $q);
        $this->db->or_like('nomor_urut', $q);
        $this->db->or_like('id_kepala_daerah', $q);
        $this->db->or_like('id_wakil_kepala_daerah', $q);
        $this->db->or_like('jenis_calon', $q);
        $this->db->or_like('status_penetapan', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->or_like('tahun', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_paslon', $q);
        $this->db->or_like('jenis_pemilihan', $q);
        $this->db->or_like('nomor_urut', $q);
        $this->db->or_like('id_kepala_daerah', $q);
        $this->db->or_like('id_wakil_kepala_daerah', $q);
        $this->db->or_like('jenis_calon', $q);
        $this->db->or_like('status_penetapan', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->or_like('tahun', $q);
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

