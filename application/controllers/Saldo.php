<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Saldo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_Model', 'users');
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
        $data['transfer_active'] = 'active';

        return $this->template->load('app/template', 'app/saldo/transfer', $data);
    }

    public function tabungan()
    {
        $this->load->model('Transaction_Model', 'transaction');
        $user_id = $this->session->userdata('user_id');
        $user = $this->users->get_user_profile($user_id);

        if ($user[0]->level == 'wali') {
            $user_id = $user[0]->siswa_id;
            $user = $this->users->get_user_profile($user_id);
        }

        $data['transaksi'] = $this->transaction->get_user_transaction($user_id);
        $data['title'] = 'Tabungan';
        $data['tabungan_active'] = 'active';

        $this->template->load('app/template', 'app/saldo/tabungan', $data);
    }

    private function get_users()
    {
        $data['users']['siswa'] = $this->users->get_siswa();
        $data['users']['guru'] = $this->users->get_guru();

        return $data;
    }

}

