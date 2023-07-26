<?php 
include "koneksi.php";

$email = "";
$password = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  do {
    if (empty($email) || empty($password)) {
      $errorMessage = "Masukkan Email atau Password!";
      break;
    }

    // Prepare the SQL statement with parameter binding
    $sql = "SELECT * FROM t_user WHERE email='$email'";
    $hasil = mysqli_query($koneksi, $sql);

    if (!$hasil) {
      $errorMessage = "Kesalahan dalam mendapatkan hasil kueri.";
      break;
    }

    // Check if the query returns a valid result
    if (mysqli_num_rows($hasil) > 0) {
      $row = mysqli_fetch_assoc($hasil);

      if ($password == $row['password']) {
        session_start();
        $_SESSION['login_user'] = $row['email'];
        header('Location: user/beranda.php');
        exit;
      } else {
        $errorMessage = "Gagal login. Password salah!";
        break;
      }
    } else {
      $errorMessage = "Gagal login. Email atau password salah!";
      break;
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
    <title>Login</title>
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
            <a class="navbar-brand" href="index.php"><i class="bi bi-arrow-left mx-2"></i>KEMBALI</a>
        </div>
      </nav>
      <div class="login w-100 min-vh-100 d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center align-items-center mt-lg-0">
            <div class="col col-12 col-md-9 col-lg-6 col-xl-5">
            <img src="assets/img/login.gif" class="img-fluid" alt="login-gif" />
            </div>
            <div class="col col-12 col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <div class="login-register mb-3">
                    <button type="button" class="btn btn-floating mx-1 w-100" onclick="window.location.href='register.php';">
                    <p class="lead fw-normal mb-0">Belum Punya Akun? Register</p>
                    </button>
                </div>
                <div class="login-other mb-3">
                    <button type="button" class="btn btn-floating mx-1 w-100" onclick="window.location.href='login-admin.php';">
                    <p class="lead fw-normal mb-0">Anda Admin atau Konselor</p>
                    </button>
                </div>
                <p class="text-center fw-bold mx-3 my-3">Atau</p>
                <form method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Masukkan email" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password"  name="password" value="<?php echo $password; ?>" placeholder="Masukkan password" />
                    </div>
                    <button type="submit" class="mt-2 mb-5">
                    Masuk
                    </button>
                </form>
                <?php
                if (!empty($errorMessage)){
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
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