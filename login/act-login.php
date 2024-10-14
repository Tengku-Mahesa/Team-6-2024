<?php
session_start();
include "config.php";

$username = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['op'];

if ($op == "in") {
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);
    if (mysqli_num_rows($result) == 1) {
        $qry = mysqli_fetch_array($result);
        $_SESSION['username'] = $qry['username'];
        $_SESSION['nama'] = $qry['nama'];
        $_SESSION['level'] = $qry['level'];
        if ($qry['level'] == "admin" || $qry['level'] == "user") {
            header("location:../template/index.php");
            exit();
        }
    } else {
        ?>
        <script language="JavaScript">
            alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
            document.location='../index.php';
        </script>
        <?php
    }
} else if ($op == "out") {
    unset($_SESSION['username']);
    unset($_SESSION['level']);
    header("location:../index.php");
    exit();
}
?>
