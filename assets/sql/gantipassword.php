<?php
session_start();
include('koneksi.php');
$base_url = '../../';
if(!isset($_SESSION['username']) AND !isset($_SESSION['status']) AND !isset($_SESSION['role'])){
    echo "<script>alert('Login dahulu !!!');window.location='{$base_url}app/index.php'</script>";
}

$a = $_POST['password_lama'];
$b = $_POST['password_baru'];
$c = $_POST['konfirmasi_baru'];
$aa = md5($a);
$bb = md5($b);
$cc = md5($c);
$username = $_POST['username'];
$session = $_SESSION['username'];

$cekpassword = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username'"));

if($session != $username){
    echo "<script>alert('Akses ditolak !!!');window.location='{$base_url}app/index.php'</script>";
}else{
    if($cekpassword['password'] != $aa){
        echo "<script>alert('Password lama salah !!!');window.location='{$base_url}app/gantipassword.php'</script>";
    }elseif($cc != $bb){
        echo "<script>alert('Password baru tidak sama !!!');window.location='{$base_url}app/gantipassword.php'</script>";
    }else{
        $update = mysqli_query($koneksi,"UPDATE user SET password ='$cc' WHERE username='$session'");
        echo "<script>alert('Password berhasil diubah !!!');window.location='{$base_url}app/index.php'</script>";
    }
}
?>