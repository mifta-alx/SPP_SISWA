<link href="<?= base_url() ?>/siswastyle/style.css" rel="stylesheet">
<!-- Begin Page Content -->
<style>
    .nomor {
        width: 3% !important;
        max-width: 3%;
    }

    .data {
        width: 75% !important;

    }

    .tgl {
        width: 15% !important;
        /* max-width: 35%; */
    }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <ol class="breadcrumb">
            <h1 class="breadcrumb-title"><?= $title; ?></h1>
            <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>"><i class="las la-home"></i></a></li>
            <li class="breadcrumb-item">Riwayat</li>
            <li class="breadcrumb-item"><?= $title; ?></li>
        </ol>
        <?php if (session()->get('level') == 'admin') { ?>
            <a href="<?= base_url('history/printpdf'); ?>" target="_blank" class="d-sm-inline-block btn btn-sm shadow-sm report"><i class="feather-download"></i> Generate Report</a>
        <?php } ?>
    </div>
    <!-- <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <h1 class="breadcrumb-title"><?= $title; ?></h1>
            <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>"><i class="las la-home"></i></a></li>
            <li class="breadcrumb-item">Riwayat</li>
            <li class="breadcrumb-item"><?= $title; ?></li>
        </ol>
    </div> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body" style="color: black;">
            <table class="table table-light table-borderless table-hover" id="tabel-history" width="100%" cellspacing="0">
                <!-- <div class="card-title" style="color: black;">Riwayat Pembayaran</div> -->

                <?php
                $no = 1 + (2 * ($currentPage - 1));
                foreach ($users as $tampil) {
                ?>
                        <?php if (session()->get('level') == 'admin' || session()->get('level') == 'petugas') { ?>
                    <div class="riwayat row">
                            <div class="col nomor"><?= $no++; ?>.</div>
                            <div class="col data">
                                <div class="text-uppercase">
                                    <div class="txtr">NISN : <?= $tampil['nisn']; ?></div>
                                    <div class="txtr">Nama : <?= $tampil['nama']; ?></div>
                                    <div class="txtr">Kelas : <?= $tampil['nama_kelas']; ?></div>
                                </div>
                                <div class="txtr">Petugas : <?= $tampil['nama_petugas']; ?></div>
                                <div class="txtr">SPP Bulan : <b class="text-capitalize"><?= $tampil['bulan_dibayar']; ?> <?= $tampil['tahun_dibayar']; ?></b></div>

                                <div class="txtr">Nominal SPP : <?php $angka = $tampil['jumlah_bayar'];
                                                                $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                                                echo $rupiah;
                                                                ?></div>
                                <div class="txtr">Jumlah Bayar : <?php $angka = $tampil['jumlah_dibayar'];
                                                                    $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                                                    echo $rupiah;
                                                                    ?></div>
                                <div class="txtr">Sisa : <?php
                                                            if ($tampil['sisa'] == 0) {
                                                                $angka = $tampil['sisa'];
                                                                $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                                                echo $rupiah;
                                                            } else {
                                                                $angka = $tampil['sisa'];
                                                                $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                                                echo "<font color='red'>$rupiah</font>";
                                                            } ?></div>
                                <div class="txtr">Status : <?php
                                                            if ($tampil['status'] == 'Belum Lunas') {
                                                                $badge = $tampil['status'];
                                                                $coba = "<span class='shadow-none badge badge-warning'>" . $badge . "</span>";
                                                                echo $coba;
                                                            } else {
                                                                $badge = $tampil['status'];
                                                                $coba = "<span class='shadow-none badge badge-success'>" . $badge . "</span>";
                                                                echo $coba;
                                                            }
                                                            ?>
                                </div>
                            </div>
                            <div class="col tgl">

                                <div class="float-right txtr">
                                    <?php
                                    if ($tampil['status'] == 'Belum Lunas') {
                                        $tgl = "<i class='las la-times text-white' style='background-color: var(--danger); border-radius:100px;'></i> " . $tampil['tgl_bayar'];
                                        echo $tgl;
                                    } else {
                                        $tgl = "<i class='las la-check text-white' style='background-color: var(--success); border-radius:100px;'></i> " . $tampil['tgl_bayar'];
                                        echo $tgl;
                                    }
                                    ?>
                                    <!-- <i class="las la-check text-success"></i> <?= $tampil['tgl_bayar'] ?> -->
                                </div>
                            </div>
                    </div>
                    <hr>
                        <?php } ?>
                <?php } ?>
                <?php if (session()->get('level') == 'siswa') { ?>
                    <?php
                    $no = 1;
                    foreach ($riwayatsiswa as $tampil) {
                    ?>
                        <div class="riwayat row">
                            <div class="col nomor"><?= $no++; ?>.</div>
                            <div class="col data">
                                <div class="text-uppercase">
                                    <div class="txtr">id pembayaran : <?= $tampil->id_pembayaran; ?></div>
                                    <div class="txtr">NISN : <?= $tampil->nisn; ?></div>
                                    <div class="txtr">Nama : <?= $tampil->nama; ?></div>
                                    <div class="txtr">Kelas : <?= $tampil->nama_kelas; ?></div>
                                </div>
                                <div class="txtr">Petugas : <?= $tampil->nama_petugas; ?></div>
                                <div class="txtr">SPP Bulan : <b class="text-capitalize"><?= $tampil->bulan_dibayar; ?> <?= $tampil->tahun_dibayar; ?></b></div>

                                <div class="txtr">Nominal SPP : <?php $angka = $tampil->jumlah_bayar;
                                                                $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                                                echo $rupiah;
                                                                ?></div>
                                <div class="txtr">Jumlah Bayar : <?php $angka = $tampil->jumlah_dibayar;
                                                                    $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                                                    echo $rupiah;
                                                                    ?></div>
                                <div class="txtr">Sisa : <?php
                                                            if ($tampil->sisa == 0) {
                                                                $angka = $tampil->sisa;
                                                                $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                                                echo $rupiah;
                                                            } else {
                                                                $angka = $tampil->sisa;
                                                                $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                                                echo "<font color='red'>$rupiah</font>";
                                                            } ?></div>
                                <div class="txtr">Status : <?php
                                                            if ($tampil->status == 'Belum Lunas') {
                                                                $badge = $tampil->status;
                                                                $coba = "<span class='shadow-none badge badge-warning'>" . $badge . "</span>";
                                                                echo $coba;
                                                            } else {
                                                                $badge = $tampil->status;
                                                                $coba = "<span class='shadow-none badge badge-success'>" . $badge . "</span>";
                                                                echo $coba;
                                                            }
                                                            ?>
                                </div>
                            </div>
                            <div class="col tgl">

                                <div class="float-right txtr">
                                    <?php
                                    if ($tampil->status == 'Belum Lunas') {
                                        $tgl = "<i class='las la-times text-white' style='background-color: var(--danger); border-radius:100px;'></i> " . $tampil->tgl_bayar;
                                        echo $tgl;
                                    } else {
                                        $tgl = "<i class='las la-check text-white' style='background-color: var(--success); border-radius:100px;'></i> " . $tampil->tgl_bayar;
                                        echo $tgl;
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                        <hr>
                    <?php } ?>
                    <!-- Pagination -->
                    <!-- @if($pembayaran->lastPage() != 1)
        <div class="btn-group float-right">		
            <a href="{{ $pembayaran->previousPageUrl() }}" class="btn btn-success">
                <i class="mdi mdi-chevron-left"></i>
						    </a>
						    @for($i = 1; $i <= $pembayaran->lastPage(); $i++)
								<a class="btn btn-success {{ $i == $pembayaran->currentPage() ? 'active' : '' }}" href="{{ $pembayaran->url($i) }}">{{ $i }}</a>
                                @endfor
					        <a href="{{ $pembayaran->nextPageUrl() }}" class="btn btn-success">
								<i class="mdi mdi-chevron-right"></i>
							</a>
					   </div>
					@endif -->
                    <!-- End Pagination -->
                    <?php if ($hitung == 0) {
                        echo "<div class='text-center'>Tidak ada histori pembayaran</div>";
                    } ?>
                    <?php if (session()->get('level') == 'admin' || session()->get('level') == 'petugas') { ?>
                        <div class="container mt-3">
                            <?= $pager->links('riwayat', 'riwayat_pagination'); ?>
                        </div>
                    <?php } ?>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>