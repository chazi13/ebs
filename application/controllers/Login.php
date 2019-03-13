<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_Model', 'users');
    }

    public function auth_user($uri_username = '', $uri_password = '')
    {
        if (!$this->input->post()) {
            $username = base64_decode(urldecode($uri_username));
            $password = base64_decode(urldecode($uri_password));
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
        }

        if ($this->users->validate_user($username, $password)) {
            if ($uri_username !== '' && $uri_password !== '' && $this->session->userdata('level') == 'siswa') {
                echo 'Isi Form Wali!';
            }

            header('Content-Type: application/json');
            echo json_encode($this->session->userdata());
        } else {
            echo "Login Gagal!";
        }
    }

    public function destroy_session()
    {
        $this->session->sess_destroy();
        if ($this->session->userdata('user_id')) {
            redirect('login/destroy_session');
        }
        header('Content-Type: application/json');
        echo json_encode($this->session->userdata());
    }
}

