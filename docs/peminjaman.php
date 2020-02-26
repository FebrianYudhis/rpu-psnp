<?php
$judul= "Panduan Aplikasi PSNP";
$kiri = "inventaris.php";
$kanan = "pengembalian.php";
include('assets/template/header.php');
?>
<div class="konten">
    <div class="tulisan mt-2">
        <h2 class="center mb-2">Peminjaman</h2>
        <p class="biasa">- Pada level admin,semua admin dapat menambahkan data peminjaman,melihat,mengedit dan
            menghapusnya. <i>*Semua data akan ditampilkan</i>
        </p>
        <p class="biasa mt-1">- Pada level operator,semua operator dapat menambahkan data peminjaman,melihat dan
            mengedit data
            peminjaman. <i>*Semua data akan ditampilkan</i></p>

        <p class="biasa mt-1">- Pada level peminjam,semua peminjam dapat melakukan penambahan dan melihat data
            peminjaman. <i>*Hanya
                data peminjam tersebut yang akan ditampilkan</i></p>

        <p class="biasa mt-1"><i>* Jika peminjam melakukan kesalahan dalam menambahkan data dan ingin mengedit atau
                menghapusnya,dapat konfirmasi ke operator atau admin</i></p>

        <p class="biasa mt-1"><i>* Semua aktivitas yang dilakukan dimenu ini direkam jejaknya</i></p>

        <h4 class="mt-3 mb-3 center">Pilih selanjutnya untuk pembahasan berikutnya</h4>
    </div>
    <?php
include('assets/template/footer.php');
?>