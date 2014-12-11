<?php
include 'inc/Autoloader.php';
$url = $_GET['halaman'];

/**
 * Halaman Administrator / Back-end
 */
// Pengaturan Akun Administrator
if ($url == 'akun') {
    $title = "Pengaturan Akun";
    include 'header.php';
    include 'lihat-profil.php';
    include 'footer.php';

// Tambah Kelas
} elseif ($url == 'tambah-kelas') {
    $title = "Tambah Kelas";
    include 'header.php';
    include 'tambah-kelas.php';
    include 'footer.php';

// Lihat Semua Kelas
} elseif ($url == 'lihat-kelas') {
    $title = "Lihat Kelas";
    include 'header.php';
    include 'daftar-kelas.php';
    include 'footer.php';

// Rubah Kelas
} elseif ($url == 'rubah-kelas') {
    $title = "Rubah Kelas";
    include 'header.php';
    include 'rubah-kelas.php';
    include 'footer.php';

// Hapus Kelas
} elseif ($url == 'hapus-kelas') {
    $title = "Hapus Kelas";
    include 'header.php';
    include 'hapus-kelas.php';
    include 'footer.php';

// Tambah Dosen
} elseif ($url == 'tambah-dosen') {
    $title = "Tambah Dosen";
    include 'header.php';
    include 'tambah-dosen.php';
    include 'footer.php';

// Lihat Semua Dosen
} elseif ($url == 'lihat-dosen') {
    $title = "Daftar Dosen";
    include 'header.php';
    include 'daftar-dosen.php';
    include 'footer.php';

// Rubah Dosen
} elseif ($url == 'rubah-dosen') {
    $title = "Rubah Dosen";
    include 'header.php';
    include 'rubah-dosen.php';
    include 'footer.php';

// Hapus Dosen
} elseif ($url == 'hapus-dosen') {
    $title = "Hapus Dosen";
    include 'header.php';
    include 'hapus-dosen.php';
    include 'footer.php';

// Halaman Beranda / Login Administrator
} else {
    $title = "Dashboard - e-Learning Universitas Serang Raya";
    include 'header.php';
    echo '<ul>
        <li><a href="?halaman=akun">Lihat Profil</a></li>
        <li><a href="?halaman=tambah-kelas">Tambah Kelas</a></li>
        <li><a href="?halaman=lihat-kelas">Daftar Kelas</a></li>
        <li><a href="?halaman=tambah-dosen">Tambah Dosen</a></li>
        <li><a href="?halaman=lihat-dosen">Daftar Dosen</a></li>
        <li><a href="?halaman=akun">Lihat Profil</a></li>
        <li><a href="keluar.php">Keluar</a></li>
    </ul>';
    include 'footer.php';
}
?>