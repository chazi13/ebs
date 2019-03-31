<?php
defined('BASEPATH') OR die('No direct script access allowed!');

function user_dir($username, $user_level, $child_dir = '')
{
    $path = 'storage\\';
    $user_dir = $path . md5($username . '&' . $user_level) . '\\';
    
    if ($child_dir !== '') {
        $user_dir .= $child_dir;
    }

    if (!file_exists($user_dir)) {
        mkdir($user_dir);
    }

    return $user_dir;
}

function upload_foto($file_input, $upload_path, $filename)
{
    $CI =& get_instance();
    $config = [
        'upload_path' => $upload_path,
        'allowed_types' => 'jpeg|jpg|png',
        'file_ext_tolower' => true,
        'overwrite' => true,
        'file_name' => $filename,
        'max_filename' => 50
    ];

    $CI->load->library('upload', $config);
    if ($CI->upload->do_upload($file_input)) {
        return $upload_path . $CI->upload->data('file_name');
    } else {
        return ['errors', $CI->upload->display_errors()];
    }
}

function upload_file($file_input, $upload_path, $filename_prefix)
{
    $CI =& get_instance();
    $config = [
        'upload_path' => $upload_path,
        'allowed_types' => 'doc|docx|xls|xlsx|pdf|ppt|pptx|jpeg|jpg|png',
        'file_ext_tolower' => true,
        'file_name' => $filename_prefix . '_' . uniqid(),
        'max_filename' => 50
    ];

    $CI->load->library('upload', $config);
    if ($CI->upload->do_upload($file_input)) {
        return $upload_path . $CI->upload->data('file_name');
    } else {
        return ['errors' => $CI->upload->display_errors()];
    }
}

function remove_file($file_path)
{
    unlink($file_path);
}
