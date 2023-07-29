<?php 
    session_start();
      if(!isset($_SESSION['login_admin'])) {
        header("location: login-admin.php");
      }else{
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
        include "../components/navbar-admin.php";
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
                            <th scope="col" class="col-md-2">Usia Bayi Saat Ini (Bulan)</th>
                            <th scope="col" class="col-md-2">Bayi Anak Ke</th>
                            <th scope="col" class="col-md-4">Usia Kehamilan Saat Bayi Lahir (Minggu)</th>
                            <th scope="col" class="col-md-2">Proses Kelahiran</th>
                            <th scope="col" class="col-md-4">Apakah Menjalankan Inisiasi Menyusui Dini (IMD) Setelah Melahirkan Selama 1 Jam?</th>
                            <th scope="col" class="col-md-4">Apakah Rawat Gabung Ibu dan Bayi 24 Jam Nonstop Setelah Kelahiran?</th>
                            <th scope="col" class="col-md-4">Berat Bayi Saat Lahir (Kg)</th>
                            <th scope="col" class="col-md-4">Berat Bayi Saat Ini (Kg)</th>
                            <th scope="col" class="col-md-4">Apakah Pada Saat Ini Bayi Anda Mendapatkan Asupan Lain Selain ASI? (Susu Formula / Makanan / Minuman lainnya)</th>
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">14/07/2023 11:25</th>
                            <td>Cynthia Paramitha</td>
                            <td>Jl. Tanjung 4 Taman Century 2, Blok L No.5, RT 003/RW 023, Kec. Bekasi Selatan, Kel. Pekayon Jaya, Bekasi</td>
                            <td>081288746848</td>
                            <td>cynthiaparamithaputri@gmail.com</td>
                            <td>Instagram</td>
                            <td>WhatsApp Chat</td>
                            <td>Alexandra</td>
                            <td>12</td>
                            <td>1</td>
                            <td>32</td>
                            <td>Caesar/SC</td>
                            <td>Tidak</td>
                            <td>Ya</td>
                            <td>3</td>
                            <td>8,5</td>
                            <td>Tidak</td>
                            <td>-</td>
                            <td>Tidak</td>
                            <td>Tidak</td>
                            <td>Belum</td>
                            <td>-</td>
                            <td>Tidak</td>
                            <td>Tidak</td>
                            <td>Tidak</td>
                            <td>Konseling Menyusui</td>
                            <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio facere voluptatem ad praesentium iste aspernatur sed cupiditate, repellat accusamus possimus tempore libero qui saepe a quia fuga magnam quos excepturi.</td>
                            <td>Ya</td>
                            <td>Ya</td>
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