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
                <form>
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" placeholder="Masukkan id" />
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