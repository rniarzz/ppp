<!-- cek apakah sudah login -->
<!-- Cara 1 Jika halaman login terpisah dengan halaman index -->
<?php
session_start();
if($_SESSION['MM_StatusAdmin']!="login"){
  header("location:index.php");
}
//menghubungkan dengan koneksi
include '../assets/fungsi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Bootstrap Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
rel="stylesheet">
    <script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
</script>
</head>
<body>

<div class="container">
<h1>Selamat Datang Admin</h1>

<a href="logout.php">Logout</a>

<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-bs-toggle="tab" href="#home">Profil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="#menu1">Admin</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="#menu2">Buku</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="#menu3">Mahasiswa</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="#menu4">Peminjaman</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="#menu5">Transaksi</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="home"><br><a href="#" data-bs-toggle="modal" data-bs-target="#myModalhome">Tambah Data</a></div>
  <div class="tab-pane container fade" id="menu1"><br><a href="#" data-bs-toggle="modal" data-bs-target="#myModalmenu1">Tambah Data</a>
    <input class="form-control" id="myInputmenu1" type="text" placeholder="Cari..">
    <br>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-sm" id="myTablemenu1">
        <thead>
          <tr>
            <th>No</th>
            <th>id admin</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
      <tbody>
        <?php
          $no = 1;
          $data = mysqli_query($conn, "select * from admin order by nama_admin asc");
          while($d = mysqli_fetch_array($data)){
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['id_admin']; ?></td>            
            <td><?php echo $d['nama_admin']; ?></td>
            <td><?php echo $d['tempat_lahir']; ?></td>
            <td><?php echo $d['tanggal_lahir']; ?></td>
            <td><?php echo $d['alamat']; ?></td>
            <td><?php echo $d['email']; ?></td>
            <td><?php echo $d['no_telepon']; ?></td>
            <td><?php if($d['status']=='1'){
                echo 'Aktif';
              }else{
                echo 'Tidak Aktif';
              } ?></td>
            <td>
              <a href="#">Ubah</a>
              <a href="#">Hapus</a>
            </td>
          </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function(){
    $("#myInputmenu1").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTablemenu1 tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>

</div>
  <div class="tab-pane container fade" id="menu2"><br><a href="#" data-bs-toggle="modal" data-bs-target="#myModalmenu2">Tambah Data</a>    
  <input class="form-control" id="myInputmenu2" type="text" placeholder="Cari..">
    <br>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-sm" id="myTablemenu2">
        <thead>
          <tr>
            <th>No</th>
            <th>id buku</th>
            <th>Judul buku</th>
            <th>Tahun terbit</th>
            <th>Penerbit</th>
            <th>Penulis</th>
            <th>Stok</th>
            <th>Jenis buku</th>
            <th>Status</th>
            <th>Aksi</th>
            </tr>
        </thead>
      <tbody>
        <?php
          $no = 1;
          $data = mysqli_query($conn, "select * from buku");
          while($d = mysqli_fetch_array($data)){
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['id_buku']; ?></td>            
            <td><?php echo $d['judul_buku']; ?></td>
            <td><?php echo $d['tahun_terbit']; ?></td>
            <td><?php echo $d['penerbit']; ?></td>
            <td><?php echo $d['penulis']; ?></td>
            <td><?php echo $d['stok']; ?></td>
            <td><?php echo $d['jenis_buku']; ?></td>
            <td><?php if($d['status']=='1'){
                echo 'Tersedia';
              }else{
                echo 'Tidak Tersedia';
              } ?></td>
            <td>
              <a href="#">Ubah</a>
              <a href="#">Hapus</a>
            </td>
          </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function(){
    $("#myInputmenu2").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTablemenu2 tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>

</div>
  <div class="tab-pane container fade" id="menu3"><br><a href="#" data-bs-toggle="modal" data-bs-target="#myModalmenu3">Tambah Data</a>
  <input class="form-control" id="myInputmenu3" type="text" placeholder="Cari..">
    <br>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-sm" id="myTablemenu3">
        <thead>
          <tr>
            <th>No</th>
            <th>id mahasiswa</th>
            <th>Nama mahasiswa</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
          </tr>
        </thead>
      <tbody>
        <?php
          $no = 1;
          $data = mysqli_query($conn, "select * from mahasiswa");
          while($d = mysqli_fetch_array($data)){
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['id_mahasiswa']; ?></td>            
            <td><?php echo $d['nama_mahasiswa']; ?></td>
            <td><?php echo $d['jenis_kelamin']; ?></td>
            <td><?php echo $d['alamat']; ?></td>
            <td><?php echo $d['no_telepon']; ?></td>
            <td>
              <a href="#">Ubah</a>
              <a href="#">Hapus</a>
            </td>
          </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function(){
    $("#myInputmenu3").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTablemenu3 tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>

</div>
  <div class="tab-pane container fade" id="menu4"><br><a href="#" data-bs-toggle="modal" data-bs-target="#myModalmenu4">Tambah Data</a>
  <input class="form-control" id="myInputmenu4" type="text" placeholder="Cari..">
    <br>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-sm" id="myTablemenu4">
        <thead>
          <tr>
            <th>No</th>
            <th>id peminjaman</th>
            <th>id mahasiswa</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Aksi</th>
          </tr>
        </thead>
      <tbody>
        <?php
          $no = 1;
          $data = mysqli_query($conn, "select * from peminjaman");
          while($d = mysqli_fetch_array($data)){
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['id_peminjaman']; ?></td>            
            <td><?php echo $d['id_mahasiswa']; ?></td>
            <td><?php echo $d['tgl_peminjaman']; ?></td>
            <td><?php echo $d['tgl_pengembalian']; ?></td>
            <td>
              <a href="#">Ubah</a>
              <a href="#">Hapus</a>
            </td>
          </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function(){
    $("#myInputmenu4").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTablemenu4 tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>

</div>
  <div class="tab-pane container fade" id="menu5"><br><a href="#" data-bs-toggle="modal" data-bs-target="#myModalmenu5">Tambah Data</a>
    <input class="form-control" id="myInputmenu5" type="text" placeholder="Cari..">
    <br>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-sm" id="myTablemenu5">
        <thead>
          <tr>
            <th>No</th>
            <th>id transaksi</th>
            <th>id mahasiswa</th>
            <th>id Buku</th>
            <th>id peminjaman</th>
            <th>Status</th>
            <th>Denda</th>
            <th>Diserahkan</th>
            <th>Diterima</th>
            <th>Aksi</th>
          </tr>
        </thead>
      <tbody>
        <?php
          $no = 1;
          $data = mysqli_query($conn, "select * from transaksi");
          while($d = mysqli_fetch_array($data)){
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['id_transaksi']; ?></td>            
            <td><?php echo $d['id_mahasiswa']; ?></td>
            <td><?php echo $d['id_buku']; ?></td>
            <td><?php echo $d['id_peminjaman']; ?></td>
            <td>
            
            <?php
            $stts = $d['status'];
            switch ($stts) {
              case "0":
                echo "Belum Diserahkan";
                break;
              case "1":
                echo "Sudah Diserahkan";
                break;
              case "2":
                echo "Sudah Dikembalikan";
                break;
              case "3":
                echo "Dibatalkan";
                break;
              default:
                echo "Hilang";
            }
            ?>
            </td>
            <td><?php echo $d['denda']; ?></td>
            <td>
              
            <?php
            
              //Mencari data di dalam database sesuai dengan inputan yang dimasukan
              $ida = $d['diserahkan'];
              $data = mysqli_query($conn, "select * from admin where id_admin like '%456%'");
              if (mysqli_num_rows($data) > 0) {
                while ($d = mysqli_fetch_array($data)) { 
                  echo $d['nama_admin'];
                }
              } 
            ?>

            </td>

            <td>
          
            <?php
            error_reporting(0);
              //Mencari data di dalam database sesuai dengan inputan yang dimasukan
              $ida = $d['diterima'];
              $data = mysqli_query($conn, "select * from admin where id_admin like '%456%'");
              if (mysqli_num_rows($data) > 0) {
                while ($d = mysqli_fetch_array($data)) { 
                  echo $d['nama_admin'];
                }
              } 
            ?>

            </td>
            <td>
            <a href="#">Detail</a>
              <a href="#">Ubah</a>
              <a href="#">Hapus</a>
            </td>
          </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function(){
    $("#myInputmenu5").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTablemenu5 tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>

</div>
</div>

<!-- The Modal home-->
<div class="modal" id="myModalhome">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Profil Perpustakaan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="insertProfil.php">
          <div class="input-group mb-2">
            <span class="input-group-text">Nama perpus</span>
            <input type="text" Name="namaperpustakaan" required class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">Alamat</span>
            <input name="alamat" required type="text" class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">Email</span>
            <input name="text" required type="email" class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">Telepon</span>
            <input name="telepon" required type="number" class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">Website</span>
            <input name="url" required type="url" class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">Deskripsi</span>
            <input name="deskripsi" required type="text" class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">Kepala</span>
            <input required name="kepalaperpustakaan" type="text" class="form-control">
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input class="btn btn-success" type="submit" value="Simpan"></form> 
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal menu1-->
<div class="modal" id="myModalmenu1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Data Admin</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="create/insertAdmin.php">
            <div class="input-group mb-2">
              <span class="input-group-text">id_admin</span>
              <input type="int" Name="idadmin" required class="form-control">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text">Nama</span>
              <input type="varchar" Name="nama" required class="form-control">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text">Tempat Lahir</span>
              <input name="tempatlahir" required type="text" class="form-control">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text">Tanggal Lahir</span>
              <input name="tanggallahir" required type="date" class="form-control">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text">Alamat</span>
              <input name="alamat" required type="text" class="form-control">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text">Email</span>
              <input name="email" required type="text" class="form-control">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text">Telepon</span>
              <input name="telepon" required type="text" class="form-control">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text">Password</span>
              <input required name="password" type="varchar" class="form-control">
            </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <input class="btn btn-success" type="submit" value="Simpan"></form>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal menu2-->
<div class="modal" id="myModalmenu2">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Data Buku</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="insertBuku.php">
            <div class="input-group mb-2">
              <span class="input-group-text">id_buku</span>
              <input type="int" Name="idbuku" required class="form-control">
            </div>  
            <div class="input-group mb-2">
              <span class="input-group-text">Judul</span>
              <input type="varchar" Name="judul" required class="form-control">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text">Tahun Terbit</span>
              <input name="tahunterbit" required type="date" class="form-control">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text">Penerbit</span>
              <input name="penerbit" required type="varchar" class="form-control">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text">Penulis</span>
              <input name="penulis" required type="varchar" class="form-control">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text">stok</span>
              <input name="stok" required type="text" class="form-control">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text">jenis Buku</span>
              <select name="jenisbuku" class="custom-select form-control" required>
              <option value=""></option>
                <?php
                  $data = mysqli_query($conn, "select * from buku");
                  while($d = mysqli_fetch_array($data)){
                  ?>
                  <option value="<?php echo $d['id_buku']; ?>"><?php echo $d['jenis_buku']; ?></option>
                <?php } ?>
              </select>
            </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <input class="btn btn-success" type="submit" value="Simpan"></form>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal menu3-->
<div class="modal" id="myModalmenu3">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Data Mahasiswa</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="insertMahasiswa.php">
        <div class="input-group mb-2">
            <span class="input-group-text">id_mahasiswa</span>
            <input type="int" Name="idmahasiswa" required class="form-control">
          </div>
        <div class="input-group mb-2">
            <span class="input-group-text">Nama</span>
            <input type="varchar" Name="nama" required class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">Jenis Kelamin</span>
            <select name="jeniskelamin" class="custom-select form-control" required>
            <option value=""></option>
                <?php
                  $data = mysqli_query($conn, "select * from mahasiswa");
                  while($d = mysqli_fetch_array($data)){
                  ?>
                  <option value="<?php echo $d['id_mahasiswa']; ?>"><?php echo $d['jenis_kelamin']; ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">Alamat</span>
            <input name="alamat" required type="varchar" class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">Telepon</span>
            <input name="telepon" required type="text" class="form-control">
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <input class="btn btn-success" type="submit" value="Simpan"></form>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal menu4-->
<div class="modal" id="myModalmenu4">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Data Peminjaman</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="insertPeminjaman.php">
        <div class="input-group mb-2">
            <span class="input-group-text">id_peminjaman</span>
            <input type="int" Name="idpeminjaman" required class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">id_mahasiswa</span>
            <input name="idmahasiswa" required type="int" class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">Tanggal Peminjaman</span>
            <input name="tanggalpeminjaman" required type="date" class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">Tanggal Pengembalian</span>
            <input name="tanggalpengembalian" required type="date" class="form-control">
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <input class="btn btn-success" type="submit" value="Simpan"></form>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal menu5-->
<div class="modal" id="myModalmenu5">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Data Transaksi</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="insertTransaksi.php">
          <div class="input-group mb-2">
            <span class="input-group-text">id_transaksi</span>
            <input type="int" Name="idtransaksi" required class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">id_mahasiswa</span>
            <input type="int" Name="idmahasiswa" required class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">id_buku</span>
            <input type="int" Name="idbuku" required class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">id_peminjamaan</span>
            <input type="int" Name="idpeminjaman" required class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">Tanggal Diserahkan</span>
            <input type="date" Name="tanggaldiserahkan" required class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">Tanggal Diterima</span>
            <input type="date" Name="tanggalditerima" required class="form-control">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">Denda</span>
            <input type="text" Name="denda" required class="form-control">
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <input class="btn btn-success" type="submit" value="Simpan"></form>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>

</div>
</body>

</html>

