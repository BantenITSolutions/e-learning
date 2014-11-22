<?php
/**
* Class Name = User
* Require    = Database
* @param     = $username, $password
*/
class Admin
{
  private $conn;
  public $id;
  public $username;
  public $password;
  public $jenis_kelamin;
  public $alamat;
  public $tgl_lahir;	
  public $email;
  public $agama;
  public $level;

  function __construct($db)
  {
    $this->conn = $db;
  }

  public function login($username)
  {
    $query = "SELECT * FROM admin WHERE username = ?";
    $stmt  = $this->conn->prepare($query);
    $stmt->bindParam(1, $username);
    $stmt->execute();

    $hasil = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->id       = $hasil['id'];
    $this->username = $hasil['username'];
    $this->password = $hasil['password'];
    $this->jenis_kelamin = $hasil['jenis_kelamin'];
    $this->alamat = $hasil['alamat'];
    $this->tgl_lahir = $hasil['tgl_lahir'];
    $this->email= $hasil['email'];
    $this->agama= $hasil['agama'];
    $this->level    = $hasil['level'];
  }
}
?>