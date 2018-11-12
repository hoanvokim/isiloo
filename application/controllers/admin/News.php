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
        $data['news'] = $this->News_model->findAllWithCategoryInfo();
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
        $news = $this->News_model->findById($this->uri->segment(4));
        $data['newsId'] = $news->id;
        $data['catId'] = $news->category_id;
        $data['img_src'] = $news->img_square;
        $data['slug'] = $news->slug;
        $data['title_header'] = $news->title_header;
        $data['description_header'] = $news->description_header;
        $data['keyword_header'] = $news->keyword_header;
        $data['title'] = $news->title;
        $data['content'] = $news->content;
        $data['summary'] = $news->summary;
        $this->load->view('admin/news_update', $data);
    }

    public function news_empty()
    {
        $data['title'] = 'Quản lý bài viết';
        $data['news'] = $this->News_model->findAllWithNotCategory();
        $this->load->view('admin/news_empty', $data);
    }

    public function delete()
    {
        $data['title'] = 'Quản lý bài viết';
        $news = $this->News_model->findById($this->uri->segment(4));
        if (!is_null($news->img_square) && file_exists('./' . $news->img_square)) {
            unlink('./' . $news->img_square);
        }
        if (!is_null($news->img_horizontal) && file_exists('./' . $news->img_horizontal)) {
            unlink('./' . $news->img_horizontal);
        }
        $this->News_model->delete($this->uri->segment(4));
        redirect('admin/news', 'refresh');
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
            $this->load->library('upload', $this->get_config());
            if ($this->upload->do_upload('thumbnail')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/news/' . $upload_files['file_name'];
                $this->News_model->update(
                    $this->input->post('newsId'),
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
                $this->News_model->update(
                    $this->input->post('newsId'),
                    $this->input->post('category'),
                    $this->input->post('img_src'),
                    $this->input->post('img_src'),
                    $this->input->post('slug'),
                    $this->input->post('title'),
                    $this->input->post('summaryeditor'),
                    $this->input->post('contenteditor'),
                    $this->input->post('title_header'),
                    $this->input->post('description_header'),
                    $this->input->post('keyword_header')
                );
            }


            $news = $this->News_model->findById($this->input->post('newsId'));
            $data['newsId'] = $this->input->post('newsId');
            $data['catId'] = $this->input->post('category');
            $data['img_src'] = $news->img_square;
            $data['slug'] = $this->input->post('slug');
            $data['title_header'] = $this->input->post('title_header');
            $data['description_header'] = $this->input->post('description_header');
            $data['keyword_header'] = $this->input->post('keyword_header');
            $data['title'] = $this->input->post('title');
            $data['content'] = $this->input->post('contenteditor');
            $data['summary'] = $this->input->post('summaryeditor');
            $data['categories'] = $this->Category_model->findAll();
            $data['showmessages'] = 'Cập nhật thành công!';
            $this->load->view('admin/news_update', $data);

        } else if (isset($_POST["delete"])) {
            $this->delete();
        } else if (isset($_POST["cancel"])) {
            redirect('admin/news', 'refresh');
        } else if (isset($_POST["remove-current"])) {
            $this->News_model->updateImage($this->input->post('newsId'));
            if ((strpos($this->input->post('img_src'), 'youtube') == false) && file_exists('./' . $this->input->post('img_src'))) {
                unlink('./' . $this->input->post('img_src'));
            }
            $data['newsId'] = $this->input->post('newsId');
            $data['catId'] = $this->input->post('category');
            $data['img_src'] = '';
            $data['slug'] = $this->input->post('slug');
            $data['title_header'] = $this->input->post('title_header');
            $data['description_header'] = $this->input->post('description_header');
            $data['keyword_header'] = $this->input->post('keyword_header');
            $data['title'] = $this->input->post('title');
            $data['content'] = $this->input->post('contenteditor');
            $data['summary'] = $this->input->post('summaryeditor');
            $data['categories'] = $this->Category_model->findAll();
            $data['showmessages'] = 'Cập nhật thành công!';
            $this->load->view('admin/news_update', $data);
        }
    }
}