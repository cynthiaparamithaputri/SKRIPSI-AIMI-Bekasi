<?php 
    session_start();
      if(!isset($_SESSION['login_konselor'])) {
        header("location: login-konselor.php");
      }else{

  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Feedback</title>
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
        <header class="jumbotron w-100 d-flex align-items-center">
          <div class="container text-center">
            <h1>Feedback</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet ex at libero vulputate
              gravida. Donec scelerisque mauris ac nisi iaculis, eget aliquet dui tempor.</p>
              <div>
                <button class="btn-3 btn-lg">Ekspor Feedback ke CSV<i class="bi bi-download mx-2"></i></button>
              </div>
          </div>
        </header>
            <div class="feedback w-100 min-vh-100">
                <div class="container">
                <div class="row my-5">
                    <div class="col">
                    <div class="table-comp">
                        <div class="d-flex justify-content-end">
                            <div class="row align-items-center">
                                <div class="col">
                                
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Konseling</th>
                            <th scope="col" class="col-md-4">Masalah yang Dihadapi</th>
                            <th scope="col" class="col-md-4">Feedback</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1234</th>
                            <td>Cynthia Paramitha</td>
                            <td>Konseling Menyusui</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt similique ratione reiciendis maiores enim. Consequuntur rem quia totam laudantium inventore corrupti possimus molestiae, reiciendis ipsam officiis, molestias odio ut quo.</td>
                            <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum et quia, ipsam ducimus a nisi sit ullam nam doloribus maxime dolore maiores harum rem, explicabo est cumque voluptatibus nihil at.</td>
                            </tr>
                        </tbody>
                        </table>
                        </div>
                        <div class="d-flex justify-content-start">
                        <p class="fw-bold">Jumlah Data: 1</p>
                        </div>
                    </div>
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