<?php
session_start();
include('../../assets/sql/koneksi.php');
$base_url= "../../";
$judul = "Edit akun";
$breadcumb ="Akun > Edit";
$adminonly = 1;
include('../../assets/templates/app/header.php');

$ambil = $_REQUEST['username'];
$cek = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$ambil'");
$tampil = mysqli_fetch_array($cek)
?>

<div class="kotak mt-3 mx-auto" style="width:70%;">
    <div class="kotak-kepala center">
        <h2>Edit akun</h2>
    </div>
    <div class="kotak-badan mt-2">
        <form action="../../assets/sql/akun/edit.php" method="POST">
            <div class="form-isi">
                <input type="hidden" name="username" value="<?= $tampil['username'];?>">
                <p>Username</p>
                <small class="form-input"><?= $tampil['username'];?></small>
            </div>
            <div class="form-isi">
                <p>Nama</p>
                <input type="text" class="form-input" name="nama" value="<?= $tampil['nama_user'];?>"
                    placeholder="Masukkan nama">
            </div>
            <div class="form-isi">
                <p>Kontak</p>
                <input type="text" class="form-input" name="kontak" value="<?= $tampil['kontak'];?>"
                    placeholder="Masukkan kontak">
            </div>
            <div class="form-isi">
                <p>Level</p>
                <select name="level" class="form-input">
                    <?php
                        $ceklevel = mysqli_query($koneksi,"SELECT * FROM level");
                        while($tampillevel = mysqli_fetch_array($ceklevel)):?>
                    <option value="<?= $tampillevel['id_level'];?>"
                        <?php if($tampillevel['id_level']==$tampil['id_level']){echo 'selected';}?>>
                        <?= $tampillevel['nama_level'];?></option> <?php
                        endwhile;
                    ?>
                </select>
            </div>
            <input type="submit" value="Ubah" class="form-submit mx-auto">
        </form>
    </div>
</div>
<?php
include('../../assets/templates/app/footer.php');
?>