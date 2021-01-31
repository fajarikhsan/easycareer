<?php 

Class Profile_model extends CI_Model {
    public function getCurrentDate() {
        return date("Y/m/d");
    }

    public function getUserByIdCustomer($id) {
        $query = "SELECT * FROM user, customer
                    WHERE user.id_user = customer.id_user AND id_customer = '$id'";
        
        return $this->db->query($query)->row_array();
    }

    public function ubahDataUser($name) {
        $data = [
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password-signup', true),
            "email" => $this->input->post('email-signup', true),
            "nohp" => $this->input->post('nohp', true),
            "foto_profil" => $name
        ];

        $this->db->where('id_user', $this->input->post('id-user', true));
        $this->db->update('user', $data);
    }

    public function getTransaksiByIdCustomer1($id, $status) {
        $query = "SELECT *
                FROM USER, customer, transaksi, jasa
                WHERE user.id_user = customer.id_user
                AND customer.id_customer = transaksi.id_customer
                AND transaksi.`id_jasa` = jasa.`id_jasa`
                AND customer.id_customer = '$id'
                AND transaksi.status = '$status'
                GROUP BY transaksi.id_transaksi";

        return $this->db->query($query)->result_array();
    }

    public function getTransaksiByIdCustomer2($id, $status) {
        $query = "SELECT *
                FROM USER, customer, transaksi, jasa, pembayaran
                WHERE user.id_user = customer.id_user
                AND customer.id_customer = transaksi.id_customer
                AND transaksi.`id_jasa` = jasa.`id_jasa`
                AND transaksi.id_transaksi = pembayaran.id_transaksi
                AND customer.id_customer = '$id'
                AND transaksi.status = '$status'
                GROUP BY transaksi.id_transaksi";

        return $this->db->query($query)->result_array();
    }

    public function getTransaksiByIdCustomer3($id, $status) {
        $query = "SELECT *
                FROM USER, customer, transaksi, jasa, pembayaran, file_output
                WHERE user.id_user = customer.id_user
                AND customer.id_customer = transaksi.id_customer
                AND transaksi.`id_jasa` = jasa.`id_jasa`
                AND transaksi.id_transaksi = pembayaran.id_transaksi
                AND transaksi.id_transaksi = file_output.id_transaksi
                AND customer.id_customer = '$id'
                AND transaksi.status = '$status'
                GROUP BY transaksi.id_transaksi";

        return $this->db->query($query)->result_array();
    }

    public function getTransaksiById() {
        $id = $this->input->post('id_transaksi', true);
        $query = "SELECT *
                    FROM transaksi, jasa, customer, user
                    WHERE transaksi.id_jasa = jasa.id_jasa
                    AND transaksi.`id_customer` = customer.`id_customer`
                    AND customer.`id_user` = user.`id_user`
                    AND id_transaksi = '$id'
                    GROUP BY id_transaksi";

        return $this->db->query($query)->row_array();
    }

    public function pembayaran() {
        $data = [
            'total_harga' => $this->input->post('total-harga', true),
            'tgl_pembayaran' => $this->getCurrentDate(),
            'id_transaksi' => $this->input->post('id-transaksi', true)
        ];

        $this->db->insert('pembayaran', $data);

        $this->db->where('id_transaksi', $this->input->post('id-transaksi', true));
        $this->db->update('transaksi', ['status' => 'Menunggu Konfirmasi']);
    }

    public function tambahRating() {
        $data=  [
            'rating' => $this->input->post('rating', true),
            'ulasan' => $this->input->post('ulasan', true)
        ];

        $this->db->where('id_transaksi', $this->input->post('id_transaksi'));
        $this->db->update('pembayaran', $data);
    }
}