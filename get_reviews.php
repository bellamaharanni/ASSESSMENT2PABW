<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecoscore";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// Ambil data ulasan dan review dari database
$query = "SELECT * FROM reviews";
$result = $conn->query($query);

// Memeriksa apakah query berhasil dieksekusi
if ($result === false) {
    die("Error: " . $conn->error);
}

// Tampilkan data dalam bentuk JSON
$reviews = array();
while ($row = $result->fetch_assoc()) {
    $reviews[] = $row;
}

echo json_encode($reviews);

// Menutup koneksi
$conn->close();
?>
