<?php
//menghubungkan dengan koneksi
include '../assets/fungsi/koneksi.php';

//filter filteran
include'../assets/fungsi/filter.php';

// menangkap data yang di kirim dari fo
$fariabel1 = filter($_POST['nama_field']);

$fariabel2 filter($_POST['nama_field']);

$fariabel3 filter($_POST['nama_field']);

$fariabel4 = filter($_POST['nama_field']);

$fariabel5 = filter($_POST['nama_field']);

$fariabel6 filter($_POST['nama_field']);

$fariabel6 filter($_POST['nama_field']);

// mengfilter data ke database 
mysqli_query($konektor, "insert into nama_tabel values('','$fariabel1', '$fariabel2', '$fariabel3','$fariabela', '$fariabels', '$fariabel6', '$fariabel6')");

// mengalihkan halaman kembali ke index.php 
header("location:../admin/beranda.php?m=2");
?>