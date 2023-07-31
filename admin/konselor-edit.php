<?php 
    session_start();
      if(!isset($_SESSION['login_admin'])) {
        header("location: ../login-admin.php");
      }else{

        include '../koneksi.php';

        $id_petugas = "";
        $nama = "";
        $telp = "";
        $email = "";
        $errorMessage = "";

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        
            if (!isset($_GET["id_petugas"])){
                header("location: konselor.php");
                exit;
            }
        
            $id_petugas = $_GET["id_petugas"];
        
            $sql = "SELECT * FROM t_admin WHERE id_petugas= '$id_petugas'";
            $hasil = $koneksi->query($sql);
            $row = $hasil->fetch_assoc();
        
            $nama = $row["nama"];
            $telp = $row["no_hp"];
            $email = $row["email"];
        
        } else {
                $nama = $_POST['nama'];
                $telp = $_POST['telp'];
                $email = $_POST['email'];
                $id_petugas = $_POST['id_petugas'];
              
                do {
                  if (empty($nama) || empty($telp) || empty($email)) {
                    $errorMessage = "Tidak boleh ada isian yang kosong!";
                    break;
                  }
              
                $sql2 = "UPDATE t_admin SET nama = '$nama', no_hp = '$telp', email = '$email' WHERE id_petugas = '$id_petugas'";
                $hasil2 = $koneksi->query($sql2);

                if (!$hasil2) {
                    $errorMessage = "Edit konselor gagal karena sistem bermasalah!";
                    break;
                }

                header("Location: konselor.php");
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
    <title>Edit Konselor</title>
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
                    <div class="col text-left">
                    <h3 class="mb-2 text-sm">Edit Konselor</h3>
                    <p>Pastikan data sesuai</p>
                    </div>
                    <hr class="hr" />
                </div>
                <div class="row">
                    <form id="form-konselor" method="post">
                    <input type="hidden" name="id_petugas" value="<?php echo $id_petugas;?>">
                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama Konselor</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>" />
                    </div>

                    <div class="mb-4">
                        <label for="telp" class="form-label">No WA</label>
                        <input type="tel" class="form-control" id="telp" name="telp" value="<?php echo $telp ?>" />
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" />
                    </div>
                    </form>
                </div>
                <div class="row mt-4">
                    <div class="col">
                    <button class="btn-1" onclick="window.location.href='konselor.php';">Kembali</button>
                    <button class="btn-2" type="submit" form="form-konselor">Submit</button>
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