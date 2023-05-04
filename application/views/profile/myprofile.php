<!-- FLASHDATA -->
<div class="flash-profile-success" data-flashdata="<?= $this->session->flashdata('profile-success'); ?>"></div>
<div class="flash-foto-salah" data-flashdata="<?= $this->session->flashdata('foto-salah'); ?>"></div>
<div class="flash-profile-invalid" data-flashdata="<?= $this->session->flashdata('profile-invalid'); ?>"></div>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
  </div>

  <!-- Card -->
  <div class="row">
    <div class="col">
      <!-- Dropdown Card Example -->
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <button type="button" class="dropdown-item" id="ubah-profile-cust" data-id="<?= $user['id_customer']; ?>">Ubah Profile</button>
          </div>
        </div>
      </div>
      <!-- Card Body -->
        <div class="card-body">
          <div class="container text-center mb-4">
            <img src="<?= base_url('assets/foto/profil/' . $user['foto_profil']); ?>" alt="" width="150" height="150" class="rounded-circle">
          </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Username
                <span><?= $user['username']; ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Email
                <span><?= $user['email']; ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                No Hp
                <span><?= $user['nohp']; ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Password
                <span>**********</span>
              </li>
            </ul>
        </div>
      </div>
    </div>

    <div class="col">
      <!-- Basic Card Example -->
      <div class="card shadow mb-4 ubah-hilang" id="ubah-hilang">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Ubah Data</h6>
        </div>
        <?= form_open_multipart('profile/ubah_profile'); ?>
        <input type="hidden" name="id-customer" id="id-customer">
        <input type="hidden" name="id-user" id="id-user">
        <div class="card-body">
          <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
                <small id="emailHelp" class="form-text text-danger"><?= form_error('username'); ?></small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password-signup" value="<?= set_value('password-signup'); ?>">
                <small id="emailHelp" class="form-text text-danger"><?= form_error('password-signup'); ?></small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="emailsignup" placeholder="Email" name="email-signup" value="<?= set_value('email-signup'); ?>">
                <small id="emailHelp" class="form-text text-danger"><?= form_error('email-signup'); ?></small>
            </div>
            <div class="form-group">
                <label for="nohp">No. Hp</label>
                <input type="text" class="form-control" id="nohp" placeholder="Nomor Hp" name="nohp" value="<?= set_value('nohp'); ?>">
                <small id="emailHelp" class="form-text text-danger"><?= form_error('nohp'); ?></small>
            </div>
            <div class="input-group mb-3">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Foto Profil (optional)</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto-profil">
                </div>
            </div>
                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                <?php form_close(); ?>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->