<?php
session_start();

// Include file koneksi ke database
require_once 'dbkoneksi.php';

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        // Prepare statement untuk mencari user berdasarkan username
        $stmt = $dbh->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Jika username dan password cocok, simpan session user
            $_SESSION["username"] = $user['username'];
            $_SESSION["role"] = $user['role']; // Simpan juga role user

            // Redirect sesuai role ke halaman dashboard
            if ($user['role'] == 'admin') {
                header("Location: dashboard.php");
            } else {
                header("Location: dashboard.php");
            }
            exit;
        } else {
            // Jika username atau password salah
            echo "Login gagal. Periksa kembali username dan password.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
