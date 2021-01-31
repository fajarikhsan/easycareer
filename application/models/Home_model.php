<?php 

class Home_model extends CI_Model {
    public function getAllProfesi() {
        return $this->db->get('jenis_jasa')->result_array();
    }

    public function cekRole() {
        $role = $this->input->post('role', true);
        if ( $role == 'customer' ) {
            return 1;
        } else {
            return 0;
        }
    }

    public function tambahUser($name = 'profile.png') {
        $role = $this->cekRole();
        $data = [
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password-signup', true),
            "email" => $this->input->post('email-signup', true),
            "nohp" => $this->input->post('nohp', true),
            "foto_profil" => $name
        ];

        $this->db->insert('user', $data);

        if ( $role == 1 ) {
            $dataCust = [
                "id_user" => $this->db->insert_id()
            ];
    
            $this->db->insert('customer', $dataCust);
        } else {
            $dataSeller = [
                "portfolio" => $this->input->post('portfolio', true),
                "id_user" => $this->db->insert_id()
            ];

            $this->db->insert('penyedia_jasa', $dataSeller);
            
            $id_jenis = $this->input->post('id_jenis', true);
            $id_penyedia = $this->db->insert_id();

            for ( $i = 0; $i < sizeof($id_jenis); $i++ ) :
                $this->db->query("INSERT INTO profesi VALUES($id_penyedia, $id_jenis[$i])");
            endfor;
        }

    }

    public function cekCustomerByEmail($email) {
        $query = "SELECT *
                    FROM user, customer
                    WHERE user.id_user = customer.id_user AND email = '$email'";
        return $this->db->query($query)->row_array();
    }

    public function cekSellerByEmail($email) {
        $query = "SELECT user.id_user, username, PASSWORD, email, nohp, penyedia_jasa.id_penyedia, portfolio, foto_profil, 
        GROUP_CONCAT(jenis_jasa.id_jenis) AS id_jenis, 
        GROUP_CONCAT(nama_jenis) AS nama_jenis
        FROM USER, penyedia_jasa, profesi, jenis_jasa
        WHERE user.id_user = penyedia_jasa.id_user AND penyedia_jasa.id_penyedia = profesi.id_penyedia AND profesi.id_jenis = jenis_jasa.id_jenis AND email = '$email'
        GROUP BY user.id_user";

        return $this->db->query($query)->row_array();
    }

    public function signinUser() {
        $email = $this->input->post('email-signin', true);
        $pass = $this->input->post('password-signin', true);

        return $this->db->get_where('user', ['email' => $email, 'password' => $pass])->row_array();
    }
}