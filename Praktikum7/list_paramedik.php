<?php
require_once 'dbkoneksi.php';
?>

<?php
$sql = "SELECT * FROM paramedik";
$rs = $dbh->query($sql);
?>

<a class="btn btn-success" href="form_paramedik.php" role="button">Tambahkan Data Dokter</a>
<table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Kategori</th>
            <th>No.Telpon</th>
            <th>Alamat</th>
            <th>Unit Kerja ID</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor  = 1;
        foreach ($rs as $row) {
        ?>
            <tr>
                <td><?= $nomor ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['gender'] ?></td>
                <td><?= $row['tmp_lahir'] ?></td>
                <td><?= $row['tgl_lahir'] ?></td>
                <td><?= $row['kategori'] ?></td>
                <td><?= $row['telpon'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['unit_kerja_id'] ?></td>
                <td>
                    <a class="btn btn-primary" href="view_paramedik.php?id=<?= $row['id'] ?>">View</a>
                    <a class="btn btn-primary" href="form_paramedik.php?idedit=<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-primary" href="delete_paramedik.php?iddel=<?= $row['id'] ?>" onclick="if(!confirm('Anda Yakin Hapus Data Produk <?= $row['nama'] ?>?')) {return false}">Delete</a>
                </td>
            </tr>
        <?php
            $nomor++;
        }
        ?>
    </tbody>
</table>