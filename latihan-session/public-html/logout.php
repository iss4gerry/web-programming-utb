<?php
header("Access-Control-Allow-Origin: *");
include 'con.php'; // File koneksi database

// Ambil token sesi dari request POST
$session_token = $_POST['session_token'];

if (isset($session_token)) {
    // Hapus token sesi dari database (operasi logout)
    $updateStatement = $database_connection->prepare("UPDATE user SET session_token = NULL WHERE session_token = ?");
    $updateStatement->execute([$session_token]);

    // Periksa apakah token sesi berhasil dihapus
    $affectedRows = $updateStatement->rowCount();

    if ($affectedRows > 0) {
        // Logout berhasil
        echo json_encode([
            'status' => 'success',
            'message' => 'Logout berhasil'
        ]);
    } else {
        // Token sesi tidak ditemukan
        echo json_encode([
            'status' => 'error',
            'message' => 'Token sesi tidak valid'
        ]);
    }
} else {
    // Jika token sesi tidak tersedia dalam request
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request'
    ]);
}
?>
