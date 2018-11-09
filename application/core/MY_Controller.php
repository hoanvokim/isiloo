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

    public function get_config()
    {
        return array(
            'upload_path' => "./assets/news",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        );

    }
}