<?php 
    session_start();
      if(!isset($_SESSION['login_konselor'])) {
        header("location: ../login-admin.php");
      }else{

        include '../koneksi.php';

        $id_unik = $_SESSION['login_konselor'];
        
        $errorMessage = "";
        $password_lama = "";
        $password = "";
        $konfirm_password = "";

        $sql = "SELECT * FROM t_admin WHERE id_unik = '$id_unik'";
            $hasil = mysqli_query($koneksi, $sql);
            $row = $hasil->fetch_assoc();

            $password_lama_hidden = $row["password"];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password_lama_hidden = $_POST['password_lama_hidden'];
            $password_lama = $_POST['password_lama'];
            $password = $_POST['password'];
            $konfirm_password = $_POST['konfirm_password'];
            
          
            do {
              if (empty($password_lama) || empty($password) || empty($konfirm_password)) {
                $errorMessage = "Tidak boleh ada kolom yang kosong!";
                break;
              }

              if ($password_lama !== $password_lama_hidden) {
                $errorMessage = "Password lama yang anda masukkan salah!";
                break;
              }

              if ($password !== $konfirm_password) {
                $errorMessage = "Password baru yang dimasukkan tidak sama!";
                break;
              }
          
                $sql2 = "UPDATE t_admin SET password = '$password' WHERE id_unik = '$id_unik'";

                $hasil2 = $koneksi->query($sql2);

                if (!$hasil2) {
                    $errorMessage = "Gagal memperbaharui password";
                    break;
                }

                header("location: profil.php");
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
    <title>Ubah Password</title>
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
            <div class="konselor w-100 min-vh-100 mt-5">
                <div class="container">
                <div class="row my-5">
                    <div class="col text-left mb-4">
                    <h3 class="mb-2 text-sm">Ubah Password</h3>
                    <p>Jika lupa password lama, hubungi admin untuk melakukan reset password</p>
                    </div>
                    <hr class="hr" />
                </div>
                <div class="row">
                <form id="password" method="post">
                <input type="hidden" name="password_lama_hidden" value="<?php echo $password_lama_hidden?>">
                    <div class="mb-4">
                        <label for="password_lama" class="form-label">Password Lama</label>
                        <input type="password" class="form-control" id="password_lama" name="password_lama" value="<?php echo $password_lama?>" />
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $password?>" />
                    </div>
                    <div class="mb-4">
                        <label for="konfirm_password" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="konfirm_password" name="konfirm_password" value="<?php echo $konfirm_password?>" />
                    </div>
                </form>
                </div>
                <div class="row my-4">
                    <div class="col">
                    <button class="btn-1" onclick="window.location.href='profil.php';">Kembali</button>
                    <button class="btn-2" form="password" type="submit">Ubah</button>
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
  </body>
</html>
<?php
}
?>