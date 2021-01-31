<?php 

Class Seller_model extends CI_Model {
    public function getUserByEmail($email) {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }
    
    public function getAllProfesi() {
        return $this->db->get('jenis_jasa')->result_array();
    }

    public function getProfesiById($id) {
        $query = "SELECT *
                    FROM penyedia_jasa, profesi, jenis_jasa
                    WHERE penyedia_jasa.id_penyedia = profesi.id_penyedia AND 
                    profesi.id_jenis = jenis_jasa.id_jenis AND
                    penyedia_jasa.id_penyedia = '$id'";

        return $this->db->query($query)->result_array();
    }

    public function getJasaByIdPenyedia($id) {
        return $this->db->get_where('jasa', ['id_penyedia' => $id])->result_array();
    }

    public function hitungJasaByIdPenyedia($id) {
        return $this->db->get_where('jasa', ['id_penyedia' => $id])->num_rows();
    }

    public function getJasaByIdJasa($id) {
        return $this->db->get_where('jasa', ['id_jasa' => $id])->row_array();
    }

    public function getPenyediaById($id = null) {
        $query = "SELECT user.id_user, username, PASSWORD, email, nohp, penyedia_jasa.id_penyedia, portfolio, foto_profil, 
        GROUP_CONCAT(jenis_jasa.id_jenis) AS id_jenis, 
        GROUP_CONCAT(nama_jenis) AS nama_jenis
        FROM USER, penyedia_jasa, profesi, jenis_jasa
        WHERE user.id_user = penyedia_jasa.id_user AND penyedia_jasa.id_penyedia = profesi.id_penyedia AND profesi.id_jenis = jenis_jasa.id_jenis AND penyedia_jasa.id_penyedia = '$id'
        GROUP BY user.id_user";
        return $this->db->query($query)->row_array();
    }

    public function tambahJasa($name) {
        $data = [
            "foto_jasa" => $name,
            "judul_jasa" => $this->input->post('judul-jasa', true),
            "deskripsi_jasa" => $this->input->post('deskripsi-jasa', true),
            "status_jasa" => 1,
            "harga" => $this->input->post('harga-jasa', true),
            "id_jenis" => $this->input->post('jenis-jasa', true),
            "pengerjaan" => $this->input->post('pengerjaan-jasa', true),
            "id_penyedia" => $this->session->userdata('id_penyedia')
        ];

        $this->db->insert('jasa', $data);
    }

    public function ubahJasa ($name) {
        $data = [
            "foto_jasa" => $name,
            "judul_jasa" => $this->input->post('judul-jasa', true),
            "deskripsi_jasa" => $this->input->post('deskripsi-jasa', true),
            "status_jasa" => 1,
            "harga" => $this->input->post('harga-jasa', true),
            "id_jenis" => $this->input->post('jenis-jasa', true),
            "pengerjaan" => $this->input->post('pengerjaan-jasa', true),
            "id_penyedia" => $this->session->userdata('id_penyedia')
        ];
        $id = $this->input->post('id-jasa', true);

        $this->db->where('id_jasa', $id);
        $this->db->update('jasa', $data);
    }

    public function hapusDataJasa($id) {
        $this->db->where('id_jasa', $id);
        $this->db->delete('jasa');
    }

    public function ubahDataUser($name) {
        $data = [
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password-signup', true),
            "email" => $this->input->post('email-signup', true),
            "nohp" => $this->input->post('nohp', true),
            "foto_profil" => $name
        ];

        $id_user = $this->input->post('id-user', true);

        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);

        $dataSeller = [
            "portfolio" => $this->input->post('portfolio', true)
        ];

        $id_penyedia = $this->input->post('id-penyedia', true);

        $this->db->where('id_penyedia', $id_penyedia);
        $this->db->update('penyedia_jasa', $dataSeller);

        $id_jenis = $this->input->post('id_jenis', true);

        if ( isset($id_jenis) ) {
            $this->db->delete('profesi', ['id_penyedia' => $id_penyedia]);
            
            for ( $i = 0; $i < sizeof($id_jenis); $i++ ) :
                $this->db->query("INSERT INTO profesi VALUES($id_penyedia, $id_jenis[$i])");
            endfor;
        }
    }

    public function getTransaksiByIdPenyedia($id, $status) {
        $query = "SELECT *
                    FROM USER, customer, transaksi, jasa
                    WHERE user.id_user = customer.id_user
                    AND customer.id_customer = transaksi.id_customer
                    AND transaksi.`id_jasa` = jasa.`id_jasa`
                    AND transaksi.id_penyedia = '$id'
                    AND transaksi.status = '$status'
                    GROUP BY id_transaksi";

        return $this->db->query($query)->result_array();
    }

    public function hitungTransaksiByIdPenyedia($id, $status) {
        $query = "SELECT *
                    FROM USER, customer, transaksi, jasa
                    WHERE user.id_user = customer.id_user
                    AND customer.id_customer = transaksi.id_customer
                    AND transaksi.`id_jasa` = jasa.`id_jasa`
                    AND transaksi.id_penyedia = '$id'
                    AND transaksi.status = '$status'
                    GROUP BY id_transaksi";

        return $this->db->query($query)->num_rows();
    }

    public function hitungTotalPendapatan($id) {
        $query = "SELECT SUM(total_harga) AS pendapatan
                    FROM transaksi, pembayaran
                    WHERE transaksi.id_transaksi = pembayaran.id_transaksi
                    AND transaksi.status = 'Pesanan Selesai'
                    AND transaksi.id_penyedia = '$id'";

        return $this->db->query($query)->row_array();
    }

    public function getTransaksiById() {
        $id = $this->input->post('id_transaksi', true);
        $query = "SELECT *
                    FROM transaksi, customer, USER
                    WHERE transaksi.id_customer = customer.id_customer
                    AND customer.id_user = user.id_user
                    AND id_transaksi = '$id'";

        return $this->db->query($query)->row_array();
    }

    public function getJasaByIdTransaksi() {
        $id = $this->input->post('id_transaksi', true);
        $query = "SELECT *
                    FROM transaksi, jasa
                    WHERE transaksi.id_jasa = jasa.id_jasa
                    AND id_transaksi = '$id'
                    GROUP BY id_transaksi";

        return $this->db->query($query)->row_array();
    }

    public function ubahStatusPesanan($status) {
        if ( $status == 'Pesanan Ditolak' ) {
            $this->db->where('id_jasa', $this->input->post('id-jasa2', true));
            $this->db->update('jasa', ['status_jasa' => '1']);

            $this->db->where('id_transaksi', $this->input->post('id-transaksi2', true));
            $this->db->update('transaksi', ['status' => $status]);

        } else {
            $this->db->where('id_transaksi', $this->input->post('id-transaksi', true));
            $this->db->update('transaksi', ['status' => $status]);
        }
    }

    public function uploadFileOutput($name) {
        $data = [
            'nama_file' => $name,
            'id_transaksi' => $this->input->post('id_transaksi', true)
        ];

        $this->db->insert('file_output', $data);

        $this->db->where('id_transaksi', $this->input->post('id_transaksi', true));
        $this->db->update('transaksi', ['status' => 'Pesanan Selesai']);

        $this->db->where('id_jasa', $this->input->post('id_jasa', true));
        $this->db->update('jasa', ['status_jasa' => 1]);
    }
}