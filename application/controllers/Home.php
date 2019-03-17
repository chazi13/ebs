<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->load->view('homepage');
    }
}

