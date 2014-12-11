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
  public  $agama;
  public  $email;
  public  $username;
  public  $password;

  /**
   * Membuat Koneksi Database
   * @param string $db PDO
   */
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
    $this->id = $hasil['id'];
  }

  /**
   * Menampilkan Profil / Data Admin
   * @param  string $id Lihat data dengan id yang ada didalam session
   * @return void
   */
  public function lihatadmin($id)
  {
    $query = "SELECT * FROM admin WHERE id = ?";
    $stmt  = $this->conn->prepare($query);
    $stmt->bindParam(1, $id);
    $stmt->execute();

    $hasil = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->id       = $hasil['id'];
    $this->nama = $hasil['nama'];
    $this->jenis_kelamin = $hasil['jenis_kelamin'];
    $this->alamat = $hasil['alamat'];
    $this->tgl_lahir = $hasil['tgl_lahir'];
    $this->agama= $hasil['agama'];
    $this->email= $hasil['email'];
    $this->username = $hasil['username'];
    $this->password = $hasil['password'];
  }

  /**
   * Merubah Data Admin
   * @return void
   */
  public function rubahadmin()
  {
    try {
        $query = "UPDATE admin SET  nama = :nama,
                                    jenis_kelamin = :jenis_kelamin,
                                    alamat = :alamat,
                                    tgl_lahir = :tgl_lahir,
                                    agama = :agama,
                                    email= :email,
                                    username = :username,
                                    password = :password
                WHERE username = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $_POST['nama']);
        $stmt->bindParam(':jenis_kelamin', $_POST['jenis_kelamin']);
        $stmt->bindParam(':alamat', $_POST['alamat']);
        $stmt->bindParam(':tgl_lahir', date("Y-m-d", strtotime($_POST['tgl_lahir'])));
        $stmt->bindParam(':agama', $_POST['agama']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':password', md5($_POST['password']));
        $stmt->bindParam(':id', $_SESSION['username']);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Gagal ".$e->getMessage();
    }
  }
}
?>