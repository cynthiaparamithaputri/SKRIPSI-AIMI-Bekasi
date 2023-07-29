<?php 
// Menghapus session yang telah dibuat
session_start();
session_destroy();
header('Location: ../index.php');

?>