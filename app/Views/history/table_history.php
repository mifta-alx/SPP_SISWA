<link href="<?= base_url() ?>/siswastyle/style.css" rel="stylesheet">
<!-- Begin Page Content -->
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
            <a href="<?= base_url('history/printpdf'); ?>" target="_blank" class="d-sm-inline-block btn btn-sm shadow-sm report" ><i class="feather-download"></i> Generate Report</a>
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
        <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Data Tabel Riwayat Pembayaran SPP</h6>

        </div> -->
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table table-light table-borderless table-hover" id="tabel-history" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pembayaran</th>
                            <th>ID Petugas</th>
                            <th>NISN</th>
                            <th>Tanggal Bayar</th>
                            <th>Bulan Dibayar</th>
                            <th>Tahun Dibayar</th>
                            <th>ID SPP</th>
                            <th>Jumlah Bayar</th>
                            <th>Jumlah Dibayar</th>
                            <th>Sisa</th>
                            <th>Status</th>
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
                                <td><?= $tampil['id_petugas']; ?></td>
                                <td><?= $tampil['nisn']; ?></td>
                                <td><?= $tampil['tgl_bayar']; ?></td>
                                <td><?= $tampil['bulan_dibayar']; ?></td>
                                <td><?= $tampil['tahun_dibayar']; ?></td>
                                <td><?= $tampil['id_spp']; ?></td>
                                <td><?php $angka = $tampil['jumlah_bayar'];
                                    $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                    echo $rupiah;
                                    ?></td>
                                <td><?php $angka = $tampil['jumlah_dibayar'];
                                    $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                    echo $rupiah;
                                    ?></td>
                                <td><?php
                                    if ($tampil['sisa'] == 0) {
                                        $angka = $tampil['sisa'];
                                        $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                        echo $rupiah;
                                    } else {
                                        $angka = $tampil['sisa'];
                                        $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                        echo "<font color='red'>$rupiah</font>";
                                    } ?></td>
                                <td> <?php
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
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";

    $("body").on('click', '.btn-hapus', function() {
        const id = $(this).data("id_pembayaran");
        console.log(id);
        Swal.fire({
            title: "Anda Yakin Ingin?",
            text: "Anda tidak akan dapat mengembalikan ini",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Berhasil!',
                    'Data Berhasil Dihapus.',
                    'success',
                );
                fetch(`${base_url}/pembayaran/hapus/${id}`).then(() => {
                    window.location.reload();
                });
            }
        })
    });
</script>