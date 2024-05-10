<?php
require_once 'dbkoneksi.php';
?>

<?php
$sql = "SELECT * FROM periksa";
$rs = $dbh->query($sql);
?>

<a class="btn btn-success" href="form_periksa.php" role="button">Tambahkan Data Periksa</a>
<table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Berat</th>
            <th>Tinggi</th>
            <th>Tensi</th>
            <th>Keterangan</th>
            <th>Pasien ID</th>
            <th>Dokter ID</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor  = 1;
        foreach ($rs as $row) {
        ?>
            <tr>
                <td><?= $nomor ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['berat'] ?></td>
                <td><?= $row['tinggi'] ?></td>
                <td><?= $row['tensi'] ?></td>
                <td><?= $row['keterangan'] ?></td>
                <td><?= $row['pasien_id'] ?></td>
                <td><?= $row['dokter_id'] ?></td>
                <td>
                    <a class="btn btn-primary" href="view_periksa.php?id=<?= $row['id'] ?>">View</a>
                    <a class="btn btn-primary" href="form_periksa.php?idedit=<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-primary" href="delete_periksa.php?iddel=<?= $row['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php
            $nomor++;
        }
        ?>
    </tbody>
</table>