<?php
$koneksi = mysqli_connect("localhost", "root", "", "ecoscore");

if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM reviews";
$result = mysqli_query($koneksi, $query);

$reviews = array();
while ($row = mysqli_fetch_assoc($result)) {
    $reviews[] = $row;
}

echo json_encode($reviews);

mysqli_close($koneksi);
?>
