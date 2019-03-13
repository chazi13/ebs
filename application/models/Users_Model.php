<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Users_Model extends CI_Model
{
    public function insert_new_user($user_data)
    {
        $this->db->insert('users', $user_data);
        $last_insert_id = $this->db->insert_id();
        return $last_insert_id;
    }

    public function get_user_profile($user_id)
    {
        $this->db->where('user_id', $user_id);
        $user_profile = $this->db->get('users')->result();
        return $user_profile;
    }

    public function update_user_data($user_data, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $result = $this->db->update('users', $user_data);
        return $result;
    }

    public function validate_user($username, $password)
    {
        $this->db->where('username', $username);
        $user_data = $this->db->get('users')->result();
        if (is_array($user_data) && count($user_data) == 1) {
            if (password_verify($password, $user_data[0]->password)) {
                $this->make_session($user_data[0]);
                return true;
            } else {
                echo 'Password salah!';
            }
        } else {
            echo 'User tidak ditemukan!';
        }
        return false;
    }

    private function make_session($user_data)
    {
        $this->session->set_userdata([
            'user_id' => $user_data->user_id,
            'nama' => $user_data->nama,
            'username' => $user_data->username,
            'level' => $user_data->level,
            'foto' => $user_data->foto,
            'saldo'=> $user_data->saldo,
            'login_status' => true
        ]);
    }
}

