<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model
{
    function getPengunjungWeb(){
        $this->db->select('COUNT(ip) as countIp, date, MONTH(date) as bulan');
        $this->db->from('visitor');
        $this->db->group_by('MONTH(date)');
        $query = $this->db->get();

        return $query->result();
    }


    function getdatakunjungan(){
        $this->db->select('*, DATE(tgl_kunjungan) as date, TIME(tgl_kunjungan) as time');
        $this->db->from('tbl_kunjungan_industri');
        $this->db->order_by('id_kunjungan','DESC');

        $query = $this->db->get();

        return $query->result();
	}
	
    function getkunjungan(){
        $this->db->order_by('id_kunjungan');
        $this->db->where('status','Y');
        return $this->db->get('tbl_kunjungan_industri');
    }

    function getdatakunjunganWhere($where){
        $this->db->select('*, DATE(tgl_kunjungan) as date, TIME(tgl_kunjungan) as time');
        $this->db->from('tbl_kunjungan_industri a');
        $this->db->join('cities b','b.city_id = a.id_kab');
        $this->db->join('provinces c','c.prov_id = a.id_prov');
        $this->db->order_by('id_kunjungan','DESC');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result();
	}

    function GetLowonganById($id){
        $this->db->select('*');
        $this->db->from('tbl_lowongan');
        $this->db->where('id_lowongan',$id);
        $query = $this->db->get();

        return $query->result();
    }

    function GetDataPelamar(){
        $this->db->select('*');
        $this->db->from('tbl_pelamar a');
        $this->db->join('tbl_lowongan b','b.id_lowongan = a.lowongan_id');
        $this->db->order_by('id_pelamar','DESC');
        $query = $this->db->get();

        return $query->result();
    }

    function GetPelamarById($id){
        $this->db->select('*');
        $this->db->from('tbl_pelamar');
        $this->db->where('id_pelamar',$id);
        $query = $this->db->get();

        return $query->result();
    }

    function GetKunjunganById($id){
        $this->db->select('*');
        $this->db->from('tbl_kunjungan_industri');
        $this->db->where('id_kunjungan', $id);
        $query = $this->db->get();

        return $query->result();
	}

    function GetdataLowongan(){
    $this->db->select('*, DATEDIFF(tgl_akhir,NOW()) as selisih');
    $this->db->from('tbl_lowongan');
    $this->db->where('DATEDIFF(tgl_akhir,NOW()) > 0');
    $query = $this->db->get();

    return $query->result();
    }

    function GetDataArtikel(){
        $this->db->select('*');
        $this->db->from('tbl_artikel a');
        $this->db->join('tbl_kategori_artikel b','b.id_kategori = a.kategori_id');
        $query = $this->db->get();
    
        return $query->result();
    }

    function GetArtikelById($id){
        $this->db->select('*');
        $this->db->from('tbl_artikel a');
        $this->db->join('tbl_kategori_artikel b','b.id_kategori = a.kategori_id');
        $this->db->where('id_artikel',$id);
        $query = $this->db->get();
    
        return $query->result();
    }

    function GetArtikelBySlug($slug){
        $this->db->select('*');
        $this->db->from('tbl_artikel a');
        $this->db->join('tbl_kategori_artikel b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_users c','c.userId = a.createdby');
        $this->db->where('slug',$slug);
        $query = $this->db->get();
    
        return $query->row();
    }

    function GetArtikelASC(){
        $this->db->select('*');
        $this->db->from('tbl_artikel a');
        $this->db->join('tbl_kategori_artikel b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_users c','c.userId = a.createdby');
        $this->db->order_by('datecreated','ASC');
        $this->db->limit(5);
        $query = $this->db->get();
    
        return $query->result();
    }

    function GetArtikelbyKategori($where){
        $this->db->select('*');
        $this->db->from('tbl_artikel a');
        $this->db->join('tbl_kategori_artikel b','b.id_kategori = a.kategori_id');
        $this->db->join('tbl_users c','c.userId = a.createdby');
        $this->db->where($where);
        $this->db->order_by('datecreated','ASC');
        $this->db->limit(5);
        $query = $this->db->get();
    
        return $query->result();
    }

    function GetMaklon($where){
        $this->db->select('*');
        $this->db->from('tbl_maklon a');
        $this->db->join('tbl_maklon_kategoriproduk b','b.id_maklon_kategoriproduk = a.kategoriproduk_maklon_id');
        $this->db->join('districts c','c.dis_id = a.kecamatan');
        $this->db->join('cities d','d.city_id = a.kabupaten');
        $this->db->join('provinces e','e.prov_id = a.provinsi');
        $this->db->order_by('id_maklon','DESC');

        if(isset($where)){
        $this->db->where($where);
        }

        $query = $this->db->get();

        return $query->result();
    }
}