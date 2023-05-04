<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css"> </link>
    
    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">

    <!-- Star Rating -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title><?= $judul; ?></title>
  </head>
  <body>

  <!--Navbar-->
<nav class="navbar navbar-expand-lg fixed-top navbar-light nav-timeline">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>" width="50">
            <img src="<?= base_url('assets/img/logo_easycareer.png'); ?>" width="15%" height="15%" class="d-inline-block align-top mt-1 mr-2" alt="" loading="lazy">
            Easy Career
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="<?= base_url(); ?>timeline">Temukan Pekerjaan</a>
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