<?php
session_start();
include('../../assets/sql/koneksi.php');
$base_url= "../../";
$judul = "Pengembalian barang";
$breadcumb ="Pengembalian > Pengembalian barang";
$operatorakses = 1;
include('../../assets/templates/app/header.php');

$ambilid = $_GET['id_peminjaman'];
$tampil = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE id_peminjaman='$ambilid'"));


$tampilinventaris=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM inventaris ORDER BY nama_barang"));
?>

<div class="kotak mt-3 mb-4 mx-auto" style="width:70%;">
    <div class="kotak-kepala center">
        <h2>Pengembalian barang</h2>
    </div>
    <div class="kotak-badan mt-2">
        <form action="../../assets/sql/pengembalian/edit.php" method="POST">
            <div class="form-isi">
                <input type="hidden" name="id_peminjaman" value="<?= $tampil['id_peminjaman'];?>">
                <p>Id peminjaman</p>
                <small class="form-input"><?= $tampil['id_peminjaman'];?></small>
            </div>
            <div class="form-isi">
                <p>Nama barang</p>
                <small class="form-input"><?= $tampilinventaris['nama_barang'];?></small>
            </div>
            <div class="form-isi">
                <p>Tanggal pinjam</p>
                <small class="form-input"><?= $tampil['tanggal_pinjam'];?></small>
            </div>
            <div class="form-isi">
                <p>Tanggal kembali</p>
                <input type="date" class="form-input border-merah" name="tanggal_kembali">
            </div>
            <div class="form-isi">
                <p>Jumlah</p>
                <small class="form-input"><?= $tampil['jumlah'];?></small>
            </div>
            <input type="submit" value="Ubah" class="form-submit mx-auto">
        </form>
    </div>
</div>

<?php
include('../../assets/templates/app/footer.php');
?>