<?php 
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: ../login.php");
      }else{
        ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>AIMI Bekasi</title>
    <?php
    //link eksternal
    include "../components/head-links-other.php";
    ?>
  </head>
  <body>
    <div>
        <?php
        //navbar
        include "../components/navbar-user.php";
        ?>
        <div class="beranda">
          <header class="w-100 min-vh-100 d-flex align-items-center">
          <div class="container header-box pt-lg-5">
            <div class="row d-flex align-items-center">
              <div class="col">
                <h1 class="mb-4">Asosiasi<br/><span class="fw-bold">Ibu Menyusui</span><br/>Indonesia</h1>
                <p class="mb-4">Asosiasi Ibu Menyusui Indonesia (AIMI) adalah organisasi nirlaba berbasis kelompok sesama ibu menyusui dengan tujuan menyebarluaskan pengetahuan dan informasi tentang menyusui serta meningkatkan angka ibu menyusui di Indonesia.</p>
                <div class="d-flex">
                  <button class="btn btn-1 btn-md rounded-1 me-2 mb-xs-0 mb-2" onclick="window.location.href='tentang.php';">Tentang Kami</button>
                  <button class="btn btn-2 btn-md rounded-1 me-2 mb-xs-0 mb-2" onclick="window.location.href='daftar.php';">Daftar Konseling<i class="fa-solid fa-chevron-right ms-2"></i></button>
                </div>
              </div>
            </div>
          </div>
          </header>
          <div class="kegiatan-user w-100 min-vh-100">
            <div class="container">
              <div class="row">
                <div class="col">
                <h1 class="text-center fw-bold">Ayo Ikuti Kegiatan Kami!</h1>
                <p class="text-center">Berikut adalah jadwal kegiatan-kegiatan terbaru yang dapat diikuti pada ibu menyusui Bekasi</p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                    <img src="../assets/img/kegiatan/kegiatan-1.webp" alt="unsplash.com" class="w-100 mb-3" />
                    <div class="card-title mb-5 px-3">
                    <h5>IG Live Sharing Session</h5>
                    </div>
                    <hr class="hr" />
                    <div class="ket d-flex justify-content-between align-items-center px-3 pb-3">
                      <p class="m-0 text-primary fw-bold">Minggu, 14 Mei 2023</p>
                      <a href="">Detail</a>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col text-center">
                <button class="btn rounded-5 btn-lg px-4 fw-bold" onclick="window.location.href='kegiatan.php';">Lihat Semua Kegiatan <i class="fa-solid fa-chevron-right ms-2"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        //footer
        include "../components/footer-user.php";
        ?>
    </div>
  </body>
</html>
<?php
}
?>