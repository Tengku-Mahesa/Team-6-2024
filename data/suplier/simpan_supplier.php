<?php
// Ambil nilai dari formulir POST
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

// Sertakan file konfigurasi database
include "../../config.php";

// Buat query untuk memeriksa apakah supplier sudah ada dalam database
$check_query = mysqli_query($koneksi, "SELECT * FROM suplier WHERE id_sp='$id'");
$num_rows = mysqli_num_rows($check_query);

// Jika supplier sudah ada, beri pesan dan hentikan eksekusi
if ($num_rows > 0) {
    echo "Data Sudah Ada";
    exit;
} else {
    // Jika supplier belum ada, lakukan penyimpanan data baru
    $insert_query = mysqli_query($koneksi, "INSERT INTO suplier (id_sp, nm_sp, alamat_sp, tlp_sp) VALUES ('$id', '$nama', '$alamat', '$telepon')");

    // Periksa apakah penyimpanan berhasil atau tidak
    if ($insert_query) {
        ?>
        <script type="text/javascript">
            alert('Data berhasil disimpan');
            window.location='index.php';
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert('Gagal menyimpan data');
            window.location='index.php';
        </script>
        <?php
    }
}
?>
