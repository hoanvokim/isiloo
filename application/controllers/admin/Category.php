<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 12.11.18
 * Time: 15:40
 */
class Category extends MY_Controller
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
        $data['categories'] = $this->Category_model->findAllCategories();
        $this->load->view('admin/category', $data);
    }

    public function category_empty()
    {
        $data['title'] = 'Quản lý Danh mục trống';
        $data['categories'] = $this->Category_model->findAll();
        $this->load->view('admin/category_empty', $data);
    }

    public function sub()
    {
        $parent_category = $this->Category_model->findById($this->uri->segment(4));
        $data['title'] = 'Quản lý Danh mục của: ' . $parent_category->name;
        $data['categories'] = $this->Category_model->findAllByParentId($parent_category->id);
        $data['parent_category'] = $parent_category;
        $this->load->view('admin/category_sub', $data);
    }

    public function create()
    {
        $parent_id = $this->uri->segment(4);
        $data['parent_id'] = $parent_id;
        $this->load->view('admin/category_create', $data);
    }

    public function update()
    {
        $category = $this->Category_model->findById($this->uri->segment(4));
        $data['title'] = 'Cập nhật Danh mục ' . $category->name;
        $data['category_id'] = $category->id;
        $data['title'] = $category->name;
        $data['slug'] = $category->slug;
        $data['img_src'] = $category->img;
        $data['sort_index'] = $category->sort_index;
        $data['parent_id'] = $this->uri->segment(4);
        $this->load->view('admin/category_update', $data);
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
            $this->load->library('upload', $this->get_config_base());
            if ($this->upload->do_upload('thumbnail')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/' . $upload_files['file_name'];

                $this->Category_model->insert(
                    $this->input->post('parent_id'),
                    $this->input->post('slug'),
                    $this->input->post('title'),
                    $file_path,
                    $this->input->post('sort_index')
                );
            } else {
                $this->Category_model->insert(
                    $this->input->post('parent_id'),
                    $this->input->post('slug'),
                    $this->input->post('title'),
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
            $this->load->library('upload', $this->get_config_base());
            if ($this->upload->do_upload('thumbnail')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/' . $upload_files['file_name'];
                $this->Category_model->update(
                    $this->input->post('category_id'),
                    $this->input->post('parent_id'),
                    $this->input->post('slug'),
                    $this->input->post('title'),
                    $file_path,
                    $this->input->post('sort_index')
                );
            } else {
                $this->Category_model->update(
                    $this->input->post('category_id'),
                    $this->input->post('parent_id'),
                    $this->input->post('slug'),
                    $this->input->post('title'),
                    $this->input->post('img_src'),
                    $this->input->post('sort_index')
                );
            }

            $category = $this->Category_model->findById($this->input->post('category_id'));
            $data['category_id'] = $this->input->post('category_id');
            $data['parent_id'] = $this->input->post('parent_id');
            $data['img_src'] = $category->img;
            $data['slug'] = $this->input->post('slug');
            $data['title'] = $this->input->post('title');
            $data['sort_index'] = $this->input->post('sort_index');
            $data['showmessages'] = 'Cập nhật thành công!';
            $this->load->view('admin/category_update', $data);
        } else if (isset($_POST["delete"])) {
            $this->delete();
        } else if (isset($_POST["cancel"])) {
            if ($this->input->post('parent_id') != null) {
                redirect('admin/category/sub/' . $this->input->post('parent_id'), 'refresh');
            }
            redirect('admin/category', 'refresh');
        } else if (isset($_POST["remove-current"])) {
            $this->Category_model->updateImage($this->input->post('id'));
            if ((strpos($this->input->post('img'), 'youtube') == false) && file_exists('./' . $this->input->post('img_src'))) {
                unlink('./' . $this->input->post('img_src'));
            }
            $data['category_id'] = $this->input->post('category_id');
            $data['parent_id'] = $this->input->post('parent_id');
            $data['img_src'] = '';
            $data['slug'] = $this->input->post('slug');
            $data['title'] = $this->input->post('title');
            $data['sort_index'] = $this->input->post('sort_index');
            $data['showmessages'] = 'Xóa ảnh thành công!';
            $this->load->view('admin/category_update', $data);
        }
    }

}