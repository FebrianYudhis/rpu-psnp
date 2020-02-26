<?php
session_start();
include('../assets/sql/koneksi.php');
$base_url= "../";
$judul = "Ganti password";
$breadcumb ="Password > Ubah";
include('../assets/templates/app/header.php');

$ambil = $_SESSION['username'];
$cek = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$ambil'");
$tampil = mysqli_fetch_array($cek)
?>

<div class="kotak mt-3 mx-auto mb-4" style="width:70%;">
    <div class="kotak-kepala center">
        <h2>Ganti password</h2>
    </div>
    <div class="kotak-badan mt-2">
        <form action="../assets/sql/gantipassword.php" method="POST">
            <div class="form-isi">
                <input type="hidden" name="username" value="<?= $tampil['username'];?>">
                <p>Username</p>
                <small class="form-input"><?= $tampil['username'];?></small>
            </div>
            <div class="form-isi">
                <p>Password lama</p>
                <input type="password" name="password_lama" class="form-input" placeholder="Masukkan password lama">
            </div>
            <div class="form-isi">
                <p>Password baru</p>
                <input type="password" name="password_baru" class="form-input" placeholder="Masukkan password baru">
            </div>
            <div class="form-isi">
                <p>Konfirmasi password baru</p>
                <input type="password" name="konfirmasi_baru" class="form-input" placeholder="Konfirmasi password baru">
            </div>
            <input type="submit" value="Ganti" class="form-submit mx-auto">
        </form>
    </div>
</div>
<?php
include('../assets/templates/app/footer.php');
?>