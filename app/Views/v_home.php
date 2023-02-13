<style>
    .report:hover {
        /* background-color: var(--youngdark); */
        color: white;
    }

    .report {
        background-color: var(--moredark);
        color: #b4bcc8;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0" style="color: #000000; font-size: 21px;">Dashboard</h1>
        <?php if (session()->get('level') == 'admin') { ?>
            <a href="<?= base_url('Home/printpdf'); ?>" target="_blank" class="d-none d-sm-inline-block btn btn-sm shadow-sm report"><i class="feather-download"></i> Generate Report</a>
        <?php } ?>
    </div>
    <!-- <?php if (session()->get('level')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Selamat Datang <strong><?= session()->get('nama_petugas') ?></strong> 
        </div>
        
        <script>
          $(".alert").alert();
        </script>
        <?php endif; ?> -->
    <!-- <?php if (session()->getFlashdata('pesan1')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Selamat datang <strong><?= session()->get('nama_petugas'); ?></strong>
                </div>
            <?php endif; ?> -->

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-content">
                        <div class="w-info">
                            <h6 class="value"><?= $siswa; ?></h6>
                            <p class="mt-1 text-warning">Siswa</p>
                        </div>
                        <div class="">
                            <i class="las la-user-tie text-warning mt-2" style="font-size: 40px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-content">
                        <div class="w-info">
                            <h6 class="value"><?= $kelas; ?></h6>
                            <p class="mt-1 text-info">Kelas</p>
                        </div>
                        <div class="">
                            <i style="font-size: 40px" class="las la-building text-info mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (session()->get('level') == 'admin' || session()->get('level') == 'petugas') { ?>
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-content">
                        <div class="w-info">
                            <h6 class="value"><?= $admin; ?></h6>
                            <p class="mt-1" style="color: var(--dark-grey);">Admin</p>
                        </div>
                        <div class="">
                            <i style="font-size: 40px; color: var(--dark-grey);" class="las la-user-secret mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-content">
                        <div class="w-info">
                            <h6 class="value"><?= $petugas; ?></h6>
                            <p class="mt-1 text-primary">Petugas</p>
                        </div>
                        <div class="">
                            <i style="font-size: 40px" class="las la-user-astronaut text-primary mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if (session()->get('level') == 'admin' || session()->get('level') == 'petugas' || session()->get('level') == 'siswa') { ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-content">
                        <div class="w-info">
                            <h6 class="value"><?= $spp; ?></h6>
                            <p class="mt-1 text-secondary">SPP</p>
                        </div>
                        <div class="">
                            <i style="font-size: 40px;" class="las la-file-invoice-dollar mt-2 text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if (session()->get('level') == 'admin' || session()->get('level') == 'petugas') { ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-content">
                        <div class="w-info">
                            <h6 class="value"><?= $pay; ?></h6>
                            <p class="mt-1" style="color: var(--indigo)">Pembayaran</p>
                        </div>
                        <div class="">
                            <i style="font-size: 40px; color: var(--indigo)" class="las la-shopping-cart mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-content">
                        <div class="w-info">
                            <h6 class="value"><?= $blmlunas; ?></h6>
                            <p class="mt-1 text-danger">Belum Lunas</p>
                        </div>
                        <div class="">
                            <i style="font-size: 40px;" class="las la-times-circle mt-2 text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-content">
                        <div class="w-info">
                            <h6 class="value"><?= $lunas; ?></h6>
                            <p class="mt-1 text-success">Lunas</p>
                        </div>
                        <div class="">
                            <i style="font-size: 40px;" class="las la-check-circle mt-2 text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-content">
                        <div class="w-info">
                            <h6 class="value"><?= $riwayat; ?></h6>
                            <p class="mt-1" style="color: var(--pink);">Riwayat</p>
                        </div>
                        <div class="">
                            <i style="font-size: 40px; color: var(--pink);" class="las la-history mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4"> -->
                <!-- Card Header - Dropdown -->
                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div> -->
                <!-- Card Body -->
                <!-- <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="chartStatus"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                        </span>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
</div>