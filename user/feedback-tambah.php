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
    <title>Tambah Feedback</title>
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
      <div class="riwayat w-100 min-vh-100">
        <div class="detail container">
          <div class="row">
            <div class="col">
            <h3 class="mb-2">Tambahkan Feedback</h3>
            <p>- Kami sangat menghargai feedback anda</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col">
            <hr class="hr" />
            <form id="form-feedback">
            <div class="mb-5">
                <textarea class="form-control" id="feedback" rows="3"></textarea>
                <p class="opacity-50">*Feedback hanya bisa diisi sekali dan tidak dapat diubah</p>
            </div>
            </form>
            <button class="btn-1" onclick="window.location.href='riwayat.php';">Kembali</button>
            <button class="btn-2" type="submit" form="form-feedback">Submit</button>
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