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

  public function rubah()
  {
    try {
        $query = "UPDATE admin SET nama = :nama, tgl_lahir = :tgl_lahir, jenis_kelamin = :jk, username = :username, password = :password WHERE username = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':jk', $_POST['jk']);
        $stmt->bindParam(':tgl_lahir', date("Y-m-d", strtotime($_POST['tgl_lahir'])));
        $stmt->bindParam(':password', md5($_POST['password']));
        $stmt->bindParam(':nama', $_POST['nama']);
        $stmt->bindParam(':id', $_SESSION['username']);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Gagal ".$e->getMessage();
    }
  }
}
?>