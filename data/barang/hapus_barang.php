<?php
include "../../config.php";

// Pastikan data 'data' telah diterima melalui URL
if(isset($_GET["data"])) {
    // Ambil nilai 'data' dari URL
    $kiriman = $_GET["data"];

    // Buat prepared statement untuk menghapus data berdasarkan ID
    $stmt = $koneksi->prepare("DELETE FROM `barang` WHERE id_barang = ?");
    $stmt->bind_param("s", $kiriman);
    $stmt->execute();

    // Periksa apakah data berhasil dihapus atau tidak
    if ($stmt->affected_rows > 0) {
        ?>
        <script type="text/javascript">
            alert ('Data Berhasil di Hapus');
            window.location='index.php';
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert ('Data Gagal di Hapus');
            window.location='index.php';
        </script>
        <?php
    }

    // Tutup prepared statement
    $stmt->close();
} else {
    // Jika parameter 'data' tidak diterima, arahkan kembali ke halaman index
    header("Location: index.php");
    exit();
}
?>
