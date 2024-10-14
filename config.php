<?php
    date_default_timezone_set('Asia/Jakarta');
    $koneksi = mysqli_connect("localhost", "root", "", "toko");
    if (!$koneksi) {
        die("Koneksi MySQLi gagal: " . mysqli_connect_error());
    }
?>
