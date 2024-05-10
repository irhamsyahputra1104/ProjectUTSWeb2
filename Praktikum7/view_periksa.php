<?php
require_once 'dbkoneksi.php';
?>
<?php
$_id = $_GET['id'];
// select * from produk where id = $_id;
//$sql = "SELECT a.*,b.nama as jenis FROM produk a
$sql = "SELECT * FROM periksa WHERE id=?";
$st = $dbh->prepare($sql);
$st->execute([$_id]);
$row = $st->fetch();
?>

<table class="table table-striped">
    <tbody>
        <tr>
            <td>ID</td>
            <td><?= $row['id'] ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><?= $row['tanggal'] ?></td>
        </tr>
        <tr>
        <td>Berat</td>
            <td><?= $row['berat'] ?></td>
        </tr>
        <tr>
            <td>Tinggi</td>
            <td><?= $row['tinggi'] ?></td>
        </tr>
        <tr>
            <td>Tensi</td>
            <td><?= $row['tensi'] ?></td>
        </tr>
        <tr>
        <tr>
            <td>Keterangan</td>
            <td><?= $row['keterangan'] ?></td>
        </tr>
            <td>Pasien ID</td>
            <td><?= $row['pasien_id'] ?></td>
        </tr>
        <tr>
            <td>Dokter ID</td>
            <td><?= $row['dokter_id'] ?></td>
        </tr>
        
    </tbody>
</table>