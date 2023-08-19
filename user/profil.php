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
    <title>Pengaturan Akun</title>
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
            <?php 
            include '../koneksi.php';

            $email = $_SESSION['login_user'];

            $sql = "SELECT * FROM t_user WHERE email = '$email'";
            $hasil = mysqli_query($koneksi, $sql);
            $row = $hasil->fetch_assoc();
            ?>
            <h3 class="mb-2">Hallo, <?php echo $row["nama"] ?></h3>
            <p>Jika ingin mengubah data akun, klik Edit Akun</p>
            <button class="btn-2" onclick="window.location.href='profil-edit.php';">Edit Akun <i class="bi bi-pencil"></i></button>
            </div>
          </div>
          <hr class="hr" />
          <div class="row my-5">
            <div class="col">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Anda</label>
                <input class="form-control" type="text" value="<?php echo $row["nama"] ?>" id="nama" disabled readonly>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="email" value="<?php echo $row["email"] ?>" id="email" disabled readonly>
            </div>
            <div class="mb-5">
                <label for="password" class="form-label">Password</label>
                <input class="form-control" type="password" value="<?php echo $row["password"] ?>" id="password" disabled readonly>
            </div>
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