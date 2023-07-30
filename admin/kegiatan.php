<?php 
    session_start();
      if(!isset($_SESSION['login_admin'])) {
        header("location: login-admin.php");
      }else{

        include '../koneksi.php';

        $no = 1;
        
        $sql = "SELECT * FROM t_kegiatan";
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
    <title>Data Kegiatan</title>
    <?php
    //link eksternal
    include "../components/head-links-other.php";
    ?>
  </head>
  <body>
    <div class="admin">
        <?php
        //navbar
        include "../components/navbar-admin.php";
        ?>
        <div class="user-app">
        <header class="jumbotron w-100 d-flex align-items-center">
          <div class="container text-center">
            <h1>Data Kegiatan</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet ex at libero vulputate
              gravida. Donec scelerisque mauris ac nisi iaculis, eget aliquet dui tempor.</p>
              <div>
                <button class="btn-3 btn-lg" onclick="window.location.href='kegiatan-tambah.php';">Tambah Kegiatan Baru<i class="bi bi-calendar-plus mx-2"></i></button>
              </div>
          </div>
        </header>
            <div class="kegiatan w-100 min-vh-100">
                <div class="container">
                <div class="row my-5">
                    <div class="col">
                    <div class="table-comp">
                        <div class="table-responsive">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Kegiatan</th>
                            <th scope="col">Jadwal</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Gambar</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
 
                          while ($row = $hasil->fetch_assoc()) {

                            $no = $no++;
                            $tanggal = $row['jadwal'];
                            $timestamp = strtotime($row['jadwal']);
                            $day = date('l', $timestamp);
                            
                            
                          $translatedDay = translate($day);
                          $jadwal = "$translatedDay, $tanggal";
                            

                            echo "
                            <tr>
                              <th scope='row'>$no</th>
                              <td>$row[judul]</td>
                              <td>$jadwal</td>
                              <td class='col-md-6'>$row[deskripsi]</td>
                              <td>
                              <div class='keg-image text-center'>
                                  <img src='../$row[gambar]' class='rounded' alt='...' />
                              </div>
                              </td>
                              <td class='text-center'>
                              <button class='btn-sm btn-primary' onclick=window.location.href='kegiatan-edit.php?id_kegiatan=$row[id_kegiatan]'>Sunting</button><br/>
                              <button class='btn-sm btn-danger' onclick=window.location.href='kegiatan-hapus.php?id_kegiatan=$row[id_kegiatan]'>Hapus</button>
                              </td>
                            </tr>
                            ";
                          }
                          ?>
                        </tbody>
                        </table>
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