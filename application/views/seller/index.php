<!-- flashdata -->
<div class="flash-jasa-success" data-flashdata="<?= $this->session->flashdata('jasa-success'); ?>"></div>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Pesanan Baru -->
            <div class="col mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pesanan Baru</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pesanan_baru; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pesanan Diproses -->
            <div class="col-xl-5 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pesanan Diproses</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pesanan_diproses; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">

            <!-- Pesanan Selesai -->
            <div class="col-xl-5 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pesanan Selesai</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pesanan_selesai; ?></div>
                      <div class="row no-gutters align-items-center">
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pesanan Ditolak -->
            <div class="col mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pesanan Ditolak</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pesanan_ditolak; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-window-close fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Total Pendapatan -->
          <div class="row">
            <div class="col">
              <div class="card border-bottom-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Pendapatan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= 'Rp ' . number_format($pendapatan['pendapatan'],0,',','.'); ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col">
              <div class="card border-bottom-dark shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Banyak Jasa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count; ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->
