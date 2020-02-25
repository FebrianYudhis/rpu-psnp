<?php
session_start();
include('../koneksi.php');
$base_url = "../../../";
if(!isset($_SESSION['username']) AND !isset($_SESSION['status']) AND !isset($_SESSION['role'])){
    echo "<script>alert('Login dahulu !!!');window.location='{$base_url}index.php'</script>";
}
if($_SESSION['role']!='1'){
    echo "<script>alert('Akses ditolak !!!');window.location='{$base_url}app/index.php'</script>";
}else{
    $inventaris = $_POST['id_inventaris'];
    $a = $_POST['nama'];
    $b = $_POST['kondisi'];
    $c = $_POST['jumlah'];
    $d = $_POST['tanggal'];
    $e = $_POST['jenis'];
    $f = $_POST['ruang'];
    $g = $_SESSION['username'];
    $query = mysqli_query($koneksi,"UPDATE inventaris SET nama_barang='$a',kondisi='$b',jumlah='$c',tanggal_register='$d',id_jenis='$e',id_ruang='$f',username='$g' WHERE id_inventaris='$inventaris'");
    if($query){
        echo "<script>alert('Berhasil diubah !!!');window.location='{$base_url}app/index.php'</script>";
    }
}

?>