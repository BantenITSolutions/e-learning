<?php
/**
 * Data Dosen
 * @return void
 */
class Dosen
{
    private $conn;
    public  $username;
    public  $nama;
    public  $jenis_kelamin;
    public  $alamat;
    public  $tgl_lahir;
    public  $agama;
    public  $email;
    public  $password;
    public  $level;

    /**
    * Mengambil Koneksi Database
    * @param string $db Koneksi Database dengan PDO
    */
    function __construct($db)
    {
        $this->conn = $db;
    }

    /**
    * Validasi Login Dosen & Mahasiswa
    * @param  int $nim Username Login Dosen & Mahasiswa
    * @return void
    */
    public function masuk($table, $where, $username)
    {
        $query = "SELECT * FROM $table WHERE $where = ?";
        $stmt  = $this->conn->prepare($query);
        $stmt->bindParam(1, $username);
        $stmt->execute();

        $hasil = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->username           = $hasil['username'];
        $this->nama          = $hasil['nama'];
        $this->jenis_kelamin = $hasil['jenis_kelamin'];
        $this->alamat        = $hasil['alamat'];
        $this->tgl_lahir     = $hasil['tgl_lahir'];
        $this->agama         = $hasil['agama'];
        $this->email         = $hasil['email'];
        $this->password      = $hasil['password'];
        $this->level         = $hasil['level'];
    }

    /**
     * Fungsi untuk menambahkan data dosen baru
     * @return void
     */
    public function tambahdosen()
    {
        try {
        $query = "INSERT INTO dosen (username, nama, jenis_kelamin, alamat, tgl_lahir, agama, email, password, level) VALUES (:username, :nama, :jenis_kelamin, :alamat, :tgl_lahir, :agama, :email, :password, :level)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':nama', $_POST['nama']);
        $stmt->bindParam(':jenis_kelamin', $_POST['jk']);
        $stmt->bindParam(':alamat', $_POST['alamat']);
        $tgl = $_POST['tgl_lahir'];
        $stmt->bindParam(':tgl_lahir', date("Y-m-d", strtotime($_POST['tgl_lahir'])));
        $stmt->bindParam(':agama', $_POST['agama']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':password', md5($_POST['password']));
        $stmt->bindParam(':level', $_POST['level']);
        $stmt->execute();
        } catch (PDOException $e) {
            echo "Gagal :".$e->getMessage();
        }
    }
    
    /**
     * Fungsi untuk melihat daftar semua dosen
     * @param  string $table          Table Dosen
     * @param  int    $halaman        $_GET['page'] nomor
     * @param  int    $nomordari      Perhitungan pagination
     * @param  int    $dataperhalaman Jumlah data yang ditampilkan
     * @return void
     */
    public function lihatdosen($table, $halaman, $nomordari, $dataperhalaman)
    {
        try {
        $query = "SELECT * FROM $table ORDER BY nama ASC LIMIT $nomordari, $dataperhalaman";
        $stmt  = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
        } catch (PDOException $e) {
            echo "Gagal : ".$e->getMessage();
        }
    }
    /**
     * Fungsi untuk menghitung jumlah semua data dalam baris
     * @param  string $table Nama table yang ingin dihitung
     * @return void
     */
    public function hitungSemua($table)
    {
        try {
            $query = "SELECT id FROM $table";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $nomor = $stmt->rowCount();
            return $nomor;
        } catch (PDOException $e) {
            echo "Gagal : ".$e->getMessage();
        }
    }

    /**
     * Fungsi untuk melihat data dosen sebelumnya yang akan dirubah
     * @param  string $username $_GET['username'] yang akan dirubah
     * @return void
     */
    public function lihatsatu($username)
    {
        try {
            $query = "SELECT * FROM dosen WHERE username = ?";
            $stmt  = $this->conn->prepare($query);
            $stmt->bindParam(1, $username);
            $stmt->execute();

            $hasil = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->username = $hasil['username'];
            $this->password = $hasil['password'];
            $this->nama = $hasil['nama'];
            $this->jenis_kelamin = $hasil['jenis_kelamin'];
            $this->alamat = $hasil['alamat'];
            $this->tgl_lahir = $hasil['tgl_lahir'];
            $this->email= $hasil['email'];
            $this->agama= $hasil['agama'];
            $this->level= $hasil['level'];
        } catch (PDOException $e) {
            echo "Gagal : ".$e->getMessage();
        }
    }
    /**
     * Fungsi untuk merubah data dosen
     * @return void
     */
    public function rubahDosen()
    {
        try {
            $query = "UPDATE dosen SET nama = :nama, jenis_kelamin = :jenis_kelamin, alamat = :alamat, tgl_lahir = :tgl_lahir, agama = :agama, email = :email WHERE username = :username";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nama', $_POST['nama']);
            $stmt->bindParam(':jenis_kelamin', $_POST['jk']);
            $stmt->bindParam(':alamat', $_POST['alamat']);
            $stmt->bindParam(':tgl_lahir', date("Y-m-d", strtotime($_POST['tgl_lahir'])));
            $stmt->bindParam(':agama', $_POST['agama']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':username', $_POST['username']);
            $stmt->execute();
        } catch (PDOException $e){
            echo "Gagal : ".$e->getMessage();
        }
    }

    /**
     * Fungsi untuk menghapus data dosen
     * @param  string $username $_GET['username'] yang akan dihapus
     * @return void
     */
    public function  hapusDosen($username)
    {
        try {
            $query = "DELETE FROM dosen WHERE username = ?";
            $stmt  = $this->conn->prepare($query);
             $stmt->bindParam(1, $username);
            $stmt->execute();
        } catch (PDOException $e){
            echo "Gagal : ".$e->getMessage();
        }
    }
}
?>