<?php
session_start();
include('../../assets/sql/koneksi.php');
$base_url= "../../";
$judul = "Tambah peminjaman";
$breadcumb ="Peminjaman > Tambah";
include('../../assets/templates/app/header.php');

$inventaris=mysqli_query($koneksi,"SELECT * FROM inventaris ORDER BY nama_barang");
?>

<div class="kotak mt-3 mx-auto" style="width:70%;">
    <div class="kotak-kepala center">
        <h2>Tambah data peminjaman</h2>
    </div>
    <div class="kotak-badan mt-2">
        <form action="../../assets/sql/peminjaman/tambah.php" method="POST">
            <div class="form-isi">
                <p>Inventaris</p>
                <select name="inventaris" class="form-input">
                    <?php
                        while($tampilinventaris= mysqli_fetch_array($inventaris)):
                    ?>
                    <option value="<?= $tampilinventaris['id_inventaris'];?>">
                        <?= $tampilinventaris['nama_barang'];?>
                    </option>
                    <?php
                    endwhile;
                    ?>
                </select>
            </div>
            <div class="form-isi">
                <p>Tanggal pinjam</p>
                <input type="date" name="tanggal_pinjam" class="form-input">
            </div>
            <div class="form-isi">
                <p>Jumlah</p>
                <input type="number" name="jumlah" class="form-input" placeholder="Masukkan jumlah">
            </div>
            <input type="submit" value="Tambah" class="form-submit mx-auto">
        </form>
    </div>
</div>

<?php
include('../../assets/templates/app/footer.php');
?>