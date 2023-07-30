<?php 
    session_start();
      if(!isset($_SESSION['login_admin'])) {
        header("location: login-admin.php");
      }else{

        include '../koneksi.php';

        $no = 1;
        
        $sql = "SELECT * FROM t_admin WHERE role = 'konselor'";
        $hasil = mysqli_query($koneksi, $sql);

        ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Data Konselor</title>
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
            <h1>Data Konselor</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet ex at libero vulputate
              gravida. Donec scelerisque mauris ac nisi iaculis, eget aliquet dui tempor.</p>
              <div>
                <button class="btn-3 btn-lg" onclick="window.location.href='konselor-tambah.php';">Tambah Konselor<i class="bi bi-person-plus mx-2"></i></button>
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
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
 
                        while ($row = $hasil->fetch_assoc()) {

                          $no = $no++;
                          

                          echo "
                          <tr>
                            <th scope='row'>$no</th>
                            <td>$row[id_unik]</td>
                            <td class='col-md-2'>$row[nama]</td>
                            <td>$row[no_hp]</td>
                            <td>$row[email]</td>
                            <td class='text-center'>
                            <button class='btn-sm btn-primary' onclick=window.location.href='konselor-edit.php?id_petugas=$row[id_petugas]'>Sunting</button><br/>
                            <button class='btn-sm btn-success' onclick=window.location.href='konselor-reset.php?id_petugas=$row[id_petugas]'>Reset</button><br/>
                            <button class='btn-sm btn-danger' onclick=window.location.href='konselor-hapus.php?id_petugas=$row[id_petugas]'>Hapus</button>
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
?>