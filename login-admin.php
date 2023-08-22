<?php 
include "koneksi.php";

$id = "";
$password = "";
$role = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $password = $_POST['password'];

  do {
    if (empty($id) || empty($password)) {
      $errorMessage = "Masukkan Email atau Password!";
      break;
    }

    // Prepare the SQL statement with parameter binding
    $sql = "SELECT * FROM t_admin WHERE id_unik='$id'";
    $hasil = mysqli_query($koneksi, $sql);

    if (!$hasil) {
      $errorMessage = "Kesalahan dalam mendapatkan hasil kueri.";
      break;
    }

    // Check if the query returns a valid result
    if (mysqli_num_rows($hasil) > 0) {
      $row = mysqli_fetch_assoc($hasil);

      if ($password == $row['password']) {

        $role = $row['role'];

        if ($role == "admin") {
        session_start();
        $_SESSION['login_admin'] = $row['id_unik'];
        header('Location: admin/');
        exit;

      } else if ($role == "konselor") {
        session_start();
        $_SESSION['login_konselor'] = $row['id_unik'];
        header('Location: konselor/');
        exit;

      } else {
        $errorMessage = "Gagal login. Anda bukan admin maupun konselor!";
        break;

      }
    
    } else {
        $errorMessage = "Gagal login. Password salah!";
        break;
    }
    } else {
      $errorMessage = "Gagal login. ID atau password salah!";
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
    <title>Login Admin/Konselor</title>
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
            <img src="assets/img/login.gif" class="img-fluid" alt="login-gif" />
            </div>
            <div class="col col-12 col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <div class="login-text mb-5 mt-lg-0 mt-1 text-center">
                    <p class="lead fw-bold mb-0">Masuk sebagai Admin / Konselor</p>
                </div>
                <form method="post">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" placeholder="Masukkan id" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>" placeholder="Masukkan password" />
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