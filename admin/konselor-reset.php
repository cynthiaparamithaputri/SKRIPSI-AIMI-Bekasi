<?php

include '../koneksi.php';

if (isset($_GET["id_petugas"])){
    $id_petugas = $_GET["id_petugas"];

    $sql = "UPDATE t_admin SET password = '41m1bekasi' WHERE id_petugas = '$id_petugas'";
    $koneksi->query($sql);
}

header("location: konselor.php");
exit;
?>