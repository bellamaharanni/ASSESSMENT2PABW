<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "ecoscore");

// Periksa koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Ambil data review dari database
$query = "SELECT * FROM reviews ORDER BY tanggal_review DESC";
$result = mysqli_query($koneksi, $query);

// Tampilkan review
while ($row = mysqli_fetch_assoc($result)) {
    echo "<table class='review' border='1'>";
    echo "<tr><th>Judul Review</th></tr>";
    echo "<tr><td>{$row['judul_review']}</td></tr>";
    echo "<tr><th>Oleh</th></tr>";
    echo "<tr><td>{$row['nama_pengulas']} pada {$row['tanggal_review']}</td></tr>";
    echo "<tr><th>Rating</th></tr>";
    echo "<tr><td>{$row['rating']} Bintang</td></tr>";
    echo "<tr><th>Isi Review</th></tr>";
    echo "<tr><td>{$row['isi_review']}</td></tr>";
    echo "<tr><th>Aksi</th></tr>";
    echo "<tr><td><a href='update_review.php?id={$row['id']}'>Update</a></td></tr>";
    echo "<tr><td><a href='hapus_review.php?id={$row['id']}'>Hapus</a></td></tr>";
    echo "</table>";
    
}
?>
