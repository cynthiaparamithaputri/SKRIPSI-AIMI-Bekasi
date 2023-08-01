<?php 
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: ../login.php");
      }else{

        include '../koneksi.php';

        $email = $_SESSION['login_user'];
        $sql = "SELECT * FROM t_user WHERE email = '$email'";
        $hasil = mysqli_query($koneksi, $sql);
        $row = $hasil->fetch_assoc();
        $id_user = $row['id_user'];

        $no = 0;
        $status_btn = "";
        
        $sql2 = "SELECT * FROM t_konseling WHERE id_user = '$id_user' AND status = 'Selesai'";
        $hasil2 = mysqli_query($koneksi, $sql2);
        $jumlah = mysqli_num_rows($hasil2);
        ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Riwayat</title>
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
        <div class="container">
          <div class="row">
            <div class="col">
            <h3 class="mb-2">Riwayat Konseling</h3>
            <p>- Kami sangat menghargai feedback anda</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col">

            <?php if ($jumlah == 0) {

              echo "<div class='text-center'><p class='lead'>Anda belum memiliki riwayat konseling<br/>Atau jadwal konseling anda belum selesai</p></div>";
            } else {?>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Waktu Selesai</th>
                    <th scope="col">Jenis Konseling</th>
                    <th scope="col">Konselor</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
        
                  while ($row2 = $hasil2->fetch_assoc()) {

                    $no = ++$no;
                    $feedback = $row2['feedback'];
                    $id_petugas = $row2['id_petugas'];

                    $sql3 = "SELECT * FROM t_admin WHERE id_petugas = '$id_petugas'";
                    $hasil3 = mysqli_query($koneksi, $sql3);
                    $row3 = $hasil3->fetch_assoc();

                    $nama = $row3['nama'];

                    echo "
                    <tr>
                      <th scope='row'>$no</th>
                      <td>$row2[waktu_selesai]</td>
                      <td>$row2[jenis_konseling]</td>
                      <td>$nama</td>
                      <td class='text-center'>
                      <button class='btn-sm m-1' onclick=window.location.href='riwayat-detail.php?id_konseling=$row2[id_konseling]'>Detail</button><br/>";

                    if ($feedback !== '') {
                      echo "
                      </td>
                    </tr>
                      ";
                    } else {
                      echo"
                      <button class='btn-sm m-1' onclick=window.location.href='feedback-tambah.php?id_konseling=$row2[id_konseling]'>Feedback</button>
                      </td>
                    </tr>
                    ";
                    }
                  }
                  ?>
                </tbody>
            </table>
            </div>
            <?php } ?>
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