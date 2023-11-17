<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
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

    public function f_delete($table_name, $where)
    {
        $this->db->delete($table_name, $where);
        return;
    }

    function get_gr_dtls($achead_id)
    {
        $this->db->select('b.name as gr_name, c.name as subgr_name');
        $this->db->join('mda_mngroup b', 'a.mngr_id=b.sl_no');
        $this->db->join('mda_subgroub c', 'a.subgr_id=c.sl_no');
        $this->db->where(array(
            'a.sl_no' => $achead_id
        ));
        $query = $this->db->get('md_achead a');
        return $query->row();
    }

    public function f_get_voucher_id($frm_dt, $to_dt)
    {
        $this->db->select_max('sl_no');
        $this->db->where(array(
            'voucher_date >=' => $frm_dt,
            'voucher_date <=' => $to_dt
        ));
        $result = $this->db->get('td_vouchers');
        // echo $this->db->last_query();
        // exit;
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return 0;
        }
    }
}
