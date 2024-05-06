<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecoscore";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah parameter id telah diterima dari GET
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    // Query untuk menghapus review berdasarkan ID
    $query = "DELETE FROM review WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>