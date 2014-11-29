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
        $this->kelas         = $hasil['kelas'];
        $this->email         = $hasil['email'];
        $this->password      = $hasil['password'];
        $this->level         = $hasil['level'];
    }

    public function lihat($username)
    {
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
  }
  public function tambah($table)
  {
    try {
        $query = "INSERT INTO $table SET username = :username, nama = :nama, jenis_kelamin = :jenis_kelamin, alamat = :alamat, tgl_lahir = :tgl_lahir, agama = :agama, email = :email, password = :password, level = :level";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':password', $_POST['password']);
        $stmt->bindParam(':nama', $_POST['nama']);
        $stmt->bindParam('jenis_kelamin', $_POST['jk']);
        $stmt->bindParam('alamat', $_POST['alamat']);
        $stmt->bindParam('tgl_lahir',$_POST['tgl_lahir']);
        $stmt->bindParam('email', $_POST['email']);
        $stmt->bindParam('agama', $_POST['agama']);
    } catch (PDOException $e) {
        echo "Gagal :".$e->getMessage();
    }
}
}
?>