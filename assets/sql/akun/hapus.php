<?php
session_start();
include('../koneksi.php');
$base_url = "../../../";
if(!isset($_SESSION['username']) AND !isset($_SESSION['status']) AND !isset($_SESSION['role'])){
    echo "<script>alert('Login dahulu !!!');window.location='{$base_url}index.php'</script>";
}

$a = $_GET['username'];
$cekrole = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM user WHERE username='$a'"));

if($_SESSION['role']!='1'){
    echo "<script>alert('Akses ditolak !!!');window.location='{$base_url}app/index.php'</script>";
}elseif($cekrole['id_level'] == 1 AND $_SESSION['username']!="admin"){
    echo "<script>alert('Akses ditolak !!!');window.location='{$base_url}app/index.php'</script>";
}else{
    $query = mysqli_query($koneksi,"DELETE from user WHERE username='$a'");
    if($query){
        echo "<script>alert('Berhasil dihapus !!!');window.location='{$base_url}app/index.php'</script>";
    }else{
        echo "<script>alert('Gagal dihapus !!!');window.location='{$base_url}app/index.php'</script>";
    }
}

?>