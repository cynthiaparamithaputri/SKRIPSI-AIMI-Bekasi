<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Tentang AIMI Bekasi</title>
    <?php
    //link eksternal
    include "../components/head-links-other.php";
    ?>
  </head>
  <body>
    <div>
      <?php
      //navbar
      include "../components/navbar-user.php";
      ?>
      <div class="user-app">
      <div class="riwayat w-100 min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col">
            <h3 class="mb-2">Riwayat Konseling</h3>
            <p>- Kami sangat menghargai feedback anda</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Waktu Selesai</th>
                    <th scope="col">Jenis Konseling</th>
                    <th scope="col">Konselor</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>23/07/2023 19:03</td>
                    <td>Konseling Menyusui</td>
                    <td>Konselor #1</td>
                    <td><button class="btn-sm m-1" onclick="window.location.href='riwayat-detail.php';">Detail</button>
                    <button class="btn-sm m-1" onclick="window.location.href='feedback-tambah.php';">Feedback</button></td>
                    </tr>
                </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <?php
      //footer
      include "../components/footer-user.php";
      ?>
    </div>
  </body>
</html>