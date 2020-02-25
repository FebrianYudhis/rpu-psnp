<?php
session_start();
include('../../assets/sql/koneksi.php');
$base_url= "../../";
$judul = "Edit ruang";
$breadcumb ="Ruang > Edit";
$adminonly = 1;
include('../../assets/templates/app/header.php');

$ambil = $_GET['id_ruang'];
$cek = mysqli_query($koneksi,"SELECT * FROM ruang WHERE id_ruang='$ambil'");
$tampil = mysqli_fetch_array($cek)
?>

<div class="kotak mt-3 mb-4 mx-auto" style="width:70%;">
    <div class="kotak-kepala center">
        <h2>Edit ruang</h2>
    </div>
    <div class="kotak-badan mt-2">
        <form action="../../assets/sql/ruang/edit.php" method="POST">
            <div class="form-isi">
                <input type="hidden" name="id_ruang" value="<?= $tampil['id_ruang'];?>">
                <p>Id ruang</p>
                <small class="form-input"><?= $tampil['id_ruang'];?></small>
            </div>
            <div class="form-isi">
                <p>Nama ruang</p>
                <input type="text" class="form-input" name="nama" value="<?= $tampil['nama_ruang'];?>"
                    placeholder="Masukkan nama ruang">
            </div>
            <input type="submit" value="Ubah" class="form-submit mx-auto">
        </form>
    </div>
</div>
<?php
include('../../assets/templates/app/footer.php');
?>