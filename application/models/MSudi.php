<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSudi extends CI_Model
{
    function AddData($tabel, $data=array())
    {
        $this->db->insert($tabel,$data);
    }

    function UpdateData($tabel,$fieldid,$fieldvalue,$data=array())
    {
        $this->db->where($fieldid,$fieldvalue)->update($tabel,$data);
    }

    function DeleteData($tabel,$fieldid,$fieldvalue)
    {
        $this->db->where($fieldid,$fieldvalue)->delete($tabel);
    }

    function GetData($tabel)
    {
        $query= $this->db->get($tabel);
        return $query->result();
    }

    function GetDataWhere($tabel,$id,$nilai)
    {
        $this->db->where($id,$nilai);
        $query= $this->db->get($tabel);
        return $query;
    }
    function GetDataJoin($tbl1,$tbl2,$param)
    {
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->join($tbl2,$param);
        $query=$this->db->get();
        return $query;
    }
    function GetDataJoinWhere($tbl1,$tbl2,$param,$where,$id)
    {
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->join($tbl2,$param);
        $this->db->where($where, $id);
        $query=$this->db->get();
        return $query;
    }
    function GetData2Join($tbl1, $tbl2, $tbl3, $param){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->from($tbl2);
        $this->db->join($tbl3, $param);
        // $this->db->order_by("kd_setting_pembayaran_ta", "asc");
        $query = $this->db->get();
        return $query;
    }
    function GetData3Join($tbl1, $tbl2, $tbl3, $tbl4, $param){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->from($tbl2);
        $this->db->from($tbl3);
        $this->db->join($tbl4, $param);
        $query = $this->db->get();
        return $query;
    }
    function GetData4Join($tbl1, $tbl2, $tbl3, $tbl4, $tbl5, $param){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->from($tbl2);
        $this->db->from($tbl3);
        $this->db->from($tbl4);
        $this->db->join($tbl5, $param);
        $query = $this->db->get();
        return $query;
    }
    function GetData2JoinWhere($tbl1, $tbl2, $tbl3, $param, $id, $data){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->from($tbl2);
        $this->db->join($tbl3, $param);
        $this->db->where($id, $data);
        $query = $this->db->get();
        return $query;
    }
    function GetData2Join2Where($tbl1, $tbl2, $tbl3, $param, $id, $id2, $data, $data2){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->from($tbl2);
        $this->db->join($tbl3, $param);
        $this->db->where($id, $data);
        $this->db->where($id2, $data2);
        $query = $this->db->get();
        return $query->result();
    }
    function GetDataLike($table, $id, $nilai){
        $this->db->like($id, $nilai);
        $query = $this->db->get($table);
        return $query;
    }

}