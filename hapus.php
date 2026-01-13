<?php
include 'koneksi.php';

$id = $_GET['ID'];

mysqli_query($koneksi, "DELETE FROM tamu WHERE ID='$id'");

header("Location: index.php");
?>
