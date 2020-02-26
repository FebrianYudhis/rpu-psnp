<?php
session_start();
include('../koneksi.php');
$base_url = "../../../";
if(!isset($_SESSION['username']) AND !isset($_SESSION['status']) AND !isset($_SESSION['role'])){
    echo "<script>alert('Login dahulu !!!');window.location='{$base_url}index.php'</script>";
}

$a = $_GET['id_peminjaman'];
$simpan = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE id_peminjaman='$a'"));

$idpeminjaman= $simpan['id_peminjaman'];
$tanggalpinjam = $simpan['tanggal_pinjam'];
$jumlah = $simpan['jumlah'];
$idinventaris = $simpan['id_inventaris'];
$peminjam = $simpan['username'];
if($_SESSION['role']!='1'){
    echo "<script>alert('Akses ditolak !!!');window.location='{$base_url}app/index.php'</script>";
}
else{
    $query = mysqli_query($koneksi,"DELETE from peminjaman WHERE id_peminjaman='$a'");
    if($query){
        $masukkan = mysqli_query($koneksi,"INSERT INTO peminjaman VALUES('$idpeminjaman','$tanggalpinjam','0000-00-00','$jumlah','$idinventaris','$peminjam',NULL)");
        if($masukkan){
            echo "<script>alert('Berhasil rollback !!!');window.location='{$base_url}app/index.php'</script>";
        }else{
            echo "<script>alert('Gagal rollback 2!!!');window.location='{$base_url}app/index.php'</script>";
        }
    }else{
        echo "<script>alert('Gagal rollback 1!!!');window.location='{$base_url}app/index.php'</script>";
    }
}

?>