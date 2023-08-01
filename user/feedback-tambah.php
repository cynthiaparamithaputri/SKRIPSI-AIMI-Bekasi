<?php 
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: ../login.php");
      }else{

        include '../koneksi.php';

        $id_konseling = "";
        $feedback = "";
        $errorMessage = "";


        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        
            if (!isset($_GET["id_konseling"])){
                header("location: riwayat.php");
                exit;
            }
        
            $id_konseling = $_GET["id_konseling"];
        
        } else {
                $feedback = $_POST['feedback'];
                $id_konseling = $_GET["id_konseling"];
              
                do {
                  if (empty($feedback)) {
                    $errorMessage = "Kolom feedback tidak boleh kosong!";
                    break;
                  }
              
                $sql = "UPDATE t_konseling SET feedback = '$feedback' WHERE id_konseling = '$id_konseling'";
                $hasil = $koneksi->query($sql);

                if (!$hasil) {
                    $errorMessage = "Penambahan feedback gagal karena sistem bermasalah!";
                    break;
                }

                header("Location: riwayat.php");
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
    <title>Tambah Feedback</title>
    <?php
    //link eksternal
    include "../components/head-links-other.php";
    ?>
  </head>
  <body>
    <div>
      <?php
      //navbar
      include "../components/navbar-user.php";
      ?>
      <div class="user-app">
      <div class="riwayat w-100 min-vh-100">
        <div class="detail container">
          <div class="row">
            <div class="col">
            <h3 class="mb-2">Tambahkan Feedback</h3>
            <p>- Kami sangat menghargai feedback anda</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col">
            <hr class="hr" />
            <form id="form-feedback" method="post">
            <input type="hidden" name="id_konseling" value="<?php echo $id_konseling;?>">
            <div class="mb-5">
                <textarea class="form-control" id="feedback" rows="3" name="feedback"><?php echo $feedback ?></textarea>
                <p class="opacity-50">*Feedback hanya bisa diisi sekali dan tidak dapat diubah setelahnya</p>
            </div>
            </form>
            <button class="btn-1" onclick="window.location.href='riwayat.php';">Kembali</button>
            <button class="btn-2" type="submit" form="form-feedback">Submit</button>
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
      <?php
      //footer
      include "../components/footer-user.php";
      ?>
    </div>
  </body>
</html>
<?php
}
?>