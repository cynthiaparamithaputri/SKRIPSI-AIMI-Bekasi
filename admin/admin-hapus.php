<?php

include '../koneksi.php';

if (isset($_GET["id_petugas"])){
    $id_petugas = $_GET["id_petugas"];

    $sql = "DELETE FROM t_admin WHERE id_petugas = '$id_petugas'";
    $koneksi->query($sql);
}

header("location: admin.php");
exit;
?>