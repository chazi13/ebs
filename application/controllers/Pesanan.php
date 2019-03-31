<?php 
defined('BASEPATH') OR die('No direct script access allowed!');

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_Model', 'transaction');
    }

    public function index()
    {
        if ($this->session->userdata('level') == 'print') {
            $this->print_orders();
        } else {
            $this->toko_orders();
        }
    }

    private function toko_orders()
    {
        $this->load->model('Tokos_Model', 'toko');
        $data_toko = $this->toko->get_toko_by_user_id($this->session->userdata('user_id'));
        $data['pesanan'] = $this->transaction->get_orders($data_toko[0]->toko_id);
        $data['title'] = 'Pesanan';
        $data['pesanan_active'] = 'active';

        return $this->template->load('app/template', 'app/toko/pesanan', $data);
    }

    public function detail_order()
    {
        $transaction_id = $this->uri->segment(3);
        $data['detail'] = $this->transaction->get_detail_order($transaction_id);

        return $this->load->view('app/toko/detail_pesanan', $data);
    }

    private function print_orders()
    {
        $this->load->model('Prints_Model', 'print');
        $data['pesanan'] = $this->print->get_print_orders();
        $data['title'] = 'Pesanan';
        $data['pesanan_active'] = 'active';

        return $this->template->load('app/template', 'app/print/pesanan', $data);
    }

    public function detail_print_order()
    {
        $this->load->model('Prints_Model', 'print');
        $transaction_id = $this->uri->segment(3);
        $data['detail'] = $this->print->get_detail_order($transaction_id);

        return $this->load->view('app/print/detail_pesanan', $data);
    }
}

