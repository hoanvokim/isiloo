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
        $this->load->model('Category_model');
        $this->load->model('News_model');
    }

    public function index()
    {
        $data['title'] = 'Quản lý bài viết';
        $this->load->view('admin/news', $data);
    }


    public function create()
    {
        $data['title'] = 'Quản lý bài viết';
        $data['categories'] = $this->Category_model->findAll();
        $this->load->view('admin/news_create', $data);
    }

    public function update()
    {
        $data['title'] = 'Quản lý bài viết';
        $data['categories'] = $this->Category_model->findAll();
        $data['news'] = $this->News_model->findById($this->uri->segment(3));
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
            $this->load->library('upload', $this->get_config());
            if ($this->upload->do_upload('thumbnail')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/news/' . $upload_files['file_name'];

                $this->News_model->insert(
                    $this->input->post('category'),
                    $file_path,
                    $file_path,
                    $this->input->post('slug'),
                    $this->input->post('title'),
                    $this->input->post('summaryeditor'),
                    $this->input->post('contenteditor'),
                    $this->input->post('title_header'),
                    $this->input->post('description_header'),
                    $this->input->post('keyword_header')
                );
            } else {
                $this->News_model->insert(
                    $this->input->post('category'),
                    null,
                    null,
                    $this->input->post('slug'),
                    $this->input->post('title'),
                    $this->input->post('summaryeditor'),
                    $this->input->post('contenteditor'),
                    $this->input->post('title_header'),
                    $this->input->post('description_header'),
                    $this->input->post('keyword_header')
                );
            }
            redirect('admin/news', 'refresh');
        } else if (isset($_POST["reset"])) {
            redirect('admin/news_create', 'refresh');
        } else if (isset($_POST["cancel"])) {
            redirect('admin/news', 'refresh');
        }
    }

    public function update_submit()
    {
        if (isset($_POST["save"])) {
            echo 'save';
        } else if (isset($_POST["delete"])) {
            echo 'delete';
        } else if (isset($_POST["cancel"])) {
            echo 'cancel';
        } else if (isset($_POST["remove-current"])) {
            $this->News_model->updateImage($this->input->post('newsId'));
            if (strpos($this->input->post('img_src'), 'youtube') == false) {
                unlink('./' . $this->input->post('img_src'));
            }
            $data['newsId'] = $this->input->post('newsId');
            $data['img_src'] = '';
            $data['slug'] = $this->input->post('slug');
            $data['title_header'] = $this->input->post('title_header');
            $data['description_header'] = $this->input->post('description_header');
            $data['keyword_header'] = $this->input->post('keyword_header');
            $data['vititle'] = $this->input->post('vititle');
            $data['vicontent'] = $this->input->post('contenteditor');
            $data['visummary'] = $this->input->post('summaryeditor');
            $data['title'] = 'Cập nhật bài viết:<strong>' . $this->input->post('vititle') . '</strong>';
            $this->load->view('pages/dm/program/edit', $data);

        }
        redirect(base_url() . 'admin/news');
    }
}