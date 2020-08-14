    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSudi extends CI_Model{
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
        return $query;
    }

    // function GetPhoto($foto, $tabel, $id, $val)
    // {
    //     $this->db->select($foto);
    //     $this->db->from($tabel);
    //     $this->db->where($id, $val);
    //     return $this->db->get()->result();
    // }

    function GetDataWhere($tabel,$id,$nilai)
    {
        $this->db->where($id,$nilai);
        $query= $this->db->get($tabel);
        return $query;
    }

    function GetDataJoin($tbl1, $tbl2, $param){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->join($tbl2, $param);
        $query = $this->db->get();
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
        return $query->result();
    }

    function GetData3JoinWhere($tbl1, $tbl2, $tbl3, $tbl4, $param, $id, $data){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->from($tbl2);
        $this->db->from($tbl3);
        $this->db->join($tbl4, $param);
        $this->db->where($id, $data);
        $query = $this->db->get();
        return $query;
    }
    function GetDataJoinWhere($tbl1, $tbl2, $param, $id, $data){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->join($tbl2, $param);
        $this->db->where($id, $data);
        $query = $this->db->get();
        return $query->result();
    }
    function GetDataJoin2Where($tbl1, $tbl2, $param, $id, $id2, $data, $data2){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->join($tbl2, $param);
        $this->db->where($id, $data);
        $this->db->where($id2, $data2);
        $query = $this->db->get();
        return $query->result();
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
    function searchData($tbl1, $tbl2, $param, $id, $data){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->join($tbl2, $param);
        $this->db->where($id, $data);
        $query = $this->db->get();
        return $query->result();
    }
    function listPayment($target, $tbl, $tbl2, $param, $id, $data){
        $this->db->select($target);
        $this->db->from($tbl);
        $this->db->join($tbl2, $param);
        $this->db->where($id, $data);
        $query = $this->db->get();
        return $query->result();
    }
    function getPayment($target, $join, $data, $data2){
        $this->db->select($target);
        $this->db->from('setting_pembayaran_ta');
        $this->db->from('jenis_pembayaran');
        $this->db->join('payment', $join, 'left');
        $this->db->where('setting_pembayaran_ta.kd_kelas', $data2);
        $this->db->where('payment.nis', $data);
        $this->db->group_by('setting_pembayaran_ta.kd_jenis_pembayaran');
        $query = $this->db->get();
        return $query->result();
    }
}