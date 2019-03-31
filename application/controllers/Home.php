<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth->redirect_if('login', 'dashboard');
    }

    public function index()
    {
        $this->load->model('Users_Model', 'users');
        $data['tertinggi'] = $this->users->get_user_saldo('tertinggi');
        $data['terendah'] = $this->users->get_user_saldo('terendah');
        return $this->load->view('homepage1', $data);
    }
}

