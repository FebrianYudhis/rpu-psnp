<?php
session_start();
session_destroy();
echo "<script>alert('Berhasil keluar !!!');window.location='../../index.php'</script>";
?>