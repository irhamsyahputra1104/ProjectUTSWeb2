<?php
require_once 'dbkoneksi.php'; // File untuk menghubungkan ke database

// Pastikan method POST dan variabel $_POST['proses'] terdefinisi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['proses'])) {
    // Tangkap data yang dikirimkan melalui form
    $_id = $_POST['id'];
    $_tanggal = $_POST['tanggal'];
    $_berat = $_POST['berat'];
    $_tinggi = $_POST['tinggi'];
    $_tensi = $_POST['tensi'];
    $_keterangan = $_POST['keterangan'];
    $_pasien_id = $_POST['pasien_id'];
    $_dokter_id = $_POST['dokter_id'];
    $_proses = $_POST['proses'];

    // Array data untuk prepared statement
    $ar_data = [
        $_tanggal,
        $_berat,
        $_tinggi,
        $_tensi,
        $_keterangan,
        $_pasien_id,
        $_dokter_id
    ];

    // Tentukan aksi berdasarkan nilai $_proses
    if ($_proses == "Simpan") {
        // Query untuk insert data baru (tanpa menyertakan id)
        $sql = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, dokter_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
    } elseif ($_proses == "Update") {
        // Pastikan idedit dan id yang diupdate tidak sama (tidak melakukan update dengan id yang sama)
        if (isset($_POST['idedit']) && $_POST['idedit'] != $_id) {
            $_idedit = $_POST['idedit'];
            $ar_data[] = $_idedit; // id untuk kondisi WHERE
            // Query untuk update data
            $sql = "UPDATE periksa 
                    SET tanggal=?, berat=?, tinggi=?, tensi=?, keterangan=?, pasien_id=?, dokter_id=? 
                    WHERE id=?";
        } else {
            die("ID untuk proses Update tidak valid atau tidak berbeda dengan ID saat ini."); // Tangani jika ID untuk update tidak valid
        }
    }

    // Eksekusi query jika $sql sudah terdefinisi
    if (isset($sql)) {
        try {
            $stmt = $dbh->prepare($sql);
            $stmt->execute($ar_data);
            // Redirect ke halaman list_periksa.php setelah berhasil melakukan operasi
            header('Location: list_periksa.php');
            exit;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage()); // Tangani error jika query gagal dieksekusi
        }
    } else {
        die("Proses tidak valid."); // Tangani jika $_proses tidak terdefinisi atau tidak valid
    }
} else {
    die("Akses tidak sah."); // Tangani jika akses tidak sah atau tidak melalui metode POST
}
?>
