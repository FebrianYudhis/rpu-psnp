<?php
include('../koneksi.php');
error_reporting(0);
$a = $_POST['username'];
$b = $_POST['nama'];
$c = $_POST['kontak'];
$d = $_POST['password'];
$e = md5($d);

if(!isset($a)){
    echo "<script>alert('Akses ditolak !!!');window.location='../../../daftar.php'</script>";
}

$cek = mysqli_query($koneksi,"SELECT * FROM user");
while($cek2 = mysqli_fetch_array($cek)){
    if($a == $cek2['username']){
        echo "<script>alert('Username sudah terpakai');window.location='../../../daftar.php'</script>";
    }
}
$insert = mysqli_query($koneksi,"INSERT INTO user VALUES('$a','$b','$c','$e','Belum aktif',3)");
echo "<script>alert('Akun berhasil didaftarkan,silahkan hubungi admin untuk aktivasi akun');window.location='../../../index.php'</script>";