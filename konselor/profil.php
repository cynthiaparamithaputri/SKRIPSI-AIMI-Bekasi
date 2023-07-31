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
    <div class="admin">
        <?php
        //navbar
        include "../components/navbar-konselor.php";
        ?>
        <div class="user-app">
            <div class="konselor w-100 min-vh-100 mt-5">
                <div class="container">
                <div class="row my-5">
                    <div class="col text-left mb-4">
                    <h3 class="mb-2 text-sm">Akun</h3>
                    <p>Jika ingin mengubah password, klik ubah password</p>
                    <button class="btn-2" onclick="window.location.href='password-edit.php';">Ubah Password <i class="bi bi-pencil"></i></button>
                    </div>
                    <hr class="hr" />
                </div>
                <div class="row">
                    <div class="mb-4">
                        <label for="id_unik" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id_unik" value="<?php echo $row['id_unik'] ?>" disabled readonly />
                    </div>

                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" value="<?php echo $row['nama'] ?>" disabled readonly />
                    </div>

                    <div class="mb-4">
                        <label for="telp" class="form-label">No WA</label>
                        <input type="tel" class="form-control" id="telp" value="<?php echo $row['no_hp'] ?>" disabled readonly />
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $row['email'] ?>" disabled readonly />
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" value="<?php echo $row['password'] ?>" disabled readonly />
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col text-center">
                    <button class="btn-1 btn-lg" onclick="window.location.href='profil-edit.php';">Edit Profil</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
<?php
}
?>