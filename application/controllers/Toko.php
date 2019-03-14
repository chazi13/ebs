<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Toko extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tokos_Model', 'toko');
    }

    public function profil()
    {
        $data_toko = $this->toko->get_toko_by_user_id($this->session->userdata('user_id'));
        header('Content-Type: application/json');
        echo json_encode($data_toko);
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
            echo 'Profil Toko Telah Diubah!';
        } else {
            echo 'Profil Toko Gagal Diubah!';
        }
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
            echo 'Item Telah Ditembahkan!';
        } else {
            echo 'Item Gagal Ditembahkan!';
        }
    }

    public function daftar_item()
    {
        $toko_id = $this->uri->segment(3);
        $data_list_item = $this->toko->get_item_by_toko_id($toko_id);
        header('Content-Type: application/json');
        echo json_encode($data_list_item);
    }

    public function edit_item()
    {
        $item_id = $this->uri->segment(3);
        $data_item = $this->toko->get_item_by_id($item_id);
        header('Content-Type: application/json');
        echo json_encode($data_item);
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
            echo 'Item Telah Diubah!';
        } else {
            echo 'Item Gagal Diubah!';
        }
    }

    public function hapus_item()
    {
        $item_id = $this->uri->segment(3);
        $data_item = $this->toko->get_item_by_id($item_id);
        $result = $this->toko->delete_item($item_id);

        $file_full_path = $data_item[0]->foto_item;
        if ($result) {
            $this->load->helper('Upload');
            remove_file($file_full_path);
            echo 'Item Telah Dihapus!';
        } else {
            echo 'Item Gagal Dihapus!';
        }
    }
    
}

