<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username']) AND !isset($_SESSION['id']) AND !isset($_SESSION['status']) AND !isset($_SESSION['role'])){
    echo "<script>alert('Login dahulu !!!');window.location='{$base_url}index.php'</script>";
}
if(isset($adminonly)){
    if($_SESSION['role']!='1'){
        echo "<script>alert('Akses ditolak !!!');window.location='{$base_url}app/index.php'</script>";
    }
}

if(isset($operatorakses)){
    if($_SESSION['role'] == '3'){
        echo "<script>alert('Akses ditolak !!!');window.location='{$base_url}app/index.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $base_url;?>assets/css/style.css">
    <link rel="stylesheet" href="<?= $base_url;?>assets/css/app/layout.css">
    <title><?= $judul;?></title>
</head>

<body>
    <div class="header">
        <h1>Aplikasi Pengelolaan Sarana Dan Prasarana</h1>
    </div>
    <div class="sub-header">
        <div class="sub-kiri"><i><b>PSNP > <?= $breadcumb;?></b></i></div>
        <div class="sub-kanan">
            <ul>
                <li><img src="<?= $base_url;?>assets/img/img.jpg" alt="avatar" class="avatar"></li>
                <li class="nama"><b><a href="#"><?= $_SESSION['nama'];?> </a></b>
                    <ul>
                        <li><a href="<?= $base_url;?>app/gantipassword.php">Ganti password</a></li>
                        <li><a href="<?= $base_url;?>assets/sql/keluar.php">Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar">
        <ul>
            <li><a href="<?= $base_url;?>app/index.php">Home</a></li>
            <?php
            if($_SESSION['role']==1){
                    echo '<li><a href="'.$base_url.'app/akun/">List Akun</a></li>
            <li><a href="#">Jenis</a>
                <ul>
                    <li><a href="'.$base_url.'app/jenis/tambah.php">Tambah data</a></li>
                    <li><a href="'.$base_url.'app/jenis/lihat.php">Lihat data</a></li>
                </ul>
            </li>
            <li><a href="#">Ruang</a>
                <ul>
                    <li><a href="'.$base_url.'app/ruang/tambah.php">Tambah data</a></li>
                    <li><a href="'.$base_url.'app/ruang/lihat.php">Lihat data</a></li>
                </ul>
            </li>
            <li><a href="#">Inventaris</a>
                <ul>
                    <li><a href="'.$base_url.'app/inventaris/tambah.php">Tambah data</a></li>
                    <li><a href="'.$base_url.'app/inventaris/lihat.php">Lihat data</a></li>
                </ul>
            </li>
            <li><a href="#">Peminjaman</a>
                <ul>
                    <li><a href="'.$base_url.'app/peminjaman/tambah.php">Tambah data</a></li>
                    <li><a href="'.$base_url.'app/peminjaman/lihat.php">Lihat data</a></li>
                </ul>
            </li>
            <li><a href="'.$base_url.'app/pengembalian.php">Pengembalian</a></li>
            <li><a href="'.$base_url.'app/laporan.php">Laporan</a></li>';
            }else if($_SESSION['role']==2){
            echo '<li><a href="#">Peminjaman</a>
                <ul>
                    <li><a href="'.$base_url.'app/peminjaman/tambah.php">Tambah data</a></li>
                    <li><a href="'.$base_url.'app/peminjaman/lihat.php">Lihat data</a></li>
                </ul>
            </li>
            <li><a href="'.$base_url.'app/pengembalian.php">Pengembalian</a></li>';
            }else{
            echo '<li><a href="#">Peminjaman</a>
                <ul>
                    <li><a href="'.$base_url.'app/peminjaman/tambah.php">Tambah data</a></li>
                    <li><a href="'.$base_url.'app/peminjaman/lihat.php">Lihat data</a></li>
                </ul>
            </li>';
            }
            ?>
        </ul>
    </div>
    <div class="konten">