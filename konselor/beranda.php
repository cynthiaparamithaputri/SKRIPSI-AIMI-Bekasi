<?php 
    session_start();
      if(!isset($_SESSION['login_konselor'])) {
        header("location: ../login-admin.php");
      }else{

        include '../koneksi.php';

        $id_unik = $_SESSION['login_konselor'];

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
    <title>Konselor</title>
    <?php
    //link eksternal
    include "../components/head-links-other.php";
    ?>
  </head>
  <body>
    <div class="admin">
        <?php
        //navbar
        include "../components/navbar-konselor.php";
        ?>
        <div class="beranda min-vh-100">
        <header class="jumbotron w-100 d-flex align-items-center">
          <div class="container text-center">
            <h1>Hallo, <?php echo $nama ?>!</h1>
            <p>Selamat datang di website AIMI Bekasi sisi konselor. Mulai pengelolaanmu sekarang</p>
          </div>
        </header>
          <section class="container mt-5">
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Konseling</h5>
                    <p class="card-text">Lihat data konseling yang tersedia untuk anda</p>
                    <button class="btn-2" onclick="window.location.href='konseling.php';">Mulai</button>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Feedback</h5>
                    <p class="card-text">Lihat feedback yang telah diberikan oleh pasien untuk performa anda</p>
                    <button class="btn-2" onclick="window.location.href='konseling.php';">Mulai</button>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Pengaturan Akun</h5>
                    <p class="card-text">Kelola akun anda dan ubah password</p>
                    <button class="btn-2" onclick="window.location.href='profil.php';">Mulai</button>
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