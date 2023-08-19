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
            $hak_akses = $row['hak_akses'];

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
        <div class="user-app">
            <div class="konselor w-100 min-vh-100 mt-5">
                <div class="container">
                <div class="row my-5">
                    <div class="col text-left mb-4">
                    <h3 class="mb-2 text-sm">Admin</h3>
                    
                    <?php if ($hak_akses == "Istimewa") {
                        echo "
                        <p>Halo, anda saat ini masuk sebagai admin istimewa! Anda dapat mengelola data admin dan informasi yang tampil pada aplikasi</p>
                        <button class='btn-2' onclick=window.location.href='profil-edit.php';>Edit Akun <i class='bi bi-pencil'></i></button>
                        <button class='btn-4' onclick=window.location.href='admin.php';>Lihat Data Admin</i></button>
                        <button class='btn-1' onclick=window.location.href='informasi.php';>Kelola Informasi Aplikasi</i></button>
                        ";
                    } else {
                        echo "
                        <p>Jika ingin mengubah data akun, klik Edit Akun.</p>
                        <button class='btn-2' onclick=window.location.href='profil-edit.php';>Edit Akun <i class='bi bi-pencil'></i></button>
                        ";
                    } ?>
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
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
<?php
}
?>