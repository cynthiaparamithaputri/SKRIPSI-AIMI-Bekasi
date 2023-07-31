<?php 
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: ../login.php");
      }else{
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Pengaturan Akun</title>
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
            <?php 
            include '../koneksi.php';

            $errorMessage = "";

            $email = $_SESSION['login_user'];

            $sql = "SELECT * FROM t_user WHERE email = '$email'";
            $hasil = mysqli_query($koneksi, $sql);
            $row = $hasil->fetch_assoc();

            $nama = $row["nama"];
            $password = $row["password"];
            $konfirm_password = $row["password"];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nama = $_POST['nama'];
                $password = $_POST['password'];
                $konfirm_password = $_POST['konfirm_password'];
              
                do {
                  if (empty($nama) || empty($password) || empty($konfirm_password)) {
                    $errorMessage = "Tidak boleh ada data yang kosong!";
                    break;
                  }

                  if ($password !== $konfirm_password) {
                    $errorMessage = "Password yang dimasukkan tidak sama!";
                    break;
                  }
              
                    $sql2 = "UPDATE t_user SET nama = '$nama', password = '$password' WHERE email = '$email'";

                    $hasil2 = $koneksi->query($sql2);

                    if (!$hasil2) {
                        $errorMessage = "Gagal memperbaharui akun";
                        break;
                    }

                    header("location: profil.php");
                    exit;

                } while (false);
              }
            ?>
            <h3 class="mb-2">Edit akun</h3>
            </div>
          </div>
          <hr class="hr" />
          <div class="row my-5">
            <div class="col">
            <form id="user" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Anda</label>
                <input class="form-control" type="text" name="nama" value="<?php echo $nama ?>" id="nama">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input class="form-control" type="password" name="password" value="<?php echo $password ?>" id="password">
            </div>
            <div class="mb-3">
                <label for="konfirm_password" class="form-label">Konfirmasi Password</label>
                <input class="form-control" type="password" name="konfirm_password" value="<?php echo $konfirm_password ?>" id="konfirm_password">
            </div>
            <p class="opacity-75 mb-5">*Anda hanya dapat merubah nama dan password. Jika ingin mengganti email, silahkan buat akun baru</p>
            </form>
            <button class="btn-1" onclick="window.location.href='profil.php';">Kembali</button>
            <button class="btn-2" form="user" type="submit">Ubah</button>
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