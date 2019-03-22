<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_Model', 'users');
    }

    public function index()
    {
        return $this->load->view('login');
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
            $msg = 'Selamat datang ' . $this->session->userdata('nama');
            $url = base_url('dashboard');

            if ($uri_username !== '' && $uri_password !== '' && $this->session->userdata('level') == 'siswa') {
                $url = base_url('set_wali');
            }

            alert_content('success', 'Login Berhasil!', $msg, $url);
        }
    }

    public function destroy_session()
    {
        $this->session->sess_destroy();
        if ($this->session->userdata('user_id')) {
            redirect('login/destroy_session');
        }
        
        redirect('login');
    }
}

