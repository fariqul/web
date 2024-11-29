<?php
session_start();
// Cek jika user belum login, arahkan ke login page
if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <p>You have successfully logged in.</p>
</body>
</html>
