<?php 
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: ../login.php");
      }else{
        include '../koneksi.php';

            $email = $_SESSION['login_user'];

            $sql = "SELECT * FROM t_user WHERE email = '$email'";
            $hasil = mysqli_query($koneksi, $sql);
            $row = $hasil->fetch_assoc();
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
              <div class="col text-center">
                <h1 class="mb-4">Pendaftaran <span class="fw-bold">Konseling</span><br/>Anda Berhasil!</h1>
                <p class="mb-4 lead">Halo, ibu <?php echo $row["nama"] ?>. Silahkan klik tombol di bawah ini untuk lanjut ke tahap berikutnya yaitu menghubungi nomor admin menggunakan template yang sudah kami buat</p>
                <a class="whatsapp-button" href="https://wa.me/081288746848?text=Hallo,%20admin%20AIMI%20Bekasi.%20Saya%20sudah%20mengirim%20pendaftaran%20konseling%20di%20web">WhatsApp</a>
              </div>
            </div>
          </div>
          </header>
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