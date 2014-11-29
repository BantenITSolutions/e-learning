<?php
/**
 * Koneksi Database E-Learning Dengan Menggunakan PDO
 * @param $conn Menghubungkan kedalam Database
 */
class Database
{
	public $conn;

	function __construct()
	{
		$this->conn = NULL;

		try {
			$this->conn = new PDO("mysql:host=localhost;dbname=e_learning","root", "toor");
		} catch (PDOExecption $e){
			echo "Gagal : ".$e->getMassage();
		}

		return $this->conn;
	}
}
?>
