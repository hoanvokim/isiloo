<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 18.10.18
 * Time: 09:56
 */
class Program extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Loading model
        $this->load->model('Entity_model');
        $this->load->model('News_model');
        $this->load->model('Category_model');
        $this->load->model('Tag_model');
        $this->load->model('Data_model');
        $this->load->model('Albums_model');
    }


    public function all($slug)
    {
        $data['active_page'] = 'programs';
        $data['category'] = $this->Category_model->findBySlug($slug);

        if ($slug != 'hoat-dong-ngoai-khoa') {
            $data['categories'] = $this->Category_model->findAllByParentId($data['category']->id);
            $data['isAlbums'] = false;
        } else {
            $data['categories'] = $this->Albums_model->findAll();
            $data['isAlbums'] = true;
        }
        $this->load->view('programs', $data);
    }

    public function album($slug)
    {
        $data['active_page'] = 'albums';
        $data['album'] = $this->Albums_model->findBySlug($slug);
        $data['imgs'] = $this->Albums_model->findAllImages($data['album']->id);
        $this->Albums_model->updateClickView($data['album']->id);
        $this->load->view('album_content', $data);

    }
}
