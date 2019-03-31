<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Toko extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tokos_Model', 'toko');
    }

    public function edit_profil()
    {
        $data['toko'] = $this->toko->get_toko_by_user_id($this->session->userdata('user_id'));
        $data['title'] = 'Edit Profil Toko';
        $data['breadcrumbs'] = [['Edit Profil Toko']];

        return $this->template->load('app/template', 'app/toko/edit_profile', $data);
    }

    public function update_profil()
    {
        $this->load->helper('Upload');
        $post = $this->input->post();
        $data_profile_toko = [
            'nama_toko' => $post['nama_toko'],
            'deskripsi_toko' => $post['deskripsi_toko']
        ];

        if (@$_FILES['foto_toko'] && @$_FILES['foto_toko']['error'] == 0) {
            $user_dir = user_dir($this->session->userdata('username'), $this->session->userdata('level'), 'toko\\');
            $data_profile_toko['foto_toko'] = upload_foto('foto_toko', $user_dir, 'foto_toko');

            if (is_array($data_profile_toko['foto_toko'])) {
                echo $data_profile_toko['foto_toko']['errors'];
                exit();
            }
        }

        $result = $this->toko->update_profile_toko($data_profile_toko, $post['toko_id']);
        if ($result) {
            $msg = 'Profil Toko Telah Diubah!';
            alert_content('success', 'Berhasil', $msg);
        } else {
            $msg = 'Profil Toko Gagal Diubah!';
            alert_content('error', 'Gagal', $msg);
        }
    }

    public function add_item()
    {
        $data_toko = $this->toko->get_toko_by_user_id($this->session->userdata('user_id'));
        $data['toko_id'] = $data_toko[0]->toko_id;
        
        $data['title'] = 'Tambah Item';
        $data['item_active'] = 'active';
        $data['breadcrumbs'] = [['Item', 'toko/item'], ['Tambah Item']];

        return $this->template->load('app/template', 'app/toko/add_item', $data);
    }

    public function add_new_item()
    {
        $this->load->helper('Upload');
        $post = $this->input->post();
        $data_item = [
            'nama_item' => $post['nama_item'],
            'deskripsi_item' => $post['deskripsi_item'],
            'harga_item' => $post['harga_item'],
            'stok' => $post['stok'],
            'toko_id' => $post['toko_id'],
        ];

        if (@$_FILES['foto_item'] && @$_FILES['foto_item']['error'] == 0) {
            $user_dir = user_dir($this->session->userdata('username'), $this->session->userdata('level'), 'toko\\item\\');
            $data_item['foto_item'] = upload_foto('foto_item', $user_dir, strtolower(str_replace(' ', '_', $post['nama_item'])));

            if (is_array($data_item['foto_item'])) {
                echo $data_item['foto_item']['errors'];
                exit();
            }
        }

        $result = $this->toko->insert_item($data_item);
        if ($result) {
            $msg = 'Item Telah Ditembahkan!';
            alert_content('success', 'Berhasil', $msg);
        } else {
            $msg = 'Item Gagal Ditembahkan!';
            alert_content('error', 'Gagal', $msg);
        }
    }

    public function item()
    {
        // echo $this->session->userdata('user_id');
        $data_toko = $this->toko->get_toko_by_user_id($this->session->userdata('user_id'));
        $toko_id = $data_toko[0]->toko_id;
        $data['items'] = $this->toko->get_item_by_toko_id($toko_id);
        $data['title'] = 'Daftar Item';
        $data['item_active'] = 'active';
        
        return $this->template->load('app/template', 'app/toko/items', $data);
    }

    public function edit_item($item_id)
    {
        $data['item'] = $this->toko->get_item_by_id($item_id);
        $data['title'] = 'Edit Item';
        $data['item_active'] = 'active';
        $data['breadcrumbs'] = [['Item', 'toko/item'], ['Edit Item']];

        $this->template->load('app/template', 'app/toko/edit_item', $data);
    }

    public function update_item()
    {
        $this->load->helper('Upload');
        $post = $this->input->post();
        $data_item = [
            'nama_item' => $post['nama_item'],
            'deskripsi_item' => $post['deskripsi_item'],
            'harga_item' => $post['harga_item'],
            'stok' => $post['stok'],
        ];

        if (@$_FILES['foto_item'] && @$_FILES['foto_item']['error'] == 0) {
            $user_dir = user_dir($this->session->userdata('username'), $this->session->userdata('level'), 'toko\\item\\');
            $data_item['foto_item'] = upload_foto('foto_item', $user_dir, strtolower(str_replace(' ', '_', $post['nama_item'])));

            if (is_array($data_item['foto_item'])) {
                echo $data_item['foto_item']['errors'];
                exit();
            }
        }

        $result = $this->toko->update_item($data_item, $post['item_id']);
        if ($result) {
            $msg = 'Item Telah Diubah!';
            alert_content('success', 'Berhasil', $msg);
        } else {
            $msg = 'Item Gagal Diubah!';
            alert_content('error', 'Gagal', $msg);
        }
    }

    public function hapus_item($item_id)
    {
        // $item_id = $this->uri->segment(3);
        $data_item = $this->toko->get_item_by_id($item_id);
        $result = $this->toko->delete_item($item_id);

        $file_full_path = $data_item[0]->foto_item;
        if ($result) {
            $this->load->helper('Upload');
            remove_file($file_full_path);
            $msg =  'Item Telah Dihapus!';
            $url_redirect = 'reload';
            alert_content('success', 'Berhasil', $msg, $url_redirect);
        } else {
            $msg =  'Item Gagal Dihapus!';
            alert_content('error', 'Gagal', $msg);
        }
    }
    
    public function kantin()
    {
        $data['kantin'] = $this->toko->get_toko_by_jenis_toko('kantin');
        $data['title'] = 'Kantin';
        $data['kantin_active'] = 'active';

        return $this->template->load('app/template', 'app/toko/list', $data);
    }

    public function detail($toko_id = 0)
    {
        $jenis_toko = $this->uri->segment(1);
        if ($toko_id == '') {
            $data_toko = $this->toko->get_toko_by_jenis_toko($jenis_toko);
            $toko_id = $data_toko[0]->toko_id;
        }

        $data['toko'] = $this->toko->get_toko_by_toko_id($toko_id);
        $data['item'] = $this->toko->get_item_by_toko_id($toko_id);
        $data['title'] = 'Detail Toko';
        $data[$jenis_toko . '_active'] = 'active';

        return $this->template->load('app/template', 'app/toko/detail', $data);
    }
}

