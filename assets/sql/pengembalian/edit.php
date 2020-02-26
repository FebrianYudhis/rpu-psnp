<?php
session_start();
include('../koneksi.php');
$base_url = "../../../";

if(!isset($_SESSION['username']) AND !isset($_SESSION['status']) AND !isset($_SESSION['role'])){
    echo "<script>alert('Login dahulu !!!');window.location='{$base_url}index.php'</script>";
}
    $a = $_POST['id_peminjaman'];
    $b = $_POST['tanggal_kembali'];
    $c = $_SESSION['username'];
if($_SESSION['role']=='3'){
    echo "<script>alert('Akses ditolak !!!');window.location='{$base_url}app/index.php'</script>";
}else{
    $query = mysqli_query($koneksi,"UPDATE peminjaman SET tanggal_kembali='$b',pengelola='$c' WHERE id_peminjaman='$a'");
    if($query){
        echo "<script>alert('Berhasil dikembalikan !!!');window.location='{$base_url}app/index.php'</script>";
    }
}

?>