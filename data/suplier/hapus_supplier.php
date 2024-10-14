<?php
// Validate and sanitize input
$kiriman = isset($_GET["data"]) ? htmlspecialchars($_GET["data"]) : '';

// Output sanitized input for debugging purposes
echo $kiriman;

// Include database connection file
include "../../../koneksi.php";

// Establish database connection using MySQLi
$koneksi = mysqli_connect($host, $user, $pass,);

// Check database connection
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Construct the DELETE query using prepared statement to prevent SQL injection
$query = "DELETE FROM `suplier` WHERE id_sp = ?";
$stmt = mysqli_prepare($koneksi, $query);

// Bind parameter to the statement
mysqli_stmt_bind_param($stmt, "s", $kiriman);

// Execute the query
$hapus = mysqli_stmt_execute($stmt);

// Check if the query was successful
if ($hapus) {
    ?>
    <script type="text/javascript">
     alert('Data Berhasil di Hapus');
     window.location='index.php';
    </script>
    <?php
} else {
    ?>
    <script type="text/javascript">
     alert('Data Gagal di Hapus');
     window.location='index.php';
    </script>
    <?php
}

// Close statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>
