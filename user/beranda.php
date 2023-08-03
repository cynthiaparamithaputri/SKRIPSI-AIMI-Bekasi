<?php 
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: ../login.php");
      }else{

        include '../koneksi.php';
        
        $sql = "SELECT * FROM t_kegiatan ORDER BY id_kegiatan DESC LIMIT 3";
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
    <title>AIMI Bekasi</title>
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
        <div class="beranda">
          <header class="w-100 min-vh-100 d-flex align-items-center">
          <div class="container header-box pt-lg-5">
            <div class="row d-flex align-items-center">
              <div class="col">
                <h1>Asosiasi<br/><span class="fw-bold">Ibu Menyusui Indonesia</span><br/></h1>
                <h3 class="mb-4">Cabang Bekasi</h3>
                <p class="mb-4">Asosiasi Ibu Menyusui Indonesia (AIMI) cabang Bekasi adalah organisasi nirlaba berbasis kelompok sesama ibu menyusui dengan tujuan menyebarluaskan pengetahuan dan informasi tentang menyusui serta meningkatkan angka ibu menyusui di Bekasi.</p>
                <div class="d-flex">
                  <button class="btn btn-1 btn-md rounded-1 me-2 mb-xs-0 mb-2" onclick="window.location.href='tentang.php';">Tentang Kami</button>
                  <button class="btn btn-2 btn-md rounded-1 me-2 mb-xs-0 mb-2" onclick="window.location.href='daftar.php';">Daftar Konseling<i class="fa-solid fa-chevron-right ms-2"></i></button>
                </div>
              </div>
            </div>
          </div>
          </header>
          <div class="kegiatan-user w-100 min-vh-100">
            <div class="container">
              <div class="row">
                <div class="col">
                <h1 class="text-center fw-bold">Ayo Ikuti Kegiatan Kami!</h1>
                <p class="text-center">Berikut adalah jadwal kegiatan-kegiatan terbaru yang dapat diikuti pada ibu menyusui Bekasi</p>
                </div>
              </div>
              <div class="row row-cols-1 row-cols-md-3 g-4">
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
                    <img src='../$row[gambar]' class='card-img-top' alt='...'>
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
              <div class="row">
                <div class="col text-center">
                <button class="btn rounded-5 btn-lg px-4 fw-bold" onclick="window.location.href='kegiatan.php';">Lihat Semua Kegiatan <i class="fa-solid fa-chevron-right ms-2"></i></button>
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
<?php
}
?>