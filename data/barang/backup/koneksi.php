<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tenant_access";
$entries = 1;
$waktu = date("Y-m-d H:i:s");

// Create connection
$koneksi = new mysqli($host, $user, $pass, $db);

// Check connection
if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
} else {
    // echo "Berhasil koneksi";
}
?>
