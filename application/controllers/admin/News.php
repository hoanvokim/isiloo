<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 08.11.18
 * Time: 12:16
 */
class News extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Loading model
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'Quản lý bài viết';
        $this->load->view('admin/news', $data);
    }


    public function create()
    {
        $data['title'] = 'Quản lý bài viết';
        $this->load->view('admin/news_create', $data);
    }

    public function update()
    {
        $data['title'] = 'Quản lý bài viết';
        $this->load->view('admin/news_update', $data);
    }

    public function news_empty()
    {
        $data['title'] = 'Quản lý bài viết';
        $this->load->view('admin/news_empty', $data);
    }

    public function delete()
    {
        $data['title'] = 'Quản lý bài viết';
        $this->load->view('admin/news', $data);
    }

    public function create_submit()
    {
        if (isset($_POST["save"])) {
            echo 'save';
        }
        else if (isset($_POST["cancel"])) {
            echo 'cancel';
        }
        redirect(base_url() . 'admin/news');
    }

    public function update_submit()
    {
        if (isset($_POST["save"])) {
            echo 'save';
        }
        else if (isset($_POST["delete"])) {
            echo 'delete';
        }
        else if (isset($_POST["cancel"])) {
            echo 'cancel';
        }
        redirect(base_url() . 'admin/news');
    }
}