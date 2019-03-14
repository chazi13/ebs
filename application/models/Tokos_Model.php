<?php
defined('BASEPATH') OR die('NO direct script access allowed!');

class Tokos_Model extends CI_Model
{
    public function create_new_toko($new_toko_data)
    {
        $result = $this->db->insert('tokos', $new_toko_data);
        return $result;
    }

    public function get_toko_by_user_id($user_id)
    {
        $this->db->where('user_id', $user_id);
        $data_return = $this->db->get('tokos')->result();
        return $data_return;
    }

    public function update_profile_toko($toko_data, $toko_id)
    {
        $this->db->where('toko_id', $toko_id);
        $result = $this->db->update('tokos', $toko_data);
        return $result;
    }

    public function insert_item($data_item)
    {
        $result = $this->db->insert('toko_items', $data_item);
        return $result;
    }

    public function get_item_by_toko_id($toko_id)
    {
        $this->db->where('toko_id', $toko_id);
        $data_return = $this->db->get('toko_items')->result();
        return $data_return;
    }

    public function get_item_by_id($item_id)
    {
        $this->db->where('item_id', $item_id);
        $data_return = $this->db->get('toko_items')->result();
        return $data_return;
    }

    public function update_item($data_item, $item_id)
    {
        $this->db->where('item_id', $item_id);
        $result = $this->db->update('toko_items', $data_item);
        return $result;
    }

    public function delete_item($item_id)
    {
        $this->db->where('item_id', $item_id);
        $result = $this->db->delete('toko_items');
        return $result;
    }
}

