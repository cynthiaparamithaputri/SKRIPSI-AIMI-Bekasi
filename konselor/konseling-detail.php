<?php 
    session_start();
      if(!isset($_SESSION['login_konselor'])) {
        header("location: login-konselor.php");
      }else{

        include '../koneksi.php';

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      
          if (!isset($_GET["id_konseling"])){
              header("location: konseling.php");
              exit;
          }
      
          $id_konseling = $_GET["id_konseling"];
      
          $sql = "SELECT * FROM t_konseling WHERE id_konseling= '$id_konseling'";
          $hasil = $koneksi->query($sql);
          $row = $hasil->fetch_assoc();

          $waktu_selesai = $row['waktu_selesai'];

          if ($waktu_selesai == '0000-00-00 00:00:00' ) {
            $waktu_selesai = "";
          }

          $id_petugas = $row['id_petugas'];
          $sql2 = "SELECT * FROM t_admin WHERE id_petugas = '$id_petugas'";
          $hasil2 = mysqli_query($koneksi, $sql2);
          $row2 = $hasil2->fetch_assoc();
      
      }

  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Detail Konseling</title>
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
            <h1>Data Konseling</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet ex at libero vulputate
              gravida. Donec scelerisque mauris ac nisi iaculis, eget aliquet dui tempor.</p>
              <div>
                <button class="btn-3 btn-lg">Ekspor Data ke CSV<i class="bi bi-download mx-2"></i></button>
              </div>
          </div>
        </header>
            <div class="konseling w-100 min-vh-100">
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
                            <th scope="col">Timestamp</th>
                            <th scope="col">Nama Ibu</th>
                            <th scope="col" class="col-md-2">Alamat Lengkap</th>
                            <th scope="col">No WA</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="col-md-4">Mendapat Informasi AIMI Dari</th>
                            <th scope="col" class="col-md-2">Media Konseling</th>
                            <th scope="col" class="col-md-2">Nama Bayi</th>
                            <th scope="col" class="col-md-2">Usia Bayi Saat Ini</th>
                            <th scope="col" class="col-md-2">Bayi Anak Ke</th>
                            <th scope="col" class="col-md-4">Usia Kehamilan Saat Bayi Lahir</th>
                            <th scope="col" class="col-md-2">Proses Kelahiran</th>
                            <th scope="col" class="col-md-4">Apakah Menjalankan Inisiasi Menyusui Dini (IMD) Setelah Melahirkan Selama 1 Jam?</th>
                            <th scope="col" class="col-md-4">Apakah Rawat Gabung Ibu dan Bayi 24 Jam Nonstop Setelah Kelahiran?</th>
                            <th scope="col" class="col-md-4">Berat Bayi Saat Lahir (Kg)</th>
                            <th scope="col" class="col-md-4">Berat Bayi Saat Ini (Kg)</th>
                            <th scope="col" class="col-md-4">Apakah Pada Saat Ini Bayi Anda Mendapatkan Asupan Lain Selain ASI?</th>
                            <th scope="col" class="col-md-6">Jika ya, sebutkan. jawab (-) jika tidak</th>
                            <th scope="col" class="col-md-4">Apakah Bayi Menggunakan Botol, Dot, atau Empeng?</th>
                            <th scope="col" class="col-md-4">Apakah Bayi Mempunyai Riwayat Kuning? (Jaundice)</th>
                            <th scope="col" class="col-md-4">Apakah Bayi Sudah Mulai MPASI?</th>
                            <th scope="col" class="col-md-4">Jika Sudah MPASI, Apa Yang Diberikan?</th>
                            <th scope="col" class="col-md-6">Apakah Sebelumnya Sudah Pernah Berkonsultasi Dengan Konselor Menyusui atau Konsultan Laktasi?</th>
                            <th scope="col" class="col-md-6">Apakah Selama Kehamilan Sudah Mengikuti Kelas Persiapan Menyusui atau Konseling Persiapan Menyusui?</th>
                            <th scope="col" class="col-md-4">Apakah selama pemberian MPASI sudah mengikuti kelas MPASI atau konseling MPASI?</th>
                            <th scope="col" class="col-md-4">Konseling yang diinginkan saat ini</th>
                            <th scope="col" class="col-md-4">CERITAKAN Masalah menyusui atau Masalah MPASI yang sedang dihadapi saat ini?</th>
                            <th scope="col" class="col-md-6">Apakah dirumah ibu mendapatkan bantuan dari suami atau anggota keluarga lain dalam merawat bayi/mengurus rumah/mengurus anak yang lebih tua jika ada?</th>
                            <th scope="col" class="col-md-6">Apakah suami dan keluarga mendukung ibu untuk menyusui atau pemberian MPASI yang tepat sesuai anjuran?</th>
                            <th scope="col" class="col-md-2">Status</th>
                            <th scope="col" class="col-md-2">Waktu Selesai</th>
                          </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row"><?php echo $row['waktu_daftar'] ?></th>
                            <td><?php echo $row['nama_ibu'] ?></td>
                            <td><?php echo $row['alamat'] ?></td>
                            <td><?php echo $row['no_wa'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['media_informasi'] ?></td>
                            <td><?php echo $row['media_konseling'] ?></td>
                            <td><?php echo $row['nama_bayi'] ?></td>
                            <td><?php echo $row['usia_bayi'] ?></td>
                            <td><?php echo $row['anak_ke'] ?></td>
                            <td><?php echo $row['usia_hamil'] ?></td>
                            <td><?php echo $row['proses_lahir'] ?></td>
                            <td><?php echo $row['imd'] ?></td>
                            <td><?php echo $row['rawat_gabung'] ?></td>
                            <td><?php echo $row['berat_lahir'] ?></td>
                            <td><?php echo $row['berat_sekarang'] ?></td>
                            <td><?php echo $row['asupan_lain'] ?></td>
                            <td><?php echo $row['detail_asupan'] ?></td>
                            <td><?php echo $row['guna_botol_dot'] ?></td>
                            <td><?php echo $row['jaundice'] ?></td>
                            <td><?php echo $row['MPASI'] ?></td>
                            <td><?php echo $row['detail_MPASI'] ?></td>
                            <td><?php echo $row['konsultasi'] ?></td>
                            <td><?php echo $row['persiapan_menyusui'] ?></td>
                            <td><?php echo $row['kelas_konsul_MPASI'] ?></td>
                            <td><?php echo $row['jenis_konseling'] ?></td>
                            <td><?php echo $row['masalah'] ?></td>
                            <td><?php echo $row['bantuan'] ?></td>
                            <td><?php echo $row['dukungan'] ?></td>
                            <td><?php echo $row['status'] ?></td>
                            <td><?php echo $waktu_selesai ?></td>
                            </tr>
                        </tbody>
                        </table>
                        </div>
                        <div class="mt-3">
                        <button class="btn-2" onclick="window.location.href='konseling.php';">Kembali</button>
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