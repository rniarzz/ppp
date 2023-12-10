<!-- cek apakah sudah login -->
<!-- Cara 1 Jika halaman login terpisah dengan halaman index -->
<?php
error_reporting(0);
session_start();
if($_SESSION['MM_StatusAdmin']=="login"){
  header("location:beranda.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  
<div class="container">
  <center><h1>Selamat Datang Admin</h1>
  <p>Silahkan Login</p></center>
  
  <div class="row">
  <div class="col-sm-4 mx-auto">
<br>
<!-- Cek pesan notifikasi -->
<?php
if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
          echo "Login gagal! Email dan Password salah!<hr>";
        }else if($_GET['pesan'] == "keluar"){
          echo "Anda telah berhasil logout<hr>";
        }else if($_GET['pesan'] == "Belum_login"){
          echo "Anda harus login untuk mengakses halaman admin<hr>";
    }
  }
  ?>

<form method="post" action="cekLogin.php">
    <div class="input-group mb-2">
    <span class="input-group-text">Email</span>
    <input class="form-control" required type="text" name="email" placeholder="Masukkan Email">
    </div>

    <div class="input-group mb-2">
    <span class="input-group-text">Password</span>
    <input class="form-control" required type="password" name="pass" placeholder="Masukkan Password">
    </div>
    <input class="btn btn-success" type="submit" value="Login"></td>
</form>


  </div>
  </div>

</div>

</body>
</html>
