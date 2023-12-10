<?php
//Script ini diletakan pada halaman ceklogin.php
//mengaktifkan session php
session_start();

//menghubungkan dengan koneksi
include '../assets/fungsi/koneksi.php';
//filter inputan
include'../assets/fungsi/filter.php';
//menangkap data yang dikirim dari form
$username = filter($_POST['email']);
$sandi = filter($_POST['pass']);

//menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($conn,"select * from admin where email='$username'and password='$sandi'");

//menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
    $_SESSION['MM_UsernameAdmin'] = $username;
    $_SESSION['MM_StatusAdmin'] = "login";
    header("location:beranda.php");
}else{
    header("location:index.php?pesan=gagal");
}    
?>