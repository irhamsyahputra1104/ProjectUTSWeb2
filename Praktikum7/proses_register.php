<?php
// Include file koneksi ke database
require_once 'dbkoneksi.php';

// Tangkap data yang dikirimkan melalui form registrasi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash password sebelum disimpan ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Prepare statement untuk insert data ke tabel 'user'
        $stmt = $dbh->prepare("INSERT INTO user (email, username, password) VALUES (?, ?, ?)");
        $stmt->execute([$email, $username, $hashed_password]);

        // Redirect ke halaman login setelah registrasi berhasil
        header("Location: login.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
