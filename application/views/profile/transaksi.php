<!-- FLASHDATA -->
<div class="flash-pesan-berhasil" data-flashdata="<?= $this->session->flashdata('pesan-berhasil'); ?>"></div>
<div class="flash-bayar-berhasil" data-flashdata="<?= $this->session->flashdata('bayar-success'); ?>"></div>
<div class="flash-rating-error" data-flashdata="<?= $this->session->flashdata('rating-error'); ?>"></div>
<div class="flash-rating-success" data-flashdata="<?= $this->session->flashdata('rating-success'); ?>"></div>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
          </div>

          <ul class="nav nav-pills mb-3 bg-light" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-baru-tab" data-toggle="pill" href="#pills-baru" role="tab" aria-controls="pills-baru" aria-selected="true">Menunggu pembayaran</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-konfirmasi-tab" data-toggle="pill" href="#pills-konfirmasi" role="tab" aria-controls="pills-baru" aria-selected="true">Menunggu konfirmasi</a>
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
                        <?php if ( $menunggu_pembayaran ) : ?>
                        <?php foreach ( $menunggu_pembayaran as $m ) : ?>
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
                                        <button type="button" class="btn btn-primary btn-bayar" data-toggle="modal" data-target="#bayarModal" data-id="<?= $m['id_transaksi']; ?>">
                                            Bayar
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
                <div class="tab-pane fade" id="pills-konfirmasi" role="tabpanel" aria-labelledby="pills-baru-tab">
                    <table class="table table-hover">
                    <?php if ( $menunggu_konfirmasi ) : ?>
                        <?php foreach ( $menunggu_konfirmasi as $m ) : ?>
                                <thead class="thead-blue">
                                    <tr>
                                    <th scope="col" colspan="4">Id Pesanan : <?= $m['id_transaksi']; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="shadow">
                                        <td class="td-width" width="20%"><img src="<?= base_url('assets/foto/jasa/' . $m['foto_jasa']); ?>" alt="" class="img-thumbnail img-jasa"></td>
                                        <td width="40%" class="align-middle"><?= $m['judul_jasa'] ?></td>
                                        <td width="40%" class="text-center align-middle">
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
                                        <td width="40%" class="text-center align-middle">
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
                <div class="tab-pane fade" id="pills-selesai" role="tabpanel" aria-labelledby="pills-selesai-tab">
                    <table class="table table-hover">
                    <?php if ( $pesanan_selesai ) : ?>
                        <?php foreach ( $pesanan_selesai as $m ) : ?>
                                <thead class="thead-blue">
                                    <tr>
                                    <th scope="col" colspan="5">Id Pesanan : <?= $m['id_transaksi']; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="shadow">
                                        <td class="td-width" width="20%"><img src="<?= base_url('assets/foto/jasa/' . $m['foto_jasa']); ?>" alt="" class="img-thumbnail img-jasa"></td>
                                        <td width="30%" class="align-middle"><?= $m['judul_jasa'] ?></td>
                                        <td width="20%" class="text-center align-middle">
                                            <?= 'Rp ' . number_format($m['harga'],0,',','.'); ?>
                                        </td>
                                        <td width="15%" class="align-middle">
                                        <form action="<?= base_url('Profile/download'); ?>" method="post">
                                        <input type="hidden" name="nama_file" id="nama_file" value="<?= $m['nama_file']; ?>">
                                            <button type="submit" class="btn btn-primary" data-toggle="modal" data-id="<?= $m['id_transaksi']; ?>">
                                                Download
                                            </button>
                                        </form>
                                        </td>
                                        <td width="15%" class="align-middle">
                                            <?php if ( $m['rating'] != null or $m['rating'] != '' ) : ?>
                                                <button type="button" class="btn btn-success btn-ulasan" data-toggle="modal" data-target="#ulasanModal" data-id="<?= $m['id_transaksi']; ?>" disabled>
                                                    Sudah selesai
                                                </button>
                                            <?php else : ?>
                                                <button type="button" class="btn btn-success btn-ulasan" data-toggle="modal" data-target="#ulasanModal" data-id="<?= $m['id_transaksi']; ?>">
                                                    Beri Ulasan
                                                </button>
                                            <?php endif; ?>
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
                                        <td width="40%" class="text-center align-middle">
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
        <!-- Modal Bayar -->
<div class="modal fade" id="bayarModal" tabindex="-1" role="dialog" aria-labelledby="bayarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bayarModalLabel">Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Bayar Pesanan ini?
      </div>
      <div class="modal-footer">
        <form action="<?= base_url('profile/bayar'); ?>" method="post">
            <input type="hidden" name="id-transaksi" id="id-transaksi">
            <input type="hidden" name="total-harga" id="total-harga">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Bayar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- MODAL ULASAN -->
<div class="modal fade" id="ulasanModal" tabindex="-1" role="dialog" aria-labelledby="ulasanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ulasanModalLabel">Pesanan Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container mt-4">
            <div class="row mb-4">
                <div class="col text-center">
                    <img src="" alt="..." class="img-thumbnail img-jasa-ulasan">
                </div>
            </div>

            <div class="row justify-content-center mb-4">
                <div class="col-4 text-center">
                    <h6 class="judul-jasa"></h6>
                </div>
            </div>
            
            <form action="<?= base_url('profile/ulasan'); ?>" method="post">
                <input type="hidden" name="rating" id="rating">
                <input type="hidden" name="id_transaksi" id="id_transaksi">
            <div class="row text-center">
                <div class="col mb-2">
                    Beri penilaian kamu!
                </div>
            </div>

            <div class="row mb-4">
                <div class="col text-center">
                    <center><div id="rateYo" class="mb-2"></div></center>
                    <small class="rating-kosong"></small>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group text-center">
                        <label for="ulasan">Ulasan (optional)</label>
                        <textarea class="form-control ulasan mt-2" id="ulasan" rows="3" name="ulasan"></textarea>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col">
                    <button class="btn btn-primary" type="submit"> Simpan </button>
                </div>
            </div>
            </form>

            <hr>

            <div class="row mt-5 justify-content-center mb-2">
                <div class="col-5">
                    <h6>Tentang Penjual</h6>
                </div>

                <div class="col">
                    <h6>Garansi dari penjual</h6>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-5">
                    <div class="row">
                        <div class="col-3">
                            <img src="" alt="..." class="img-thumbnail rounded-circle foto-seller" width="80" height="80">
                        </div>
                        <div class="col">
                            <h5 class="username"></h5>
                        </div>
                    </div>
                </div>

                <div class="col mr-5">
                    <div class="media">
                        <img src="<?= base_url('assets/img/check.png'); ?>" class="mr-3" alt="..." width="20" height="20">
                        <div class="media-body">
                            <h6 class="mt-0 pengerjaan"></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>