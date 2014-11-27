<?php
include 'inc/Autoloader.php';
$url = $_GET['halaman'];
if ($url == 'akun') {
    $title = "Pengaturan Akun";
    include 'header.php';
    include 'lihat-profil.php';
    include 'footer.php';
} else {
    $title = "Dashboard - e-Learning Universitas Serang Raya";
    include 'header.php';
    echo '<ul>
        <li><a href="?halaman=akun">Lihat Profil</a></li>
        <li><a href="keluar.php">Keluar</a></li>
    </ul>';
    include 'footer.php';
}
?>