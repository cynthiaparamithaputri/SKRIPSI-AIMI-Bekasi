<?php 
        include '../koneksi.php';

        $sql_info = "SELECT * FROM t_info WHERE id_info = 1";
        $hasil_info = mysqli_query($koneksi, $sql_info);
        $row_info = $hasil_info->fetch_assoc();
        $header = $row_info['header'];
        $tentang = $row_info['tentang'];
        $visi = $row_info['visi'];
        $misi = $row_info['misi'];
        $lokasi = $row_info['lokasi'];
        $kontak = $row_info['telp'];
        $email = $row_info['email'];
        $info_daftar = $row_info['info_daftar'];
        $kontak_konfirm = $row_info['kontak_konfirm'];
        
        ?>

<div class="navbar-main">
<nav class="navbar navbar-expand-lg fixed-top px-lg-5 py-2 shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">AIMI Bekasi <img src="../assets/img/header-sm.gif" height="50" class="d-inline-block align-items-center" alt="" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tentang.php">Tentang</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Layanan
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="kegiatan.php">Kegiatan</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="daftar.php">Daftar Konseling</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="riwayat.php">Riwayat</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profil.php">Akun <i class="bi bi-person"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Keluar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>