<?php
/**
* 
*/
class Kelas
{
    private $conn;
    public $id;
    public $kelas;

    /**
     * Membuat Koneksi Database
     * @param string $db PDO
     */
    function __construct($db)
    {
        $this->conn = $db;
    }

    public function tambahkelas()
    {
        try {
            $query = "INSERT INTO kelas (id, kelas) VALUES (:id, :kelas)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->bindParam(':kelas', $_POST['kelas']);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Gagal : ".$e->getMessage();
        }
    }

    public function lihatkelas($table, $halaman, $nomordari, $dataperhalaman)
    {
        try {
            $query = "SELECT * FROM $table ORDER BY kelas ASC LIMIT $nomordari, $dataperhalaman";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "Gagal : ".$e->getMessage();
        }
    }

    // Mengambil Bilangan Baris Produk
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
    
}
?>