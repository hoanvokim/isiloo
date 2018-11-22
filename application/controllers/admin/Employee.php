<?php
/**
 * Created by PhpStorm.
 * User: vohoan
 * Date: 11/22/18
 * Time: 11:42 PM
 */

class Employee extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Loading model
        $this->load->model('Employee_model');
    }

    public function index()
    {
        $data['title'] = 'Quản lý nhân viên';
        $data['employee'] = $this->Employee_model->findAll();
        $this->load->view('admin/employee', $data);
    }

    public function create()
    {
        $data['title'] = 'Thêm nhân viên mới';
        $this->load->view('admin/employee_create', $data);
    }

    public function update()
    {
        $employee = $this->Employee_model->findById($this->uri->segment(4));
        $data['title'] = 'Cập nhật trường thông tin nhân viên: ' . $employee->name;
        $data['name'] = $employee->name;
        $data['employee_id'] = $employee->id;
        $data['img'] = $employee->img;
        $data['position'] = $employee->position;
        $data['education'] = $employee->education;
        $data['intro'] = $employee->intro;
        $this->load->view('admin/employee_update', $data);
    }

    public function delete()
    {
        $employee = $this->Employee_model->findById($this->uri->segment(4));
        if (!is_null($employee->img) && file_exists('./' . $employee->img)) {
            unlink('./' . $employee->img);
        }
        $this->Employee_model->delete($this->uri->segment(4));
        redirect('admin/employee', 'refresh');
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
            $this->Employee_model->insert(
                $this->input->post('name'),
                $file_path,
                $this->input->post('position'),
                $this->input->post('education'),
                $this->input->post('contenteditor')
            );
            redirect('admin/employee', 'refresh');
        } else if (isset($_POST["reset"])) {
            redirect('admin/employee_create', 'refresh');
        } else if (isset($_POST["cancel"])) {
            redirect('admin/employee', 'refresh');
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
            $this->Employee_model->update(
                $this->input->post('employee_id'),
                $this->input->post('name'),
                $file_path,
                $this->input->post('position'),
                $this->input->post('education'),
                $this->input->post('contenteditor')
            );

            $employee = $this->Employee_model->findById($this->input->post('employee_id'));
            $data['title'] = 'Cập nhật trường thông tin nhân viên: ' . $employee->name;
            $data['name'] = $employee->name;
            $data['employee_id'] = $employee->id;
            $data['img'] = $employee->img;
            $data['position'] = $employee->position;
            $data['education'] = $employee->education;
            $data['intro'] = $employee->intro;
            $data['showmessages'] = 'Cập nhật thành công!';
            $this->load->view('admin/employee_update', $data);
        } else if (isset($_POST["delete"])) {
            $this->delete();
        } else if (isset($_POST["cancel"])) {
            redirect('admin/employee', 'refresh');
        } else if (isset($_POST["reset"])) {
            $employee = $this->Employee_model->findById($this->input->post('employee_id'));
            $data['title'] = 'Cập nhật trường thông tin nhân viên: ' . $employee->name;
            $data['name'] = $employee->name;
            $data['employee_id'] = $employee->id;
            $data['img'] = $employee->img;
            $data['position'] = $employee->position;
            $data['education'] = $employee->education;
            $data['intro'] = $employee->intro;
            $this->load->view('admin/employee_update', $data);
        } else if (isset($_POST["remove-current"])) {
            $this->Employee_model->updateImage($this->input->post('employee_id'));
            if ((strpos($this->input->post('img_src'), 'youtube') == false) && file_exists('./' . $this->input->post('img_src'))) {
                unlink('./' . $this->input->post('img_src'));
            }
            $employee = $this->Employee_model->findById($this->input->post('employee_id'));
            $data['title'] = 'Cập nhật trường thông tin nhân viên: ' . $employee->name;
            $data['name'] = $employee->name;
            $data['employee_id'] = $employee->id;
            $data['img'] = $employee->img;
            $data['position'] = $employee->position;
            $data['education'] = $employee->education;
            $data['intro'] = $employee->intro;
            $data['showmessages'] = 'Xóa ảnh thành công!';
            $this->load->view('admin/employee_update', $data);
        }
    }

}