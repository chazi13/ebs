<?php
defined('BASEPATH') OR die('No direct script access allwed!');

class Orders_Model extends CI_Model
{
    public function insert_new_order($data_order)
    {
        $result = $this->db->insert('orders', $data_order);
        return $result;
    }
}

