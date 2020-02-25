<?php
session_start();
include('../koneksi.php');
$base_url = "../../../";

if(!isset($_SESSION['username']) AND !isset($_SESSION['status']) AND !isset($_SESSION['role'])){
    echo "<script>alert('Login dahulu !!!');window.location='{$base_url}index.php'</script>";
}

if($_SESSION['role']=='3'){
    echo "<script>alert('Akses ditolak !!!');window.location='{$base_url}app/index.php'</script>";
}else{
    $aa = $_POST['id_peminjaman'];
    $a = $_POST['inventaris'];
    $b = $_POST['tanggal_pinjam'];
    $c = $_POST['jumlah'];
    $d = $_SESSION['username'];
    $query = mysqli_query($koneksi,"UPDATE peminjaman SET id_inventaris='$a',tanggal_pinjam='$b',jumlah='$c',username='$d' WHERE id_peminjaman='$aa'");
    if($query){
        echo "<script>alert('Berhasil ditambah !!!');window.location='{$base_url}app/index.php'</script>";
    }
}

?>