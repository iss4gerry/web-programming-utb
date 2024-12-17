<?php
header("Access-Control-Allow-Origin: *");
include '../api/con.php'; 
$username = $_POST["user"];
$password = $_POST["pwd"];

if (isset($username) && isset($password)) {
    // Persiapkan query untuk mengambil data pengguna dari database berdasarkan username
    $statement = $database_connection->prepare("SELECT id, username, password FROM user WHERE username = ?");
    $statement->execute([$username]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // Verifikasi kata sandi dengan menggunakan SHA1
    if ($user && sha1($password) == $user['password']) {
        // Jika verifikasi berhasil, buat token sesi baru
        $session_token = bin2hex(random_bytes(16));

        // Perbarui token sesi di database
        $updateStatement = $database_connection->prepare("UPDATE user SET session_token = ? WHERE id = ?");
        $updateStatement->execute([$session_token, $user['id']]);

        // Mengembalikan respons JSON sukses dengan token sesi
        echo json_encode([
            'status' => 'success',
            'session_token' => $session_token
        ]);
    } else {
        // Jika verifikasi gagal, kirim pesan kesalahan
        echo json_encode([
            'status' => 'error',
            'message' => 'Kredensial tidak valid'
        ]);
    }
} else {
    // Jika data tidak lengkap, kirim pesan kesalahan
    echo json_encode([
        'status' => 'error',
        'message' => 'Permintaan tidak valid'
    ]);
}
?>
