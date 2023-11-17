<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    function get_branch()
    {
        $query = $this->db->get('md_branch');
        return $query->result();
    }

    function get_fin_year()
    {
        $query = $this->db->get('md_fin_year');
        return $query->result();
    }

    function check_user_by_id($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('md_users');
        return $query->row();
    }

    function login_check($data)
    {
        $this->db->where('user_id', $data['user_id']);
        $query = $this->db->get('md_users');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            if (password_verify($data['user_pwd'], $row->password)) {
                $this->db->where('user_id', $data['user_id']);
                $this->db->join('md_branch', 'md_users.branch_id = md_branch.id', 'LEFT');
                $query_1 = $this->db->get('md_users');
                return $query_1->row();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function fin_year_by_id($sl_no)
    {
        $this->db->where('sl_no', $sl_no);
        $data = $this->db->get('md_fin_year');
        return $data->row();
    }
}
