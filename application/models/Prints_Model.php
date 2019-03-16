<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Prints_Model extends CI_Model
{
    public function insert_new_print($data_print)
    {
        $result = $this->db->insert('prints', $data_print);
        return $result;
    }
}

