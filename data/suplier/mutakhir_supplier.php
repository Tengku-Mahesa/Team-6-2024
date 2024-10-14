<!DOCTYPE html>
<html>
<head>
    <title>Edit Supplier - Pagination with Bootstrap 3</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"/> 
    <script src="../../bootstrap/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <style>
        /* Custom CSS */
        .pagination, .pager {
            margin-top: 0px;
        }
        .table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php
// Mengambil nilai dari parameter URL
$kiriman = isset($_GET['data']) ? $_GET['data'] : '';

// Menyertakan file konfigurasi database
include "../../config.php";

// Melakukan query untuk mendapatkan data supplier
$query = "SELECT * FROM suplier WHERE id_sp=?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("s", $kiriman);
$stmt->execute();
$result = $stmt->get_result();

// Mengambil data supplier dari hasil query
$data_supplier = $result->fetch_assoc();

// Memeriksa apakah ada data supplier yang ditemukan
if ($data_supplier) {
    // Menampilkan formulir untuk memperbarui detail supplier
    ?>
    <form action='simpan_mutakhir_supplier.php' method='post'>
        <table class='table table-bordered'>
            <tr>
                <td>ID Supplier</td>
                <td><input type='text' class='form-control' name='id' value='<?= $data_supplier['id_sp'] ?>' readonly></td>
            </tr>
            <tr>
                <td>Nama Supplier</td>
                <td><input type='text' class='form-control' name='nama' value='<?= $data_supplier['nm_sp'] ?>'></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type='text' class='form-control' name='alamat' value='<?= $data_supplier['alamat_sp'] ?>'></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type='text' class='form-control' name='telepon' value='<?= $data_supplier['tlp_sp'] ?>'></td>
            </tr>
            <tr>
                <td><input type='submit' class='btn btn-primary' value='Simpan Mutakhir'></td>
                <td><a href='index.php'><input class='btn btn-danger' type='button' value='Batal'></a></td>
            </tr>
        </table>
    </form>
    <?php
} else {
    // Jika tidak ada data supplier yang ditemukan, berikan pesan yang lebih deskriptif atau tautan kembali ke halaman sebelumnya
    echo "<p>Data supplier dengan ID $kiriman tidak ditemukan.</p>";
}
?>
</body>
</html>
