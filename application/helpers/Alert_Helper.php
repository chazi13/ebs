<?php
defined('BASEPATH') OR die('No direct script access allowed!');
// header('Content-Type: application/json');

function alert_content($alert_type, $msg_title, $msg, $url_redirect = '')
{
    $data_alert = [
        'type' => $alert_type,
        'title' => $msg_title,
        'msg' => $msg
    ];

    if ($url_redirect !== '') {
        $data_alert['redirect'] = $url_redirect;
    }

    echo json_encode($data_alert);
}
