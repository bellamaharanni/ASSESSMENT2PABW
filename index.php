<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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

        <div class="daftar-review" id="review-table"></div>
    </form>

    <script>
    fetch('get_reviews.php')
        .then(response => response.json())
        .then(data => {
            let table = '<table>';
            table += '<tr><th>Nama Pengulas</th><th>Judul Review</th><th>Isi Review</th><th>Tanggal Review</th><th>Rating</th><th>Aksi</th></tr>';
            data.forEach(row => {
                table += `<tr><td>${row.nama_pengulas}</td><td>${row.judul_review}</td><td>${row.isi_review}</td><td>${row.tanggal_review}</td><td>${row.rating}</td><td><button onclick="deleteReview(${row.id})">Hapus</button></td></tr>`;
            });
            table += '</table>';

            document.getElementById('review-table').innerHTML = table;
        })
        .catch(error => console.error(error));

    function deleteReview(id) {
        fetch(`delete_review.php?id=${id}`, {
            method: 'GET'
        })
        .then(() => {
            fetchReviews();
        })
        .catch(error => console.error(error));
    }
    </script>
</body>
</html>
