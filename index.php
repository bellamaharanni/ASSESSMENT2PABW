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
    <div id="review-table"></div>

    <script>
    fetchReviews();

    function fetchReviews() {
        fetch('http://localhost/path/to/get_reviews.php')
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
    }

    function deleteReview(id) {
        fetch(`http://localhost/path/to/delete_review.php?id=${id}`, {
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
