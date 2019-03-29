<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Auth_Checked
{
    private $CI;
    private $logged_in;
    private $level;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->level = $this->CI->session->userdata('level');
        $this->logged_in = $this->CI->session->userdata('login_status');
    }

    public function is_logged_in()
    {
        if ($this->logged_in) {
            return true;
        } 

        return false;
    }

    public function is_level($level_allowed, $reverse = false)
    {
        if ($this->is_logged_in()) {
            if (is_array($level_allowed)) {
                $return = (in_array($this->level, $level_allowed)) ? true : false;
            } else {
                $return = ($this->level == $level_allowed) ? true : false;
            }
        }

        if ($reverse == true) {
            $return = !$return;
        }

        return $return;
    }

    public function redirect_if($condition = [], $to)
    {
        $return = (bool) true;
        
        if (is_string($condition) && stristr('!login', $condition)) {
            $return = !$this->is_logged_in();
        } else {
            if ($this->is_logged_in()) {
                $return = $this->is_level($condition, true);
            }
        }

        if ($return) {
            return redirect($to);
        }
    }
}

