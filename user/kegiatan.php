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
    <title>Semua Kegiatan</title>
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
      <div class="user-app">
      <div class="kegiatan-user w-100 min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col">
            <h1 class="display-4 text-center mb-2">Semua Kegiatan</h1>
            </div>
          </div>
          <div class="row my-5">
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
            <div class="col bg-transparent"></div>
            <div class="col bg-transparent"></div>
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