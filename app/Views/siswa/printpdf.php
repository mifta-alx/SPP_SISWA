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
            foreach ($users as $tampil) {
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
</body>