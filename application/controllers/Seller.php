<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Seller extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Seller_model');
    }

    public function cekSession() {
        if ( !$this->session->has_userdata('id_penyedia') ) {
            $this->session->set_flashdata('forbidden', 'forbidden');
            redirect(base_url());
            die;
        }
    }

    public function index() {
        $this->cekSession();
        $data['user'] = $this->Seller_model->getUserByEmail($this->session->userdata('email'));
        $data['count'] = $this->Seller_model->hitungJasaByIdPenyedia($this->session->userdata('id_penyedia'));
        $data['judul'] = 'Dashboard';
        $data['pesanan_baru'] = $this->Seller_model->hitungTransaksiByIdPenyedia($this->session->userdata('id_penyedia'), 'Menunggu Konfirmasi');
        $data['pesanan_diproses'] = $this->Seller_model->hitungTransaksiByIdPenyedia($this->session->userdata('id_penyedia'), 'Pesanan Diproses');
        $data['pesanan_selesai'] = $this->Seller_model->hitungTransaksiByIdPenyedia($this->session->userdata('id_penyedia'), 'Pesanan Selesai');
        $data['pesanan_ditolak'] = $this->Seller_model->hitungTransaksiByIdPenyedia($this->session->userdata('id_penyedia'), 'Pesanan Ditolak');
        $data['pendapatan'] = $this->Seller_model->hitungTotalPendapatan($this->session->userdata('id_penyedia'));

        $this->load->view('templates/header_sbadmin', $data);
        $this->load->view('templates/sidebar_sbadmin', $data);
        $this->load->view('templates/topbar_sbadmin', $data);
        $this->load->view('seller/index', $data);
        $this->load->view('templates/footer_sbadmin');
    }

    public function transaksi() {
        $this->cekSession();
        $data['user'] = $this->Seller_model->getUserByEmail($this->session->userdata('email'));
        $data['judul'] = 'Transaksi';
        $data['pesanan_baru'] = $this->Seller_model->getTransaksiByIdpenyedia($this->session->userdata('id_penyedia'), 'Menunggu Konfirmasi');
        $data['pesanan_diproses'] = $this->Seller_model->getTransaksiByIdpenyedia($this->session->userdata('id_penyedia'), 'Pesanan Diproses');
        $data['pesanan_selesai'] = $this->Seller_model->getTransaksiByIdpenyedia($this->session->userdata('id_penyedia'), 'Pesanan Selesai');
        $data['pesanan_ditolak'] = $this->Seller_model->getTransaksiByIdpenyedia($this->session->userdata('id_penyedia'), 'Pesanan Ditolak');

        $this->load->view('templates/header_sbadmin', $data);
        $this->load->view('templates/sidebar_sbadmin', $data);
        $this->load->view('templates/topbar_sbadmin', $data);
        $this->load->view('seller/transaksi', $data);
        $this->load->view('templates/footer_sbadmin');
    }

    public function jasa() {
        $this->cekSession();
        $data['user'] = $this->Seller_model->getUserByEmail($this->session->userdata('email'));
        $data['judul'] = 'Tambah Jasa';
        $data['profesi'] = $this->Seller_model->getProfesiById($this->session->userdata('id_penyedia'));

        $this->load->view('templates/header_sbadmin', $data);
        $this->load->view('templates/sidebar_sbadmin', $data);
        $this->load->view('templates/topbar_sbadmin', $data);
        $this->load->view('seller/jasa', $data);
        $this->load->view('templates/footer_sbadmin');
    }

    public function tambah_jasa() {
        $this->cekSession();
        $data['judul'] = 'Tambah Jasa';
        $data['user'] = $this->Seller_model->getUserByEmail($this->session->userdata('email'));
        $data['profesi'] = $this->Seller_model->getProfesiById($this->session->userdata('id_penyedia'));

        $this->form_validation->set_rules('judul-jasa', 'Judul', 'required');
        $this->form_validation->set_rules('harga-jasa', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('pengerjaan-jasa', 'Pengerjaan', 'required|numeric', [
            'numeric' => 'Harap pilih waktu pengerjaan.'
        ]);

        if ( $this->form_validation->run() == FALSE ) {
            // INVALID
            $this->load->view('templates/header_sbadmin', $data);
            $this->load->view('templates/sidebar_sbadmin', $data);
            $this->load->view('templates/topbar_sbadmin', $data);
            $this->load->view('seller/jasa', $data);
            $this->load->view('templates/footer_sbadmin');
        } else {
            // VALID
            $config['upload_path'] = './assets/foto/jasa/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('foto-jasa')) {
                // GAGAL UPLOAD
                echo is_writable('./assets/foto/jasa/');
                echo $this->upload->display_errors(); die;
            } else {
                // BERHASIL UPLOAD
                $name = $this->upload->data('file_name');
                $this->Seller_model->tambahJasa($name);
            }
            $this->session->set_flashdata('jasa-success', 'Tambah Jasa');
            redirect(base_url('seller'));
        }

    }

    public function myprofile() {
        $this->cekSession();
        $data['user'] = $this->Seller_model->getPenyediaById($this->session->userdata('id_penyedia'));
        $data['profesi'] = $this->Seller_model->getAllProfesi();
        $data['judul'] = 'My Profile';

        $this->load->view('templates/header_sbadmin', $data);
        $this->load->view('templates/sidebar_sbadmin', $data);
        $this->load->view('templates/topbar_sbadmin', $data);
        $this->load->view('seller/myprofile', $data);
        $this->load->view('templates/footer_sbadmin');
    }

    public function daftar_jasa() {
        $this->cekSession();
        $data['user'] = $this->Seller_model->getUserByEmail($this->session->userdata('email'));
        $data['judul'] = 'Daftar Jasa';
        $data['jasa'] = $this->Seller_model->getJasaByIdPenyedia($this->session->userdata('id_penyedia'));
        $data['profesi'] = $this->Seller_model->getProfesiById($this->session->userdata('id_penyedia'));

        $this->load->view('templates/header_sbadmin', $data);
        $this->load->view('templates/sidebar_sbadmin', $data);
        $this->load->view('templates/topbar_sbadmin', $data);
        $this->load->view('seller/daftar_jasa', $data);
        $this->load->view('templates/footer_sbadmin');
    }

    public function getubah() {
        echo json_encode($this->Seller_model->getJasaByIdJasa($this->input->post('id_jasa')));
    }

    public function getUbahProfile() {
        echo json_encode($this->Seller_model->getPenyediaById($this->input->post('id_penyedia')));
    }

    // public function getProfesi() {
    //     echo json_encode($this->Seller_model->getProfesiById($this->input->post('id_penyedia')));
    // }

    public function ubah_jasa() {
        $this->cekSession();
        $data['judul'] = 'Tambah Jasa';
        $data['user'] = $this->Seller_model->getUserByEmail($this->session->userdata('email'));
        $data['jasa'] = $this->Seller_model->getJasaByIdPenyedia($this->session->userdata('id_penyedia'));
        $data['profesi'] = $this->Seller_model->getProfesiById($this->session->userdata('id_penyedia'));

        $this->form_validation->set_rules('judul-jasa', 'Judul', 'required');
        $this->form_validation->set_rules('harga-jasa', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('pengerjaan-jasa', 'Pengerjaan', 'required|numeric', [
            'numeric' => 'Harap pilih waktu pengerjaan.'
        ]);

        if ( $this->form_validation->run() == FALSE ) {
            // INVALID
            $this->session->set_tempdata('ubah-error', 'Ubah data', 1);
            $this->load->view('templates/header_sbadmin', $data);
            $this->load->view('templates/sidebar_sbadmin', $data);
            $this->load->view('templates/topbar_sbadmin', $data);
            $this->load->view('seller/daftar_jasa', $data);
            $this->load->view('templates/footer_sbadmin');
        } else {
            // VALID
            $config['upload_path'] = './assets/foto/jasa/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('foto-jasa')) {
                // GAGAL UPLOAD
                // echo $this->upload->display_errors(); die;
                // You did not select a file to upload.
                // The filetype you are attempting to upload is not allowed.
                if ( ($this->upload->data('is_image') == 0) and ($this->upload->data('file_size') > 0) ) {
                    $this->session->set_flashdata('foto-salah', 'Foto jasa');
                } else {
                    $id_test = $this->Seller_model->getJasaByIdJasa($this->input->post('id-jasa'));
                    $this->Seller_model->ubahJasa($id_test['foto_jasa']);
                }
            } else {
                // BERHASIL UPLOAD
                $name = $this->upload->data('file_name');
                $this->Seller_model->ubahJasa($name);
            }
            $this->session->set_flashdata('ubah-jasa-success', 'Ubah Jasa');
            redirect(base_url('seller/daftar_jasa'));
        }
    }

    public function hapusJasa($id) {
        $this->cekSession();
        $this->Seller_model->hapusDataJasa($id);
        redirect(base_url('seller/daftar_jasa'));
    }

    public function ubah_profile() {
        $this->cekSession();
        $data['judul'] = 'My Profile';
        $data['user'] = $this->Seller_model->getPenyediaById($this->session->userdata('id_penyedia'));
        $data['profesi'] = $this->Seller_model->getAllProfesi();
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password-signup', 'Password', 'required');
        $this->form_validation->set_rules('email-signup', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nohp', 'Ho. Hp', 'required|numeric');
        
        if ( $this->form_validation->run() == FALSE ) {
            $this->session->set_flashdata('profile-invalid', 'Ubah profile');
            $this->load->view('templates/header_sbadmin', $data);
            $this->load->view('templates/sidebar_sbadmin', $data);
            $this->load->view('templates/topbar_sbadmin', $data);
            $this->load->view('seller/myprofile', $data);
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
                    $id_test = $this->Seller_model->getPenyediaById($this->input->post('id-penyedia'));
                    $this->Seller_model->UbahDataUser($id_test['foto_profil']);
                }
            } else {
                // BERHASIL UPLOAD
                $name = $this->upload->data('file_name');
                $this->Seller_model->UbahDataUser($name);
            }
            $this->session->set_flashdata('profile-success', 'Ubah profile');
            redirect('seller/myprofile');
        }
    }

    public function getTransaksi() {
        echo json_encode($this->Seller_model->getTransaksiById());
    }

    public function getJasa() {
        echo json_encode($this->Seller_model->getJasaByIdTransaksi());
    }

    public function terimaPesanan() {
        $status = 'Pesanan Diproses';
        $this->Seller_model->ubahStatusPesanan($status);
        $this->session->set_flashdata('pesanan-diterima', 'Pesanan');
        redirect('seller/transaksi');
    }

    public function tolakPesanan() {
        $status = 'Pesanan Ditolak';
        $this->Seller_model->ubahStatusPesanan($status);
        $this->session->set_flashdata('pesanan-ditolak', 'Pesanan');
        redirect('seller/transaksi');
    }

    public function uploadFileHasil() {
        $this->cekSession();
        $data['judul'] = 'Transaksi';
        $data['user'] = $this->Seller_model->getPenyediaById($this->session->userdata('id_penyedia'));
        $data['profesi'] = $this->Seller_model->getAllProfesi();
        $data['pesanan_baru'] = $this->Seller_model->getTransaksiByIdpenyedia($this->session->userdata('id_penyedia'), 'Menunggu Konfirmasi');
        $data['pesanan_diproses'] = $this->Seller_model->getTransaksiByIdpenyedia($this->session->userdata('id_penyedia'), 'Pesanan Diproses');
        $data['pesanan_selesai'] = $this->Seller_model->getTransaksiByIdpenyedia($this->session->userdata('id_penyedia'), 'Pesanan Selesai');
        $data['pesanan_ditolak'] = $this->Seller_model->getTransaksiByIdpenyedia($this->session->userdata('id_penyedia'), 'Pesanan Ditolak');

        $config['upload_path'] = './assets/file/';
        $config['allowed_types'] = 'rar|zip';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);
        if ( !$this->upload->do_upload('uploadHasil') ) {
            // GAGAL UPLOAD
            $this->session->set_flashdata('hasil-kosong', 'Upload file');
        } else {
            // BERHASIL UPLOAD
            $name = $this->upload->data('file_name');
            $this->Seller_model->uploadFileOutput($name);
            $this->session->set_flashdata('hasil-success', 'Upload file');
        }
        redirect('seller/transaksi');
    }
}