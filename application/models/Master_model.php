<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{
    public function f_insert($table_name, $data_array)
    {

        $this->db->insert($table_name, $data_array);

        return;
    }

    public function f_edit($table_name, $data_array, $where)
    {

        $this->db->where($where);

        $this->db->update($table_name, $data_array);

        return;
    }

    public function f_select($table, $select = NULL, $where = NULL, $type)
    {

        if (isset($select)) {
            $this->db->select($select);
        }

        if (isset($where)) {
            $this->db->where($where);
        }

        $value = $this->db->get($table);

        if ($type == 1) {
            return $value->row();
        } else {
            return $value->result();
        }
    }

    function get_sub_group_dtls($id)
    {
        $this->db->select('a.sl_no, a.mngr_id, a.name, b.name as group_name, b.type');
        $this->db->join('mda_mngroup b', 'a.mngr_id=b.sl_no');
        if ($id > 0) {
            $this->db->where(array(
                'a.sl_no' => $id
            ));
        }
        $query = $this->db->get('mda_subgroub a');
        return $query->result();
    }

    function sub_gr_save($data)
    {
        $user_name = $this->session->userdata['loggedin']['user_name'];
        $datetime = date('Y-m-d h:m:s');
        if ($data['id'] > 0) {
            $input = array(
                'mngr_id' => $data['gr_name'],
                'name' => $data['sub_gr'],
                'modified_by' => $user_name,
                'modified_dt' => $datetime
            );
            $this->db->where(array(
                'sl_no' => $data['id']
            ));
            $this->db->update('mda_subgroub', $input);
            return true;
        } else {
            $input = array(
                'mngr_id' => $data['gr_name'],
                'name' => $data['sub_gr'],
                'created_by' => $user_name,
                'created_dt' => $datetime
            );
            $this->db->insert('mda_subgroub', $input);
            return true;
        }
    }

    function get_ac_head_dtls($id)
    {
        $this->db->select('a.sl_no, a.mngr_id, a.subgr_id, a.ac_name, b.name as gr_name, b.type, c.name as subgr_name');
        $this->db->join('mda_mngroup b', 'a.mngr_id=b.sl_no');
        $this->db->join('mda_subgroub c', 'a.subgr_id=c.sl_no');
        if ($id > 0) {
            $this->db->where(array(
                'a.sl_no' => $id
            ));
        }
        $this->db->where(array(
            'a.br_id' => $this->session->userdata['loggedin']['branch_id']
        ));
        $query = $this->db->get('md_achead a');
        return $query->result();
    }

    function get_subgr_dtls_by_gr_id($gr_id)
    {
        $this->db->select('sl_no as id, name');
        $this->db->where(array(
            'mngr_id' => $gr_id
        ));
        $query = $this->db->get('mda_subgroub');
        return $query->result();
    }
}
