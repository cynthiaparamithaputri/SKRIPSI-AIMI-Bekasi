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
    <title>Tentang AIMI Bekasi</title>
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
      <div class="tentang w-100 min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col">
            <h1 class="display-4 text-center mb-2">Tentang Kami</h1>
            </div>
          </div>
          <div class="row my-5">
            <div class="col">
            <p style="white-space: pre-line;"><?php echo $tentang ?></p>
            </div>
          </div>
          <div class="row py-3">
            <div class="col">
            <h4 class="fw-bold">Visi AIMI</h4>
            <p style="white-space: pre-line;"><?php echo $visi ?></p>
            <h4 class="fw-bold mt-5">Misi AIMI</h4>
            <p style="white-space: pre-line;"><?php echo $misi ?></p>
            <h4 class="fw-bold mt-5">Lokasi</h4>
            <p style="white-space: pre-line;"><?php echo $lokasi ?></p>
            <h4 class="fw-bold mt-5">Kontak</h4>
            <p><strong>Telepon</strong>: <?php echo $kontak ?> <br/><strong>E-mail</strong>: <?php echo $email ?></p>
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