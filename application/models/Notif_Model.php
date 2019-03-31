<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Notif_Model extends CI_Model
{
    public function insert_notif($data)
    {
        $result = $this->db->insert('notif', $data);
        return $result;
    }

    public function get_user_notif($user_id, $status = '')
    {
        $this->db->select('notif.*, users.foto');
        $this->db->join('users', 'notif.id_pengirim = users.user_id');
        $this->db->where('id_penerima', $user_id);
        if ($status !== '') {
            $this->db->where('dibaca', $status);
        }
        $data_return = $this->db->get('notif')->result();
        return $data_return;
    }
}

