<link href="<?= base_url() ?>/siswastyle/style.css" rel="stylesheet">
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <ol class="breadcrumb">
            <h1 class="breadcrumb-title"><?= $title; ?></h1>
            <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>"><i class="las la-home"></i></a></li>
            <li class="breadcrumb-item">Petugas</li>
            <li class="breadcrumb-item"><?= $title; ?></li>
        </ol>
        <?php if (session()->get('level') == 'admin') { ?>
            <a href="<?= base_url('petugas/printpdf'); ?>" target="_blank" class="d-sm-inline-block btn btn-sm shadow-sm report"><i class="feather-download"></i> Generate Report</a>
        <?php } ?>
    </div>
    <!-- <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <h1 class="breadcrumb-title"><?= $title; ?></h1>
            <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>"><i class="las la-home" ></i></a></li>
            <li class="breadcrumb-item">Petugas</li>
            <li class="breadcrumb-item"><?= $title; ?></li>
        </ol>
    </div> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Data Tabel Petugas</h6>
        </div> -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-light table-borderless table-hover" id="tabel-petugas" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Petugas</th>
                            <th>Username</th>
                            <!-- <th>Password</th> -->
                            <th>Nama Petugas</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->