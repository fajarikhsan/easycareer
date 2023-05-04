<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-signin-gagal" data-flashdata="<?= $this->session->flashdata('signin-gagal'); ?>"></div>
<div class="flash-signin-berhasil" data-flashdata="<?= $this->session->flashdata('signin-berhasil'); ?>"></div>
<div class="flash-forbidden" data-flashdata="<?= $this->session->flashdata('forbidden'); ?>"></div>

<div class="flash-signin-error" data-flashdata="<?= $this->session->tempdata('signin-error'); ?>"></div>
<div class="flash-signup-error" data-flashdata="<?= $this->session->tempdata('signup-error'); ?>"></div>

<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-4">Carry Out Your Success</h1>
                <p class="lead">Temukan jalan yang tepat bersama Easy Career</p>
                <?php if (isset($_SESSION['email'])) : ?>
                <?php else : ?>
                    <button class="btn btn-outline-primary mr-3 tombol mt-1" type="button" data-toggle="modal" data-target="#signupModal" id="become-seller">Menjadi Seller</button>
                <?php endif; ?>
                <a class="btn btn-outline-primary mr-3 tombol mt-1" href="<?= base_url(); ?>timeline">Lihat Jasa</a>
            </div>
            <div class="col friends">
                <img src="<?= base_url(); ?>assets/img/people.png" alt="people">
            </div>
        </div>
    </div>
</div>
<!-- /Jumbotron -->

<!-- Jasa Jasa -->
<div class="container mt-5 mb-5 pt-5">
    <div class="row">
        <div class="col text-center">
            <h3>Jasa Yang Kami Tawarkan</h3>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col text-center">
            <h6>Fokus kami adalah bidang informatika</h6>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col">
            <div class="card bg-dark text-white">
                <img src="<?= base_url(); ?>assets/img/uiux.png" class="card-img">
                <div class="card-img-overlay text-center role-title" style="display: flex; align-items: center; justify-content: center; text-shadow: 2px 2px black;">
                    <h5 class="card-title">UI/UX DESIGNER</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-dark text-white">
                <img src="<?= base_url(); ?>assets/img/softdev.png" class="card-img">
                <div class="card-img-overlay text-center role-title" style="display: flex; align-items: center; justify-content: center; text-shadow: 2px 2px black;">
                    <h5 class="card-title">SOFTWARE DEVELOPER</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-dark text-white">
                <img src="<?= base_url(); ?>assets/img/tester.png" class="card-img">
                <div class="card-img-overlay text-center role-title" style="display: flex; align-items: center; justify-content: center; text-shadow: 2px 2px black;">
                    <h5 class="card-title">TESTER</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <div class="card bg-dark text-white">
                <img src="<?= base_url(); ?>assets/img/hardware.png" class="card-img">
                <div class="card-img-overlay text-center role-title" style="display: flex; align-items: center; justify-content: center; text-shadow: 2px 2px black;">
                    <h5 class="card-title">HARDWARE ENGINEER</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-dark text-white">
                <img src="<?= base_url(); ?>assets/img/dbadmin.png" class="card-img">
                <div class="card-img-overlay text-center role-title" style="display: flex; align-items: center; justify-content: center; text-shadow: 2px 2px black;">
                    <h5 class="card-title">DATABASE ADMIN</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-dark text-white">
                <img src="<?= base_url(); ?>assets/img/itsupp.png" class="card-img">
                <div class="card-img-overlay text-center role-title" style="display: flex; align-items: center; justify-content: center; text-shadow: 2px 2px black;">
                    <h5 class="card-title">IT SUPPORT</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Jasa Jasa -->

<!-- Garansi -->
<div class="container mt-5 mb-5 pt-5">
    <div class="row mb-4">
        <div class="col text-center">
            <h3>Garansi Easy Career</h3>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col">
            <img src="<?= base_url(); ?>assets/img/garansi.png" class="img-thumbnail">
        </div>
        <div class="col">
            <div class="row garansi">
                <div class="col-2">
                    <img src="<?= base_url(); ?>assets/img/check.png">
                </div>
                <div class="col">
                    <h4>Ketahui Harga di Awal</h4>
                    Temukan layanan apa pun dalam hitungan menit dan ketahui persis apa yang akan Anda bayar. Tidak ada tarif per jam, hanya harga tetap.
                </div>
            </div>
            <div class="row garansi">
                <div class="col-2">
                    <img src="<?= base_url(); ?>assets/img/check.png">
                </div>
                <div class="col">
                    <h4>Akses 24 Jam</h4>
                    Hubungi kami kapan saja! Kami mendukung Anda, mulai dari menjawab pertanyaan Anda hingga menyelesaikan masalah.
                </div>
            </div>
            <div class="row garansi">
                <div class="col-2">
                    <img src="<?= base_url(); ?>assets/img/check.png">
                </div>
                <div class="col">
                    <h4>Perlindungan pembayaran, dijamin</h4>
                    Pembayaran dilepaskan ke freelancer setelah Anda senang dan menyetujui pekerjaan yang Anda dapatkan.
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Garansi -->