<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Data Kegiatan</title>
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
            <h1>Data Kegiatan</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet ex at libero vulputate
              gravida. Donec scelerisque mauris ac nisi iaculis, eget aliquet dui tempor.</p>
              <div>
                <button class="btn-3 btn-lg">Tambah Kegiatan Baru<i class="bi bi-calendar-plus mx-2"></i></button>
              </div>
          </div>
        </header>
            <div class="kegiatan w-100">
                <div class="container">
                <div class="row my-5">
                    <div class="col">
                    <div class="table-comp">
                        <div class="table-responsive">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Kegiatan</th>
                            <th scope="col">Jadwal</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Gambar</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>IG Live Sharing Session</td>
                            <td>Minggu, 14 Mei 2023</td>
                            <td class="col-md-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt similique ratione reiciendis maiores enim. Consequuntur rem quia totam laudantium inventore corrupti possimus molestiae, reiciendis ipsam officiis, molestias odio ut quo.</td>
                            <td>
                            <div class="keg-image text-center">
                                <img src="../assets/img/kegiatan/kegiatan-1.webp" class="rounded" alt="..." />
                            </div>
                            </td>
                            <td class="text-center">
                            <button class="btn-sm btn-primary" onclick="window.location.href='kegiatan-edit.php';">Sunting</button><br/>
                            <button class="btn-sm btn-danger" onclick="window.location.href='kegiatan-hapus.php';">Hapus</button>
                            </td>
                            </tr>
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