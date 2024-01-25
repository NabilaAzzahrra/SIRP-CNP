<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Models extends CI_Model
{

    public function get_data($table)
    {
       return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
       return $this->db->insert($table, $data);
    }

    public function update_data($where, $data, $table)
    {
       return $this->db->update($table, $data, $where);
       return $this->db->affected_rows();
    }

    public function Get_All($table, $select)
    {
        $select;
        $query = $this->db->get($table);
        return $query->result();
    }

    public function Get_Where($where, $table)
    {
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }
    function Save($data, $table)
    {
        $result = $this->db->insert($table, $data);
        return $result;
        return $this->db->affected_rows();

    }
    function Update($where, $data, $table)
    {
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }
    function Update_All($data, $table)
    {
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
    function Delete($where, $table)
    {
        $result = $this->db->delete($table, $where);
        return $result;
    }
    function Delete_All($table)
    {
        $result = $this->db->delete($table);
        return $result;
    }
    public function detail_data($id_perusahaan){
        return $this->db->select('*')->from('perusahaan')->where('id_perusahaan', $id_perusahaan)->get();
    }
    public function Masuk($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        $cekuser = $this->db->select('*')->from('user')->where('username', $username)->get();
        $cekpass = $this->db->select('*')->from('user')->where('password', $password)->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } elseif ($cekuser->num_rows() == null) {
            return 'usernotfound';
        } elseif ($cekpass->num_rows() == null) {
            return 'passnotfound';
        } else {
            return false;
        }
    }
}
