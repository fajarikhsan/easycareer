<!-- FLASHDATA -->
<div class="flash-pesan-login" data-flashdata="<?= $this->session->flashdata('pesan-login'); ?>"></div>

<div class="flash-detail-kosong" data-flashdata="<?= $this->session->tempdata('detail-kosong'); ?>"></div>

<div class="container mt-5">
    <h2><?= $data_user['nama_jenis']; ?></h2>

    <div class="row mt-5">
        <div class="col text-center">
            <div class="container foto-produk">
                <img src="<?= base_url('assets/foto/jasa/' . $data_user['foto_jasa']); ?>" alt="..." class="img-thumbnail">
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col">
                    <h4><?= $data_user['judul_jasa']; ?></h4>
                </div>
            </div>

            <hr class="mt-5">

            <div class="row">
                <div class="col-2">
                    <h6>Harga</h6>
                </div>
                <div class="col">
                    <?= 'Rp ' . number_format($data_user['harga'], 0, ',', '.'); ?>
                </div>
                <div class="col text-right">
                    <?php if ($this->session->has_userdata('id_penyedia')) : ?>
                    <?php else : ?>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-pesan" data-toggle="modal" data-target="#pesanModal">
                            Pesan
                        </button>
                    <?php endif; ?>
                </div>
            </div>

            <hr class="mb-3">

            <div class="row mb-2">
                <div class="col">
                    <h6>Deskripsi</h6>
                </div>
            </div>
            <div class="row deskripsi">
                <div class="col">
                    <p class="m-2"><?= $data_user['deskripsi_jasa']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-2">
            <h6>Tentang Penjual</h6>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-5">
            <div class="row">
                <div class="col-3">
                    <img src="<?= base_url('assets/foto/profil/' . $data_user['foto_profil']); ?>" alt="..." class="img-thumbnail rounded-circle" width="80" height="80">
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h4><?= $data_user['username']; ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?= $profesi['nama_jenis']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="mt-5">

    <div class="row">
        <div class="col">
            <h6>Ulasan</h6>
        </div>
        <div class="col">
            <h6>Filter</h6>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-1">
                    <?php if (!empty($avg)) : ?>
                        <h5><?= $avg['avg_rating']; ?></h5>
                    <?php endif; ?>
                </div>
                <div class="col-4">
                    <?php if (!empty($avg)) : ?>
                        <input type="hidden" name="avg-rating" id="avg-rating" value="<?= $avg['avg_rating'] ?>">
                    <?php endif; ?>
                    <div id="rating-total"></div>
                </div>
                <div class="col">
                    <?php if (!empty($avg)) : ?>
                        <?= $avg['count_rating']; ?>
                    <?php endif; ?>
                    Order selesai</div>
            </div>
        </div>
        <div class="col">
            <select id="filter-rating" class="form-control form-control-sm" name="filter-rating">
                <option selected value="semua">Semua</option>
                <option value="5">Bintang 5</option>
                <option value="4">Bintang 4</option>
                <option value="3">Bintang 3</option>
                <option value="2">Bintang 2</option>
                <option value="1">Bintang 1</option>
            </select>
        </div>
    </div>

    <hr class="mt-4 mb-4">

    <div class="row">
        <div class="col">
            <ul class="list-group list-group-flush rating-filter">
                <?php foreach ($rating as $r) : ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-1">
                                <img src="<?= base_url('assets/foto/profil/' . $r['foto_profil']); ?>" class="img-thumbnail rounded-circle" width="40" height="40">
                            </div>
                            <div class="col-2">
                                <div class="row">
                                    <div class="col">
                                        <h6><?= $r['username']; ?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <?= $r['tanggal_transaksi']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <span class="fa fa-star checked"> <?= $r['rating']; ?> </span>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <p class="font-weight-normal"><?= $r['ulasan']; ?></p>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>

<!-- MODAL PESAN -->
<!-- Modal -->
<div class="modal fade" id="pesanModal" tabindex="-1" role="dialog" aria-labelledby="pesanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pesanModalLabel">Pesanan Anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container mt-4">
                    <div class="row mb-4">
                        <div class="col text-center">
                            <img src="<?= base_url('assets/foto/jasa/' . $data_user['foto_jasa']); ?>" alt="..." class="img-thumbnail img-jasa">
                        </div>
                    </div>

                    <div class="row justify-content-center mb-5">
                        <div class="col-4 text-center">
                            <h6><?= $data_user['judul_jasa']; ?></h6>
                        </div>
                    </div>

                    <form action="<?= base_url('timeline/pesan') ?>" method="post">
                        <?php $url = explode("/", $_SERVER["REDIRECT_URL"]); ?>
                        <input type="hidden" name="url" id="url" value="<?= $data_user['id_jasa']; ?>">
                        <input type="hidden" name="id-penyedia" id="id-penyedia" value="<?= $data_user['id_penyedia']; ?>">
                        <div class="row justify-content-center">
                            <div class="col-5">
                                <div class="form-group text-center">
                                    <label for="detail-pekerjaan">Detail pekerjaan</label>
                                    <textarea class="form-control detail-pekerjaan mt-2" id="detail-pekerjaan" rows="3" name="detail-pekerjaan"></textarea>
                                    <small id="emailHelp" class="form-text text-danger"><?= form_error('detail-pekerjaan'); ?></small>
                                </div>
                            </div>
                        </div>

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
                                        <img src="<?= base_url('assets/foto/profil/' . $data_user['foto_profil']); ?>" alt="..." class="img-thumbnail rounded-circle" width="80" height="80">
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <h5><?= $data_user['username']; ?></h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <?= $profesi['nama_jenis']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col mr-5">
                                <div class="media">
                                    <img src="<?= base_url('assets/img/check.png'); ?>" class="mr-3" alt="..." width="20" height="20">
                                    <div class="media-body">
                                        <h6 class="mt-0">Waktu pengerjaan maksimal <?= $data_user['pengerjaan']; ?> hari</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-pesan ml-5">Konfirmasi</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>