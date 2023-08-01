<?php 
        include 'koneksi.php';
        
        $sql = "SELECT * FROM t_kegiatan ORDER BY id_kegiatan DESC";
        $hasil = mysqli_query($koneksi, $sql);

        function translate($day) {
          $translations = array(
              'Monday'    => 'Senin',
              'Tuesday'   => 'Selasa',
              'Wednesday' => 'Rabu',
              'Thursday'  => 'Kamis',
              'Friday'    => 'Jumat',
              'Saturday'  => 'Sabtu',
              'Sunday'    => 'Minggu'
          );
      
          if (array_key_exists($day, $translations)) {
              return $translations[$day];
          } else {
              return 'Hari tidak valid';
          }
        }

        ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Semua Kegiatan</title>
    <?php
    //link eksternal
    include "components/head-links.php";
    ?>
  </head>
  <body>
    <div>
      <?php
      //navbar
      include "components/navbar-main.php";
      ?>
      <div class="user-app">
      <div class="kegiatan-user w-100 min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col">
            <h1 class="display-4 text-center mb-2">Semua Kegiatan</h1>
            </div>
          </div>
          <div class="row row-cols-1 row-cols-md-3 g-4 my-5">
              <?php 
                            
              while ($row = $hasil->fetch_assoc()) {

                $tanggal = $row['jadwal'];
                $timestamp = strtotime($row['jadwal']);
                $day = date('l', $timestamp);
                  
                  
                $translatedDay = translate($day);
                $jadwal = "$translatedDay, $tanggal";

                echo "
                  <div class='col'>
                  <div class='card h-100'>
                    <img src='$row[gambar]' class='card-img-top' alt='...'>
                    <div class='card-body'>
                      <h5 class='card-title'>$row[judul]</h5>
                      <p class='card-text'>$row[deskripsi]</p>
                    </div>
                    <div class='card-footer'>
                      <p class='text-body-primary'>$jadwal</p>
                    </div>
                  </div>
                </div>
                ";
              }
              ?>
              </div>
        </div>
      </div>
      </div>
      <?php
      //footer
      include "components/footer-main.php";
      ?>
    </div>
  </body>
</html>