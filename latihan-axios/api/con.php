<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "data_utb";
$db_port = "3306";

try {
    $con = new PDO("mysql:host=$hostname;port=$db_port;dbname=$db_name", $username, $password);
    // echo "Koneksi berhasil";
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>