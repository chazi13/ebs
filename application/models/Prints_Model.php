<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Prints_Model extends CI_Model
{
    public function user_print()
    {
        $this->db->where('level', 'print');
        $data_return = $this->db->get('users')->result();
        return $data_return;
    }

    public function insert_new_print($data_print)
    {
        $result = $this->db->insert('prints', $data_print);
        return $result;
    }

    public function get_print_orders()
    {
        $this->db->select('transactions.transaction_id, users.nama, tgl_transaction, transactions.status, ');
        $this->db->join('users', 'transactions.user_id = users.user_id');
        $this->db->join('prints', 'transactions.transaction_id = prints.transaction_id');
        $this->db->where('transactions.jenis', 'print');
        $data_return = $this->db->get('transactions')->result();
        return $data_return;
    }

    public function get_detail_order($transaction_id)
    {
        $this->db->where('transaction_id', $transaction_id);
        $data_return = $this->db->get('prints')->result();
        return $data_return;
    }
}

