<?php
session_start();
include('../koneksi.php');
$base_url = "../../../";

if(!isset($_SESSION['username']) AND !isset($_SESSION['status']) AND !isset($_SESSION['role'])){
    echo "<script>alert('Login dahulu !!!');window.location='{$base_url}index.php'</script>";
}
    $aa = $_POST['id_peminjaman'];
    $a = $_POST['id_inventaris'];
    $b = $_POST['tanggal_pinjam'];
    $c = $_POST['jumlah'];
    $d = $_SESSION['username'];
    $cekstok = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM inventaris WHERE id_inventaris='$a'"));
    $cekjumlah = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE id_peminjaman='$aa'"));
if($_SESSION['role']=='3'){
    echo "<script>alert('Akses ditolak !!!');window.location='{$base_url}app/index.php'</script>";
}else{
    if($c<0){
        echo "<script>alert('Angka tidak boleh kurang dari 0 !!!');window.location='{$base_url}app/peminjaman/edit.php?id_peminjaman={$aa}'</script>";
    }elseif($c > ($cekjumlah['jumlah'] + $cekstok['jumlah'])){
        echo "<script>alert('Gagal meminjam,stok tersisa {$cekstok['jumlah']} !!!');window.location='{$base_url}app/peminjaman/edit.php?id_peminjaman={$aa}'</script>";
    }else{
        $query = mysqli_query($koneksi,"UPDATE peminjaman SET tanggal_pinjam='$b',jumlah='$c',pengelola='$d' WHERE id_peminjaman='$aa'");
        if($query){
            echo "<script>alert('Berhasil diubah !!!');window.location='{$base_url}app/index.php'</script>";
        }
    }
    
}

?>