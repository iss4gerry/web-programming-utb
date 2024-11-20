<?php 
require_once "koneksi.php";

$id = $_POST["id"];

try {
    $sql = "DELETE FROM mahasiswa WHERE id = ?";
    $koneksi = $con->prepare($sql);
    $koneksi->execute([$id]);
    echo "Data deleted successfully";
} catch (PDOException $err) {
    die("Error deleting data: " . $err->getMessage());
}

?>