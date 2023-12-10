<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sistem_perpustakaan";
$port = 3307;
$conn = mysqli_connect($host, $user, $pass, $db, $port);
if ($conn == false)
{
echo "Koneksi ke server gagal.";
die();
} #else echo "Koneksi berhasil";
?>