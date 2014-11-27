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
        $this->nim           = $hasil['nim'];
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
}
?>