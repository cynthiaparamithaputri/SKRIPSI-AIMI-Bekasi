<?php 
    session_start();
      if(!isset($_SESSION['login_konselor'])) {
        header("location: login-konselor.php");
      }else{

        include '../koneksi.php';

        $id_konseling = "";
        $status = "";
        $waktu_selesai = "";
        $errorMessage = "";


        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        
            if (!isset($_GET["id_konseling"])){
                header("location: konseling.php");
                exit;
            }
        
            $id_konseling = $_GET["id_konseling"];
        
        } else {
                $waktu_selesai = date('Y-m-d H:i:s');
                $status = $_POST['status'];
                $id_konseling = $_GET["id_konseling"];
              
                do {
                  if (empty($status)) {
                    $errorMessage = "Ceklis untuk mengubah status!";
                    break;
                  }
              
                $sql2 = "UPDATE t_konseling SET status = '$status', waktu_selesai = '$waktu_selesai' WHERE id_konseling = '$id_konseling'";
                $hasil2 = $koneksi->query($sql2);

                if (!$hasil2) {
                    $errorMessage = "Perubahan status gagal karena sistem bermasalah!";
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
                    <h3 class="mb-2 text-sm">Selesaikan Konseling</h3>
                    </div>
                    <hr class="hr" />
                </div>
                <div class="row">
                    <form id="form-konselor" method="post">
                    <input type="hidden" name="id_konseling" value="<?php echo $id_konseling;?>">
                    <div class="mb-5">
                        <label for="status" class="form-label mb-3">Anda tidak dapat merubah status setelah ini,<br/>pastikan sesi konseling benar-benar sudah selesai. <br/>Apa anda sudah yakin?</label>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Selesai" id="status" name="status">
                        <label class="form-check-label" for="status">
                            YA
                        </label>
                        </div>
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