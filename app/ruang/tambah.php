<?php
session_start();
include('../../assets/sql/koneksi.php');
$base_url= "../../";
$judul = "Tambah ruang";
$breadcumb ="Ruang > Tambah";
$adminonly = 1;
include('../../assets/templates/app/header.php');
?>

<div class="kotak mt-3 mx-auto" style="width:70%;">
    <div class="kotak-kepala center">
        <h2>Tambah data ruang</h2>
    </div>
    <div class="kotak-badan mt-2">
        <form action="../../assets/sql/ruang/tambah.php" method="POST">
            <div class="form-isi">
                <p>Nama ruang</p>
                <input type="text" name="nama" class="form-input" placeholder="Masukkan nama ruang">
            </div>
            <input type="submit" value="Tambah" class="form-submit mx-auto">
        </form>
    </div>
</div>

<?php
include('../../assets/templates/app/footer.php');
?>