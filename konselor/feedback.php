<?php 
    session_start();
      if(!isset($_SESSION['login_konselor'])) {
        header("location: ../login-admin.php");
      }else{

        include '../koneksi.php';

        $id_unik = $_SESSION['login_konselor'];
        $sql = "SELECT * FROM t_admin WHERE id_unik = '$id_unik'";
        $hasil = mysqli_query($koneksi, $sql);
        $row = $hasil->fetch_assoc();
        $id_petugas = $row['id_petugas'];

        $per_page = 5; // Jumlah row per halaman
        $page = isset($_GET['page']) ? $_GET['page'] : 1; // Halaman saat ini, default 1
        $start = ($page - 1) * $per_page; // Nilai awal untuk query LIMIT
        
        $sql2 = "SELECT * FROM t_konseling WHERE id_petugas = '$id_petugas' AND feedback != '' ORDER BY t_konseling.id_konseling DESC LIMIT $start, $per_page";
        $hasil2 = mysqli_query($koneksi, $sql2);
        $jumlah = mysqli_num_rows($hasil2);

        $keyword = "";

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // Filter berdasarkan kata kunci
            if (isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
            }

            $sql2 = "SELECT * FROM t_konseling WHERE id_petugas = '$id_petugas' AND feedback != ''";

            // Tambahkan kondisi untuk filter kata kunci
            if (!empty($keyword)) {
                $sql2 .= " AND (LOWER(id_konseling) LIKE '%$keyword%' OR LOWER(nama_ibu) LIKE '%$keyword%' OR LOWER(jenis_konseling) LIKE '%$keyword%' OR LOWER(masalah) LIKE '%$keyword%' OR LOWER(feedback) LIKE '%$keyword%')";
            }

            $sql2 .= " ORDER BY t_konseling.id_konseling DESC LIMIT $start, $per_page";

            $hasil2 = mysqli_query($koneksi, $sql2);
            $jumlah = mysqli_num_rows($hasil2);
        }

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
            <p>Lihat feedback yang telah diberikan kepada anda oleh para pasien konseling</p>
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
                        <?php 
                        while ($row2 = $hasil2->fetch_assoc()) {

                          echo "
                          <tr>
                            <th scope='row'>$row2[id_konseling]</th>
                            <td>$row2[nama_ibu]</td>
                            <td>$row2[jenis_konseling]</td>
                            <td>$row2[masalah]</td>
                            <td>$row2[feedback]</td>
                          </tr>
                          ";
                        }
                        ?>
                        </tbody>
                        </table>
                        </div>
                        <div class="d-flex justify-content-start">
                        <p class="fw-bold">Jumlah Data: <?php echo $jumlah ?></p>
                        </div>
                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <?php
                                $count_query = "SELECT COUNT(*) AS total FROM t_konseling WHERE id_petugas = '$id_petugas' AND feedback != ''";
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
            </div>
        </div>
    </div>
  </body>
</html>
<?php
}
?>