<?php

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 11/14/18
 * Time: 10:37 PM
 */
class University extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Loading model
        $this->load->model('University_model');
    }

    public function index()
    {
        $data['title'] = 'Quản lý trường đại học';
        $data['universities'] = $this->University_model->findAllWithNewsInformation();
        $this->load->view('admin/university', $data);
    }

    public function create()
    {
        $this->load->view('admin/university_create');
    }

    public function update()
    {
        $university = $this->University_model->findById($this->uri->segment(4));
        $data['title'] = 'Cập nhật trường đại học: ' . $university->name;
        $data['name'] = $university->name;
        $data['university_id'] = $university->id;
        $data['img_src'] = $university->img;
        $data['description'] = $university->description;
        $this->load->view('admin/university_update', $data);
    }

    public function delete()
    {
        $university = $this->University_model->findById($this->uri->segment(4));
        if (!is_null($university->img) && file_exists('./' . $university->img)) {
            unlink('./' . $university->img);
        }
        $this->University_model->delete($this->uri->segment(4));
        redirect('admin/university', 'refresh');
    }

    public function create_submit()
    {
        if (isset($_POST["save"])) {
            $this->load->library('upload', $this->get_config_base());
            if ($this->upload->do_upload('thumbnail')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/news/' . $upload_files['file_name'];

                $this->Category_model->insert(
                    $this->input->post('name'),
                    $file_path,
                    $this->input->post('description')
                );
            } else {
                $this->Category_model->insert(
                    $this->input->post('id'),
                    $this->input->post('name'),
                    null,
                    $this->input->post('description')
                );
            }
            redirect('admin/university', 'refresh');
        } else if (isset($_POST["reset"])) {
            redirect('admin/university_create', 'refresh');
        } else if (isset($_POST["save-write"])) {
            $this->load->library('upload', $this->get_config_base());
            if ($this->upload->do_upload('thumbnail')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/news/' . $upload_files['file_name'];

                $this->Category_model->insert(
                    $this->input->post('name'),
                    $file_path,
                    $this->input->post('description')
                );
            } else {
                $this->Category_model->insert(
                    $this->input->post('id'),
                    $this->input->post('name'),
                    null,
                    $this->input->post('description')
                );
            }
            //send id to news content
        } else if (isset($_POST["cancel"])) {
            redirect('admin/university', 'refresh');
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