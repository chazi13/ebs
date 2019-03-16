<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Transaction_Model extends CI_Model
{
    public function insert_transaction($data_transaction)
    {
        $result = $this->db->insert('transactions', $data_transaction);
        return $result;
    }
}

