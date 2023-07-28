<?php 
include "koneksi.php";

$nama = "";
$email = "";
$password = "";
$konfirm_password = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $konfirm_password = $_POST['konfirm_password'];

  do {
    if (empty($nama) || empty($email) || empty($password) || empty($konfirm_password)) {
      $errorMessage = "Semua kolom wajib diisi!";
      break;
    }

    if ($password !== $konfirm_password) {
      $errorMessage = "Password tidak sama!";
      break;
    }

    $sql = "SELECT * FROM t_user WHERE email='$email'";
    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) > 0) {
      $errorMessage = "Email sudah terpakai, masukkan yang lain!";
      break;
    } else {
      $sql2 = "INSERT INTO t_user (nama, email, password) VALUES ('$nama', '$email', '$password')";
      $hasil2 = mysqli_query($koneksi, $sql2);

      if (!$hasil2) {
        $errorMessage = "Registrasi Anda Gagal!";
        break;
        
      } else {

        $nama = "";
        $email = "";
        $password = "";
        $konfirm_password = "";
        $errorMessage = "";

        $successMessage = "Akun Anda Berhasil Dibuat!";
      }
    }

  } while (false);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Register</title>
    <?php
    //link eksternal
    include "components/head-links.php";
    ?>
  </head>
  <body>
    <div>
      <div class="log-app">
      <nav class="navbar fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="login.php"><i class="bi bi-arrow-left mx-2"></i>KEMBALI</a>
        </div>
      </nav>
      <div class="login w-100 min-vh-100 d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center align-items-center mt-lg-0">
          <div class="col col-12 col-md-9 col-lg-6 col-xl-5">
            <div class="login-text mb-5 mt-lg-0 mt-3 text-center">
                <h1 class="fw-bold mb-0">Buat akun anda!</h1>
            </div>
                <form method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password2" name="konfirm_password" value="<?php echo $konfirm_password; ?>" />
                    </div>
                    <button type="submit" class="mt-2">
                    Register
                    </button>
                </form>
                <?php
                if (!empty($errorMessage)){
                echo "
                <div class='mt-3 alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
                }
              ?>
              <?php
                if (!empty($successMessage)){
                  echo "
                  <div class='mt-3 alert alert-success alert-dismissible fade show' role='alert'>
                  <strong>$successMessage</strong>
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>
                  ";
                }
                ?>
          </div>
              
          <div class="col col-12 col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <img src="assets/img/hello.gif" class="img-fluid" alt="hello-gif" />
          </div>
            
          </div>
        </div>
      </div>
      </div>
    </div>
  </body>
</html>