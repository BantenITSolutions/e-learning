<?php
spl_autoload_register(function($class) {
    include $class.'.php';
});

$database = new Database();
$data = new Admin($database->conn);
$data->lihat("admin", "admin");
echo $data->username;
?>