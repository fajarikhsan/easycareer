        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
          </div>

          <div class="container">
            <?= form_open_multipart('seller/tambah_jasa'); ?>
                <div class="form-group">
                    <label for="judul-iklan">Judul Jasa</label>
                    <input type="text" class="form-control shadow" id="judul-iklan" placeholder="Judul" name="judul-jasa" value="<?= set_value('judul-jasa'); ?>">
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
                <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#simpanTambahJasaModal">Simpan</button>

                <!-- MODALS -->
                <div class="modal fade" id="simpanTambahJasaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Simpan?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>
                        <div class="modal-body">Apakah anda yakin untuk menyimpan data ini?</div>
                        <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                    </div>
                </div>

            <?php form_close(); ?>
          </div>

        </div>
        <!-- /.container-fluid -->

