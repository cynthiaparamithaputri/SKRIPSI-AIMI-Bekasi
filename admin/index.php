<?php 
    session_start();
      if(!isset($_SESSION['login_admin'])) {
        header("location: ../login-admin.php");
      }else{

        include '../koneksi.php';

        $id_unik = $_SESSION['login_admin'];

        $sql = "SELECT * FROM t_admin WHERE id_unik = '$id_unik'";
        $hasil = mysqli_query($koneksi, $sql);
        $row = $hasil->fetch_assoc();
        $nama = $row['nama'];

        ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin</title>
    <?php
    //link eksternal
    include "../components/head-links-other.php";
    ?>
  </head>
  <body>
    <div class="admin">
        <?php
        //navbar
        include "../components/navbar-admin.php";
        ?>
        <div class="beranda min-vh-100">
        <header class="jumbotron w-100 d-flex align-items-center">
          <div class="container text-center">
            <h1>Hallo, Admin <?php echo $nama ?>!</h1>
            <p>Selamat datang di website AIMI Bekasi sisi admin. Mulai pengelolaanmu sekarang</p>
          </div>
        </header>
          <section class="container mt-5">
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Kegiatan</h5>
                    <p class="card-text">Kelola atau tambahkan kegiatan AIMI Bekasi</p>
                    <button class="btn-2" onclick="window.location.href='kegiatan.php';">Mulai</button>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Konseling</h5>
                    <p class="card-text">Tetapkan seorang konselor untuk jadwal konseling AIMI Bekasi</p>
                    <button class="btn-2" onclick="window.location.href='konseling.php';">Mulai</button>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Konselor</h5>
                    <p class="card-text">Kelola atau tambahkan konselor AIMI Bekasi yang tersedia</p>
                    <button class="btn-2" onclick="window.location.href='konselor.php';">Mulai</button>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
    </div>
  </body>
</html>
<?php
}
?>