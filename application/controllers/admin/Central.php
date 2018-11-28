<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 15.11.18
 * Time: 07:22
 */
class Central extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Loading model
        $this->load->model('User_model');
        $this->load->model('Category_model');
        $this->load->model('Tag_model');
        $this->load->model('Subject_model');
        $this->load->model('Gallery_model');
        $this->load->model('Data_model');
    }

    public function dispatcher($slug)
    {
        switch ($slug) {
            case "tag":
                $data['active_page'] = 'tags';
                $data['items'] = $this->Tag_model->findAll();

                $this->load->view('admin/tag', $data);
                break;

            case "qa":
                $data['active_page'] = 'qa';
                $data['items'] = $this->Subject_model->findAll();
                $this->load->view('admin/subject', $data);
                break;
            case "gallery":
                $data['active_page'] = 'gallery';
                $data['items'] = $this->Gallery_model->findAll();
                $this->load->view('admin/gallery', $data);
                break;
            case "data_info":
                $data['active_page'] = 'data_info';
                $data['items'] = $this->Data_model->findAll();
                $this->load->view('admin/data_info', $data);
                break;

            case "student":
                $data['active_page'] = 'student';
                $data['items'] = $this->Data_model->findAll();
                $this->load->view('admin/student', $data);
                break;

            case "issiloo":
                $data['active_page'] = 'student';
                $data['items'] = $this->Data_model->findByKeyName('issiloo-intro');
                $this->load->view('admin/issiloo', $data);
                break;
            default:
                $this->load->view('404');
        }

    }

    public function tag_delete()
    {
        $this->Tag_model->delete($this->uri->segment(4));
        $data['items'] = $this->Tag_model->findAll();
        $data['showmessages'] = 'Xóa tag thành công!';
        $this->load->view('admin/tag', $data);
    }

    public function tag_create()
    {
        $this->Tag_model->insert($this->input->post('title'));
        $data['items'] = $this->Tag_model->findAll();
        $data['showmessages'] = 'Thêm tag thành công!';
        $this->load->view('admin/tag', $data);
    }

    public function subject_delete()
    {
        $this->Subject_model->delete($this->uri->segment(4));
        $data['items'] = $this->Subject_model->findAll();
        $data['showmessages'] = 'Xóa chủ để thành công!';
        $this->load->view('admin/subject', $data);
    }

    public function issiloo_update()
    {
        $this->Data_model->updateIssilooInfo($this->input->post('contenteditor'));
        $data['items'] = $this->Data_model->findByKeyName('issiloo-intro');
        $data['showmessages'] = 'Cập nhật thành công!';
        $this->load->view('admin/issiloo', $data);
    }

    public function subject_create()
    {
        $this->Subject_model->insert($this->input->post('title'));
        $data['items'] = $this->Subject_model->findAll();
        $data['showmessages'] = 'Thêm chủ để thành công!';
        $this->load->view('admin/subject', $data);
    }

    public function gallery_delete()
    {
        $this->Gallery_model->delete($this->uri->segment(4));
        $data['items'] = $this->Gallery_model->findAll();
        $data['showmessages'] = 'Xóa ảnh thành công!';
        $this->load->view('admin/gallery', $data);
    }

    public function gallery_create()
    {
        $countfiles = count($_FILES['files']['name']);

        // Looping all files
        for ($i = 0; $i < $countfiles; $i++) {

            if (!empty($_FILES['files']['name'][$i])) {

                // Define new $_FILES array - $_FILES['file']
                $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                // Set preference
                $config['upload_path'] = './assets/news';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '5000';    // max_size in kb
                $config['file_name'] = $_FILES['files']['name'][$i];

                //Load upload library
                $this->load->library('upload', $this->get_config());

                // File upload
                if ($this->upload->do_upload('file')) {
                    // Get data about the file
                    $this->upload->data();
                }
            }
        }

        $this->Gallery_model->insert_all($_FILES['files']['name']);
        $data['items'] = $this->Gallery_model->findAll();
        $data['showmessages'] = 'Thêm ảnh thành công!';
        $this->load->view('admin/gallery', $data);
    }

    public function updateDataInfo()
    {
        $settings = $this->Data_model->findAll();
        foreach ($settings as $setting) {
            $this->Data_model->update(
                $setting->keyname,
                $this->input->post($setting->keyname)
            );
        }
        redirect('admin/central/data_info', 'refresh');
    }
}