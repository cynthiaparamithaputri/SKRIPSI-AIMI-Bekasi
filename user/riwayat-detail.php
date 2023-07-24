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
        <div class="detail container">
          <div class="row">
            <div class="col">
            <h3 class="mb-2">Riwayat Konseling</h3>
            <p class="">- Kami sangat menghargai feedback anda</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col">
            <div class="mb-3">
                <label for="waktu-selesai" class="form-label">Waktu Selesai</label>
                <input class="form-control" type="text" value="23/07/2023 19:03" id="waktu-selesai" disabled readonly>
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Konseling</label>
                <input class="form-control" type="text" value="Konseling Menyusui" id="jenis" disabled readonly>
            </div>
            <div class="mb-3">
                <label for="masalah" class="form-label">Masalah yang Dihadapi</label>
                <textarea class="form-control" id="masalah" rows="4" disabled readonly>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus esse, tempora assumenda nesciunt sed facere quia modi soluta magnam inventore iure, ullam laudantium laborum autem odio dolores quam repudiandae voluptatibus.</textarea>
            </div>
            <div class="mb-5">
                <label for="konselor" class="form-label">Konselor</label>
                <input class="form-control" type="text" value="Konselor #1" id="konselor" disabled readonly>
            </div>
            <hr class="hr" />
            <div class="mb-5">
                <label for="feedback" class="form-label">Feedback</label>
                <textarea class="form-control" id="feedback" rows="3" disabled readonly></textarea>
                <p class="opacity-50">*Jika masih kosong, silahkan berikan feedback di halaman Riwayat.</p>
            </div>
            <button class="btn-2" onclick="window.location.href='riwayat.php';">Kembali</button>
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