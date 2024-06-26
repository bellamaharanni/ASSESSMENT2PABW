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

// Query untuk mengambil data review
$sql = "SELECT id, judul, isi FROM review";
$result = $conn->query($sql);

// Membuat array untuk menyimpan hasil query
$reviews = array();

// Memasukkan hasil query ke dalam array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
}

// Mengubah array menjadi format JSON dan mencetaknya
echo json_encode($reviews);

// Menutup koneksi
$conn->close();
?>
