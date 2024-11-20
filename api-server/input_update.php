<?php 
require_once "koneksi.php";

$nama = $_POST["nama"];
$jurusan = $_POST["jurusan"];
$npm = $_POST["npm"];

if (!empty($_POST["id"])) {
    $id = $_POST["id"];
    try {
        $sql = "UPDATE `mahasiswa` SET `nama` = ?, `jurusan` = ?, `npm` = ? WHERE `id` = ?";
        $koneksi = $con->prepare($sql);
        $koneksi->execute([$nama, $jurusan, $npm, $id]);

        echo "Data updated successfully";
    } catch (PDOException $err) {
        die("Error updating data: " . $err->getMessage());
    }
} else {
    try {
        $sql = "INSERT INTO `mahasiswa` (`nama`, `jurusan`, `npm`) VALUES (?, ?, ?)";
        $koneksi = $con->prepare($sql);
        $koneksi->execute([$nama, $jurusan, $npm]);

        echo "Data inserted successfully";
    } catch (PDOException $err) {
        die("Error inserting data: " . $err->getMessage());
    }
}

?>