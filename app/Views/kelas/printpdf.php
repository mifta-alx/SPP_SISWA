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
                <th>ID Kelas</th>
                <th>Nama Kelas</th>
                <th>Kompetensi Keahlian</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?php
            $no = 1;
            foreach ($users as $tampil) {
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
</body>