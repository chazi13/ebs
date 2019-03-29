<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Saldo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function push()
    {
        $data = $this->get_users();
        $data['title'] = 'Menabung';
        $data['nabung_active'] = 'active';

        return $this->template->load('app/template', 'app/saldo/isi', $data);
    }

    public function pull()
    {
        $data = $this->get_users();
        $data['title'] = 'Tarik Tunai';
        $data['tarik_active'] = 'active';

        return $this->template->load('app/template', 'app/saldo/tarik', $data);
    }

    public function transfer()
    {
        $data = $this->get_users();
        $data['title'] = 'Transfer';
        $data['tarik_active'] = 'active';

        return $this->template->load('app/template', 'app/saldo/tarik', $data);
    }

    private function get_users()
    {
        $this->load->model('Users_Model', 'users');
        $data['users']['siswa'] = $this->users->get_siswa();
        $data['users']['guru'] = $this->users->get_guru();

        return $data;
    }

}

