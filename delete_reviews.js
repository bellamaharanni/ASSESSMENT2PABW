// Tangani klik tombol hapus
$("#reviews-table").on("click", ".delete-button", function() {
    var id = $(this).data("id");

    // Kirim request AJAX untuk menghapus data
    $.ajax({
        url: "delete_review.php?id=" + id,
        type: "GET",
        success: function(response) {
            // Hapus baris dari tabel setelah data berhasil dihapus
            $(this).closest("tr").remove();
        },
        error: function(xhr, status, error) {
            console.error("Error: " + status + " - " + error);
        }
    });
});
