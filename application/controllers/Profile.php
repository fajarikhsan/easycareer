<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }

    public function cekSession() {
        if ( !$this->session->has_userdata('id_customer') ) {
            $this->session->set_flashdata('forbidden', 'forbidden');
            redirect(base_url());
            die;
        }
    }
    
    public function index() {
        $this->cekSession();
        $data['user'] = $this->Profile_model->getUserByIdCustomer($this->session->userdata('id_customer'));
        $data['judul'] = 'My Profile';

        $this->load->view('templates/header_sbadmin', $data);
        $this->load->view('templates/sidebar_sbadmin', $data);
        $this->load->view('templates/topbar_sbadmin', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer_sbadmin');
    }

    public function myprofile() {
        $this->cekSession();
        $data['user'] = $this->Profile_model->getUserByIdCustomer($this->session->userdata('id_customer'));
        $data['judul'] = 'My Profile';

        $this->load->view('templates/header_sbadmin', $data);
        $this->load->view('templates/sidebar_sbadmin', $data);
        $this->load->view('templates/topbar_sbadmin', $data);
        $this->load->view('profile/myprofile', $data);
        $this->load->view('templates/footer_sbadmin');
    }

    public function getubah_customer() {
        $this->cekSession();
        echo json_encode($this->Profile_model->getUserByIdCustomer($this->input->post('id_customer')));
    }

    public function ubah_profile() {
        $this->cekSession();
        $data['judul'] = 'My Profile';
        $data['user'] = $this->Profile_model->getUserByIdCustomer($this->session->userdata('id_customer'));
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password-signup', 'Password', 'required');
        $this->form_validation->set_rules('email-signup', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nohp', 'Ho. Hp', 'required|numeric');
        
        if ( $this->form_validation->run() == FALSE ) {
            $this->session->set_flashdata('profile-invalid', 'Ubah profile');
            $this->load->view('templates/header_sbadmin', $data);
            $this->load->view('templates/sidebar_sbadmin', $data);
            $this->load->view('templates/topbar_sbadmin', $data);
            $this->load->view('profile/myprofile', $data);
            $this->load->view('templates/footer_sbadmin');
        } else {
            $config['upload_path'] = './assets/foto/profil/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('foto-profil') ) {
                // GAGAL UPLOAD
                if ( ($this->upload->data('is_image') == 0) and ($this->upload->data('file_size') > 0) ) {
                    $this->session->set_flashdata('foto-salah', 'Foto profile');
                } else {
                    $id_test = $this->Profile_model->getUserByIdCustomer($this->input->post('id-customer'));
                    $this->Profile_model->UbahDataUser($id_test['foto_profil']);
                }
            } else {
                // BERHASIL UPLOAD
                $name = $this->upload->data('file_name');
                $this->Profile_model->UbahDataUser($name);
            }
            $this->session->set_flashdata('profile-success', 'Ubah profile');
            redirect('profile/myprofile');
        }
    }

    public function transaksi() {
        $this->cekSession();
        $data['user'] = $this->Profile_model->getUserByIdCustomer($this->session->userdata('id_customer'));
        $data['judul'] = 'Transaksi';
        $data['menunggu_pembayaran'] = $this->Profile_model->getTransaksiByIdCustomer1($this->session->userdata('id_customer'), 'Menunggu Pembayaran');
        $data['menunggu_konfirmasi'] = $this->Profile_model->getTransaksiByIdCustomer2($this->session->userdata('id_customer'), 'Menunggu Konfirmasi');
        $data['pesanan_diproses'] = $this->Profile_model->getTransaksiByIdCustomer2($this->session->userdata('id_customer'), 'Pesanan Diproses');
        $data['pesanan_selesai'] = $this->Profile_model->getTransaksiByIdCustomer3($this->session->userdata('id_customer'), 'Pesanan Selesai');
        $data['pesanan_ditolak'] = $this->Profile_model->getTransaksiByIdCustomer2($this->session->userdata('id_customer'), 'Pesanan Ditolak');

        $this->load->view('templates/header_sbadmin', $data);
        $this->load->view('templates/sidebar_sbadmin', $data);
        $this->load->view('templates/topbar_sbadmin', $data);
        $this->load->view('profile/transaksi', $data);
        $this->load->view('templates/footer_sbadmin');
    }

    public function getTransaksi() {
        echo json_encode($this->Profile_model->getTransaksiById());
    }

    public function bayar() {
        $this->cekSession();
        $data['user'] = $this->Profile_model->getUserByIdCustomer($this->session->userdata('id_customer'));
        $data['judul'] = 'Transaksi';
        $this->Profile_model->pembayaran();
        $this->session->set_flashdata('bayar-success', 'Pembayaran');
        redirect(base_url('profile/transaksi'));
    }

    public function download() {
        $this->cekSession();
        $nama_file = $this->input->post('nama_file');
        force_download('./assets/file/' . $nama_file, NULL);
        redirect('Profile/transaksi');
    }

    public function ulasan() {
        $this->cekSession();
        $data['user'] = $this->Profile_model->getUserByIdCustomer($this->session->userdata('id_customer'));
        $data['judul'] = 'Transaksi';
        if ( ($this->input->post('rating') == '0') or ($this->input->post('rating') == '') ) {
            $this->session->set_flashdata('rating-error', 'Rating');
            redirect('profile/transaksi');
        } else {
            $this->Profile_model->tambahRating();
            $this->session->set_flashdata('rating-success', 'Rating');
            redirect('profile/transaksi');
        }
    }
}