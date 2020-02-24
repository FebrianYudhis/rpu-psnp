<?php
session_start();
if(isset($_SESSION['username']) AND isset($_SESSION['id']) AND isset($_SESSION['status']) AND isset($_SESSION['role'])){
    echo "<script>alert('Sudah login !!!');window.location='app/index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login/login.css">
    <title><?= $judul;?></title>
</head>

<body>