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

// Tangkap data dari request
$username = $_POST['username'];
$language = $_POST['language'];
$code = $_POST['code'];

// Periksa apakah data untuk user dan bahasa sudah ada
$sql = "SELECT * FROM user_codes WHERE username=? AND language=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $language);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Update data jika sudah ada
    $sql = "UPDATE user_codes SET code=? WHERE username=? AND language=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $code, $username, $language);
} else {
    // Insert data baru jika belum ada
    $sql = "INSERT INTO user_codes (username, language, code) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $language, $code);
}

if ($stmt->execute()) {
    echo "Code saved successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>
