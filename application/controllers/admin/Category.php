<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 12.11.18
 * Time: 15:40
 */
class News extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Loading model
        $this->load->model('User_model');
        $this->load->model('Category_model');
    }

    public function index()
    {
        $data['title'] = 'Quản lý Danh mục';
        $data['categories'] = $this->Category_model->findAll();
        $this->load->view('admin/category', $data);
    }

    public function category_empty()
    {
        $data['title'] = 'Quản lý Danh mục trống';
        $data['categories'] = $this->Category_model->findAll();
        $this->load->view('admin/category_empty', $data);
    }

    public function sub($parentId)
    {
        $parent_category = $this->Category_model->findById($parentId);
        $data['title'] = 'Quản lý Danh mục của: ' . $parent_category->name;
        $data['categories'] = $this->Category_model->findAllSubById($parentId);
        $this->load->view('admin/category_sub', $data);
    }

    public function create($parent_id)
    {
        $data['title'] = 'Tạo Danh mục mới';
        $data['parent_id'] = $parent_id;
        $this->load->view('admin/category_create', $data);
    }

    public function update($categoryId)
    {
        $category = $this->Category_model->findById($categoryId);
        $data['title'] = 'Cập nhật Danh mục ' . $category->name;
        $data['id'] = $category->id;
        $data['name'] = $category->name;
        $data['slug'] = $category->slug;
        $data['img'] = $category->img;
        $data['sort_index'] = $category->sort_index;
        $this->load->view('admin/category_empty', $data);
    }

    public function delete()
    {
        $category = $this->Category_model->findById($this->uri->segment(4));
        if (!is_null($category->img) && file_exists('./' . $category->img)) {
            unlink('./' . $category->img_square);
        }
        $this->Category_model->delete($this->uri->segment(4));
        if ($category->parent_id != null) {
            redirect('admin/category/sub/' . $category->parent_id, 'refresh');
        }
        redirect('admin/category', 'refresh');
    }

    public function create_submit()
    {
        if (isset($_POST["save"])) {
            $this->load->library('upload', $this->get_config());
            if ($this->upload->do_upload('thumbnail')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/' . $upload_files['file_name'];

                $this->Category_model->insert(
                    $this->input->post('parent_id'),
                    $this->input->post('slug'),
                    $this->input->post('name'),
                    $file_path,
                    $this->input->post('sort_index')
                );
            } else {
                $this->Category_model->insert(
                    $this->input->post('parent_id'),
                    $this->input->post('slug'),
                    $this->input->post('name'),
                    null,
                    $this->input->post('sort_index')
                );
            }
            if ($this->input->post('parent_id') != null) {
                redirect('admin/category/sub/' . $this->input->post('parent_id'), 'refresh');
            }
            redirect('admin/category', 'refresh');
        } else if (isset($_POST["reset"])) {
            redirect('admin/category_create', 'refresh');
        } else if (isset($_POST["cancel"])) {
            if ($this->input->post('parent_id') != null) {
                redirect('admin/category/sub/' . $this->input->post('parent_id'), 'refresh');
            }
            redirect('admin/category', 'refresh');
        }
    }

    public function update_submit()
    {
        if (isset($_POST["save"])) {
            $this->load->library('upload', $this->get_config());
            if ($this->upload->do_upload('thumbnail')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/news/' . $upload_files['file_name'];
                $this->Category_model->update(
                    $this->input->post('id'),
                    $this->input->post('parent_id'),
                    $this->input->post('slug'),
                    $this->input->post('name'),
                    $file_path,
                    $this->input->post('sort_index')
                );
            } else {
                $this->Category_model->update(
                    $this->input->post('id'),
                    $this->input->post('parent_id'),
                    $this->input->post('slug'),
                    $this->input->post('name'),
                    $this->input->post('img'),
                    $this->input->post('sort_index')
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