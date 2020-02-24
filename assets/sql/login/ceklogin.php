<?php
session_start();
include('../koneksi.php');
error_reporting(0);
$a = $_POST['username'];
$b = $_POST['password'];
$c = md5($b);
$query =mysqli_query($koneksi,"SELECT * FROM user WHERE username='$a' AND password='$c'");
$tampil = mysqli_fetch_array($query);

if(!isset($a)){
    echo "<script>alert('Akses ditolak !!!');window.location='../../../index.php'</script>";
}

if(mysqli_num_rows($query)>0){
    if($tampil['status']=="Aktif"){
        $_SESSION['nama'] = $tampil['nama_user'];
        $_SESSION['username'] = $tampil['username'];
        $_SESSION['status'] = "Login";
        $role = $tampil['id_level'];
        $_SESSION['role'] = $role;
        $query2 = mysqli_query($koneksi,"SELECT * FROM level WHERE id_level = '$role'");
        $cek = mysqli_fetch_array($query2);
        echo "<script>alert('Berhasil login sebagai {$cek['nama_level']}');window.location='../../../app/index.php'</script>";
    }else{
        echo "<script>alert('Akun belum aktif,hubungi admin untuk aktivasi akun');window.location='../../../index.php'</script>";
    }
}else{
    echo "<script>alert('Username atau password salah');window.location='../../../index.php'</script>";
}