<!-- Image and text -->
<!-- <nav class="navbar navbar-light nav-timeline">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">
            <img src="<?= base_url(); ?>assets/img/favicon.jpg" width="40" height="40" alt="" loading="lazy">
            <span class="top">Easy Career</span>  
        </a>
        <div class="navbar-nav ml-auto">
          <form class="form-inline">
            <input class="form-control mr-sm-4" type="search" placeholder="Search" aria-label="Search" width="10px" size="90">
            <button class="btn btn-success mr-3 find" type="submit">Cari</button>
          </form>

        </div>
    </div>
</nav> -->

<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light nav-timeline">
    <div class="container">
        <a class="navbar-brand" href="">Easy Career</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="<?= base_url(); ?>timeline">Temukan Pekerjaan</a>
                <a class="nav-item nav-link" href="#">Tentang</a>
                <?php if ( $this->session->has_userdata('email') ) : ?>
                    <?php if ( $this->session->has_userdata('id_penyedia') ) : ?>
                        <form action="<?= base_url('seller'); ?>" method="post">
                            <button type="submit" class="nav-item  btn btn-outline-primary mr-3 tombol">
                                Profile
                            </button>
                        </form>
                    <?php else : ?>
                        <form action="<?= base_url('profile'); ?>" method="post">
                            <button type="submit" class="nav-item  btn btn-outline-primary mr-3 tombol">
                                Profile
                            </button>
                        </form>
                    <?php endif; ?>
                    <form action="<?= base_url('home/signout'); ?>">
                        <button type="submit" class="nav-item  btn btn-success mr-3 tombol">
                            Sign Out
                        </button>
                    </form>
                <?php else : ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="nav-item  btn btn-outline-primary mr-3 tombol" data-toggle="modal" data-target="#signinModal">
                        Sign In
                    </button>
                    <!-- Button trigger modal -->
                    <button type="button" class="nav-item  btn btn-success mr-3 tombol" data-toggle="modal" data-target="#signupModal">
                        Sign Up
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
<!--/.Navbar-->