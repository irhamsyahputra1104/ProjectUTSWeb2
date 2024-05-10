<?php
require_once 'dbkoneksi.php';
?>
<?php
$_id = $_GET['id'];
// select * from produk where id = $_id;
//$sql = "SELECT a.*,b.nama as jenis FROM produk a
$sql = "SELECT * FROM paramedik WHERE id=?";
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
            <td>Nama</td>
            <td><?= $row['nama'] ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?= $row['gender'] ?></td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td><?= $row['tmp_lahir'] ?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><?= $row['tgl_lahir'] ?></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td><?= $row['kategori'] ?></td>
        </tr>
        <tr>
            <td>No Telpon</td>
            <td><?= $row['telpon'] ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?= $row['alamat'] ?></td>
        </tr>
        <tr>
            <td>Unit Kerja ID</td>
            <td><?= $row['unit_kerja_id'] ?></td>
        </tr>
    </tbody>
</table>