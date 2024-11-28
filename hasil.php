<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    
    // Ambil data dari form
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $role = htmlspecialchars($_POST['role']);
    
    // Simpan data di sesi
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['login_time'] = time(); // Catat waktu login

    // Redirect ke file sesuai role
    if ($role === 'user') {
        header('Location: user.php');
    } elseif ($role === 'admin') {
        header('Location: admin.php');
    } elseif ($role === 'super_admin') {
        header('Location: superadmin.php');
    } else {
        echo "Invalid role!";
    }
    exit();
} else {
    header('Location: index.php');
    exit();
}
?>
