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
                <form action="user/beranda.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan email" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan password" />
                    </div>
                    <button type="submit" class="mt-2 mb-5">
                    Masuk
                    </button>
                </form>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </body>
</html>