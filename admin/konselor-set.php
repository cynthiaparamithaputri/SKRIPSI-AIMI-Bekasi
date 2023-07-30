<?php 
    session_start();
      if(!isset($_SESSION['login_admin'])) {
        header("location: login-admin.php");
      }else{

        include '../koneksi.php';

        $id_konseling = "";
        $id_petugas = "";
        $errorMessage = "";

        $sql = "SELECT * FROM t_admin WHERE role = 'konselor'";
        $hasil = mysqli_query($koneksi, $sql);

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        
            if (!isset($_GET["id_konseling"])){
                header("location: konseling.php");
                exit;
            }
        
            $id_konseling = $_GET["id_konseling"];
        
        } else {
                $id_petugas = $_POST['konselor'];
                $id_konseling = $_GET["id_konseling"];
              
                do {
                  if (empty($id_petugas)) {
                    $errorMessage = "Pilih sebuah konselor!";
                    break;
                  }
              
                $sql2 = "UPDATE t_konseling SET id_petugas = '$id_petugas' WHERE id_konseling = '$id_konseling'";
                $hasil2 = $koneksi->query($sql2);

                if (!$hasil2) {
                    $errorMessage = "Penetapan konselor gagal karena sistem bermasalah!";
                    break;
                }

                header("Location: konseling.php");
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
    <title>Tetapkan Konselor</title>
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
                    <h3 class="mb-2 text-sm">Tetapkan Konselor</h3>
                    <p>Pilih salah satu konselor</p>
                    </div>
                    <hr class="hr" />
                </div>
                <div class="row">
                    <form id="form-konselor" method="post">
                    <input type="hidden" name="id_konseling" value="<?php echo $id_konseling;?>">
                    <div class="mb-4">
                        <select id="media" class="form-select" name="konselor">
                        <option>Pilih</option>
                        <?php
                        while ($row = $hasil->fetch_assoc()) {
                          echo "
                          <option value='$row[id_petugas]'>$row[nama]</option>
                          ";
                        }
                        ?>
                        </select>
                    </div>
                    </form>
                </div>
                <div class="row mt-4">
                    <div class="col">
                    <button class="btn-1" onclick="window.location.href='konseling.php';">Kembali</button>
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