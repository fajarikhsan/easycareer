<!-- FLASHDATA -->
<div class="flash-pesanan-diterima" data-flashdata="<?= $this->session->flashdata('pesanan-diterima'); ?>"></div>
<div class="flash-pesanan-ditolak" data-flashdata="<?= $this->session->flashdata('pesanan-ditolak'); ?>"></div>
<div class="flash-upload-kosong" data-flashdata="<?= $this->session->flashdata('hasil-kosong'); ?>"></div>
<div class="flash-upload-success" data-flashdata="<?= $this->session->flashdata('hasil-success'); ?>"></div>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
          </div>

          <ul class="nav nav-pills mb-3 bg-light" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-baru-tab" data-toggle="pill" href="#pills-baru" role="tab" aria-controls="pills-baru" aria-selected="true">Pesanan Baru</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-proses-tab" data-toggle="pill" href="#pills-proses" role="tab" aria-controls="pills-proses" aria-selected="false">Pesanan Diproses</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-selesai-tab" data-toggle="pill" href="#pills-selesai" role="tab" aria-controls="pills-selesai" aria-selected="false">Pesanan Selesai</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-tolak-tab" data-toggle="pill" href="#pills-tolak" role="tab" aria-controls="pills-tolak" aria-selected="false">Pesanan Ditolak</a>
            </li>
        </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-baru" role="tabpanel" aria-labelledby="pills-baru-tab">
                    <table class="table table-hover">
                    <?php if ( $pesanan_baru ) : ?>
                        <?php foreach ( $pesanan_baru as $m ) : ?>
                            <thead class="thead-blue">
                                <tr>
                                <th scope="col" colspan="4">Id Pesanan : <?= $m['id_transaksi']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="shadow">
                                    <td class="td-width" width="20%"><img src="<?= base_url('assets/foto/jasa/' . $m['foto_jasa']); ?>" alt="" class="img-thumbnail img-jasa"></td>
                                    <td width="40%" class="align-middle"><?= $m['judul_jasa'] ?></td>
                                    <td width="20%" class="text-center align-middle">
                                        <?= 'Rp ' . number_format($m['harga'],0,',','.'); ?>
                                    </td>
                                    <td width="20%" class="align-middle">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-detail" data-toggle="modal" data-target="#detailModal" data-id="<?= $m['id_transaksi']; ?>" data-jasa="<?= $m['id_jasa']; ?>">
                                            Lihat detail
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4">
                                    <h4>Data Kosong...</h4>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="pills-proses" role="tabpanel" aria-labelledby="pills-proses-tab">
                    <table class="table table-hover">
                    <?php if ( $pesanan_diproses ) : ?>
                        <?php foreach ( $pesanan_diproses as $m ) : ?>
                            <thead class="thead-blue">
                                <tr>
                                <th scope="col" colspan="4">Id Pesanan : <?= $m['id_transaksi']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="shadow">
                                    <td class="td-width" width="20%"><img src="<?= base_url('assets/foto/jasa/' . $m['foto_jasa']); ?>" alt="" class="img-thumbnail img-jasa"></td>
                                    <td width="40%" class="align-middle"><?= $m['judul_jasa'] ?></td>
                                    <td width="20%" class="text-center align-middle">
                                        <?= 'Rp ' . number_format($m['harga'],0,',','.'); ?>
                                    </td>
                                    <td width="20%" class="align-middle">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-hasil" data-toggle="modal" data-target="#hasilModal" data-id="<?= $m['id_transaksi']; ?>">
                                            Upload Hasil
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4">
                                    <h4>Data Kosong...</h4>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="pills-selesai" role="tabpanel" aria-labelledby="pills-selesai-tab">
                    <table class="table table-hover">
                    <?php if ( $pesanan_selesai ) : ?>
                        <?php foreach ( $pesanan_selesai as $m ) : ?>
                            <thead class="thead-blue">
                                <tr>
                                <th scope="col" colspan="4">Id Pesanan : <?= $m['id_transaksi']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="shadow">
                                    <td class="td-width" width="20%"><img src="<?= base_url('assets/foto/jasa/' . $m['foto_jasa']); ?>" alt="" class="img-thumbnail img-jasa"></td>
                                    <td width="40%" class="align-middle"><?= $m['judul_jasa'] ?></td>
                                    <td width="20%" class="text-center align-middle">
                                        <?= 'Rp ' . number_format($m['harga'],0,',','.'); ?>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4">
                                    <h4>Data Kosong...</h4>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="pills-tolak" role="tabpanel" aria-labelledby="pills-tolak-tab">
                    <table class="table table-hover">
                    <?php if ( $pesanan_ditolak ) : ?>
                        <?php foreach ( $pesanan_ditolak as $m ) : ?>
                            <thead class="thead-blue">
                                <tr>
                                <th scope="col" colspan="4">Id Pesanan : <?= $m['id_transaksi']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="shadow">
                                    <td class="td-width" width="20%"><img src="<?= base_url('assets/foto/jasa/' . $m['foto_jasa']); ?>" alt="" class="img-thumbnail img-jasa"></td>
                                    <td width="40%" class="align-middle"><?= $m['judul_jasa'] ?></td>
                                    <td width="20%" class="text-center align-middle">
                                        <?= 'Rp ' . number_format($m['harga'],0,',','.'); ?>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4">
                                    <h4>Data Kosong...</h4>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
          
        </div>
        <!-- /.container-fluid -->

         <!-- Modals -->
<!-- MODAL PESAN -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Detail Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group text-center">
                        <label for="detail-pekerjaan">Detail pekerjaan</label>
                        <textarea class="form-control detail-pekerjaan mt-2" id="detail-pekerjaan" rows="3" name="detail-pekerjaan" disabled></textarea>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row mt-5 justify-content-center mb-2">
                <div class="col">
                    <h6>Tentang Customer</h6>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-3 mr-5">
                    <div class="row">
                        <div class="col-3">
                            <img src="" alt="..." class="img-thumbnail rounded-circle foto-detail" width="80" height="80">
                        </div>
                        <div class="col">
                            <h5 class="username"></h5>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="row">
                        <div class="col text-right">
                            <form action="<?= base_url('seller/terimaPesanan'); ?>" method="post">
                                <input type="hidden" name="id-transaksi" id="id-transaksi">
                                <input type="hidden" name="id-jasa" id="id-jasa">
                                <button type="submit" class="btn btn-primary btn-terima ml-5">Terima</button>
                            </form>
                        </div>

                        <div class="col text-left">
                            <form action="<?= base_url('seller/tolakPesanan'); ?>" method="post">
                                <input type="hidden" name="id-transaksi2" id="id-transaksi2">
                                <input type="hidden" name="id-jasa2" id="id-jasa2">
                                <button type="submit" class="btn btn-danger btn-tolak ml-5">Tolak</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hasil -->
<div class="modal fade" id="hasilModal" tabindex="-1" role="dialog" aria-labelledby="hasilModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hasilModalLabel">Upload Hasil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?= form_open_multipart('seller/uploadFileHasil'); ?>
          <input type="hidden" name="id_jasa" id="id_jasa">
          <input type="hidden" name="id_transaksi" id="id_transaksi">
            <div class="form-group">
                <label for="uploadHasil">File hasil (*.rar atau *.zip) </label>
                <input type="file" class="form-control-file" id="uploadHasil" name="uploadHasil">
                <small class="form-text text-danger"><?= form_error('uploadHasil'); ?></small>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Upload</button>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>