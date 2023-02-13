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
                <th>ID SPP</th>
                <th>Tahun</th>
                <th>Nominal</th>
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
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>