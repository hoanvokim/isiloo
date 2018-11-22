<?php
/**
 * Created by PhpStorm.
 * User: vohoan
 * Date: 11/22/18
 * Time: 10:53 PM
 */

class Contact extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Loading model
        $this->load->model('Registration_model');
    }

    public function index()
    {
        $data['title'] = 'Danh sách đăng kí';
        $data['contacts'] = $this->Registration_model->findAllRegistration();
        $this->load->view('admin/contact', $data);
    }


    public function update()
    {
        $data['title'] = 'Danh sách đăng kí';
        $this->Registration_model->updateStatus($this->uri->segment(4), 1);
        $data['contacts'] = $this->Registration_model->findAllRegistration();
        $this->load->view('admin/contact', $data);
    }

}