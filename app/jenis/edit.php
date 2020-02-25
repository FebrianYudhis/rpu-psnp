<?php
session_start();
include('../../assets/sql/koneksi.php');
$base_url= "../../";
$judul = "Edit jenis";
$breadcumb ="Jenis > Edit";
$adminonly = 1;
include('../../assets/templates/app/header.php');

$ambil = $_GET['id_jenis'];
$cek = mysqli_query($koneksi,"SELECT * FROM jenis WHERE id_jenis='$ambil'");
$tampil = mysqli_fetch_array($cek)
?>

<div class="kotak mt-3 mb-4 mx-auto" style="width:70%;">
    <div class="kotak-kepala center">
        <h2>Edit jenis</h2>
    </div>
    <div class="kotak-badan mt-2">
        <form action="../../assets/sql/jenis/edit.php" method="POST">
            <div class="form-isi">
                <input type="hidden" name="id_jenis" value="<?= $tampil['id_jenis'];?>">
                <p>Id jenis</p>
                <small class="form-input"><?= $tampil['id_jenis'];?></small>
            </div>
            <div class="form-isi">
                <p>Nama jenis</p>
                <input type="text" class="form-input" name="nama" value="<?= $tampil['nama_jenis'];?>"
                    placeholder="Masukkan nama jenis">
            </div>
            <input type="submit" value="Ubah" class="form-submit mx-auto">
        </form>
    </div>
</div>
<?php
include('../../assets/templates/app/footer.php');
?>