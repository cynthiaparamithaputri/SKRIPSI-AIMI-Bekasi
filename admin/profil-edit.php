<?php 
    session_start();
      if(!isset($_SESSION['login_admin'])) {
        header("location: ../login-admin.php");
      }else{

        include '../koneksi.php';

            $errorMessage = "";

            $id_unik = $_SESSION['login_admin'];

            $sql = "SELECT * FROM t_admin WHERE id_unik = '$id_unik'";
            $hasil = mysqli_query($koneksi, $sql);
            $row = $hasil->fetch_assoc();

            $nama = $row["nama"];
            $telp = $row["no_hp"];
            $email = $row["email"];
            $password = $row["password"];
            $konfirm_password = $row["password"];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nama = $_POST['nama'];
                $telp = $_POST['telp'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $konfirm_password = $_POST['konfirm_password'];
              
                do {
                  if (empty($nama) || empty($telp) || empty($email) || empty($password) || empty($konfirm_password)) {
                    $errorMessage = "Tidak boleh ada data yang kosong!";
                    break;
                  }

                  if ($password !== $konfirm_password) {
                    $errorMessage = "Password yang dimasukkan tidak sama!";
                    break;
                  }
              
                    $sql2 = "UPDATE t_admin SET nama = '$nama', no_hp = '$telp', email = '$email', password = '$password' WHERE id_unik = '$id_unik'";

                    $hasil2 = $koneksi->query($sql2);

                    if (!$hasil2) {
                        $errorMessage = "Gagal memperbaharui akun";
                        break;
                    }

                    header("location: profil.php");
                    exit;

                } while (false);
              }
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
        include "../components/navbar-admin.php";
        ?>
        <div class="user-app">
            <div class="konselor w-100 min-vh-100 mt-5">
                <div class="container">
                <div class="row my-5">
                    <div class="col text-left mb-3">
                    <h3 class="mb-2 text-sm">Edit Profil</h3>
                    <p>Pastikan data sesuai</p>
                    </div>
                    <hr class="hr" />
                </div>
                <div class="row">
                <form id="edit-profil" method="post">
                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>" />
                    </div>

                    <div class="mb-4">
                        <label for="telp" class="form-label">No WA</label>
                        <input type="tel" class="form-control" id="telp" name="telp" value="<?php echo $telp ?>" />
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" />
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $password?>" />
                    </div>

                    <div class="mb-4">
                        <label for="konfirm_password" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="konfirm_password" name="konfirm_password" value="<?php echo $konfirm_password?>" />
                    </div>
                </form>
                </div>
                <div class="row my-4">
                    <div class="col">
                    <button class="btn-1" onclick="window.location.href='profil.php';">Kembali</button>
                    <button class="btn-2" form="edit-profil" type="submit">Ubah</button>
                    <?php
                        if (!empty($errorMessage)){
                        echo "
                        <div class='alert alert-warning alert-dismissible fade show mt-5' role='alert'>
                        <strong>$errorMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        ";
                        }
                        ?>
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