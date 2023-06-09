<?php
$server = 'localhost';
$password = '';
$user = 'root';
$database = 'db_barang';

$kon = mysqli_connect($server, $user, $password, $database);

if (!$kon) {
    die('Gagal terhubung dengan database: ' . mysqli_connect_error());
}
?>