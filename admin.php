<?php
session_start();

// Periksa apakah sesi login valid
if (!isset($_SESSION['username']) || !isset($_SESSION['login_time'])) {
    header('Location: index.php');
    exit();
}

// Periksa apakah sesi sudah kadaluarsa (5 menit = 300 detik)
if (time() - $_SESSION['login_time'] > 300) {
    session_unset();
    session_destroy();
    echo "<p>Session expired. Please <a href='index.php'>login again</a>.</p>";
    exit();
}

// Jika sesi valid, tampilkan halaman
$username = $_SESSION['username'];
$password = $_SESSION['password'];

echo "<h2>Welcome, admin</h2>";
echo "<p>Thank you, $username, for registering as a **admin**.</p>";
echo "<p><strong>Username:</strong> $username</p>";
echo "<p><strong>Password:</strong> $password</p>";
?>
