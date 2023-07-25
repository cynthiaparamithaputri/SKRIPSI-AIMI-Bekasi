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
        include "../components/navbar-konselor.php";
        ?>
        <div class="beranda min-vh-100">
        <header class="jumbotron w-100 d-flex align-items-center">
          <div class="container text-center">
            <h1>Hallo, Nama Konselor!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet ex at libero vulputate
              gravida. Donec scelerisque mauris ac nisi iaculis, eget aliquet dui tempor.</p>
          </div>
        </header>
          <section class="container mt-5">
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Konseling</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <button class="btn-2" onclick="window.location.href='konseling.php';">Mulai</button>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Feedback</h5>
                    <p class="card-text">Phasellus sit amet ex at libero vulputate gravida.</p>
                    <button class="btn-2" onclick="window.location.href='konseling.php';">Mulai</button>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
    </div>
  </body>
</html>