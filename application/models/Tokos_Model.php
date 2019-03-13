<?php
defined('BASEPATH') OR die('NO direct script access allowed!');

class Tokos_Model extends CI_Model
{
    public function create_new_toko($new_toko_data)
    {
        $result = $this->db->insert('tokos', $new_toko_data);
        return $result;
    }
}

