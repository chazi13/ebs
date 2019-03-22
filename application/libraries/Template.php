<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Template
{
    private $template_data;

    private function set_template_data($name, $template_data)
    {
        $this->template_data[$name] = $template_data;
    }

    public function load($template, $view, $data = [], $return = FALSE)
    {
        $CI =& get_instance();
        $this->set_template_data('content', $CI->load->view($view, $data, TRUE));
        return $CI->load->view($template, $this->template_data, $return);
    }
}

