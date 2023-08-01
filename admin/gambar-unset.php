<?php

include '../koneksi.php';

if (isset($_GET["id_kegiatan"])){
    $id_kegiatan = $_GET["id_kegiatan"];

    $sql = "UPDATE t_kegiatan SET gambar = 'assets/img/kegiatan/no_image.jpg' WHERE id_kegiatan = '$id_kegiatan'";
    $koneksi->query($sql);
}

header("location: kegiatan.php");
exit;
?>