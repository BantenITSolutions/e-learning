<?php
/**
 *
 */
class Mahasiswa
{
  private $conn;
  public $nim;
  public $email;
  public $password;
  public $nama;
  public $kelas;
  public $jk;
  public $alamat;
  public $tgl_lahir;
  public $agama;
  public $level;

  function __construct($db)
  {
    $this->conn = $db;
  }

  public function masuk($nim)
  {
    $query = "SELECT * FROM mahasiswa WHERE nim = ?";
    $stmt  = $this->conn->prepare($query);
    $stmt->bindParam(1, $nim);
    $stmt->execute();

    $hasil = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->nim       = $hasil['nim'];
    $this->email = $hasil['email'];
    $this->password = $hasil['password'];
    $this->nama     = $hasil['nama'];
    $this->kelas     = $hasil['kelas'];
    $this->jk = $hasil['jenis_kelamin'];
    $this->alamat = $hasil['alamat'];
    $this->tgl_lahir = $hasil['tgl_lahir'];
    $this->agama = $hasil['agama'];
    $this->level    = $hasil['level'];
  }
}
?>