<?php

include '../koneksi.php';

if (isset($_GET["id_petugas"])){
    $id_petugas = $_GET["id_petugas"];

    $sql = "UPDATE t_admin SET hak_akses = 'Istimewa' WHERE id_petugas = '$id_petugas'";
    $koneksi->query($sql);
}

header("location: admin.php");
exit;
?>