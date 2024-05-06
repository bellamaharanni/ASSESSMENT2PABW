// Panggil data dari server menggunakan AJAX
$.ajax({
    url: "get_reviews.php",
    type: "GET",
    dataType: "json",
    success: function(data) {
        // Tampilkan data ke dalam tabel
        // Misalnya, dengan menggunakan jQuery
        $.each(data, function(index, review) {
            $("#reviews-table").append("<tr><td>" + review.id + "</td><td>" + review.name + "</td><td>" + review.comment + "</td><td><button class='delete-button' data-id='" + review.id + "'>Hapus</button></td></tr>");
        });
    },
    error: function(xhr, status, error) {
        console.error("Error: " + status + " - " + error);
    }
});
