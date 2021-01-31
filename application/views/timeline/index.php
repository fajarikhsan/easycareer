<div class="container mt-5">
    <div class="row">
        <!-- <div class="col text-right">
            <button type="button" class="btn btn-secondary filter mt-5 mb-2">Filter</button>
        </div> -->
        
        <div class="col">
            <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                        </svg>
                    </span>
                </div>
                <input type="text" class="form-control" placeholder="Cari" aria-label="Username" aria-describedby="addon-wrapping" id="cari">
            </div>
        </div>

        <div class="col-0 text-right">
            <p>
                <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-funnel-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
                    </svg>
                </button>
            </p>
            <div class="collapse mb-3" id="collapseExample">
                <div class="card card-body">
                    <?php foreach ( $profesi as $p ) : ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input filter-check" type="checkbox" id="filter-jasa" value="<?= $p['id_jenis']; ?>" name="filter[]">
                            <label class="form-check-label" for="<?= $p['id_jenis']; ?>"><?= $p['nama_jenis']; ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="judul-timeline mb-4 mt-4">
        <h3>Easy Career</h3>
    </div>

    <div class="row">
        <div class="col">
            <div class="row justify-content-center" id="hasil-filter">
                <?php foreach ( $data_jasa as $jasa ) : ?>
                    <div class="col col-timeline">
                        <div class="card mt-4 mb-4">
                            <div class="foto-jasa">
                                <img src="<?= base_url('assets/foto/jasa/' . $jasa['foto_jasa']); ?>" class="card-img-top rounded foto-timeline">
                            </div>
                            <div class="card-body">
                                <p class="card-text judul-jasa"><?= $jasa['judul_jasa']; ?></p>
                                <h5 class="card-title"><?= 'Rp ' . number_format($jasa['harga'],0,',','.'); ?></h5>
                                <p class="card-text"><?= $jasa['nama_jenis']; ?></p>
                                <a href="<?= base_url('timeline/detail/' . $jasa['id_jasa']) . '/' . $jasa['id_penyedia']; ?>" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>