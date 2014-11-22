<?php
/*
* Class Name : User
* Param : $user, $pass
*/
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);
spl_autoload_register(function($class) {
include 'inc/'.$class.'.php';
});
$data = new Database();
$user = new Admin($data->conn);
$user->login($username);

if ($user->password == $password) {
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
header('location:e-learning-admin.php?pengaturan=beranda');
} else {
echo '
<script type="text/javascript">
window.alert("Username dan Password Salah !!!");
window.location=("index.php")
</script>';
}
?>