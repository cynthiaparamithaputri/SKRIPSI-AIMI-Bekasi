<?php 
    session_start();
      if(!isset($_SESSION['login_admin'])) {
        header("location: ../login-admin.php");
      }else{

        include '../koneksi.php';

        $id_unik = $_SESSION['login_admin'];
        $status_btn = "";

        $sql_hak = "SELECT * FROM t_admin WHERE id_unik = '$id_unik'";
        $hasil_hak = mysqli_query($koneksi, $sql_hak);
        $row_hak = $hasil_hak->fetch_assoc();
        $hak_akses = $row_hak['hak_akses'];

        if ($hak_akses !== "Istimewa") {
            header("location: beranda.php");
        } else {

        $no = 0;
        
        $sql = "SELECT * FROM t_admin WHERE role = 'admin' ORDER BY t_admin.id_petugas DESC";
        $hasil = mysqli_query($koneksi, $sql);

        ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Data Admin</title>
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
        <header class="jumbotron w-100 d-flex align-items-center">
          <div class="container text-center">
            <h1>Data Admin</h1>
            <p>Kelola data admin dengan menambahkan, me-reset password, atau menghapus akun admin AIMI Bekasi</p>
              <div>
                <button class="btn-3 btn-lg" onclick="window.location.href='admin-tambah.php';">Tambah Admin<i class="bi bi-person-plus mx-2"></i></button>
              </div>
          </div>
        </header>
            <div class="konselor w-100 min-vh-100">
                <div class="container">
                <div class="row my-5">
                    <div class="col">
                    <div class="table-comp">
                        <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">WA</th>
                            <th scope="col">Email</th>
                            <th scope="col">Hak Istimewa</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
 
                        while ($row = $hasil->fetch_assoc()) {

                          $no = ++$no;

                          $hak_akses = $row['hak_akses'];

                          if ($hak_akses == "Istimewa") {
                            $hak_akses = "YA";
                            $status_btn = "disabled";
                          } else {
                            $hak_akses = "TIDAK";
                            $status_btn = "";
                          }
                          

                          echo "
                          <tr>
                            <th scope='row'>$no</th>
                            <td>$row[id_unik]</td>
                            <td class='col-md-2'>$row[nama]</td>
                            <td>$row[no_hp]</td>
                            <td>$row[email]</td>
                            <td>$hak_akses</td>
                            <td class='text-center'>
                            <button class='btn-sm btn-primary' onclick=window.location.href='admin-hak.php?id_petugas=$row[id_petugas]' $status_btn>Beri Hak</button><br/>
                            <button class='btn-sm btn-success' onclick=window.location.href='admin-reset.php?id_petugas=$row[id_petugas]'>Reset</button><br/>
                            <button class='btn-sm btn-danger' onclick=window.location.href='admin-hapus.php?id_petugas=$row[id_petugas]'>Hapus</button>
                            </td>
                          </tr>
                          ";
                        }
                        ?>
                        </tbody>
                        </table>
                        </div>
                    </div>
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
}
?>