<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model
{
    function tampildata($table){
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();

        return $query->result();
	}

    function GetDataByWhere($where,$table){
        $this->db->select('*');
        $this->db->from($table);
		$this->db->where($where);
        $query = $this->db->get();

        return $query->result();
    }

    function GetDataById($where,$table){
        $this->db->select('*');
        $this->db->from($table);
		$this->db->where($where);
        $query = $this->db->get();

        return $query->row();
    }

    function GetDataByDate($param, $where,$table){
        $this->db->select('*');
        $this->db->from($table);
		$this->db->where('DATE('.$param.')',$where);
        $query = $this->db->get();

        return $query->row();
    }

    function GetRowById($where,$table){
        $this->db->select('*');
        $this->db->from($table);
		$this->db->where($where);
        $query = $this->db->get();

        return $query->row();
    }

    function cekMaxId($id,$table){
        $this->db->select('MAX('.$id.') as maxId');
        $this->db->from($table);
        $query = $this->db->get();

        $result = $query->row();
        return $result->maxId;
    }

    function getdataprov()
    {
        $query = $this->db->query("SELECT * FROM provinces ORDER BY prov_name ASC");

        return $query->result();
    }

    function getdatakab($id_provinsi)
    {
        $this->db->select('*');
        $this->db->from('cities');
        $this->db->where('prov_id',$id_provinsi);
        $this->db->order_by('city_name','asc');
        $query = $this->db->get();
        return $query->result();
    }

    function input($data,$table)
    {
        $this->db->insert($table,$data);
    }

    function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    function delete($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}