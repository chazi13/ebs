<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Transfers_Model extends CI_Model
{
    public function insert_new_transfer($data_transfer)
    {
        $result = $this->db->insert('transfers', $data_transfer);
        return $result;
    }
}

