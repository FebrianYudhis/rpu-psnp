<?php
session_start();
include('../koneksi.php');
$base_url = "../../../";

if(!isset($_SESSION['username']) AND !isset($_SESSION['status']) AND !isset($_SESSION['role'])){
    echo "<script>alert('Login dahulu !!!');window.location='{$base_url}index.php'</script>";
}
    $aa = $_POST['id_peminjaman'];
    $a = $_POST['inventaris'];
    $b = $_POST['tanggal_pinjam'];
    $c = $_POST['jumlah'];
    $d = $_SESSION['username'];
if($_SESSION['role']=='3'){
    echo "<script>alert('Akses ditolak !!!');window.location='{$base_url}app/index.php'</script>";
}else{
    if($c<0){
        echo "<script>alert('Angka tidak boleh kurang dari 0 !!!');window.location='{$base_url}app/peminjaman/edit.php?id_peminjaman={$aa}'</script>";
    }else{
        $query = mysqli_query($koneksi,"UPDATE peminjaman SET id_inventaris='$a',tanggal_pinjam='$b',jumlah='$c',pengelola='$d' WHERE id_peminjaman='$aa'");
        if($query){
            echo "<script>alert('Berhasil diubah !!!');window.location='{$base_url}app/index.php'</script>";
        }
    }
    
}

?>