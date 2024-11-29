<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Cek apakah username sudah ada
    $checkQuery = "SELECT * FROM users WHERE username = '$username'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Username sudah digunakan
        echo "<script>
                alert('Registrasi gagal! Username sudah digunakan.');
                window.location.href = 'register.html';
              </script>";
    } else {
        // Tambahkan user baru ke database
        $insertQuery = "INSERT INTO users (id,username, password, created_at) VALUES ('$id','$username', '$password', '$cretaed_at')";
        if (mysqli_query($conn, $insertQuery)) {
            // Registrasi berhasil
            echo "<script>
                    alert('Registrasi berhasil!');
                    window.location.href = 'login.html';
                  </script>";
        } else {
            // Registrasi gagal
            echo "<script>
                    alert('Registrasi gagal! Terjadi kesalahan.');
                    window.location.href = 'register.html';
                  </script>";
        }
    }
}
?>
