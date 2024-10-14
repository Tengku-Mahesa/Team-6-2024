<?php
// Pastikan variabel $_POST telah diatur sebelum mengaksesnya
if(isset($_POST['id_barang'], $_POST['nama'], $_POST['jenis'], $_POST['ukuran'], $_POST['warna'], $_POST['id_supplier'], $_POST['harga'], $_POST['jumlah'])) {
    // Simpan nilai dari $_POST ke dalam variabel
    $a = $_POST['id_barang'];
    $b = $_POST['nama'];
    $c = $_POST['jenis'];
    $d = $_POST['ukuran'];
    $e = $_POST['warna'];
    $f = $_POST['id_supplier'];
    $g = $_POST['harga'];
    $h = $_POST['jumlah'];

    // Sertakan file konfigurasi
    include "../../config.php";

    // Buat prepared statement untuk memperbarui data barang
    $stmt = $koneksi->prepare("UPDATE `barang` SET `nama_brg`=?, `jenis_barang`=?, `ukuran`=?, `warna`=?, `id_suplier`=?, `harga`=?, `jumlah`=? WHERE `id_barang`=?");
    $stmt->bind_param("ssssssis", $b, $c, $d, $e, $f, $g, $h, $a);
    $stmt->execute();

    // Periksa apakah data berhasil diperbarui atau tidak
    if ($stmt->affected_rows > 0) {
        ?>
        <script type="text/javascript">
            alert ('Data Berhasil di Mutakhirkan');
            window.location='index.php';
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert ('Data Gagal di Mutakhirkan');
            window.location='index.php';
        </script>
        <?php
    }

    // Tutup prepared statement
    $stmt->close();
} else {
    // Jika $_POST belum diatur, kembalikan pengguna ke halaman index
    header("Location: index.php");
    exit();
}
?>
