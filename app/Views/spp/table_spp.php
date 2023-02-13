<link href="<?= base_url() ?>/siswastyle/style.css" rel="stylesheet">
<!-- Begin Page Content -->
<div class="container-fluid">
    
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-3">
    <ol class="breadcrumb">
            <h1 class="breadcrumb-title"><?= $title; ?></h1>
            <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>"><i class="las la-home" ></i></a></li>
            <li class="breadcrumb-item">SPP</li>
            <li class="breadcrumb-item"><?= $title; ?></li>
        </ol>
        <?php if (session()->get('level') == 'admin') { ?>
            <a href="<?= base_url('spp/printpdf'); ?>" target="_blank" class="d-sm-inline-block btn btn-sm shadow-sm report" ><i class="feather-download"></i> Generate Report</a>
        <?php } ?>
        </div>
<!-- <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <h1 class="breadcrumb-title"><?= $title; ?></h1>
            <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>"><i class="las la-home" ></i></a></li>
            <li class="breadcrumb-item">SPP</li>
            <li class="breadcrumb-item"><?= $title; ?></li>
        </ol>
    </div> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-light table-borderless table-hover" id="tabel-spp" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID SPP</th>
                            <th>Tahun</th>
                            <th>Nominal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $no = 1;
                        foreach ($users as $tampil) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $tampil['id_spp']; ?></td>
                                <td><?= $tampil['tahun']; ?></td>
                                <td><?php $angka = $tampil['nominal'];
                                    $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                    echo $rupiah;
                                    ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url('spp/edit/' . $tampil['id_spp']); ?>" class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" onclick="hapus('<?= $tampil['id_spp']; ?>')" class="btn btn-sm btn-danger btn-delete" data-id_spp="<?= $tampil['id_spp']; ?>" id="btn-delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <!-- <a href="" class="btn btn-sm btn-danger btn-delete" data-id_spp="<?= $tampil['id_spp']; ?>" id="btn-delete">
                                            <i class="fa fa-trash"></i>
                                        </a> -->
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->