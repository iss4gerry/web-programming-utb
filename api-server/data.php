<?php 
require_once "koneksi.php";

try {
    $sql = "SELECT * FROM mahasiswa";

    $koneksi = $con->prepare($sql);
    $koneksi->execute();

    $data = array();
    while($row = $koneksi->fetch(PDO::FETCH_ASSOC)) {
        array_push($data, $row);
    }
    echo json_encode($data);
} catch (PDOException $err) {
    die("gagal memuat database $db_name: " . $err->getMessage());
}

?>