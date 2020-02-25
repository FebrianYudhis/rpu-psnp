<?php
session_start();
include('../../assets/sql/koneksi.php');
$base_url= "../../";
$judul = "Tambah inventaris";
$breadcumb ="Inventaris > Tambah";
$adminonly = 1;
include('../../assets/templates/app/header.php');

$jenis=mysqli_query($koneksi,"SELECT * FROM jenis");
$ruang=mysqli_query($koneksi,"SELECT * FROM ruang");
?>

<div class="kotak mt-3 mx-auto mb-4" style="width:70%;">
    <div class="kotak-kepala center">
        <h2>Tambah data inventaris</h2>
    </div>
    <div class="kotak-badan mt-2">
        <form action="../../assets/sql/inventaris/tambah.php" method="POST">
            <div class="form-isi">
                <p>Nama barang</p>
                <input type="text" name="nama" class="form-input" placeholder="Masukkan nama barang">
            </div>
            <div class="form-isi">
                <p>Kondisi</p>
                <input type="text" name="kondisi" class="form-input" placeholder="Kondisi barang">
            </div>
            <div class="form-isi">
                <p>Jumlah</p>
                <input type="number" name="jumlah" class="form-input" placeholder="Jumlah barang">
            </div>
            <div class="form-isi">
                <p>Tanggal didaftarkan</p>
                <input type="date" name="tanggal" class="form-input">
            </div>
            <div class="form-isi">
                <p>Jenis</p>
                <select name="jenis" class="form-input">
                    <?php
                        while($tampiljenis= mysqli_fetch_array($jenis)):
                    ?>
                    <option value="<?= $tampiljenis['id_jenis'];?>"><?= $tampiljenis['nama_jenis'];?></option>
                    <?php
                    endwhile;
                    ?>
                </select>
            </div>
            <div class="form-isi">
                <p>Ruang</p>
                <select name="ruang" class="form-input">
                    <?php
                        while($tampilruang= mysqli_fetch_array($ruang)):
                    ?>
                    <option value="<?= $tampilruang['id_ruang'];?>"><?= $tampilruang['nama_ruang'];?></option>
                    <?php
                    endwhile;
                    ?>
                </select>
            </div>
            <input type="submit" value="Tambah" class="form-submit mx-auto">
        </form>
    </div>
</div>

<?php
include('../../assets/templates/app/footer.php');
?>