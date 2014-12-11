$halaman = $_GET['halaman'];
/**
 * Halaman Front-end
 */
// Pengaturan Akun Mahasiswa
if ($halaman == 'profil-mahasiswa') {
    $title = "Profil Mahasiswa";
    include 'header.php';
    include 'profil-mahasiswa.php';
    include 'footer.php';

// Pengaturan Akun Dosen
} elseif ($halaman == 'profil-dosen') {
    $title = "Profil Dosen";
    include 'header.php';
    include 'profil-dosen.php';
    include 'footer.php';

// Tambah Materi (Dosen)
} elseif ($halaman == 'tambah-materi') {
    $title = "Tambah Materi";
    include 'header.php';
    include 'tambah-materi.php';
    include 'footer.php';

// Lihat Semua Materi (Dosen)
} elseif ($halaman == 'semua-materi') {
    $title = "Daftar Semua Materi";
    include 'header.php';
    include 'semua-materi.php';
    include 'footer.php';

// Rubah Materi (Dosen)
} elseif ($halaman == 'rubah-materi') {
    $title = "Rubah Materi";
    include 'header.php';
    include 'rubah-materi.php';
    include 'footer.php';

// Hapus Materi (Dosen)
} elseif ($halaman == 'hapus-materi') {
    $title = "Hapus Materi";
    include 'header.php';
    include 'hapus-materi.php';
    include 'footer.php';

// Tambah Nilai (Dosen)
} elseif ($halaman == 'tambah-nilai') {
    $title = "Tambah Nilai";
    include 'header.php';
    include 'tambah-nilai.php';
    include 'footer.php';

// Lihat Semua Nilai (Dosen)
} elseif ($halaman == 'semua-nilai') {
    $title = "Daftar Semua Nilai";
    include 'header.php';
    include 'semua-nilai.php';
    include 'footer.php';

// Rubah Nilai (Dosen)
} elseif ($halaman == 'rubah-nilai') {
    $title = "Rubah Nilai";
    include 'header.php';
    include 'rubah-nilai.php';
    include 'footer.php';

// Hapus Nilai (Dosen)
} elseif ($halaman == 'hapus-nilai') {
    $title = "Hapus Nilai";
    include 'header.php';
    include 'hapus-nilai.php';
    include 'footer.php';

// Tambah Quiz (Dosen)
} elseif ($halaman == 'tambah-quiz') {
    $title = "Tambah Quiz";
    include 'header.php';
    include 'tambah-quiz.php';
    include 'footer.php';

// Lihat Semua Quiz (Dosen)
} elseif ($halaman == 'semua-quiz') {
    $title = "Daftar Semua Quiz";
    include 'header.php';
    include 'semua-quiz.php';
    include 'footer.php';

// Rubah Quiz (Dosen)
} elseif ($halaman == 'rubah-quiz') {
    $title = "Rubah Quiz";
    include 'header.php';
    include 'rubah-quiz.php';
    include 'footer.php';

// Hapus Quiz (Dosen)
} elseif ($halaman == 'hapus-quiz') {
    $title = "Hapus Quiz";
    include 'header.php';
    include 'hapus-quiz.php';
    include 'footer.php';

// Lihat Kartu Hasil Studi (Mahasiswa)
} elseif ($halaman == 'lihat-khs') {
    $title = "Lihat Kartu Hasil Studi Mahasiswa";
    include 'header.php';
    include 'lihat-khs.php';
    include 'footer.php';

// Lihat Materi (Mahasiswa)
} elseif ($halaman == 'lihat-materi') {
    $title = "Lihat Materi Pembelajaran";
    include 'header.php';
    include 'lihat-materi.php';
    include 'footer.php';

// Lihat Mata Kuliah (Dosen / Mahasiswa)
} elseif ($halaman == 'lihat-mata-kuliah') {
    $title = "Lihat Mata Kuliah";
    include 'header.php';
    include 'lihat-mk.php';
    include 'footer.php';

// Lihat Nilai (Mahasiswa)
} elseif ($halaman == 'lihat-nilai') {
    $title = "Lihat Nilai";
    include 'header.php';
    include 'lihat-nilai.php';
    include 'footer.php';

// Lihat Quiz (Mahasiswa)
} elseif ($halaman == 'lihat-quiz') {
    $title = "Lihat Quiz";
    include 'header.php';
    include 'lihat-quiz.php';
    include 'footer.php';

// Halaman Beranda / Login e-Learning
} else {
    $title = "Selamat Datang di e-Learning Universitas Serang Raya";
    include 'header.php';
    echo '<ul>
        <li><a href="?halaman=akun">Lihat Profil</a></li>
        <li><a href="keluar.php">Keluar</a></li>
    </ul>';
    include 'footer.php';
}
?>