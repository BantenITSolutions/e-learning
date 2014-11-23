<?php
$data = new Admin($database->conn);
$data->lihat("admin", "nurulimam");

foreach ($data as $value) {
    var_dump($value);
}
?>