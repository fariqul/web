<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "programming_learning";

$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Tangkap data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Cari user berdasarkan username
$sql = "SELECT * FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Verifikasi password
    if (mysqli_num_rows($result) > 0) {
        // Login berhasil
        echo "<script>
                alert('Login berhasil!');
                window.location.href = 'dashboard.html';
              </script>";
    } else {
        // Login gagal
        echo "<script>
                alert('Login gagal! Username atau password salah.');
                window.location.href = 'login.html';
              </script>";
    }
}

$conn->close();
?>
