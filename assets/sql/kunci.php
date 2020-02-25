<?php
session_start();
if(!isset($_SESSION['username']) AND !isset($_SESSION['status']) AND !isset($_SESSION['role'])){
    echo "<script>alert('Login dahulu !!!');window.location='{$base_url}index.php'</script>";
}
if(isset($adminonly)){
    if($_SESSION['role']!='1'){
        echo "<script>alert('Akses ditolak !!!');window.location='{$base_url}app/index.php'</script>";
    }else{
        $lakukan;
    }
}

if(isset($operatorakses)){
    if($_SESSION['role'] == '3'){
        echo "<script>alert('Akses ditolak !!!');window.location='{$base_url}app/index.php'</script>";
    }
}