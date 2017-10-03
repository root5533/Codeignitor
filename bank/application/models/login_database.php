<?php

Class Login_Database extends CI_Model {

    public function registration_insert($data) {
        $condition = "user_name =" . "'" . $data['user_name'] . "'";
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where($condition);
        $query = $this->db->get();

        if($query->num_rows() == 0) {
            $this->db->insert('customer', $data);
            if($this->db->affected_rows() > 0) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function login($data) {
        $condition = "user_name =" . "'" . $data['username'] . "' AND password=" . "'" . $data['password']  . "'";
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where($condition);
        $this->db->limit('1');
        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

    public function read_user_information($username) {
        $condition = "user_name" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('$condition');
        $this->db->limit('1');
        $query = $this->db->get();

        if($query->num_rows()==1) {
            return $query->result();
        }
        else {
            return FALSE;
        }
    }
}