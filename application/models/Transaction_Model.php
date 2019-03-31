<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Transaction_Model extends CI_Model
{
    public function insert_transaction($data_transaction)
    {
        $result = $this->db->insert('transactions', $data_transaction);
        return $result;
    }

    public function get_user_transaction($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('tgl_transaction', 'DESC');
        $data_return = $this->db->get('transactions')->result();
        return $data_return;
    }

    public function get_deb_today($user_id)
    {
        $this->db->select('total');
        $this->db->like('tgl_transaction', date('Y-m-d'));
        $this->db->where('jenis', 'isi saldo');
        return $this->get_user_transaction($user_id);
    }

    public function get_kre_today($user_id)
    {
        $this->db->select('total');
        $this->db->like('tgl_transaction', date('Y-m-d'));
        $this->db->where('jenis !=', 'isi saldo');
        return $this->get_user_transaction($user_id);
    }

    public function get_orders($toko_id)
    {
        $this->db->select('transactions.transaction_id, tgl_transaction, users.nama AS nama, transactions.status, ');
        $this->db->join('users', 'transactions.user_id = users.user_id');
        $this->db->join('orders','transactions.transaction_id = orders.transaction_id');
        $this->db->where('orders.toko_id', $toko_id);
        $this->db->order_by('transactions.status', 'ASC');
        $data_return = $this->db->get('transactions')->result();
        return $data_return;
    }

    public function update_transaction($data, $transaction_id)
    {
        $this->db->where('transaction_id', $transaction_id);
        $result = $this->db->update('transactions', $data);
        return $result;
    }

    public function get_detail_order($transaction_id)
    {
        $this->db->join('toko_items', 'orders.item_id = toko_items.item_id');
        $this->db->where('transaction_id', $transaction_id);
        $data_return = $this->db->get('orders')->result();
        return $data_return;
    }

    public function get_all_transaction()
    {
        $this->db->select('COUNT(transaction_id), jenis');
        $this->db->join('users', 'transactions.user_id = users.user_id');
        $this->db->group_by('jenis');
        $data_return = $this->db->get('transactions')->result();
        return $data_return;
    }
}

