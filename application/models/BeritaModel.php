<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BeritaModel extends CI_Model {

    public $id_berita;
    public $username;

    public function find($username){
        $this->db->select('*');
        $this->db->from('berita a');
        $this->db->join('pengguna b','a.username = b.username', 'left');
        $this->db->where('a.username', $username);
        $this->db->order_by('id_berita','desc');

        return $this->db->get()->result();
    }

    public function tambah($data, $tabel){
		$this->db->insert($tabel, $data);
	}

    public function detail($id){
        $this->db->select('*');
        $this->db->from('berita a');
        $this->db->join('pengguna b','a.username = b.username', 'left');
        $this->db->where($id);
        
        return $this->db->get();
    }

    public function hapus($id, $tabel){
		$this->db->where($id);
		$this->db->delete($tabel);
	}

    public function edit($where, $data){
        $this->db->where($where);
        return $this->db->update('berita', $data);
    }

    public function komentar($id){
        $this->db->select('*');
        $this->db->from('komentar a');
        $this->db->join('pengguna b','a.username = b.username', 'left');
        $this->db->join('berita c','a.id_berita = c.id_berita', 'left');
        $this->db->where('a.id_berita', $id);
        
        return $this->db->get();
    }

    //frontend fungtion
    //ambil data mahasiswa dari database
    public function get_berita_list($limit, $start){
        $query = $this->db->get('berita', $limit, $start);
        return $query;
    }

}

?>