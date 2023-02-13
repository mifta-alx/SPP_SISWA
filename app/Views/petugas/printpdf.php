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
            foreach ($users as $tampil) {
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
</body>