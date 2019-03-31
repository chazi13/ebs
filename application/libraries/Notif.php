<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Notif
{
    private $CI;
    public $pesan;
    public $unread_pesan;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('Notif_Model', 'notif_model');
        $this->pesan = $this->get_notif('unread');
        $this->unread_pesan = count($this->pesan);
    }

    public function add_notif($type, $data, $subtype = '')
    {
        $pesan = '';
        if ($type == 'isi') {
            $pesan = 'Menabung dengan jumlah sebesar ' . rupiah($data['jml_tabung']);
        } elseif ($type == 'tarik') {
            $pesan = 'Tarik tunai dengan jumlah sebesar ' . rupiah($data['jml_tarik']);
        } elseif ($type == 'pesan') {
            $pesan = $data['nama_penerima'] . ' memesan ' . $subtype . ' dengan No Transaksi <b>' . $data['transaction_id'] . '</b>';
        } elseif ($type == 'confirm') {
            $pesan = 'Pesanan dengan No Transaksi ' . $data['transaction_id'] . ' telah dikonfirmasi, silahkan ambil';
        } elseif ($type == 'transfer') {
            $pesan = 'Telah menerima transfer dari ' . $data['nama_pengirim'] . ' sebesar <b>' . rupiah($data['jml_transfer']) . '</b>';
        }

        $data_notif = [
            'tgl_notif' => date('Y-m-d H:i:s'),
            'pesan' => $pesan,
            'id_pengirim' => $data['id_pengirim'],
            'id_penerima' => $data['id_penerima'],
            'dibaca' => false
        ];

        if (@$data['transaction_id']) {
            $data_notif['url'] = base_url('pesanan/index/' . $data['transaction_id']);
        }

        $this->CI->notif_model->insert_notif($data_notif);
    }

    public function get_notif($condition = '')
    {
        $status = '';
        if ($condition !== '') {
            if ($condition == 'unread') {
                $status = 0;
            } elseif ($condition == 'read') {
                $status = 1;
            }
        }
        $data = $this->CI->notif_model->get_user_notif($this->CI->session->userdata('user_id'), $status);

        return $data;
    }
}

