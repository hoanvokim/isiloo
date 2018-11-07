<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public $youtube_background = "youtube_background";
    public $youtube_link = "youtube_link";

    public function __construct()
    {
        parent::__construct();
        //Loading model
        $this->load->model('News_model');
        $this->load->model('Category_model');
        $this->load->model('University_model');
        $this->load->model('Student_model');
        $this->load->model('Gallery_model');
        $this->load->model('Data_model');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $data['active_page'] = 'home';
        $data['latest_news'] = $this->News_model->findFirstByCategoryId(array(DUHOCHANQUOC, DUHOCNGHEHANQUOC, TRUONGDAIHOC, HOCBONG, KINHNGHIEMDUHOC, DAOTAOHANNGU, LUYENTHIXKLD, TINTUC));
        $data['latest_news_cat'] = $this->Category_model->findById($data['latest_news']->category_id);
        $data['most_view_news'] = $this->News_model->findMostViewByCategoryId(array(DUHOCHANQUOC, DUHOCNGHEHANQUOC, TRUONGDAIHOC, HOCBONG, KINHNGHIEMDUHOC, DAOTAOHANNGU, LUYENTHIXKLD, TINTUC), 3);
        $data['programs'] = $this->News_model->findByCategoryIds($this->Category_model->findByParentId(DAOTAOHANNGU));
        $data['universities'] = $this->University_model->findAllWithNewsInformation();
        $data['students'] = $this->Student_model->findAll();
        $data['studentsWithReview'] = $this->Student_model->findStudentHasReview();
        $data['self_lessons'] = $this->News_model->findByCategoryIds($this->Category_model->findByParentId(TUHOCTIENGHAN));
        $data['galleries'] = $this->Gallery_model->findAll();
        $data['youtube_link'] = $this->Data_model->findByKeyName($this->youtube_link)->value;
        $data['youtube_background'] = $this->Data_model->findByKeyName($this->youtube_background)->value;

        $this->load->view('index', $data);
    }
}
