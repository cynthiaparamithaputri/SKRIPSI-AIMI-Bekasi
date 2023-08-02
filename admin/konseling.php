<?php 
    session_start();
      if(!isset($_SESSION['login_admin'])) {
        header("location: ../login-admin.php");
      }else{

        include '../koneksi.php';

        $no = 0;
        $status_btn = "";
        
        $sql = "SELECT * FROM t_konseling";
        $hasil = mysqli_query($koneksi, $sql);
        $jumlah = mysqli_num_rows($hasil);

        $filter_bulan = "";
        $filter_tahun = "";
        $keyword = "";

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
          // Filter berdasarkan bulan, tahun, atau kata kunci
          if (isset($_GET['bulan'])) {
            $filter_bulan = $_GET['bulan'];
          }
          if (isset($_GET['tahun'])) {
            $filter_tahun = $_GET['tahun'];
          }
          if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
          }

        $sql = "SELECT * FROM t_konseling WHERE 1=1";

        // Tambahkan kondisi untuk filter bulan
        if (!empty($filter_bulan)) {
            $sql .= " AND MONTH(waktu_daftar) = '$filter_bulan'";
        }

        // Tambahkan kondisi untuk filter tahun
        if (!empty($filter_tahun)) {
            $sql .= " AND YEAR(waktu_daftar) = '$filter_tahun'";
        }

        // Tambahkan kondisi untuk filter kata kunci
        if (!empty($keyword)) {
            $sql .= " AND (LOWER(nama_ibu) LIKE '%$keyword%' OR LOWER(jenis_konseling) LIKE '%$keyword%' OR LOWER(masalah) LIKE '%$keyword%' OR LOWER(status) LIKE '%$keyword%')";
        }

        $hasil = mysqli_query($koneksi, $sql);
        $jumlah = mysqli_num_rows($hasil);
      }

  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Data Konseling</title>
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
            <h1>Data Konseling</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet ex at libero vulputate
              gravida. Donec scelerisque mauris ac nisi iaculis, eget aliquet dui tempor.</p>
              <div>
                <button class="btn-3 btn-lg">Ekspor Semua ke CSV<i class="bi bi-download mx-2"></i></button>
              </div>
          </div>
        </header>
            <div class="konseling w-100 min-vh-100">
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
                                    <select class="form-select" name="bulan">
                                      <option value="" selected>Pilih Bulan</option>
                                      <option value="01">Januari</option>
                                      <option value="02">Februari</option>
                                      <option value="03">Maret</option>
                                      <option value="04">April</option>
                                      <option value="05">Mei</option>
                                      <option value="06">Juni</option>
                                      <option value="07">Juli</option>
                                      <option value="08">Agustus</option>
                                      <option value="09">September</option>
                                      <option value="10">Oktober</option>
                                      <option value="11">November</option>
                                      <option value="12">Desember</option>
                                    </select>
                                    <select class="form-select" name="tahun">
                                    <option value="" selected>Pilih Tahun</option>
                                    <?php
                                    $sql_tahun = "SELECT DISTINCT YEAR(waktu_daftar) AS tahun FROM t_konseling";
                                    $hasil_tahun = mysqli_query($koneksi, $sql_tahun);
                                    while ($row_tahun = mysqli_fetch_assoc($hasil_tahun)) {
                                      $tahun = $row_tahun['tahun'];
                                      echo "<option value='$tahun'>$tahun</option>";
                                    }
                                    ?>
                                  </select>
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
                            <th scope="col">Timestamp</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Konseling</th>
                            <th scope="col" class="col-md-4">Masalah yang Dihadapi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Waktu Selesai</th>
                            <th scope="col">Konselor</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php 

                            
                            while ($row = $hasil->fetch_assoc()) {

                              $no = ++$no;
                              $waktu_selesai = $row['waktu_selesai'];
                              $status = $row['status'];

                              if ($waktu_selesai == '0000-00-00 00:00:00' ) {
                                $waktu_selesai = "";
                              }

                              if ($status == 'Selesai' ) {
                                $status_btn = "disabled";
                              } else {
                                $status_btn = "";
                              }

                              $id_petugas = $row['id_petugas'];
                              $sql2 = "SELECT * FROM t_admin WHERE id_petugas = '$id_petugas'";
                              $hasil2 = mysqli_query($koneksi, $sql2);
                              $row2 = $hasil2->fetch_assoc();

                              echo "
                              <tr>
                                <th scope='row'>$no</th>
                                <td>$row[waktu_daftar]</td>
                                <td>$row[nama_ibu]</td>
                                <td>$row[jenis_konseling]</td>
                                <td>$row[masalah]</td>
                                <td>$row[status]</td>
                                <td>$waktu_selesai</td>
                                <td class='col-md-2'>$row2[nama]</td>
                                <td class='text-center'>
                                <button class='btn-sm btn-primary' onclick=window.location.href='konselor-set.php?id_konseling=$row[id_konseling]' $status_btn>Konselor</button><br/>
                                <button class='btn-sm btn-success' onclick=window.location.href='konseling-detail.php?id_konseling=$row[id_konseling]'>Lihat Detail</button>
                                </td>
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