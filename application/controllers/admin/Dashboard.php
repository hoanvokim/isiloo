<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 07.11.18
 * Time: 16:40
 */
class Center extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Loading model
        $this->load->model('User_model');
    }

    public function login()
    {
        return $this->load;
    }
}