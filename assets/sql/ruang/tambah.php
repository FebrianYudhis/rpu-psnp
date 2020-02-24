<?php
session_start();
include('../koneksi.php');
$base_url = "../../../";
if(!isset($_SESSION['username']) AND !isset($_SESSION['id']) AND !isset($_SESSION['status']) AND !isset($_SESSION['role'])){
    echo "<script>alert('Login dahulu !!!');window.location='{$base_url}index.php'</script>";
}
if($_SESSION['role']!='1'){
    echo "<script>alert('Akses ditolak !!!');window.location='{$base_url}app/index.php'</script>";
}else{
    $a = $_POST['nama'];
    $query = mysqli_query($koneksi,"INSERT INTO ruang VALUES(NULL,'$a')");
    if($query){
        echo "<script>alert('Berhasil ditambah !!!');window.location='{$base_url}app/index.php'</script>";
    }
}

?>