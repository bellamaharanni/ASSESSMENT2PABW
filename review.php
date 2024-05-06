<?php
    $koneksi = mysqli_connect("localhost", "root", "", "ecoscore");

    if (mysqli_connect_errno()) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM reviews";
    $result = mysqli_query($koneksi, $query);
    $reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Ulasan dan Review</title>
</head>
<body>
    <h1>Ulasan dan Review</h1>
    <form action="ulasan dan review/proses_review.php" method="post">
        <label for="nama_pengulas">Nama Pengulas:</label><br>
        <input type="text" name="nama_pengulas" required><br>

        <label for="judul_review">Judul Review:</label><br>
        <input type="text" name="judul_review" required><br>

        <label for="isi_review">Isi Review:</label><br>
        <textarea name="isi_review" rows="4" required></textarea><br>

        <label for="rating">Rating:</label><br><br>
        <select name="rating" required>
            <option value="1">Bintang 1</option>
            <option value="2">Bintang 2</option>
            <option value="3">Bintang 3</option>
            <option value="4">Bintang 4</option>
            <option value="5">Bintang 5</option>
        </select><br><br>

        <button type="submit">Kirim Review</button>
    </form>

    <div id="review-table">
        <table>
            <tr>
                <th>Nama Pengulas</th>
                <th>Judul Review</th>
                <th>Isi Review</th>
                <th>Tanggal Review</th>
                <th>Rating</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($reviews as $review): ?>
                <tr>
                    <td><?= $review['nama_pengulas'] ?></td>
                    <td><?= $review['judul_review'] ?></td>
                    <td><?= $review['isi_review'] ?></td>
                    <td><?= $review['tanggal_review'] ?></td>
                    <td>
                        <?php for ($i = 0; $i < $review['rating']; $i++): ?>
                            <i class="fas fa-star"></i>
                        <?php endfor; ?>
                    </td>
                    <td><button onclick="deleteReview(<?= $review['id'] ?>)">Hapus</button></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <script>
    function deleteReview(id) {
        fetch(`http://localhost/path/to/delete_review.php?id=${id}`, {
            method: 'GET'
        })
        .then(() => {
            // Refresh tabel setelah berhasil menghapus
            location.reload();
        })
        .catch(error => console.error(error));
    }
    </script>
</body>
</html>
