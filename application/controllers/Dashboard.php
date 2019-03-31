<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth->redirect_if('!login', 'login');
    }

    public function index()
    {
        $page = 'app/';
        $level = $this->session->userdata('level');
        if ($level == 'kantin' || $level == 'seragam' || $level == 'atk') {
            $level = 'toko';
        } elseif ($level == 'siswa' || $level == 'guru') {
            $level = 'user';
        }
        $page .= $level . '_dashboard';

        $data['data'] = $this->{$level}();
        $data['title'] = 'Dashboard';
        $data['dash_active'] = 'active';

        return $this->template->load('app/template', $page, $data);
    }

    private function admin()
    {
        $this->load->model('Users_Model', 'users');
        $data_users = $this->users->get_num_group();
        $count_data_user = count($data_users);
        $data_users[$count_data_user]['jml'] = 0;
        $new_data_users = [];
        $j = 0;

        for ($i=0; $i < $count_data_user; $i++) {
            if ($data_users[$i]['level'] == 'admin' || $data_users[$i]['level'] == 'wali') {
                unset($data_users[$i]);
            } elseif ($data_users[$i]['level'] == 'bmt' || $data_users[$i]['level'] == 'atk' || $data_users[$i]['level'] == 'print'|| $data_users[$i]['level'] == 'seragam') {
                $data_users[$count_data_user]['level'] = 'petugas';
                $data_users[$count_data_user]['color'] = 'primary';
                $data_users[$count_data_user]['icon'] = 'fa-user-tie';
                $data_users[$count_data_user]['jml']++;
                unset($data_users[$i]);
            } else {
                if ($data_users[$i]['level'] == 'siswa') {
                    $data_users[$i]['color'] = 'danger';
                    $data_users[$i]['icon'] = 'fa-user-graduate';
                } elseif ($data_users[$i]['level'] == 'guru') {
                    $data_users[$i]['color'] = 'success';
                    $data_users[$i]['icon'] = 'fa-briefcase';
                } elseif ($data_users[$i]['level'] == 'kantin') {
                    $data_users[$i]['color'] = 'info';
                    $data_users[$i]['icon'] = 'fa-store';
                } else {
                }
            }
        }

        $new_data_users = array_values($data_users);
        
        return $new_data_users;
    }

    public function user()
    {
        $this->load->model('Transaction_Model', 'transaction');
        $data['deb'] = 0;
        $data['kre'] = 0;
        
        $deb = $this->transaction->get_deb_today($this->session->userdata('user_id'));
        $kre = $this->transaction->get_kre_today($this->session->userdata('user_id'));

        foreach ($deb as $d) {
            $data['deb'] += $d->total;
        }

        foreach ($kre as $k) {
            $data['kre'] += $k->total;
        }

        return $data;
    }

    private function bmt()
    {
        $this->load->model('Transaction_Model', 'transaction');
        $data['transaction'] = $this->transaction->get_all_transaction();

        return $data;
    }

    private function kantin()
    {
        return $this->toko();
    }

    private function toko()
    {
        $this->load->model('Users_Model', 'user');
        $this->load->model('Tokos_Model', 'toko');

        $user_id = $this->session->userdata('user_id');
        $data['profil'] = $this->user->get_user_profile($user_id);
        $data['toko'] = $this->toko->get_toko_by_user_id($user_id);

        return $data;
    }

    private function print()
    {
        $data['page'] = 'app/print_dashboard';
        return $data;
    }
}

