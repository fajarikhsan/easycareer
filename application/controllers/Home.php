<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->helper(array('form', 'url'));
    }
    public function index() {
        $data['judul'] = 'EasyCareer';
        $data['profesi'] = $this->Home_model->getAllProfesi();
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/modal', $data);
        $this->load->view('templates/footer');
    }

    public function signup() {
        $data['judul'] = 'EasyCareer';
        $data['profesi'] = $this->Home_model->getAllProfesi();
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('password-signup', 'Password', 'required');
        $this->form_validation->set_rules('email-signup', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('nohp', 'Ho. Hp', 'required|numeric');
        
        if ( $this->form_validation->run() == FALSE ) {
            $this->session->set_tempdata('signup-error', 'Sign Up', 1);
            $this->load->view('templates/header', $data);
            $this->load->view('home/index', $data);
            $this->load->view('templates/modal', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path'] = './assets/foto/profil/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('foto-profil') ) {
                // GAGAL UPLOAD
                $this->Home_model->tambahUser();
            } else {
                // BERHASIL UPLOAD
                $name = $this->upload->data('file_name');
                $this->Home_model->tambahUser($name);
            }
            $this->session->set_flashdata('flash', 'Sign Up');
            redirect('home');
        }
    }

    public function signin() {
        $data['judul'] = 'EasyCareer';
        $this->form_validation->set_rules('email-signin', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password-signin', 'Password', 'required');

        if ( $this->form_validation->run() == FALSE ) {
            $this->session->set_tempdata('signin-error', 'Sign In', 1);
            $this->load->view('templates/header', $data);
            $this->load->view('home/index', $data);
            $this->load->view('templates/modal', $data);
            $this->load->view('templates/footer');
        } else {
            $exist = $this->Home_model->signinUser();
            if ( empty($exist) ) {
                $this->session->set_flashdata('signin-gagal', 'Sign In');
            } else {
                if ( empty($this->Home_model->cekCustomerByEmail($exist['email'])) ) {
                    // Seller
                    $data['seller'] = $this->Home_model->cekSellerByEmail($exist['email']);
                    $this->session->set_userdata('id_penyedia', $data['seller']['id_penyedia']);
                } else {
                    // Customer
                    $data['seller'] = $this->Home_model->cekCustomerByEmail($exist['email']);
                    $this->session->set_userdata('id_customer', $data['seller']['id_customer']);
                }
                $this->session->set_flashdata('signin-berhasil', 'Sign In');
                $this->session->set_userdata('email', $exist['email']);
            }
            redirect('home');
        }
    }

    public function signout() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_penyedia');
        $this->session->unset_userdata('id_customer');
        redirect('home');
    }
}