<?php
/**
 * Profile Admin dan Validasi Login Administrator
 */
class Admin
{
  private $conn;
  public  $id;
  public  $nama;
  public  $jenis_kelamin;
  public  $alamat;
  public  $tgl_lahir;
  public  $email;
  public  $agama;
  public  $username;
  public  $password;

  function __construct($db)
  {
    $this->conn = $db;
  }

  /**
   * Validasi Login Administrator
   * @param  string $username Username Admin
   * @return void
   */
  public function masuk($username)
  {
    $query = "SELECT * FROM admin WHERE username = ?";
    $stmt  = $this->conn->prepare($query);
    $stmt->bindParam(1, $username);
    $stmt->execute();

    $hasil = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->username = $hasil['username'];
    $this->password = $hasil['password'];
  }

  /**
   * Menampilkan Profil / Data Admin
   * @param  string $table    Table Database admin
   * @param  string $username Lihat data dengan username admin
   * @return void
   */
  public function lihat($username)
  {
    $query = "SELECT * FROM admin WHERE username = ?";
    $stmt  = $this->conn->prepare($query);
    $stmt->bindParam(1, $username);
    $stmt->execute();

    $hasil = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->id       = $hasil['id'];
    $this->username = $hasil['username'];
    $this->password = $hasil['password'];
    $this->nama = $hasil['nama'];
    $this->jenis_kelamin = $hasil['jenis_kelamin'];
    $this->alamat = $hasil['alamat'];
    $this->tgl_lahir = $hasil['tgl_lahir'];
    $this->email= $hasil['email'];
    $this->agama= $hasil['agama'];
  }

  public function rubah($username, $password)
  {
    $query = "UPDATE admin
                SET username = ?,
                SET password = ?
                WHERE username = $this->username";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $stmt->execute();
  }
}
?>