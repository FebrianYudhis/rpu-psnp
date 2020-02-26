<?php
$judul= "Panduan Aplikasi PSNP";
$kiri = "pengembalian.php";
$kanan = "#";
include('assets/template/header.php');
?>
<div class="konten">
    <div class="tulisan mt-2">
        <h2 class="center mb-2">Laporan</h2>
        <p class="biasa"># Pada menu ini digunakan sebagai bentuk pelaporan tentang riwayat pengembalian data inventaris
            serta beberapa informasi lainnya</p>
        <p class="biasa mt-1">- Pada level admin,semua admin dapat menghapus data peminjaman barang yang telah selesai
            dilakukan,apabila dirasa ada yang janggal,admin juga dapat melakukan rollback data peminjamannya
            <i>*Semua
                data pengembalian yang barangnya telah dikembalikan akan ditampilkan</i>
        </p>
        <p class="biasa mt-1">- Pada level operator dan peminjam,menu ini tidak dapat diakses</p>

        <h4 class="mt-3 mb-3 center">Pilih selanjutnya untuk pembahasan berikutnya</h4>
    </div>
    <?php
include('assets/template/footer.php');
?>