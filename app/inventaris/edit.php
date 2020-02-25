<?php
session_start();
include('../../assets/sql/koneksi.php');
$base_url= "../../";
$judul = "Edit inventaris";
$breadcumb ="Inventaris > Edit";
$adminonly = 1;
include('../../assets/templates/app/header.php');

$ambil = $_GET['id_inventaris'];
$cek = mysqli_query($koneksi,"SELECT * FROM inventaris WHERE id_inventaris='$ambil'");
$tampil = mysqli_fetch_array($cek)
?>

<div class="kotak mt-3 mx-auto mb-4" style="width:70%;">
    <div class="kotak-kepala center">
        <h2>Edit data inventaris</h2>
    </div>
    <div class="kotak-badan mt-2">
        <form action="../../assets/sql/inventaris/edit.php" method="POST">
            <div class="form-isi">
                <input type="hidden" name="id_inventaris" value="<?= $tampil['id_inventaris'];?>">
                <p>Id inventaris</p>
                <small class="form-input"><?= $tampil['id_inventaris'];?></small>
            </div>
            <div class="form-isi">
                <p>Nama barang</p>
                <input type="text" name="nama" class="form-input" placeholder="Masukkan nama barang"
                    value="<?= $tampil['nama_barang'];?>">
            </div>
            <div class="form-isi">
                <p>Kondisi</p>
                <input type="text" name="kondisi" class="form-input" placeholder="Kondisi barang"
                    value="<?= $tampil['kondisi'];?>">
            </div>
            <div class="form-isi">
                <p>Jumlah</p>
                <input type="number" name="jumlah" class="form-input" placeholder="Jumlah barang"
                    value="<?= $tampil['jumlah'];?>">
            </div>
            <div class="form-isi">
                <p>Tanggal didaftarkan</p>
                <input type="date" name="tanggal" class="form-input" value="<?= $tampil['tanggal_register'];?>">
            </div>
            <div class="form-isi">
                <p>Jenis</p>
                <select name="jenis" class="form-input">
                    <?php
                        $jenis=mysqli_query($koneksi,"SELECT * FROM jenis");
                        while($tampiljenis= mysqli_fetch_array($jenis)):
                    ?>
                    <option value="<?= $tampiljenis['id_jenis'];?>"
                        <?php if($tampiljenis['id_jenis']==$tampil['id_jenis']){echo 'selected';}?>>
                        <?= $tampiljenis['nama_jenis'];?>
                    </option> <?php
                    endwhile;
                    ?>
                </select>
            </div>
            <div class="form-isi">
                <p>Ruang</p>
                <select name="ruang" class="form-input">
                    <?php
                        $ruang=mysqli_query($koneksi,"SELECT * FROM ruang");
                        while($tampilruang= mysqli_fetch_array($ruang)):
                    ?>
                    <option value="<?= $tampilruang['id_ruang'];?>"
                        <?php if($tampilruang['id_ruang']==$tampil['id_ruang']){echo 'selected';}?>>
                        <?= $tampilruang['nama_ruang'];?>
                    </option> <?php
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