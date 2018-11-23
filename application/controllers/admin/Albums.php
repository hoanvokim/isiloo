<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 14.11.18
 * Time: 15:26
 */
class Albums extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Loading model
        $this->load->model('User_model');
        $this->load->model('Albums_model');
    }

    public function index()
    {
        $data['title'] = 'Quản lý hoạt động';
        $data['albums'] = $this->Albums_model->findAll();
        $this->load->view('admin/album', $data);
    }


    public function create()
    {
        $data['title'] = 'Thêm hoạt động';
        $this->load->view('admin/album_create', $data);
    }

    public function update()
    {
        $data['title'] = 'Cập nhật hoạt động';
        $album = $this->Albums_model->findById($this->uri->segment(4));
        $data['albumId'] = $album->id;
        $data['img_src'] = $album->img;
        $data['slug'] = $album->slug;
        $data['title_header'] = $album->title_header;
        $data['description_header'] = $album->description_header;
        $data['keyword_header'] = $album->keyword_header;
        $data['title'] = $album->title;
        $data['content'] = $album->content;
        $data['images'] = $this->Albums_model->findAllImages($this->uri->segment(4));
        $this->load->view('admin/album_update', $data);
    }

    public function remove_images()
    {
        $images = $this->Albums_model->fileImageById($this->uri->segment(5));
        $this->Albums_model->deleteImagesById($this->uri->segment(5));
        if (file_exists('./' . $images->img)) {
            unlink('./' . $images->img);
        }

        $data['title'] = 'Cập nhật hoạt động';
        $album = $this->Albums_model->findById($this->uri->segment(4));
        $data['albumId'] = $album->id;
        $data['img_src'] = $album->img;
        $data['slug'] = $album->slug;
        $data['title_header'] = $album->title_header;
        $data['description_header'] = $album->description_header;
        $data['keyword_header'] = $album->keyword_header;
        $data['title'] = $album->title;
        $data['content'] = $album->content;
        $data['images'] = $this->Albums_model->findAllImages($this->uri->segment(4));
        $this->load->view('admin/album_update', $data);
    }

    public function delete()
    {
        $album = $this->Albums_model->findById($this->uri->segment(4));
        if (!is_null($album->img) && file_exists('./' . $album->img)) {
            unlink('./' . $album->img);
        }

        $album_filenames = $this->Albums_model->findAllImages($this->uri->segment(4));

        foreach ($album_filenames as $item) {
            if (!is_null($item->img) && file_exists('./' . $item->img)) {
                unlink('./' . $item->img);
            }
        }

        $this->Albums_model->delete($this->uri->segment(4));
        redirect('admin/album', 'refresh');
    }

    public function create_submit()
    {
        if (isset($_POST["save"])) {
            $this->load->library('upload', $this->get_config());
            $file_path = null;
            if ($this->upload->do_upload('thumbnail')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/news/' . $upload_files['file_name'];
            }
            // Count total files
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
            $this->Albums_model->insert(
                $this->input->post('slug'),
                $file_path,
                $this->input->post('title'),
                $this->input->post('contenteditor'),
                $this->input->post('title_header'),
                $this->input->post('description_header'),
                $this->input->post('keyword_header'),
                $_FILES['files']['name']
            );
            redirect('admin/album', 'refresh');
        } else if (isset($_POST["reset"])) {
            redirect('admin/album_create', 'refresh');
        } else if (isset($_POST["cancel"])) {
            redirect('admin/album', 'refresh');
        }
    }

    public function update_submit()
    {
        if (isset($_POST["save"])) {

            $this->load->library('upload', $this->get_config());
            $file_path = $this->input->post('img_src');
            if ($this->upload->do_upload('thumbnail')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/news/' . $upload_files['file_name'];
            }
            $this->Albums_model->update(
                $this->input->post('albumId'),
                $this->input->post('slug'),
                $file_path,
                $this->input->post('title'),
                $this->input->post('contenteditor'),
                $this->input->post('title_header'),
                $this->input->post('description_header'),
                $this->input->post('keyword_header'),
                $_FILES['files']['name']
            );

            $album = $this->Albums_model->findById($this->input->post('albumId'));
            $data['albumId'] = $album->id;
            $data['img_src'] = $album->img;
            $data['slug'] = $album->slug;
            $data['title_header'] = $album->title_header;
            $data['description_header'] = $album->description_header;
            $data['keyword_header'] = $album->keyword_header;
            $data['title'] = $album->title;
            $data['content'] = $album->content;
            $data['images'] = $this->Albums_model->findAllImages($this->input->post('albumId'));
            $data['showmessages'] = 'Cập nhật thành công!';
            $this->load->view('admin/album_update', $data);
        } else if (isset($_POST["delete"])) {
            $this->delete();
        } else if (isset($_POST["cancel"])) {
            redirect('admin/album', 'refresh');
        } else if (isset($_POST["remove-current"])) {
            $this->Albums_model->updateImage($this->input->post('albumId'));
            if ((strpos($this->input->post('img_src'), 'youtube') == false) && file_exists('./' . $this->input->post('img_src'))) {
                unlink('./' . $this->input->post('img_src'));
            }
            $album = $this->Albums_model->findById($this->input->post('albumId'));
            $data['albumId'] = $album->id;
            $data['img_src'] = $album->img;
            $data['slug'] = $album->slug;
            $data['title_header'] = $album->title_header;
            $data['description_header'] = $album->description_header;
            $data['keyword_header'] = $album->keyword_header;
            $data['title'] = $album->title;
            $data['content'] = $album->content;
            $data['images'] = $this->Albums_model->findAllImages($this->input->post('albumId'));
            $data['showmessages'] = 'Xóa ảnh thành công!';
            $this->load->view('admin/album_update', $data);
        }
    }
}