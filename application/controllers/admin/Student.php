<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 15.11.18
 * Time: 10:25
 */

class Student extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Loading model
        $this->load->model('Student_model');
    }

    public function index()
    {
        $data['title'] = 'Quản lý học sinh';
        $data['students'] = $this->Student_model->findAll();
        $this->load->view('admin/student', $data);
    }

    public function create()
    {
        $data['title'] = 'Thêm học viên mới';
        $this->load->view('admin/student_create');
    }

    public function update()
    {
        $student = $this->Student_model->findById($this->uri->segment(4));
        $data['title'] = 'Cập nhật trường thông tin học viên: ' . $student->name;
        $data['name'] = $student->name;
        $data['student_id'] = $student->id;
        $data['img_src'] = $student->img;
        $data['img_src_pop'] = $student->img_pop;
        $data['status'] = $student->status;
        $data['review'] = $student->review;
        $data['star'] = $student->star;
        $data['prize'] = $student->prize;
        $data['prize_content'] = $student->prize_content;
        $this->load->view('admin/student_update', $data);
    }

    public function delete()
    {
        $tudent = $this->Student_model->findById($this->uri->segment(4));
        if (!is_null($tudent->img) && file_exists('./' . $tudent->img)) {
            unlink('./' . $tudent->img);
        }
        if (!is_null($tudent->img_pop) && file_exists('./' . $tudent->img_pop)) {
            unlink('./' . $tudent->img_pop);
        }
        $this->Student_model->delete($this->uri->segment(4));
        redirect('admin/student', 'refresh');
    }

    public function create_submit()
    {
        if (isset($_POST["save"])) {
            $this->load->library('upload', $this->get_config());

            $file_path = $this->input->post('img_src');
            if ($this->upload->do_upload('thumbnail')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/news/' . $upload_files['file_name'];
            }
            $file_path_pop = $this->input->post('img_src_pop');
            if ($this->upload->do_upload('thumbnail_pop')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/news/' . $upload_files['file_name'];
            }
            $this->Student_model->insert(
                $this->input->post('name'),
                $file_path,
                $file_path_pop,
                $this->input->post('status'),
                $this->input->post('summaryeditor'),
                $this->input->post('star'),
                $this->input->post('prize'),
                $this->input->post('contenteditor')
            );
            redirect('admin/student', 'refresh');
        } else if (isset($_POST["reset"])) {
            redirect('admin/student_create', 'refresh');
        } else if (isset($_POST["cancel"])) {
            redirect('admin/student', 'refresh');
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
            $file_path_pop = $this->input->post('img_src_pop');
            if ($this->upload->do_upload('thumbnail_pop')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/news/' . $upload_files['file_name'];
            }
            $this->Student_model->update(
                $this->input->post('student_id'),
                $this->input->post('name'),
                $file_path,
                $file_path_pop,
                $this->input->post('status'),
                $this->input->post('summaryeditor'),
                $this->input->post('star'),
                $this->input->post('prize'),
                $this->input->post('contenteditor')
            );

            $student = $this->Student_model->findById($this->input->post('student_id'));
            $data['name'] = $student->name;
            $data['student_id'] = $student->id;
            $data['img_src'] = $student->img;
            $data['img_src_pop'] = $student->img_pop;
            $data['status'] = $student->status;
            $data['review'] = $student->review;
            $data['star'] = $student->star;
            $data['prize'] = $student->prize;
            $data['prize_content'] = $student->prize_content;
            $data['showmessages'] = 'Cập nhật thành công!';
            $data['title'] = 'Cập nhật trường thông tin học viên: ' . $student->name;
            $this->load->view('admin/student_update', $data);
        } else if (isset($_POST["delete"])) {
            $this->delete();
        } else if (isset($_POST["cancel"])) {
            redirect('admin/student', 'refresh');
        } else if (isset($_POST["reset"])) {
            $student = $this->Student_model->findById($this->input->post('student_id'));
            $data['title'] = 'Cập nhật trường thông tin học viên: ' . $student->name;
            $data['name'] = $student->name;
            $data['student_id'] = $student->id;
            $data['img_src'] = $student->img;
            $data['img_src_pop'] = $student->img_pop;
            $data['status'] = $student->status;
            $data['review'] = $student->review;
            $data['star'] = $student->star;
            $data['prize'] = $student->prize;
            $data['prize_content'] = $student->prize_content;
            $this->load->view('admin/student_update', $data);
        } else if (isset($_POST["remove-current"])) {
            $this->Student_model->updateImage($this->input->post('student_id'));
            if ((strpos($this->input->post('img_src'), 'youtube') == false) && file_exists('./' . $this->input->post('img_src'))) {
                unlink('./' . $this->input->post('img_src'));
            }
            $student = $this->Student_model->findById($this->input->post('student_id'));
            $data['title'] = 'Cập nhật trường thông tin học viên: ' . $student->name;
            $data['name'] = $student->name;
            $data['student_id'] = $student->id;
            $data['img_src'] = $student->img;
            $data['img_src_pop'] = $student->img_pop;
            $data['status'] = $student->status;
            $data['review'] = $student->review;
            $data['star'] = $student->star;
            $data['prize'] = $student->prize;
            $data['prize_content'] = $student->prize_content;
            $data['showmessages'] = 'Xóa ảnh thành công!';
            $data['title'] = 'Cập nhật trường thông tin học viên: ' . $student->name;
            $this->load->view('admin/student_update', $data);
        } else if (isset($_POST["remove-current-pop"])) {
            $this->Student_model->updateImage($this->input->post('student_id'));
            if ((strpos($this->input->post('img_src_pop'), 'youtube') == false) && file_exists('./' . $this->input->post('img_src_pop'))) {
                unlink('./' . $this->input->post('img_src_pop'));
            }
            $student = $this->Student_model->findById($this->input->post('student_id'));
            $data['title'] = 'Cập nhật trường thông tin học viên: ' . $student->name;
            $data['name'] = $student->name;
            $data['student_id'] = $student->id;
            $data['img_src'] = $student->img;
            $data['img_src_pop'] = $student->img_pop;
            $data['status'] = $student->status;
            $data['review'] = $student->review;
            $data['star'] = $student->star;
            $data['prize'] = $student->prize;
            $data['prize_content'] = $student->prize_content;
            $data['showmessages'] = 'Xóa ảnh thành công!';
            $this->load->view('admin/student_update', $data);
        }
    }

}