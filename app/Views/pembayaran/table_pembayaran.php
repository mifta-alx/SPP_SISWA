<link href="<?= base_url() ?>/siswastyle/style.css" rel="stylesheet">
<style>
    /* MODAL */
    .judul {
        font-weight: 500;
        font-size: 17px;
        letter-spacing: 0px;
        margin-bottom: 20px;
        color: #515365;
    }

    .judulpay {
        font-weight: 600;
        color: #1b55e2;
        font-size: 20px;
        letter-spacing: 1px;
        margin-bottom: 1px;
    }

    .nominal:read-only {
        border: none;
        background-color: transparent;
        text-align: center;
        font-size: 23px;
        font-weight: 600;
        margin-bottom: 0;
        color: #009688;

    }

    .sisa:read-only {
        border: none;
        background-color: transparent;
        font-weight: 600;
        margin-bottom: 0;
        text-align: right;
        color: #515365;
    }

    .info {
        border-bottom: 1px dashed #bfc9d4;
        padding: 0 0;
        margin-bottom: 18px;
        padding-bottom: 10px;
    }

    .info-sisa {
        border-bottom: 1px dashed #bfc9d4;
        padding: 0 0;
        margin-bottom: 18px;
        padding-bottom: 8px;
    }

    .p-sisa {
        color: #515365;
        font-weight: 600;
    }

    .jumlah_dibayar {
        border: none;
        background-color: transparent;
        text-align: right;
        font-weight: 600;
        color: #515365;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <ol class="breadcrumb">
            <h1 class="breadcrumb-title"><?= $title; ?></h1>
            <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>"><i class="las la-home"></i></a></li>
            <li class="breadcrumb-item">Pembayaran</li>
            <li class="breadcrumb-item"><?= $title; ?></li>
        </ol>
        <?php if (session()->get('level') == 'admin') { ?>
            <a href="<?= base_url('pembayaran/printpdf'); ?>" target="_blank" class="d-sm-inline-block btn btn-sm shadow-sm report"><i class="feather-download"></i> Generate Report</a>
        <?php } ?>
    </div>
    <!-- <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <h1 class="breadcrumb-title"><?= $title; ?></h1>
            <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>"><i class="las la-home"></i></a></li>
            <li class="breadcrumb-item">Pembayaran</li>
            <li class="breadcrumb-item"><?= $title; ?></li>
        </ol>
    </div> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Data Tabel Pembayaran SPP</h6>
        </div> -->
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table table-sm table-light table-borderless table-hover" id="tabel-pay" width="105%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pembayaran</th>
                            <th>Petugas</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal Bayar</th>
                            <th>Bulan Dibayar</th>
                            <th>Tahun Dibayar</th>
                            <th>ID SPP</th>
                            <th>Jumlah Bayar</th>
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
                                <td><?= $tampil['id_pembayaran']; ?></td>
                                <td><?= $tampil['nama_petugas']; ?></td>
                                <td><?= $tampil['nisn']; ?></td>
                                <td><?= $tampil['nama']; ?></td>
                                <td><?= $tampil['tgl_bayar']; ?></td>
                                <td><?= $tampil['bulan_dibayar']; ?></td>
                                <td><?= $tampil['tahun_dibayar']; ?></td>
                                <td><?= $tampil['id_spp']; ?></td>
                                <td><?php $angka = $tampil['jumlah_bayar'];
                                    $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                    echo $rupiah;
                                    ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url('pembayaran/edit/' . $tampil['id_pembayaran']); ?>" class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <?php if ($tampil['sisa']) {
                                            $sisa = $tampil['sisa'];
                                            $sisarp = "Rp " . number_format($sisa, 2, ',', '.');
                                        }
                                        ?>
                                        <?php if ($tampil['sisa']) {
                                            $sisa = $tampil['sisa'];
                                            $sp = "Rp -" . number_format($sisa, 2, ',', '.');
                                        }
                                        ?>
                                        <?php if ($tampil['jumlah_bayar']) {
                                            $sisar = $tampil['jumlah_bayar'];
                                            $sisarb = "Rp " . number_format($sisar, 2, ',', '.');
                                        }
                                        ?>
                                        <?php if ($tampil['jumlah_bayar']) {
                                            $sisar = $tampil['jumlah_bayar'];
                                            $sb = "Rp -" . number_format($sisar, 2, ',', '.');
                                        }
                                        ?>
                                        <a href="#" class="btn btn-sm btn-success btn-sm btn-bayar" data-sisa="<?php if ($tampil['sisa']) {
                                                                                                                    echo $sp;
                                                                                                                } else {
                                                                                                                    echo $sb;
                                                                                                                } ?>" data-nominal="<?= $sisarb; ?>" data-id_pembayaran="<?= $tampil['id_pembayaran'] ?>" data-id_petugas="<?= $tampil['id_petugas']; ?>" data-nama_petugas="<?= $tampil['nama_petugas']; ?>" data-nisn="<?= $tampil['nisn']; ?>" data-nama="<?= $tampil['nama']; ?>" data-nama_kelas="<?= $tampil['nama_kelas']; ?>" data-tgl_bayar="<?= $tampil['tgl_bayar']; ?>" data-bulan_dibayar="<?= $tampil['bulan_dibayar']; ?>" data-tahun_dibayar="<?= $tampil['tahun_dibayar']; ?>" data-id_spp="<?= $tampil['id_spp']; ?>" data-jumlah_bayar="<?= $tampil['jumlah_bayar']; ?>"><i class="fa fa-money"></i></a>
                                        <a href="javascript:void(0)" onclick="hapus('<?= $tampil['id_pembayaran']; ?>')" class="btn btn-sm btn-danger btn-delete" data-id_pembayaran="<?= $tampil['id_pembayaran']; ?>">
                                            <i class="fa fa-trash"></i>
                                        </a>
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
<!-- Modal Edit Product-->
<form action="<?= base_url('pembayaran/pay') ?>" method="post">
    <?= csrf_field(); ?>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" style="width: 400px;" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: var(--moredark);">Bayar SPP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                <div class="modal-body">
                    <h5 class="judul">Info Pembayaran</h5>
                    <div class="form-group">
                        <input type="hidden" class="form-control id_pembayaran" name="id_pembayaran" placeholder="">
                        <input type="hidden" class="form-control id_petugas" name="id_petugas" placeholder="">
                        <input type="hidden" class="form-control nama_petugas" name="nama_petugas" placeholder="">
                        <input type="hidden" class="form-control nisn" name="nisn" placeholder="">
                        <input type="hidden" class="form-control nama" name="nama" placeholder="">
                        <input type="hidden" class="form-control nama_kelas" name="nama_kelas" placeholder="">
                        <input type="hidden" class="form-control tgl_bayar" name="tgl_bayar" placeholder="">
                        <input type="hidden" class="form-control bulan_dibayar" name="bulan_dibayar" placeholder="">
                        <input type="hidden" class="form-control tahun_dibayar" name="tahun_dibayar" placeholder="">
                        <input type="hidden" class="form-control id_spp" name="id_spp" placeholder="">
                        <input type="hidden" class="form-control jumlah_bayar mb-2" name="jumlah_bayar" placeholder="" readonly>
                        <!-- <label for="">Jumlah Tanggungan</label> -->
                        <div class="info">
                            <div class="d-flex justify-content-center">
                                <h5 class="judulpay">Jumlah Bayar</h5>
                            </div>
                            <input type="text" class="form-control nominal mb-2" name="nominal" placeholder="" readonly>
                        </div>
                        <div class="info-sisa">
                            <div class="row">
                                <div class="col-6">
                                    <p class="p-sisa">Sisa</p>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control sisa mb-2" name="sisa" placeholder="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="info-bayar">
                            <div class="row">
                                <div class="col-6">
                                    <label class="p-sisa">Bayar:</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" autocomplete="off" class="form-control jumlah_dibayar" name="jumlah_dibayar" placeholder="Nominal">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row" style="width: 100%;">
                        <div class="col-6 d-flex justify-content-center">
                            <button type="button" class="btn btn-danger" style="width: 87.69px;" data-dismiss="modal">Batal</button>
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>