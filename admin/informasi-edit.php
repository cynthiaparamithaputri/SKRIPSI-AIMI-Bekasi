<?php 
    session_start();
      if(!isset($_SESSION['login_admin'])) {
        header("location: ../login-admin.php");
      }else{

        include '../koneksi.php';

        $errorMessage = "";

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

            $header = $row["header"];
            $tentang = $row["tentang"];
            $visi = $row["visi"];
            $misi = $row["misi"];
            $lokasi = $row["lokasi"];
            $telp = $row["telp"];
            $email = $row["email"];
            $info_daftar = $row["info_daftar"];
            $kontak_konfirm = $row["kontak_konfirm"];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $header = $_POST['header'];
                $tentang = $_POST['tentang'];
                $visi = $_POST['visi'];
                $misi = $_POST['misi'];
                $lokasi = $_POST['lokasi'];
                $telp = $_POST['telp'];
                $email = $_POST['email'];
                $info_daftar = $_POST['info_daftar'];
                $kontak_konfirm = $_POST['kontak_konfirm'];
              
                do {
                  if (empty($header) || empty($tentang) || empty($visi) || empty($misi) || empty($lokasi) || empty($telp) || empty($email) || empty($info_daftar) || empty($kontak_konfirm)) {
                    $errorMessage = "Tidak boleh ada data yang kosong!";
                    break;
                  }
              
                    $sql2 = "UPDATE t_info SET header = '$header', tentang = '$tentang', visi = '$visi', misi = '$misi', lokasi = '$lokasi', telp = '$telp', email = '$email', info_daftar = '$info_daftar', kontak_konfirm = '$kontak_konfirm' WHERE id_info = 1";

                    $hasil2 = $koneksi->query($sql2);

                    if (!$hasil2) {
                        $errorMessage = "Gagal memperbaharui informasi, data yang dimasukkan bermasalah";
                        break;
                    }

                    header("location: informasi.php");
                    exit;

                } while (false);
              }

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
                    <h3 class="mb-2 text-sm">Edit Informasi Aplikasi</h3>
                    <p>Pastikan data sesuai dengan formatnya</p>
                    </div>
                    <hr class="hr" />
                </div>
                <div class="row">
                <form id="edit-informasi" method="post">
                    <div class="mb-4">
                        <label for="header" class="form-label">Header</label>
                        <textarea class="form-control" id="header" name="header" rows="3"><?php echo $header ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="tentang" class="form-label">Tentang</label>
                        <textarea class="form-control" id="tentang" name="tentang" rows="5"><?php echo $tentang ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="visi" class="form-label">Visi</label>
                        <textarea class="form-control" id="visi" name="visi" rows="5"><?php echo $visi ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="misi" class="form-label">Misi</label>
                        <textarea class="form-control" id="misi" name="misi" rows="5"><?php echo $misi ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="lokasi" class="form-label">Lokasi AIMI Bekasi</label>
                        <textarea class="form-control" id="lokasi" name="lokasi" rows="3"><?php echo $lokasi ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="telp" class="form-label">Kontak Telp</label>
                        <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $telp ?>" />
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Kontak Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" />
                        <hr class="hr" />
                    </div>
                    
                    <div class="my-4">
                        <label for="info_daftar" class="form-label">Informasi di Halaman Daftar Konseling</label>
                        <textarea class="form-control" id="info_daftar" name="info_daftar" rows="7"><?php echo $info_daftar ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="kontak_konfirm" class="form-label">Kontak yang Dapat Dihubungi Untuk Konfirmasi Daftar</label>
                        <input type="tel" class="form-control" id="kontak_konfirm" name="kontak_konfirm" value="<?php echo $kontak_konfirm ?>" />
                    </div>
                    </form>
                </div>
                <div class="row my-4">
                    <div class="col">
                    <button class="btn-1" onclick="window.location.href='informasi.php';">Kembali</button>
                    <button class="btn-2" form="edit-informasi" type="submit">Ubah</button>
                    <?php
                        if (!empty($errorMessage)){
                        echo "
                        <div class='alert alert-warning alert-dismissible fade show mt-5' role='alert'>
                        <strong>$errorMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        ";
                        }
                        ?>
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
}
?>