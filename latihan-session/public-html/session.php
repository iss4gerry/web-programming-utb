<?php
header("Access-Control-Allow-Origin: *");
include 'con.php'; // File koneksi database

// Ambil token sesi dari request POST
$session_token = $_POST['session_token'];

if (isset($session_token)) {
    // Persiapkan query untuk mengambil nama pengguna berdasarkan token sesi
    $statement = $database_connection->prepare("SELECT name FROM user WHERE session_token = ?");
    $statement->execute([$session_token]);

    // Ambil hasil query
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Jika token sesi valid, kirim respons sukses dengan data nama pengguna
        echo json_encode([
            'status' => 'success',
            'hasil' => $user
        ]);
    } else {
        // Jika token sesi tidak valid
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid session'
        ]);
    }
} else {
    // Jika tidak ada token sesi dalam request
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request'
    ]);
}
?>
