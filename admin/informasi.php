<?php 
    session_start();
      if(!isset($_SESSION['login_admin'])) {
        header("location: ../login-admin.php");
      }else{

        include '../koneksi.php';

        $id_unik = $_SESSION['login_admin'];
        $status_btn = "";

        $sql_hak = "SELECT * FROM t_admin WHERE id_unik = '$id_unik'";
        $hasil_hak = mysqli_query($koneksi, $sql_hak);
        $row_hak = $hasil_hak->fetch_assoc();
        $hak_akses = $row_hak['hak_akses'];

        if ($hak_akses !== "Istimewa") {
            header("location: beranda.php");
        } else {

        $sql = "SELECT * FROM t_info WHERE id_info = 1";
        $hasil = mysqli_query($koneksi, $sql);
        $row = $hasil->fetch_assoc();

  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Informasi Aplikasi</title>
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
            <div class="konselor w-100 min-vh-100 mt-5">
                <div class="container">
                <div class="row my-5">
                    <div class="col text-left mb-4">
                    <h3 class="mb-2 text-sm">Informasi Aplikasi</h3>
                    <p>Jika ingin mengubah data akun, klik edit akun.</p>
                    <button class="btn-2" onclick="window.location.href='informasi-edit.php';">Edit Informasi <i class="bi bi-pencil"></i></button>
                    </div>
                    <hr class="hr" />
                </div>
                <div class="row">
                    <div class="mb-4">
                        <label for="header" class="form-label">Header</label>
                        <textarea class="form-control" id="header" rows="3" disabled readonly><?php echo $row['header'] ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="tentang" class="form-label">Tentang</label>
                        <textarea class="form-control" id="tentang" rows="5" disabled readonly><?php echo $row['tentang'] ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="visi" class="form-label">Visi</label>
                        <textarea class="form-control" id="visi" rows="5" disabled readonly><?php echo $row['visi'] ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="misi" class="form-label">Misi</label>
                        <textarea class="form-control" id="misi" rows="5" disabled readonly><?php echo $row['misi'] ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="lokasi" class="form-label">Lokasi AIMI Bekasi</label>
                        <textarea class="form-control" id="lokasi" rows="3" disabled readonly><?php echo $row['lokasi'] ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="telp" class="form-label">Kontak Telp</label>
                        <input type="text" class="form-control" id="telp" value="<?php echo $row['telp'] ?>" disabled readonly />
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Kontak Email</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $row['email'] ?>" disabled readonly />
                        <hr class="hr" />
                    </div>
                    
                    <div class="my-4">
                        <label for="info_daftar" class="form-label">Informasi di Halaman Daftar Konseling</label>
                        <textarea class="form-control" id="info_daftar" rows="7" disabled readonly><?php echo $row['info_daftar'] ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="kontak_konfirm" class="form-label">Kontak yang Dapat Dihubungi Untuk Konfirmasi Daftar</label>
                        <input type="tel" class="form-control" id="kontak_konfirm" value="<?php echo $row['kontak_konfirm'] ?>" disabled readonly />
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
}
?>