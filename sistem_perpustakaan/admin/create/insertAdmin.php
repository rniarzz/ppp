<?php
//menghubungkan dengan koneksi
include 'koneksi.php';

//filter filteran
include 'filter.php';

// menangkap data yang di kirim dari form
$fariabel1 = filter($_POST['idadmin']);
$fariabel2 = filter($_POST['nama']);
$fariabel3 = filter($_POST['tempatlahir']);
$fariabel4 = filter($_POST['tanggallahir']);
$fariabel5 = filter($_POST['alamat']);
$fariabel6 = filter($_POST['email']);
$fariabel7 = filter($_POST['telepon']);
$fariabel8 = filter($_POST['password']);
$fariabel9 = '1';
// mengfilter data ke database 
mysqli_query($conn, "insert into admin values('','$fariabel1','$fariabel2','$fariabel3','$fariabel4','$fariabel5','$fariabel6','$fariabel7'");
// mengalihkan halaman kembali ke index.php 
header("location:../admin/beranda.php?m=3");