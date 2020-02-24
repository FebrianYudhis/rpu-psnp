<?php
$judul = "Masuk akun PSNP";
include('assets/templates/login/header.php');
?>
<div class="kotak">
    <div class="kepala">
        <h1>Selamat Datang</h1>
    </div>
    <div class="isi">
        <form action="assets/sql/login/ceklogin.php" method="POST">
            <p><b>Username</b></p>
            <input type="text" name="username" placeholder="Masukkan username" REQUIRED>
            <p><b>Password</b></p>
            <input type="password" name="password" placeholder="Masukkan password" REQUIRED>
            <br>
            <button type="submit">Masuk</button>
        </form>
    </div>
    <div class="kaki">Belum punya akun ? daftar <a href="daftar.php">disini</a></div>
</div>

<?php
include('assets/templates/login/footer.php');
?>