<?php

Class User_Authentication extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('login_database');
        $this->load->database();
    }

    public function index() {
        if(isset($this->session->userdata['logged_in'])) {
            $this->load->view('past_transaction');
        }
        else {
            $this->load->view('login_form');
        }
    }

    public function user_registration_show() {
        $this->load->view('registration_form');
    }

    public function new_user_registration() {
        $this->form_validation->set_rules('username','Username','trim|required|xss_clean');
        $this->form_validation->set_rules('password','Password','trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registration_form');
        }
        else {
            $data = array (
                'user_name' => $this->input->post('username'),
                'password' => $this->input->post('email')
            );
            $result = $this->login_database->registration_insert($data); //need to check
            if ($result == TRUE) {
                $data['message_display'] = 'Succesfully Registered';
                $this->load->view('registration_form',$data);
            }
        }
    }

    public function user_login_process() {
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');

        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])) {
                $this->load->view('past_transaction');
            }
            else {
                $this->load->view('login_form');
            }
        }
        else {
            echo "Here<br>";
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            );
            $result = $this->login_database->login($data); //check this!!
            if ($result == TRUE) {
                echo "Here 2<br>";
                $username = $this->input->post('username');
                $result = $this->login_database->read_user_information($username); //check this!!
                if ($result != FALSE) {
                    echo "Here 44<br>";
                    $session_data = array(
                        'username' => $result[0]->user_name,
                    );
                    $this->session->set_userdata('logged_in',$session_data);
                    $this->load->view('past_transaction');
                }
                else {
                    echo "HERE 55<br>";
                }
            }
            else {
                echo "Here 3<br>";
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('login_form', $data);
            }
        }
    }

    public function logout() {
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in',$sess_array);
        $data['message_display'] = 'Successfully Logged Out';
        $this->load->view('login_form', $data);
    }
}