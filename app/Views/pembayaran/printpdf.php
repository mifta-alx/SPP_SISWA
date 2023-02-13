<head>
    <title><?= $title ?></title>
    <style>
        table {
            text-align: center;
            border-collapse: collapse;
            border-spacing: 2px;
        }
    </style>
</head>

<body>
    <br>
    <table border="1" cellpadding="10" cellspacing="0" style="margin-top:20px;" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pembayaran</th>
                <th>Petugas</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tanggal Bayar</th>
                <th>Bulan Dibayar</th>
                <th>Tahun Dibayar</th>
                <th>ID SPP</th>
                <th>Jumlah Bayar(Rp)</th>
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
                    <td><?= $tampil['nama_kelas']; ?></td>
                    <td><?= $tampil['tgl_bayar']; ?></td>
                    <td><?= $tampil['bulan_dibayar']; ?></td>
                    <td><?= $tampil['tahun_dibayar']; ?></td>
                    <td><?= $tampil['id_spp']; ?></td>
                    <td><?php $angka = $tampil['jumlah_bayar'];
                        $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                        echo $rupiah;
                        ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>