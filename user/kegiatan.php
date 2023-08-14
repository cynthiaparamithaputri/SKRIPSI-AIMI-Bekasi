<?php 
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: ../login.php");
      }else{

        include '../koneksi.php';
        
        // Pengaturan pagination
        $per_page = 9; // Jumlah row per halaman
        $page = isset($_GET['page']) ? $_GET['page'] : 1; // Halaman saat ini, default 1
        $start = ($page - 1) * $per_page; // Nilai awal untuk query LIMIT

        $sql = "SELECT * FROM t_kegiatan ORDER BY id_kegiatan DESC LIMIT $start, $per_page";
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
                    <img src='../$row[gambar]' class='card-img-top' alt='...'>
                    <div class='card-body'>
                      <h5 class='card-title'>$row[judul]</h5>
                      <p class='card-text' style='white-space: pre-line;'>$row[deskripsi]</p>
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
            <!-- Pagination -->
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                  <?php
                  // Query untuk menghitung total row
                  $count_query = "SELECT COUNT(*) AS total FROM t_kegiatan";
                  $count_result = mysqli_query($koneksi, $count_query);
                  $count_row = mysqli_fetch_assoc($count_result);
                  $total_data = $count_row['total'];
                  $total_pages = ceil($total_data / $per_page); // Jumlah halaman

                  for ($i = 1; $i <= $total_pages; $i++) {
                      // Membuat link navigasi halaman dengan styling Bootstrap
                      echo "<li class='page-item";
                      if ($i == $page) {
                          echo " active";
                      }
                      echo "'><a class='page-link' href='?page=$i'>$i</a></li>";
                  }
                  ?>
                  <li class="page-item disabled">
                      <span class="page-link">Halaman <?php echo $page; ?> dari <?php echo $total_pages; ?></span>
                  </li>
              </ul>
            </nav>
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