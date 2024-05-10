<?php
require_once 'dbkoneksi.php';

//membuat kondisi untuk mengedit data pelanggan
if (!empty($_GET['idedit'])) {
    $edit = $_GET['idedit'];
    //untuk menampilkan data dengan perintah select
    $sql = "SELECT * FROM periksa WHERE id=?";
    $st = $dbh->prepare($sql);
    //intruksi untuk menjalankan program
    $st->execute([$edit]);
    //untuk menampilkan baris di setiap data
    $row = $st->fetch();
    } else {
    //untuk membuat data baru
    $row = [];
    };
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Form Periksa</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Form Periksa</h2>
        <form action="proses_periksa.php" method="POST">
            <div class="form-group row">
                <label for="id" class="col-4 col-form-label">ID</label>
                <div class="col-8">
                    <input id="id" name="id" type="number" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal" class="col-4 col-form-label">Tanggal</label>
                <div class="col-8">
                    <input id="tanggal" name="tanggal" type="date" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="berat" class="col-4 col-form-label">Berat</label>
                <div class="col-8">
                    <input id="berat" name="berat" type="number" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="tinggi" class="col-4 col-form-label">Tinggi</label>
                <div class="col-8">
                    <input id="tinggi" name="tinggi" type="number" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="tensi" class="col-4 col-form-label">Tensi</label>
                <div class="col-8">
                    <input id="tensi" name="tensi" type="number" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="keterangan" class="col-4 col-form-label">Keterangan</label>
                <div class="col-8">
                    <input id="keterangan" name="keterangan" type="text" class="form-control">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="pasien_id" class="col-4 col-form-label">Pasien</label>
                <div class="col-8">
                    <?php
                        $sqlpasien_id = "SELECT * FROM pasien";
                        $rspasien_id = $dbh->query($sqlpasien_id);
                    ?>

                    <select id="pasien_id" name="pasien_id" class="custom-select">
                        <?php
                            foreach ($rspasien_id as $rowpasien_id) {
                        ?>
                    <option value="<?= $rowpasien_id['id'] ?>"><?= $rowpasien_id['nama'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="dokter_id" class="col-4 col-form-label">Dokter</label>
                <div class="col-8">
                    <?php
                        $sqldokter_id = "SELECT * FROM paramedik";
                        $rsdokter_id = $dbh->query($sqldokter_id);
                    ?>

                    <select id="dokter_id" name="dokter_id" class="custom-select">
                        <?php
                            foreach ($rsdokter_id as $rowdokter_id) {
                        ?>
                    <option value="<?= $rowdokter_id['id'] ?>"><?= $rowdokter_id['nama'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                <?php
                    //melakukan validasi form
                    $button = (empty($edit)) ? "Simpan" : "Update";
                ?>
                <input type="submit" name="proses" type="submit" class="btn btn-primary" value="<?= $button ?>" />
                <input type="hidden" name="idedit" value="<?= $edit ?>">
                </div>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>

