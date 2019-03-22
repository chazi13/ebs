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

    public function get_all_users()
    {
        $this->db->select(['user_id', 'nama', 'email', 'username', 'level']);
        $data_return = $this->db->get('users')->result();
        return $data_return;
    }

    public function get_petugas()
    {
        $this->db->where('level','bmt');
        $this->db->or_where('level', 'seragam');
        $this->db->or_where('level', 'atk');
        $this->db->or_where('level', 'print');
        return $this->get_all_users();
    }

    public function get_siswa()
    {
        $this->db->where('level', 'siswa');
        return $this->get_all_users();
    }

    public function get_guru()
    {
        $this->db->where('level', 'guru') ;
        return $this->get_all_users();
    }

    public function get_kantin()
    {
        $this->db->where('level', 'kantin') ;
        return $this->get_all_users();
    }

    public function get_wali($siswa_id)
    {
        $this->db->where('siswa_id', $siswa_id);
        return $this->get_all_users();
    }

    public function get_num_group()
    {
        $this->db->select('COUNT(user_id) AS jml, level');
        $this->db->group_by('level');
        $data_return = $this->db->get('users')->result_array();
        return $data_return;
    }

    public function get_user_profile($user_id)
    {
        $this->db->where('user_id', $user_id);
        $user_profile = $this->db->get('users')->result();
        return $user_profile;
    }

    public function user_saldo($user_id)
    {
        $user_data = $this->get_user_profile($user_id);
        $user_saldo = $user_data[0]->saldo;
        return $user_saldo;
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
                $this->login_error_notif('Password Salah!');
            }
        } else {
            $this->login_error_notif('User Tidak Ditemukan');
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

    private function login_error_notif($msg)
    {
        alert_content('error', 'Login Gagal!', $msg);
    }
}

