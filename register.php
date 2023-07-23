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
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="email" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" />
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password2" />
                    </div>
                    <button type="submit" class="mt-2">
                    Register
                    </button>
                </form>
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