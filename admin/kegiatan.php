<?php 
    session_start();
      if(!isset($_SESSION['login_admin'])) {
        header("location: ../login-admin.php");
      }else{

        include '../koneksi.php';

        $no = 0;
        $per_page = 10; // Jumlah row per halaman
        $page = isset($_GET['page']) ? $_GET['page'] : 1; // Halaman saat ini, default 1
        $start = ($page - 1) * $per_page; // Nilai awal untuk query LIMIT
        
        $sql = "SELECT * FROM t_kegiatan ORDER BY t_kegiatan.id_kegiatan DESC LIMIT $start, $per_page";
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

        $keyword = "";

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // Filter berdasarkan bulan, tahun, atau kata kunci
            if (isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
            }

            $sql = "SELECT * FROM t_kegiatan WHERE 1=1";

            // Tambahkan kondisi untuk filter kata kunci
            if (!empty($keyword)) {
                $sql .= " AND (LOWER(judul) LIKE '%$keyword%' OR LOWER(jadwal) LIKE '%$keyword%' OR LOWER(deskripsi) LIKE '%$keyword%')";
            }

            $sql .= " ORDER BY t_kegiatan.id_kegiatan DESC LIMIT $start, $per_page";

            $hasil = mysqli_query($koneksi, $sql);
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
            <p>Kelola seluruh data kegiatan dengan menambahkan, memperbaharui, atau menghapus kegiatan yang diselenggarakan oleh AIMI Bekasi</p>
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
                    <div class="d-flex justify-content-end">
                            <div class="row">
                                <div class="col">
                                 <!-- Filter Form -->
                                <form method="get">
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari kata kunci" name="keyword">
                                    <button class="btn btn-primary" type="submit">Filter</button>
                                  </div>
                                </form>
                                <!-- End of Filter Form -->
                                </div>
                            </div>
                        </div>
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

                            $no = ++$no;
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
                              <button class='btn-sm btn-primary' onclick=window.location.href='kegiatan-edit.php?id_kegiatan=$row[id_kegiatan]'>Edit</button><br/>
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
                <!-- Pagination -->
                <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <?php
                            $count_query = "SELECT COUNT(*) AS total FROM t_kegiatan";
                            $count_result = mysqli_query($koneksi, $count_query);
                            $count_row = mysqli_fetch_assoc($count_result);
                            $total_data = $count_row['total'];
                            $total_pages = ceil($total_data / $per_page);

                            for ($i = 1; $i <= $total_pages; $i++) {
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
    </div>
  </body>
</html>
<?php
}
?>