<?php
error_reporting(0);
session_start();

if (empty($_SESSION[username])AND empty($_SESSION[password])){

	include "index.php";
}else{
?>
<!Doctype html>
<html>
<head>
	<title>Admin|Dashboard</title>
</head>
<body>
	<h1>Walcome Admin</h1>

</body>
</html>
<?
}
?>