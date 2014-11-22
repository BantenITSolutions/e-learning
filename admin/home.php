<?php
	error_reporting(E_ALL ^ E_NOTICE);
	session_start();
	spl_autoload_register(function ($class){
		include 'inc/'.$class.'.php';
	});

	$database = new Database();

	$db = $database->conn();

	class Admin
	{
		private $conn;

		public $id;
		public $nama;
		public $alamat;
		public $email;
		public $tgl_lahir;
		public $jenis_kelamin;
		public $agama;

		function __construct($db)
		{
			$this->conn =$db;
		}

		function buat($crud)
		{
			$query ="INSERT INTO $crud SET nama = ?, alamat=?,email = ?,tgl_lahir=?,jenis_kelamin= ?,agama=?;"

			$stmt = $this->conn->prepare($query);
			$stmt = $this->bindParam(1, $this->nama);
			$stmt = $this->bindParam(2, $this->alamat);
			$stmt = $this->bindParam(3, $this->email);
			$stmt = $this->bindParam(4, $this->tgl_lahir);
			$stmt = $this->bindParam(5, $this->jenis_kelamin);
			$stmt = $this->bindParam(6, $this->agama);

			if ($stmt->execute()){
				return TRUE;
			}else{
				return FALSE;
			}
		}

		function tampil($crud)
		{
			$query = "SELECT * FROM $crud WHERE id =?";
		}
	}
?>