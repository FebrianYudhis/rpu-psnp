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
    $a = $_POST['nama'];
    $b = $_POST['kondisi'];
    $c = $_POST['jumlah'];
    $d = $_POST['tanggal'];
    $e = $_POST['jenis'];
    $f = $_POST['ruang'];
    $g = $_SESSION['username'];
    if($c>0){
        $query = mysqli_query($koneksi,"INSERT INTO inventaris VALUES(NULL,'$a','$b','$c','$d','$e','$f','$g')");
        if($query){
            echo "<script>alert('Berhasil ditambah !!!');window.location='{$base_url}app/index.php'</script>";
        }
    }else{
        echo "<script>alert('Masukkan jumlah diatas angka 0 !!!');window.location='{$base_url}app/inventaris/tambah.php'</script>";
    }
    
}

?>