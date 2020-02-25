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

$cekstok = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM inventaris WHERE id_inventaris='$a'"));
if($c > $cekstok['jumlah'] OR $c < 0 ){
    echo "<script>alert('Jumlah barang hanya ada {$cekstok['jumlah']},gagal meminjam !!!');window.location='{$base_url}app/peminjaman/tambah.php'</script>";
}else{
    $query = mysqli_query($koneksi,"INSERT INTO peminjaman VALUES(NULL,'$b','0000-00-00','$c','$a','$d')");
    if($query){
        echo "<script>alert('Berhasil ditambah !!!');window.location='{$base_url}app/index.php'</script>";
    }
}


?>