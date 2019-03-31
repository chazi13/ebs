<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Transaction extends CI_Controller
{
    private $date;
    private $transaction_id;

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Transaction_Model', 'transaction');
        $this->date = date('Y-m-d H:i:s');
        $this->load->model('Users_Model', 'users');
    }

    public function insert_depo()
    {
        $post = $this->input->post();

        $data_transaction = [
            'total' => $post['jml_tabung'],
            'jenis' => 'isi saldo',
            'keterangan' => 'Menabung sebesar ' . rupiah($post['jml_tabung']) . ' pada hari ' . tgl($this->date),
            'status' => 'Selesai',
            'user_id' => $post['user_id']
        ];

        $result = $this->insert_new_transaction('IS', $data_transaction);
        if ($result) {
            $data_notif = [
                'jml_tabung' => $post['jml_tabung'],
                'id_pengirim' => $this->session->userdata('user_id'),
                'id_penerima' => $post['user_id']
            ];
            $this->notif->add_notif('isi', $data_notif);

            $msg = 'Tabungan Berhasil Ditambahkan';
            $msg .= $this->update_saldo($post['user_id'], $post['jml_tabung'], 'plus');
            alert_content('success', 'Berhasil Melakukan Transaksi', $msg);
        } else {
            $msg = 'Tabungan Gagal Ditambahkan';
            alert_content('error', 'Gagal Melakukan Transaksi', $msg);
        }
    }

    public function pull_cash()
    {
        $post = $this->input->post();

        $check = $this->check_saldo($post['user_id'], $post['nominal']);
        if ($check) {
            $data_transaction = [
                'total' => $post['nominal'],
                'jenis' => 'tarik tunai',
                'keterangan' => 'Tarik tunai sebesar ' . rupiah($post['nominal']) . ' pada hari ' . tgl($this->date),
                'status' => 'Selesai',
                'user_id' => $post['user_id']
            ];

            $result = $this->insert_new_transaction('IS', $data_transaction);
            if ($result) {
                $data_notif = [
                    'nominal' => $post['nominal'],
                    'id_pengirim' => $this->session->userdata('user_id'),
                    'id_penerima' => $post['user_id']
                ];
                $this->notif->add_notif('tarik', $data_notif);

                $msg = 'Tabungan Berhasil Ditambahkan';
                $msg .= $this->update_saldo($post['user_id'], $post['nominal'], 'min');
                alert_content('success', 'Berhasil Melakukan Transaksi', $msg);
            } else {
                $msg = 'Tabungan Gagal Ditambahkan';
                alert_content('error', 'Gagal Melakukan Transaksi', $msg);
            }
        } else {
            $msg = 'Saldo Kurang';
            alert_content('error', 'Gagal Melakukan Transaksi', $msg);
        }
    }

    public function insert_order()
    {
        $this->load->model('Orders_Model', 'order');
        $post = $this->input->post();
        $total = 0;

        for ($i=0; $i <= count($post['item_id']) - 1; $i++) { 
            $total += $post['subtotal'][$i];
        }

        $check = $this->check_saldo($this->session->userdata('user_id'), $total);
        if ($check) {
            $data_transaction = [
                'total' => $total,
                'jenis' => 'beli',
                'keterangan' => 'Beli ' . $post['jenis'] . ' pada hari ' . tgl($this->date),
                'status' => 'Pending',
                'user_id' => $this->session->userdata('user_id')
            ];

            $result = $this->insert_new_transaction('BL', $data_transaction);
            if ($result) {
                for ($i=0; $i <= count($post['item_id']) - 1; $i++) {
                    $data_order = [
                        'tgl_order' => $this->date,
                        'jml_order' => $post['jml_order'][$i],
                        'subtotal' => $post['subtotal'][$i],
                        'item_id' => $post['item_id'][$i],
                        'toko_id' => $post['toko_id'],
                        'transaction_id' => $this->transaction_id
                    ];

                    $this->order->insert_new_order($data_order);
                }
                $this->update_saldo($this->session->userdata('user_id'), $total, 'min');
                $this->update_saldo($post['user_toko_id'], $total, 'plus');

                $data_notif = [
                    'nama_penerima' => $this->session->userdata('nama'),
                    'transaction_id' => $this->transaction_id,
                    'id_pengirim' => $this->session->userdata('user_id'),
                    'id_penerima' => $post['user_toko_id']
                ];
                $this->notif->add_notif('pesan', $data_notif, $post['jenis']);

                $msg = 'Pesanan Telah Dikirim!';
                alert_content('success', 'Berhasil Melakukan Transaksi', $msg, 'reload');
            } else {
                $msg = 'Server Error';
                alert_content('error', 'Gagal Melakukan Transaksi', $msg);
            }
        } else {
            $msg = 'Saldo Kurang';
            alert_content('error', 'Gagal Melakukan Transaksi', $msg);
        }
    }

    public function insert_print_order()
    {
        $this->load->model('Prints_Model', 'prints');
        $this->load->helper('Upload');
        $post = $this->input->post();
        $total = $post['jml_print'] * $post['harga_satuan'];
        $check = $this->check_saldo($this->session->userdata('user_id'), $total);

        if ($check) {
            $data_transaction = [
                'total' => $total,
                'jenis' => 'print',
                'keterangan' => 'Print ' . $post['nama_file'] . ' sebanyak' . $post['jml_print'] . ' pada hari ' . tgl($this->date),
                'status' => 'Pending',
                'user_id' => $this->session->userdata('user_id')
            ];

            $result = $this->insert_new_transaction('PR', $data_transaction);
            if ($result) {
                $data_print = [
                    'nama_file' => $post['nama_file'],
                    'jml_print' => $post['jml_print'],
                    'jml_lembar' => 1,
                    'jenis' => $post['jenis']
                ];

                if (@$_FILES['file'] && @$_FILES['file']['error'] == 0) {
                    $filename = strtolower(str_replace(' ', '_', $post['nama_file']));
                    $user_dir = user_dir($this->session->userdata('username'), $this->session->userdata('level'), 'print\\');
                    $data_print['file'] = upload_file('file', $user_dir, $filename);

                    if (is_array($data_print['file'])) {
                        echo $data_print['file']['errors'];
                        exit();
                    }
                }
                $data_print['transaction_id'] = $this->transaction_id;

                $result2 = $this->prints->insert_new_print($data_print);
                if ($result2) {
                    $this->update_saldo($this->session->userdata('user_id'), $total, 'min');
                    $this->update_saldo($post['user_print_id'], $total, 'plus');

                    $data_notif = [
                        'nama_penerima' => $this->session->userdata('nama'),
                        'transaction_id' => $this->transaction_id,
                        'id_pengirim' => $this->session->userdata('user_id'),
                        'id_penerima' => $post['user_id']
                    ];
                    $this->notif->add_notif('pesan', $data_notif, 'print');

                    $msg = 'Pesanan Print Telah Dikirim';
                    alert_content('success', 'Berhasil Melakukan Transaksi', $msg, 'reload');
                } else {
                    $msg = 'Gagal Mengirim Pesanan!';
                    alert_content('error', 'Gagal Melakukan Transaksi', $msg);
                }
            } else {
                $msg = 'Server Error';
                alert_content('error', 'Gagal Melakukan Transaksi', $msg);
            }
        } else {
            $msg = 'Saldo Kurang';
            alert_content('error', 'Gagal Melakukan Transaksi', $msg);
        }
    }

    public function transfer()
    {
        $this->load->model('Transfers_Model', 'transfers');
        $post = $this->input->post();
        
        $check = $this->check_saldo($this->session->userdata('user_id'), $post['jml_transfer']);
        if ($check) {
            $data_transaction = [
                'total' => $post['jml_transfer'],
                'jenis' => 'transfer',
                'keterangan' => 'Transfer Ke ' . $post['nama_penerima'] . ' sejumlah ' . rupiah($post['jml_transfer']) . ' pada hari ' . tgl($this->date),
                'status' => 'Selesai',
                'user_id' => $this->session->userdata('user_id')
            ];

            $result = $this->insert_new_transaction('TF', $data_transaction);
            if ($result) {

                $data_transfer = [
                    'jml_transfer' => $post['jml_transfer'],
                    'nama_pengirim' => $this->session->userdata('nama'),
                    'nama_penerima' => $post['nama_penerima'],
                    'id_pengirim' => $this->session->userdata('user_id'),
                    'id_penerima' => $post['id_penerima'],
                    'transaction_id' => $this->transaction_id
                ];

                $result2 = $this->transfers->insert_new_transfer($data_transfer);
                if ($result2) {
                    $this->update_saldo($this->session->userdata('user_id'), $post['jml_transfer'], 'min');
                    $this->update_saldo($post['id_penerima'], $post['jml_transfer'], 'plus');

                    $data_notif = [
                        'nama_pengirim' => $this->session->userdata('nama'),
                        'jml_transfer' => $post['jml_transfer'],
                        'id_pengirim' => $this->session->userdata('user_id'),
                        'id_penerima' => $post['id_penerima']
                    ];
                    $this->notif->add_notif('transfer', $data_notif);

                    $msg = "Berhasil mentransfer!";
                    alert_content('success', 'Berhasil Melakukan Transaksi', $msg, 'reload');
                } else {
                    $msg = "Gagal Mentransfer!";
                    alert_content('error', 'Melakukan Transaksi', $msg);
                }
            } else {
                $msg = 'Server Error';
                alert_content('error', 'Melakukan Transaksi', $msg);
            }
        } else {
            $msg = 'Saldo Kurang';
            alert_content('error', 'Melakukan Transaksi', $msg);
        }
    }

    public function pay_spp()
    {
        $post = $this->post->input();
        $check = $this->check_saldo($this->session->userdata('user_id'), $post['total']);
        if ($check) {
            $data_transaction = [
                'total' => $post['total'],
                'jenis' => 'bayar spp',
                'keterangan' => 'Bayar SPP Bulan ' . $post['bulan'] . ' sejumlah ' . rupiah($post['total']) . ' pada hari ' . tgl($this->date),
                'status' => 'Selsai',
                'user_id' => $this->session->userdata('user_id')
            ];

            $result = $this->insert_new_transaction('BS', $data_transaction);
            if ($result) {
                $this->update_saldo($this->session->userdata('user_id'), $post['total'], 'min');
                $this->update_saldo(2, $post['total'], 'plus');
                $msg = 'SPP Telah Dibayarkan';
                alert_content('success', 'Berhasil Melakukan Transaksi', $msg);
            } else {
                $msg = 'Server Error';
                alert_content('error', 'Gagal Melakukan Transaksi', $msg);
            }
        } else {
            $msg = 'Saldo Kurang';
            alert_content('error', 'Gagal Melakukan Transaksi', $msg);
        }
    }

    private function insert_new_transaction($prefix, $data_transaction)
    {
        $this->transaction_id = strtoupper(uniqid($prefix . '-'));
        $data_transaction['transaction_id'] = $this->transaction_id;
        $data_transaction['tgl_transaction'] = $this->date;
        $result = $this->transaction->insert_transaction($data_transaction);

        return $result;
    }

    private function update_saldo($user_id, $comparsion, $plusmin)
    {
        $user_saldo = $this->users->user_saldo($user_id);
        if ($plusmin == 'min') {
            $new_user_saldo['saldo'] = $user_saldo - $comparsion;
        } elseif ($plusmin == 'plus') {
            $new_user_saldo['saldo'] = $user_saldo + $comparsion;
        }

        $result = $this->users->update_user_data($new_user_saldo, $user_id);
        if ($result) {
            if ($this->session->userdata('user_id') == $user_id) {
                $this->session->set_userdata(['saldo' => $new_user_saldo['saldo']]);
            }
            return 'Saldo Berhasil diupdate';
        } else {
            return 'Saldo Gagal diupdate';
        }
    }

    private function check_saldo($user_id, $nominal)
    {
        $user_saldo = $this->users->user_saldo($user_id);
        if ($user_saldo >= $nominal) {
            $comparsion = $user_saldo - $nominal;
            $most_exist = (40 / 100) * $user_saldo;
            if ($comparsion >= $most_exist) {
                return true;
            }
        }

        return false;
    }

    public function confirm()
    {
        $transaction_id = $this->uri->segment(3);
        $transaction_data = $this->transaction->get_detail_order($transaction_id);
        
        $result = $this->transaction->update_transaction(['status' => 'selesai'], $transaction_id);
        if ($result) {
            $data_notif = [
                'transaction_id' => $this->transaction_id,
                'id_pengirim' => $this->session->userdata('user_id'),
                'id_penerima' => $transaction_data[0]->user_id
            ];
            $this->notif->add_notif('beli', $data_notif);

            $msg =  'Pesanan Telah Dikonfirmasi!';
            alert_content('success', 'Berhasil', $msg, 'reload');
        } else {
            $msg =  'Pesanan Gagal Dikonfirmasi!';
            alert_content('error', 'Gagal', $msg, 'reload');
        }
    }
}

