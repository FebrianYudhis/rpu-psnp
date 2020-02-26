<?php
$judul= "Panduan Aplikasi PSNP";
$kiri = "peminjaman.php";
$kanan = "laporan.php";
include('assets/template/header.php');
?>
<div class="konten">
    <div class="tulisan mt-2">
        <h2 class="center mb-2">Pengembalian</h2>
        <p class="biasa">- Pada level admin,semua admin dapat melakukan konfirmasi pengembalian data inventaris.
            <i>*Semua
                data akan ditampilkan</i>
        </p>
        <p class="biasa mt-1">- Pada level operator,semua operator dapat melakukan konfirmasi pengembalian data
            inventaris. <i>*Semua data akan ditampilkan</i></p>

        <p class="biasa mt-1">- Pada level peminjam,menu ini tidak dapat diakses</p>
        <p class="biasa mt-1"><i>* Semua aktivitas yang dilakukan dimenu ini direkam jejaknya</i></p>

        <h4 class="mt-3 mb-3 center">Pilih selanjutnya untuk pembahasan berikutnya</h4>
    </div>
    <?php
include('assets/template/footer.php');
?>