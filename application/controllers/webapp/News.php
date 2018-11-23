<?php
/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 9/3/18
 * Time: 8:40 PM
 */

class News extends CI_Controller
{
    public $adv = "adv";

    public function __construct()
    {
        parent::__construct();
        //Loading model
        $this->load->model('News_model');
        $this->load->model('Category_model');
        $this->load->model('Tag_model');
        $this->load->model('Data_model');
    }

    public function all($slug)
    {
        $data['active_page'] = 'news';
        $data['category'] = $this->Category_model->findBySlug($slug);
        $mid_category = null;
        if ($data['category']->parent_id != null) {
            $mid_category = $this->Category_model->findById($data['category']->parent_id);
        }
        $data['mid_category'] = $mid_category;
        $data['news'] = $this->News_model->findByCategoryId($data['category']->id);
        $this->load->view('news', $data);
    }

    public function most_view()
    {
        $data['active_page'] = 'news';
        $data['category'] = '';
        $data['mid_category'] = '';
        $data['news'] = $this->News_model->findMostViewByCategoryId(array(DUHOCHANQUOC, DUHOCNGHEHANQUOC, TRUONGDAIHOC, HOCBONG, KINHNGHIEMDUHOC, DAOTAOHANNGU, LUYENTHIXKLD, TINTUC), null);
        $this->load->view('most_view', $data);
    }

    public function content($slug)
    {
        $data['active_page'] = 'news_content';
        $data['news'] = $this->News_model->findBySlug($slug);
        $data['category'] = $this->Category_model->findById($data['news']->category_id);
        $data['related_news'] = $this->News_model->findRelatedNews($data['news']->category_id, $data['news']->id);
        $data['most_view_news'] = $this->News_model->findMostViewByCategoryId($data['news']->category_id, 4);
        $data['tags'] = $this->Tag_model->findAll();
        $data['adv'] = $this->Data_model->findByKeyName($this->adv)->value;
        $this->News_model->updateClickView($data['news']->id);
        $this->load->view('news_content', $data);
    }
}
