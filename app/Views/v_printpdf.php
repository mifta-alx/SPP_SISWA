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
<h3>Data Tabel Siswa</h3>
        <table border="1" cellpadding="10" cellspacing="0" style="margin-top:20px;" width="100%" >
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
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $no = 1;
                        foreach ($siswa as $tampil) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $tampil['nisn']; ?></td>
                                <td><?= $tampil['nis']; ?></td>
                                <td><?= $tampil['nama']; ?></td>
                                <td><?= $tampil['nama_kelas']; ?></td>
                                <td><?= $tampil['alamat']; ?></td>
                                <td><?= $tampil['no_telp']; ?></td>
                                <td><?= $tampil['id_spp']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <br>
                <h3>Data Tabel Petugas</h3>
                <table border="1" cellpadding="10" cellspacing="0" style="margin-top:20px;" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Petugas</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Nama Petugas</th>
                            <th>Level</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $no = 1;
                        foreach ($petugas as $tampil) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $tampil['id_petugas']; ?></td>
                                <td><?= $tampil['username']; ?></td>
                                <td><?= $tampil['password']; ?></td>
                                <td><?= $tampil['nama_petugas']; ?></td>
                                <td><?= $tampil['level']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>

                    <br>
                <h3>Data Tabel Kelas</h3>
                <table border="1" cellpadding="10" cellspacing="0" style="margin-top:20px;" width="100%">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Kelas</th>
                            <th>Nama Kelas</th>
                            <th>Kompetensi Keahlian</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $no = 1;
                        foreach ($kelas as $tampil) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $tampil['id_kelas']; ?></td>
                                <td><?= $tampil['nama_kelas']; ?></td>
                                <td><?= $tampil['kompetensi_keahlian']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <br>
                <h3>Data Tabel SPP</h3>
                <table border="1" cellpadding="10" cellspacing="0" style="margin-top:20px;" width="100%">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>ID SPP</th>
                            <th>Tahun</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $no = 1;
                        foreach ($spp as $tampil) {
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $tampil['id_spp']; ?></td>
                                <td><?= $tampil['tahun']; ?></td>
                                <td><?php $angka = $tampil['nominal'];
                                    $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                    echo $rupiah;
                                    ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
                <br>
                <h3>Data Tabel Pembayaran</h3>
                <table border="1" cellpadding="10" cellspacing="0" style="margin-top:20px;" width="100%" >
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
                        foreach ($pembayaran as $tampil) {
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

                <br>
                <h3>Data Tabel Riwayat</h3>
                <table border="1" cellpadding="10" cellspacing="0" style="margin-top:20px;" width="100%" >
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
                            <th>Jumlah Bayar</th>
                            <th>Jumlah Dibayar</th>
                            <th>Sisa</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $no = 1;
                        foreach ($riwayat as $tampil) {
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
                </body>