<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 07.11.18
 * Time: 16:40
 */
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Loading model
        $this->load->helper('url');
        $this->load->model('User_model');
    }

    public function index()
    {
        if (!$this->is_login()) {
            $this->load->view('admin/login');
            return;
        }
        $data['title'] = 'Dashboard';
        $this->load->view('admin/dashboard', $data);
    }

    public function login_submit()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if (isset($this->session->userdata['logged_in'])) {
                $this->load->view('admin/dashboard');
            }
            else {
                $this->load->view('admin/login');
            }
        }
        else {
            $result = $this->User_model->login($this->input->post('username'), $this->input->post('password'));
            if ($result == TRUE) {

                $username = $this->input->post('username');
                $result = $this->User_model->findByUsername($username);
                if ($result != false) {
                    $session_data = array(
                        'username' => $result->username,
                        'email' => $result->email,
                    );
                    // Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    redirect(base_url() . 'admin');

                }
            }
            else {
                //Flashdata is a type of session data which will only available for the next request and automatically destroyed after that.
                $this->session->set_flashdata('msg', 'Invalid Username or Password.');
                $this->session->flashdata('msg');
                $this->load->view('admin/login');
            }
        }
    }

    public function logout()
    {
        // Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $this->session->set_flashdata('msg', 'Successfully Logout.');
        $this->session->flashdata('msg');
        redirect(base_url() . 'login');
    }

    public function is_login()
    {
        $user = $this->session->userdata('logged_in');
        return isset($user);
    }
}