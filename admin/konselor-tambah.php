<?php 
    session_start();
      if(!isset($_SESSION['login_admin'])) {
        header("location: login-admin.php");
      }else{

        include '../koneksi.php';

        $id_unik = "";
        $nama = "";
        $telp = "";
        $email = "";
        $password = "";
        $errorMessage = "";

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nama = $_POST['nama'];
                $telp = $_POST['telp'];
                $email = $_POST['email'];
                $password = "Kon$3ling";
                $role = "konselor";

                function generateId() {
                  $characters = '0123456789';
                  $length = 4; // Panjang string yang ingin dihasilkan
                  $randomString = '';
              
                  for ($i = 0; $i < $length; $i++) {
                      $randomString .= $characters[rand(0, strlen($characters) - 1)];
                  }
              
                  return $randomString;
              }
              
                do {

                  $id_unik = "AIMI".generateId();

                  if (empty($nama) || empty($telp) || empty($email)) {
                    $errorMessage = "Tidak boleh ada isian yang kosong!";
                    break;
                  }

                  $sql = "SELECT * FROM t_admin WHERE id_unik = '$id_unik'";
                  $hasil = mysqli_query($koneksi, $sql);

                  if (mysqli_num_rows($hasil) > 0) {
                    $errorMessage = "Silahkan submit lagi, sistem sedang melakukan generate ID!";
                    
                    break;

                  }
              
                    $sql2 = "INSERT INTO t_admin (id_unik, password, role, nama, no_hp, email) VALUES ('$id_unik', '$password', '$role', '$nama', '$telp', '$email')";
                    $hasil2 = $koneksi->query($sql2);

                    if (!$hasil2) {
                        $errorMessage = "Input konselor gagal karena sistem bermasalah!";
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
    <title>Tambah Konselor</title>
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
                    <h3 class="mb-2 text-sm">Tambah Konselor</h3>
                    <p>Pastikan data sesuai</p>
                    </div>
                    <hr class="hr" />
                </div>
                <div class="row">
                    <form id="form-konselor" method="post">
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