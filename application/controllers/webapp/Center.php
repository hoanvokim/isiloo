<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 18.10.18
 * Time: 09:53
 */

class Center extends CI_Controller
{
    public $prizeContent = "prize-content";
    public $issiloo_intro = "issiloo-intro";
    public $issiloo_hr = "issiloo-hr";

    public function __construct()
    {
        parent::__construct();
        //Loading model
        $this->load->model('Entity_model');
        $this->load->model('News_model');
        $this->load->model('Data_model');
        $this->load->model('Student_model');
        $this->load->model('Employee_model');
        $this->load->model('Registration_model');
        $this->load->model('Subject_model');
    }

    public function dispatcher($slug)
    {
        switch ($slug) {
            case "issiloo":
                $data['active_page'] = 'issiloo';
                $data['slug'] = $slug;
                $data['employee'] = $this->Employee_model->findAllAsc();
                $data['issiloo_intro'] = $this->Data_model->findByKeyName($this->issiloo_intro)->value;
                $data['issiloo_hr'] = $this->Data_model->findByKeyName($this->issiloo_hr)->value;
                $this->load->view('issiloo', $data);
                break;
            case "lien-he":
                $data['active_page'] = 'contact';
                $data['slug'] = $slug;
                $data['subjects'] = $this->Subject_model->findAllAsc();
                $this->load->view('contact', $data);
                break;
            case "thanh-tich-hoc-vien":
                $data['active_page'] = 'prize';
                $data['slug'] = $slug;
                $data['prizeContent'] = $this->Data_model->findByKeyName($this->prizeContent)->value;
                $data['students'] = $this->Student_model->findAll();
                $this->load->view('prize', $data);
                break;
            default:
                $this->load->view('404');
        }

    }

    public function search()
    {
        $data['active_page'] = 'search';
        $data['news'] = $this->News_model->findByTitle($this->input->post('search'));
        $data['keyword'] = $this->input->post('search');
        $this->load->view('search', $data);
    }

    public function tag($keyword)
    {
        $data['active_page'] = 'search';
        $data['news'] = $this->News_model->findByTitle($keyword);
        $data['keyword'] = $keyword;
        $this->load->view('search', $data);
    }

    public function dial()
    {
        $data['active_page'] = 'dial';
        $data['name'] = $this->input->post('dialName');
        if ($this->input->post('dialName') == null) {
            $data['name'] = $this->input->post('dialPhone');
        }
        $data['result'] = $this->Registration_model->insert(1, $this->input->post('dialName'), $this->input->post('dialPhone'), 'Gọi lại nhé! ');
        $this->load->view('contact_successfully', $data);
    }

    public function register()
    {
        $data['active_page'] = 'dial';
        $data['name'] = $this->input->post('name');
        $data['result'] = $this->Registration_model->insert(
            $this->input->post('subjectId'),
            $this->input->post('name'),
            $this->input->post('phone'),
            $this->input->post('contenteditor')
        );
        $this->load->view('contact_successfully', $data);
    }
}
