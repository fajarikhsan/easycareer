<!-- flashdata -->
<div class="flash-ubah-success" data-flashdata="<?= $this->session->flashdata('ubah-jasa-success'); ?>"></div>
<div class="flash-foto-salah" data-flashdata="<?= $this->session->flashdata('foto-salah'); ?>"></div>

<div class="flash-ubah-error" data-flashdata="<?= $this->session->tempdata('ubah-error'); ?>"></div>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
          </div>

            <table class="table table-hover">
                <tbody>
                  <?php foreach ( $jasa as $j ) : ?>
                    <tr class="shadow">
                      <td class="td-width" width="20%"><img src="<?= base_url('assets/foto/jasa/' . $j['foto_jasa']); ?>" alt="" class="img-thumbnail img-jasa"></td>
                      <td width="40%" class="align-middle"><?= $j['judul_jasa'] ?></td>
                      <td width="40%" class="text-center align-middle">
                        <form action="<?= base_url('timeline/detail/' . $j['id_jasa'] . '/' . $this->session->userdata('id_penyedia')); ?>" method="post" class="mb-2">
                          <button class="btn btn-primary shadow-lg">Lihat</button>
                        </form>
                        <button class="btn btn-warning shadow-lg tombol-ubah" data-toggle="modal" data-target="#modalUbah" data-id="<?= $j['id_jasa']; ?>" type="button">Ubah</button>
                        <button class="btn btn-danger shadow-lg tombol-hapus" type="button" data-id="<?= $j['id_jasa']; ?>">Hapus</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.container-fluid -->

        <!-- MODAL UBAH -->
        <!-- Modal -->
      <div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="modalUbah" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalUbah">Ubah Jasa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <?= form_open_multipart('seller/ubah_jasa'); ?>
            <input type="hidden" name="id-jasa" id="id-jasa">
                <div class="form-group">
                    <label for="judul-jasa">Judul Jasa</label>
                    <input type="text" class="form-control shadow" id="judul-jasa" placeholder="Judul" name="judul-jasa" value="<?= set_value('judul-jasa'); ?>">
                    <small id="emailHelp" class="form-text text-danger"><?= form_error('judul-jasa'); ?></small>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="harga-jasa">Harga</label>
                        <input type="text" class="form-control shadow" id="harga-jasa" placeholder="Rp. " name="harga-jasa" value="<?= set_value('harga-jasa'); ?>">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('harga-jasa'); ?></small>
                    </div>
                    <div class="form-group col">
                        <label for="pengerjaan-jasa">Lama pengerjaan</label>
                        <select id="pengerjaan-jasa" class="form-control shadow" name="pengerjaan-jasa">
                            <option value="choose" selected>Pilih...</option>
                            <?php for ( $i = 1; $i <= 15; $i++) : ?>
                            <option value="<?= $i; ?>"><?= $i; ?> hari</option>
                            <?php endfor; ?>
                        </select>
                        <small id="emailHelp" class="form-text text-danger shadow"><?= form_error('pengerjaan-jasa'); ?></small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="foto-jasa">Foto jasa (thumbnail)</label>
                        <input type="file" class="form-control-file" id="foto-jasa" name="foto-jasa" value="<?= form_error('foto-jasa'); ?>">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('foto-jasa'); ?></small>
                    </div>
                    
                    <div class="form-group col">
                        <label for="jenis-jasa">Jenis Jasa</label>
                        <select id="jenis-jasa" class="form-control shadow" name="jenis-jasa">
                            <?php foreach ( $profesi as $p ) : ?>
                                <option value="<?= $p['id_jenis']; ?>"><?= $p['nama_jenis']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi-jasa">Deskripsi</label>
                    <textarea class="form-control shadow" id="deskripsi-jasa" rows="3" name="deskripsi-jasa"></textarea>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
              <?php form_close(); ?>
            </div>
          </div>
        </div>
      </div>

      <!-- MODAL HAPUS -->
       <!-- Modal -->
       <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalHapus">Hapus Jasa?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Anda yakin untuk menghapus ini?
            </div>
            <div class="modal-footer">
              <form action="<?= base_url('seller/hapusJasa'); ?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Hapus</button>
              </form>
            </div>
          </div>
        </div>
      </div>