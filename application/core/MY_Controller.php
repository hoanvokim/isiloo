<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 07.11.18
 * Time: 16:40
 */
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Loading model
        $this->load->helper('url');
        $this->load->model('User_model');

        if (!$this->is_login()) {
            redirect(base_url() . 'login');
        }
    }

    public function is_login()
    {
        $user = $this->session->userdata('logged_in');
        return isset($user);
    }
}