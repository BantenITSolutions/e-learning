<?php
/**
 * Membuat Session untuk Login ke Halaman Administrator jika Username
 * dan Password cocok dalam database.
 */
require 'inc/Autoloader.php';
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

$admin = new Admin($database->conn);
$admin->masuk($username);

if ($admin->password == $password) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['id'] = $admin->id;

    header('location:index.php');
} else {
    // Buat Script menampilkan kesalahan Login
    echo 'Maaf, Username dan Password Salah !!!';
    header('location:index.php');
}
?>