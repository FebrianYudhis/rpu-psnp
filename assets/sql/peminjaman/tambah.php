<?php
session_start();
include('../koneksi.php');
$base_url = "../../../";
if(!isset($_SESSION['username']) AND !isset($_SESSION['status']) AND !isset($_SESSION['role'])){
    echo "<script>alert('Login dahulu !!!');window.location='{$base_url}index.php'</script>";
}
$a = $_POST['inventaris'];
$b = $_POST['tanggal_pinjam'];
$c = $_POST['jumlah'];
$d = $_SESSION['username'];
$query = mysqli_query($koneksi,"INSERT INTO peminjaman VALUES(NULL,'$b',NULL,'$c','$a','$d')");
if($query){
    echo "<script>alert('Berhasil ditambah !!!');window.location='{$base_url}app/index.php'</script>";
}


?>