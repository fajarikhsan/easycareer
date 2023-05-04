<?php

class Timeline_model extends CI_Model
{
    public function getCurrentDate()
    {
        return date("Y/m/d");
    }

    public function getAllDataJasa()
    {
        $query = "SELECT *
                    FROM USER, penyedia_jasa, profesi, jenis_jasa, jasa
                    WHERE user.id_user = penyedia_jasa.id_user 
                    AND penyedia_jasa.id_penyedia = profesi.id_penyedia 
                    AND profesi.id_jenis = jenis_jasa.id_jenis
                    AND jasa.id_jenis = profesi.id_jenis
                    GROUP BY id_jasa";
        return $this->db->query($query)->result_array();
    }

    public function getUserById($id = null)
    {
        $query = "SELECT user.id_user, username, PASSWORD, email, nohp, penyedia_jasa.id_penyedia, portfolio, foto_profil, 
        GROUP_CONCAT(jenis_jasa.id_jenis) AS id_jenis, 
        GROUP_CONCAT(nama_jenis) AS nama_jenis
        FROM USER, penyedia_jasa, profesi, jenis_jasa
        WHERE user.id_user = penyedia_jasa.id_user AND penyedia_jasa.id_penyedia = profesi.id_penyedia AND profesi.id_jenis = jenis_jasa.id_jenis AND user.id_user = '$id'
        GROUP BY user.id_user";
        return $this->db->query($query)->row_array();
    }

    public function getAllProfesi()
    {
        return $this->db->get('jenis_jasa')->result_array();
    }

    public function getJasaByIdPenyedia($id, $prof)
    {
        $query = "SELECT *
                    FROM USER, penyedia_jasa, profesi, jenis_jasa, jasa
                    WHERE user.id_user = penyedia_jasa.id_user 
                    AND penyedia_jasa.id_penyedia = profesi.id_penyedia 
                    AND profesi.id_jenis = jenis_jasa.id_jenis
                    AND jasa.id_jenis = profesi.id_jenis
                    AND id_jasa = '$id'
                    AND penyedia_jasa.id_penyedia = '$prof'
                    GROUP BY id_jasa";

        return $this->db->query($query)->row_array();
    }

    public function getRatingByIdJasa($id)
    {
        $query = "SELECT username, foto_profil, tanggal_transaksi, ulasan, 
                    rating, AVG(rating) AS avg_rating, COUNT(rating) AS count_rating
                    FROM USER, customer, transaksi, pembayaran, penyedia_jasa, jasa
                    WHERE user.id_user = customer.id_user
                    AND customer.id_customer = transaksi.id_customer
                    AND transaksi.id_transaksi = pembayaran.id_transaksi
                    AND transaksi.id_penyedia = penyedia_jasa.id_penyedia
                    AND penyedia_jasa.id_penyedia = jasa.id_penyedia
                    AND transaksi.id_jasa = '$id'
                    AND rating != ''
                    GROUP BY transaksi.id_transaksi";

        return $this->db->query($query)->result_array();
    }

    public function getAvgRating($id)
    {
        $query = "SELECT username, foto_profil, tanggal_transaksi, ulasan, 
                    rating, AVG(rating) AS avg_rating, COUNT(rating) AS count_rating
                    FROM USER, customer, transaksi, pembayaran, jasa
                    WHERE user.id_user = customer.id_user
                    AND customer.id_customer = transaksi.id_customer
                    AND transaksi.id_transaksi = pembayaran.id_transaksi
                    AND transaksi.id_jasa = jasa.id_jasa
                    AND transaksi.id_jasa = '$id'
                    GROUP BY transaksi.id_jasa";

        return $this->db->query($query)->row_array();
    }

    public function getPenyediaByIdJasa($id)
    {
        $query = "SELECT GROUP_CONCAT(nama_jenis) AS nama_jenis
                    FROM penyedia_jasa, profesi, jenis_jasa
                    WHERE penyedia_jasa.`id_penyedia` = profesi.`id_penyedia`
                    and profesi.`id_jenis` = jenis_jasa.`id_jenis`
                    and penyedia_jasa.id_penyedia = '$id'";

        return $this->db->query($query)->row_array();
    }

    public function getJasaById()
    {
        $query = "SELECT *
        FROM USER, penyedia_jasa, profesi, jenis_jasa, jasa
        WHERE user.id_user = penyedia_jasa.id_user 
        AND penyedia_jasa.id_penyedia = profesi.id_penyedia 
        AND profesi.id_jenis = jenis_jasa.id_jenis
        AND jasa.id_jenis = profesi.id_jenis
        AND status_jasa = 1";

        if (isset($_POST['filter_jasa'])) {
            $filter = implode("','", $this->input->post('filter_jasa', true));
            $query .= " AND jasa.id_jenis IN('" . $filter . "')";
        }

        $query .= " GROUP BY id_jasa";

        $hasil = $this->db->query($query)->result_array();
        $banyak = $this->db->query($query)->num_rows();
        $output = "";

        if ($banyak > 0) {
            foreach ($hasil as $h) {
                $output .= "<div class='col col-timeline'>";
                $output .= "<div class='card mt-4 mb-4'>";
                $output .= "<div class='foto-jasa'>";
                $output .= "<img src='" . base_url('assets/foto/jasa/' . $h['foto_jasa']) . "' class='card-img-top rounded'>";
                $output .= "</div>";
                $output .= "<div class='card-body'>";
                $output .= "<p class='card-text judul-jasa'>" . $h['judul_jasa'] . "</p>";
                $output .= "<h5 class='card-title'>" . 'Rp ' . number_format($h['harga'], 0, ',', '.') . "</h5>";
                $output .= "<p class='card-text'>" . $h['nama_jenis'] . "</p>";
                $output .= "<a href='" . base_url('timeline/detail/' . $h['id_jasa']) . '/' . $h['id_penyedia'] . "' class='stretched-link'></a>";
                $output .= "</div>";
                $output .= "</div>";
                $output .= "</div>";
            }
        } else {
            $output .= "<h4> Data Kosong! </h4>";
        }
        echo $output;
    }

    public function getCari()
    {
        $query = "SELECT *
        FROM USER, penyedia_jasa, profesi, jenis_jasa, jasa
        WHERE user.id_user = penyedia_jasa.id_user 
        AND penyedia_jasa.id_penyedia = profesi.id_penyedia 
        AND profesi.id_jenis = jenis_jasa.id_jenis
        AND jasa.id_jenis = profesi.id_jenis
        AND status_jasa = 1";

        if (isset($_POST['cari'])) {
            $filter = $this->input->post('cari');
            $query .= " AND judul_jasa LIKE '%$filter%'";
        }

        $query .= " GROUP BY id_jasa";

        $hasil = $this->db->query($query)->result_array();
        $banyak = $this->db->query($query)->num_rows();
        $output = "";

        if ($banyak > 0) {
            foreach ($hasil as $h) {
                $output .= "<div class='col col-timeline'>";
                $output .= "<div class='card mt-4 mb-4'>";
                $output .= "<div class='foto-jasa'>";
                $output .= "<img src='" . base_url('assets/foto/jasa/' . $h['foto_jasa']) . "' class='card-img-top rounded'>";
                $output .= "</div>";
                $output .= "<div class='card-body'>";
                $output .= "<p class='card-text judul-jasa'>" . $h['judul_jasa'] . "</p>";
                $output .= "<h5 class='card-title'>" . 'Rp ' . number_format($h['harga'], 0, ',', '.') . "</h5>";
                $output .= "<p class='card-text'>" . $h['nama_jenis'] . "</p>";
                $output .= "<a href='" . base_url('timeline/detail/' . $h['id_jasa']) . '/' . $h['id_penyedia'] . "' class='stretched-link'></a>";
                $output .= "</div>";
                $output .= "</div>";
                $output .= "</div>";
            }
        } else {
            $output .= "<h4> Data tidak ditemukan </h4>";
        }
        echo $output;
    }

    public function tambahTransaksi()
    {
        $data = [
            'status' => 'Menunggu Pembayaran',
            'detail_pekerjaan' => $this->input->post('detail-pekerjaan', true),
            'tanggal_transaksi' => $this->getCurrentDate(),
            'id_customer' => $this->session->userdata('id_customer'),
            'id_penyedia' => $this->input->post('id-penyedia', true),
            'id_jasa' => $this->input->post('url', true)
        ];

        $this->db->insert('transaksi', $data);

        $this->db->where('id_jasa', $this->input->post('url', true));
        $this->db->update('jasa', ['status_jasa' => 0]);
    }

    public function getRatingByValue()
    {
        $id_jasa = $this->input->post('id_jasa');
        $query = "SELECT username, foto_profil, tanggal_transaksi, ulasan, 
                    rating, AVG(rating) AS avg_rating, COUNT(rating) AS count_rating
                    FROM USER, customer, transaksi, pembayaran, penyedia_jasa, jasa
                    WHERE user.id_user = customer.id_user
                    AND customer.id_customer = transaksi.id_customer
                    AND transaksi.id_transaksi = pembayaran.id_transaksi
                    AND transaksi.id_penyedia = penyedia_jasa.id_penyedia
                    AND penyedia_jasa.id_penyedia = jasa.id_penyedia
                    AND id_jasa = '$id_jasa'";

        if (isset($_POST['find'])) {
            $rating = $this->input->post('find');
            if ($rating == 'semua') {
            } else {
                $query .= " AND rating = '$rating'";
            }
        }

        $query .= " GROUP BY transaksi.id_transaksi";

        $hasil = $this->db->query($query)->result_array();
        $banyak = $this->db->query($query)->num_rows();
        $output = "";

        if ($banyak > 0) {
            foreach ($hasil as $r) {
                $output .= "<li class='list-group-item'>";
                $output .= "<div class='row'>";
                $output .= "<div class='col-1'>";
                $output .= "<img src='" . base_url('assets/foto/profil/' . $r['foto_profil']) . "' class='img-thumbnail rounded-circle' width='40' height='40'>";
                $output .= "</div>";
                $output .= "<div class='col-2'>";
                $output .= "<div class='row'>";
                $output .= "<div class='col'>";
                $output .= "<h6>" . $r['username'] . "</h6>";
                $output .= "</div>";
                $output .= "</div>";
                $output .= "<div class='row'>";
                $output .= "<div class='col'>";
                $output .= $r['tanggal_transaksi'];
                $output .= "</div>";
                $output .= "</div>";
                $output .= "</div>";
                $output .= "<div class='col'>";
                $output .= "<span class='fa fa-star checked'>" . $r['rating'] . "</span>";
                $output .= "</div>";
                $output .= "</div>";
                $output .= "<div class='row mt-2'>";
                $output .= "<div class='col'>";
                $output .= "<p class='font-weight-normal'>" . $r['ulasan'] . "</p>";
                $output .= "</div>";
                $output .= "</div>";
                $output .= "</li>";
            }
        } else {
            $output .= "<h6> Data Kosong </h6>";
        }
        echo $output;
    }
}
