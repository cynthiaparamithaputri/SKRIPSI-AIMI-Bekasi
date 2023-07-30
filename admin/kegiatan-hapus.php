<?php

include '../koneksi.php';

if (isset($_GET["id_kegiatan"])){
    $id_kegiatan = $_GET["id_kegiatan"];

    $sql = "DELETE FROM t_kegiatan WHERE id_kegiatan = '$id_kegiatan'";
    $koneksi->query($sql);
}

header("location: kegiatan.php");
exit;
?>