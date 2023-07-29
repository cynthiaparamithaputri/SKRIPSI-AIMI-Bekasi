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
                    <form id="form-kegiatan">
                    <div class="row mb-4">
                        <div class="col">
                            <label for="judul" class="form-label">Nama Kegiatan</label>
                            <input type="text" id="judul" class="form-control">
                        </div>
                        <div class="col">
                            <label for="time" class="form-label">Jadwal</label>
                            <input type="date" id="time" class="form-control">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="desk" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="desk" rows="3"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="pic" class="form-label">Upload Photo</label>
                        <input class="form-control" type="file" id="pic">
                    </div>
                    </form>
                </div>
                <div class="row mt-4">
                    <div class="col">
                    <button class="btn-1" onclick="window.location.href='kegiatan.php';">Kembali</button>
                    <button class="btn-2" type="submit" form="form-kegiatan">Submit</button>
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