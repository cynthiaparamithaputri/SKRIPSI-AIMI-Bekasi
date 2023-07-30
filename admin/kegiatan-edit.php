<?php 
    session_start();
      if(!isset($_SESSION['login_admin'])) {
        header("location: login-admin.php");
      }else{

        include '../koneksi.php';

        $id_kegiatan = "";
        $judul = "";
        $jadwal = "";
        $deskripsi = "";
        $gambarlama = "";
        $gambar = "";
        $errorMessage = "";

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        
            if (!isset($_GET["id_kegiatan"])){
                header("location: kegiatann.php");
                exit;
            }
        
            $id_kegiatan = $_GET["id_kegiatan"];
        
            $sql = "SELECT * FROM t_kegiatan WHERE id_kegiatan= '$id_kegiatan'";
            $hasil = $koneksi->query($sql);
            $row = $hasil->fetch_assoc();
        
            $judul = $row["judul"];
            $jadwal = $row["jadwal"];
            $deskripsi = $row["deskripsi"];
            $gambar_lama = $row["gambar"];
        
        } else {

            $id_kegiatan = $_POST["id_kegiatan"];
            $judul = $_POST['judul'];
            $jadwal = $_POST['jadwal'];
            $deskripsi = $_POST['deskripsi'];
            $gambar_lama = $_POST["gambar_lama"];
            
            do {
                if (empty($judul) || empty($jadwal) || empty($deskripsi)) {
                $errorMessage = "Tidak boleh ada isian yang kosong!";
                break;
                }

                if (!empty($_FILES['gambar']['name'])) {

                $gambar = $_FILES['gambar']['name'];

                $tempFile = $_FILES['gambar']['tmp_name'];

                // Tentukan lokasi dan nama file tujuan di folder 'assets/img/kegiatan'
                $targetFile = "../assets/img/kegiatan/".$gambar;

                // Pindahkan file dari temporary location ke folder tujuan
                if (move_uploaded_file($tempFile, $targetFile)) {

                    $gambar = "assets/img/kegiatan/".$gambar;

                } else {

                    // Jika terjadi kesalahan saat mengunggah file, berikan pesan error
                    $errorMessage = "Gagal mengunggah file gambar!";
                    break;
                }

                } else {
                    // Jika tidak ada file gambar di-upload, gunakan gambar default
                    $gambar = $gambar_lama;
                }
            
                $sql2 = "UPDATE t_kegiatan SET judul = '$judul', jadwal = '$jadwal', deskripsi = '$deskripsi', gambar = '$gambar' WHERE id_kegiatan= '$id_kegiatan'";
                $hasil2 = $koneksi->query($sql2);

                if (!$hasil2) {
                    $errorMessage = "Edit kegiatan gagal karena sistem bermasalah!";
                    break;
                }

                header("Location: kegiatan.php");
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
    <title>Tambah Kegiatan</title>
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
            <div class="kegiatan w-100 min-vh-100 mt-5">
                <div class="container">
                <div class="row my-5">
                    <div class="col text-left">
                    <h3 class="mb-2 text-sm">Tambah Kegiatan Baru</h3>
                    <p>Isi keterangan secukupnya</p>
                    </div>
                    <hr class="hr" />
                </div>
                <div class="row">
                    <form id="form-kegiatan" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_kegiatan" value="<?php echo $id_kegiatan;?>">
                    <input type="hidden" name="gambar_lama" value="<?php echo $gambar_lama;?>">
                    <div class="row mb-4">
                        <div class="col">
                            <label for="judul" class="form-label">Nama Kegiatan</label>
                            <input type="text" id="judul" class="form-control" name="judul" value="<?php echo $judul ?>">
                        </div>
                        <div class="col">
                            <label for="time" class="form-label">Jadwal</label>
                            <input type="date" id="time" class="form-control" name="jadwal" value="<?php echo $jadwal ?>" >
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="desk" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="desk" rows="3" name="deskripsi"><?php echo $deskripsi ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="gambar" class="form-label">Upload Photo</label>
                        <input class="form-control" type="file" id="gambar" name="gambar" accept="image/jpeg, image/png, image/jpg, image/webp">
                    </div>
                    </form>
                </div>
                <div class="row mt-4">
                    <div class="col">
                    <button class="btn-1" onclick="window.location.href='kegiatan.php';">Kembali</button>
                    <button class="btn-2" type="submit" form="form-kegiatan">Submit</button>
                    </div>
                </div>
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
  </body>
</html>
<?php
}
?>