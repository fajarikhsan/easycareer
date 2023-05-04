<!-- Modal Sign In -->
<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('home/signin'); ?>" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="text" class="form-control" id="email-signin" aria-describedby="emailHelp" name="email-signin" value="<?= set_value('email-signin'); ?>">
                <small id="emailHelp" class="form-text text-danger"><?= form_error('email-signin'); ?></small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password-signin" name="password-signin" value="<?= set_value('password-signin'); ?>">
                <small id="emailHelp" class="form-text text-danger"><?= form_error('password-signin'); ?></small>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Sign In</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /modal -->

<!-- Modal Sign Up -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('home/signup'); ?>
            <div class="form-group">
                <label for="tipe-user">Sign Up Sebagai</label>
                <select class="form-control" id="tipe-user" name="role">
                    <option value="customer">Customer</option>
                    <option value="seller">Seller</option>
                </select>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
                <small class="form-text text-danger"><?= form_error('username'); ?></small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password-signup" value="<?= set_value('password-signup'); ?>">
                <small class="form-text text-danger"><?= form_error('password-signup'); ?></small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="emailsignup" placeholder="Email" name="email-signup" value="<?= set_value('email-signup'); ?>">
                <small class="form-text text-danger"><?= form_error('email'); ?></small>
            </div>
            <div class="form-group">
                <label for="nohp">No. Hp</label>
                <input type="text" class="form-control" id="nohp" placeholder="Nomor Hp" name="nohp" value="<?= set_value('nohp'); ?>">
                <small class="form-text text-danger"><?= form_error('nohp'); ?></small>
            </div>
            <div class="input-group mb-3">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Foto Profil (optional)</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto-profil">
                </div>
            </div>
            <div id="seller">
                <div class="form-group">
                    <label for="portfolio">Link Portfolio (optional)</label>
                    <input type="text" class="form-control" id="portfolio" placeholder="Portfolio" name="portfolio" value="<?= set_value('portfolio'); ?>">
                </div>
                <label>Pilih keahlian anda</label>
                <?php foreach ( $profesi as $p ) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?= $p['id_jenis']; ?>" id="<?= $p['id_jenis']; ?>" name="id_jenis[]">
                        <label class="form-check-label" for="defaultCheck1">
                            <?= $p['nama_jenis']; ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Sign Up</button>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>
<!-- /modal -->