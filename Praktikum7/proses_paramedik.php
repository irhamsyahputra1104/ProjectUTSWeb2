<?php
require_once 'dbkoneksi.php'; // File untuk menghubungkan ke database

// Menangkap data yang dikirimkan melalui form
if (isset($_POST['proses'])) {
    $_nama = $_POST['nama'];
    $_gender = $_POST['gender'];
    $_tmp_lahir = $_POST['tmp_lahir'];
    $_tgl_lahir = $_POST['tgl_lahir'];
    $_kategori = $_POST['kategori'];
    $_telpon = $_POST['telpon'];
    $_alamat = $_POST['alamat'];
    $_unit_kerja_id = $_POST['unitkerja_id'];
    $_proses = $_POST['proses'];

    // array data untuk prepared statement
    $ar_data = [
        $_nama,
        $_gender,
        $_tmp_lahir,
        $_tgl_lahir,
        $_kategori,
        $_telpon,
        $_alamat,
        $_unit_kerja_id
    ];

    if ($_proses == "Simpan") {
        // Query untuk insert data baru
        $sql = "INSERT INTO paramedik ( nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    } elseif ($_proses == "Update") {
        // Tambahan idedit untuk proses update
        $_idedit = $_POST['idedit'];
        $ar_data[] = $_idedit; // id untuk kondisi WHERE
        // Query untuk update data
        $sql = "UPDATE paramedik 
                SET nama=?, gender=?, tmp_lahir=?, tgl_lahir=?, kategori=?, telpon=?, alamat=?, unit_kerja_id=? 
                WHERE id=?";
    }

    if (isset($sql)) {
        try {
            $stmt = $dbh->prepare($sql);
            $stmt->execute($ar_data);
            // Redirect ke halaman list_paramedik.php setelah berhasil melakukan operasi
            header('Location: list_paramedik.php');
            exit;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage()); // Tangani error jika query gagal dieksekusi
        }
    }
} else {
    die("Proses tidak valid."); // Jika $_POST['proses'] tidak terdefinisi atau tidak valid
}
?>
