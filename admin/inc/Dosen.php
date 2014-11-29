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
    $query = "INSERT INTO $table SET name = ?, tgl_lahir = ?, alamat = ?, email = ?,username=?, jenis_kelamin=?,agama=?, password = ?";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->nama);
    $stmt->bindParam(2, $this->tgl_lahir);
    $stmt->bindParam(3, $this->alamat);
    $stmt->bindParam(4, $this->email);
    $stmt->bindParam(5, $this->jenis_kelamin);
    $stmt->bindParam(6, $this->username);
    $stmt->bindParam(7, $this->password);
    $stmt->bindParam(7, $this->agama);
    if ($stmt->execute()) {
      return TRUE;
    } else {
      return FALSE;
    }
    }
}
?>