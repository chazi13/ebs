<?php
defined('BASEPATH') OR die('No dierct script access allowed!');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_Model', 'users');
    }

    public function add_user()
    {
        $this->load->helper('Upload');
        $post = $this->input->post();
        $user_data = [
            'no_induk' => @$post['no_induk'],
            'nama' => $post['nama'],
            'email' => @$post['email'],
            'telp' => @$post['telp'],
            'username' => $post['username'],
            'password' => password_hash($post['password'], PASSWORD_BCRYPT),
            'level' => $post['level']
        ];

        if (@$_FILES['foto'] && @$_FILES['foto']['error'] == 0) {
            $user_dir = user_dir($post['username'], $post['level']);
            $user_data['foto'] = upload_foto('foto', $user_dir, 'foto_profil');

            if (is_array($user_data['foto'])) {
                echo $user_data['foto']['errors'];
                exit();
            }
        }
        
        $user_id = $this->users->insert_new_user($user_data);
        if ($post['level'] == 'seragam' || $post['level'] == 'atk' || $post['level'] == 'kantin') {
            $jenis = $post['level'];
            $this->create_new_toko($user_id, $jenis);
        }

        if ($post['username'] && $post['password'] && @$post['register'] == 'true') {
            $uri_username = urlencode(base64_encode($post['username']));
            $uri_password = urlencode(base64_encode($post['password']));

            redirect('login/auth_user/' . $uri_username . '/' . $uri_password);
        }

        echo 'Daftar Berhasil!';
    }

    private function create_new_toko($user_id, $jenis)
    {
        $this->load->model('Tokos_Model', 'toko');
        $toko_data = [
            'jenis_toko' => $jenis,
            'user_id' => $user_id,
        ];

        $this->toko->create_new_toko($toko_data);
    }

    public function insert_wali()
    {
        // header('Content-Type: application/json');
        // echo json_encode($this->session->userdata());
        $post = $this->input->post();
        $wali_data = [
            'nama' => $post['nama'],
            'telp' => $post['telp'],
            'email' => $post['email'],
            'level' => 'wali',
            'siswa_id' => $post['siswa_id']
        ];

        $wali_data['username'] = strtolower(explode(' ', $post['nama'])[0]);
        $username = $wali_data['username'];
        $password = base64_encode($username);
        $wali_data['password'] = password_hash($password, PASSWORD_BCRYPT);

        $result = $this->users->insert_new_user($wali_data);
        if ($result) {
            echo 'Wali berhasil ditambahkan!';
        } else {
            echo 'Wali gagal ditambahkan!';
        }
    }

    public function all()
    {
        $data_users = $this->users->get_all_users();
        header('Content-Type: application/json');
        echo json_encode($data_users);
    }

    public function profil()
    {
        if ($this->uri->segment(3)) {
            $user_id = $this->uri->segment(3);
        } else {
            $user_id = $this->session->userdata('user_id');
        }
        
        $user_profile = $this->users->get_user_profile($user_id);
        header('Content-Type: application/json');
        echo json_encode($user_profile);
    }

    public function update_user()
    {
        $this->load->helper('Upload');
        $post = $this->input->post();
        $user_data = [
            'nama' => $post['nama'],
            'email' => $post['email'],
            'telp' => $post['telp'],
            'username' => $post['username'],
        ];

        if ($post['password'] !== '') {
            $user_data['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
        }

        if (@$_FILES['foto'] && @$_FILES['foto']['error'] == 0) {
            $user_dir = user_dir($post['username'], $post['level']);
            $user_data['foto'] = upload_foto('foto', $user_dir, 'foto_profil');

            if (is_array($user_data['foto'])) {
                echo $user_data['foto']['errors'];
                exit();
            }
        }

        $result = $this->users->update_user_data($user_data, $post['user_id']);
        if ($result) {
            echo "Data Berhasil Diubah!";
        } else {
            echo "Data Gagal Diubah!";
        }
    }
}

