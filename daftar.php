<?php
$judul = "Daftar akun PSNP";
include('assets/templates/login/header.php');
?>
<div class="kotak">
    <div class="kepala">
        <h1>Daftar akun baru</h1>
    </div>
    <div class="isi">
        <form action="assets/sql/login/daftarakun.php" method="POST">
            <p><b>Nama</b></p>
            <input type="text" name="nama" placeholder="Masukkan nama" REQUIRED>
            <p><b>Kontak</b></p>
            <input type="number" name="kontak" placeholder="Masukkan nomor handphone" REQUIRED>
            <p><b>Username</b></p>
            <input type="text" name="username" placeholder="Masukkan username" REQUIRED>
            <p><b>Password</b></p>
            <input type="password" name="password" placeholder="Masukkan password" REQUIRED>
            <br>
            <button type="submit">Daftar</button>
        </form>
    </div>
    <div class="kaki">Sudah punya akun ? masuk <a href="index.php">disini</a></div>
</div>

<?php
include('assets/templates/login/footer.php');
?>