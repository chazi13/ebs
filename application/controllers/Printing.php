<?php 
defined('BASEPATH') OR die('No direct script access allowed!');

class Printing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Prints_Model', 'print');
    }

    public function index()
    {
        $data['user_print'] = $this->print->user_print();
        $data['title'] = 'Print';
        $data['printing_active'] = 'active';

        return $this->template->load('app/template', 'app/print/form', $data);
    }
}

