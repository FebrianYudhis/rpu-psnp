<?php
$judul= "Panduan Aplikasi PSNP";
$kiri = "index.php";
$kanan = "jenisruang.php";
include('assets/template/header.php');
?>
<div class="konten">
    <div class="tulisan mt-2">
        <h2 class="center mb-2">Akun</h2>
        <p class="biasa"># Setiap akun dapat mengganti passwordnya,apabila kelupaan password sebelumnya,hubungi admin
            untuk dilakukan reset password</p>
        <p class="biasa mt-1">- Pada level admin,semua admin dapat mengedit data,melihat,menghapus data akun pada level
            dibawahnya (admin tidak dapat mengedit, melihat dan menghapus data admin lainnya,kecuali superadmin)
            <i>*superadmin
                diaplikasi ini adalah admin yang memiliki username 'admin'</i></p>
        <p class="biasa mt-1">- Pada level operator dan peminjam,menu ini tidak dapat diakses</p>
        <h4 class="mt-3 mb-3 center">Pilih selanjutnya untuk pembahasan berikutnya</h4>
    </div>
    <?php
include('assets/template/footer.php');
?>