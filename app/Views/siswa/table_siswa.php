<link href="<?= base_url() ?>/siswastyle/style.css" rel="stylesheet">
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
    <ol class="breadcrumb">
            <h1 class="breadcrumb-title"><?= $title; ?></h1>
            <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>"><i class="las la-home" ></i></a></li>
            <li class="breadcrumb-item">Siswa</li>
            <li class="breadcrumb-item"><?= $title; ?></li>
        </ol>
        <?php if (session()->get('level') == 'admin') { ?>
            <a href="<?= base_url('siswa/printpdf'); ?>" target="_blank" class="d-sm-inline-block btn btn-sm shadow-sm report" ><i class="feather-download"></i> Generate Report</a>
        <?php } ?>
        </div>
    <!-- <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <h1 class="breadcrumb-title"><?= $title; ?></h1>
            <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>"><i class="las la-home" ></i></a></li>
            <li class="breadcrumb-item">Siswa</li>
            <li class="breadcrumb-item"><?= $title; ?></li>
        </ol>
    </div> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <h6 class="m-0 card-title">Data Tabel Siswa</h6>
        </div> -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-light table-borderless table-hover" id="tabel-siswa" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>No.Telepon</th>
                            <th>ID SPP</th>
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
