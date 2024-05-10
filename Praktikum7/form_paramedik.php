<?php
require_once 'dbkoneksi.php';

//membuat kondisi untuk mengedit data pelanggan
if (!empty($_GET['idedit'])) {
    $edit = $_GET['idedit'];
    //untuk menampilkan data dengan perintah select
    $sql = "SELECT * FROM paramedik WHERE id=?";
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

    <title>Form Paramedik</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Form Paramedik</h2>
        <form action="proses_paramedik.php" method="POST">
            <div class="form-group row">
                <label for="id" class="col-4 col-form-label">ID</label>
                <div class="col-8">
                    <input id="id" name="id" type="number" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama</label>
                <div class="col-8">
                    <input id="nama" name="nama" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-4 col-form-label">Jenis Kelamin</label>
                <div class="col-8">
                    <select id="gender" name="gender" class="custom-select">
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                <div class="col-8">
                    <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                <div class="col-8">
                    <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="kategori" class="col-4 col-form-label">Kategori</label>
                <div class="col-8">
                   <select name="kategori" id="kategori" class="custom-select"  >
                    <option value="Dokter Bedah">Dokter Bedah </option>
                    <option value="Dokter Spesialis Kulit">Dokter Spesialis Kulit</option>
                    <option value="Dokter Spesialis Penyakit Dalam">Dokter Spesialis Penyakit Dalam</option>
                    <option value="Dokter Gigi">Dokter Gigi</option>
                    <option value="Perawat">Perawat</option>
                   </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="telpon" class="col-4 col-form-label">Telpon</label>
                <div class="col-8">
                    <input id="telpon" name="telpon" type="number" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-4 col-form-label">Alamat</label>
                <div class="col-8">
                    <input id="alamat" name="alamat" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="unitkerja_id" class="col-4 col-form-label">Unit Kerja</label>
                <div class="col-8">
                    <?php
                        $sqlunitkerja_id = "SELECT * FROM unit_kerja";
                        $rsunitkerja_id = $dbh->query($sqlunitkerja_id);
                    ?>

                    <select id="unitkerja_id" name="unitkerja_id" class="custom-select">
                        <?php
                            foreach ($rsunitkerja_id as $rowunitkerja_id) {
                        ?>
                    <option value="<?= $rowunitkerja_id['id'] ?>"><?= $rowunitkerja_id['nama'] ?></option>
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

