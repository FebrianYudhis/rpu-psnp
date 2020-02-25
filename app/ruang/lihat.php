<?php
session_start();
include('../../assets/sql/koneksi.php');
$base_url= "../../";
$judul = "Lihat ruang";
$breadcumb ="Ruang > Lihat";
$adminonly = 1;
include('../../assets/templates/app/header.php');
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $queryruang = mysqli_query($koneksi,"SELECT * FROM ruang WHERE nama_ruang LIKE '%$cari%'");
    $no =1;
}else{
    $jumlahdatahalaman = 5;
    $halamansekarang = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
    $mulai = ($jumlahdatahalaman * $halamansekarang) - $jumlahdatahalaman;
    $queryruang = mysqli_query($koneksi,"SELECT * FROM ruang ORDER BY nama_ruang LIMIT $mulai, $jumlahdatahalaman");
    $no = $mulai+1;

    $result = mysqli_query($koneksi,"SELECT * FROM ruang");
    $total = mysqli_num_rows($result);
    $jumlahhalaman = ceil($total/$jumlahdatahalaman);
}     
?>

<h2 class="center mt-1 mb-1">List ruang</h2>

<div class="pencarian">
    <table>
        <tr>
            <form action="" method="GET">
                <td><input type="text" name="cari" placeholder="Masukkan kata kunci"></td>
                <td><button><a href="">Cari</a></button></td>
            </form>
        </tr>
    </table>
</div>
<div class="clear"></div>
<table class="table table-berborder table-garis mx-auto center table-hover table-responsif" style="width: 60%;">
    <thead class="kepala-dark">
        <tr>
            <th>#</th>
            <th>Nama ruang</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($tampilruang = mysqli_fetch_array($queryruang)):
        ?>
        <tr>
            <td><?= $no;?></td>
            <td><?= $tampilruang['nama_ruang'];?></td>
            <td>
                <button class="button button-kuning"><a
                        href="<?= $base_url;?>app/ruang/edit.php?id_ruang=<?= $tampilruang['id_ruang'];?>">Edit</a></button>
                <button class="button button-merah"><a
                        href="<?= $base_url;?>assets/sql/ruang/hapus.php?id_ruang=<?= $tampilruang['id_ruang'];?>">Hapus</a></button>
            </td>
        </tr>

        <?php
            $no++;
            endwhile;
        ?>
    </tbody>
</table>

<nav class="mt-2 mb-4">
    <ul class="halaman konten-tengah">

        <?php if($halamansekarang >1): ?>
        <li class="item-halaman"><a href="?halaman=<?= $halamansekarang-1;?>" class="link-halaman">Sebelumnya</a></li>
        <?php else :?>
        <li class="item-halaman disabled"><a href="?halaman=<?= $halamansekarang-1;?>"
                class="link-halaman">Sebelumnya</a></li>
        <?php endif; ?>

        <?php for($i=1;$i<= ($jumlahhalaman);$i++): ?>
        <?php if($i == $halamansekarang): ?>

        <li class="item-halaman active"><a href="?halaman=<?= $i;?>" class="link-halaman"><?= $i;?></a></li>

        <?php else : ?>

        <li class="item-halaman"><a href="?halaman=<?= $i;?>" class="link-halaman"><?= $i;?></a></li>

        <?php
        endif;
        ?>

        <?php
        endfor;
        ?>

        <?php if($halamansekarang < $jumlahhalaman): ?>
        <li class="item-halaman"><a href="?halaman=<?= $halamansekarang+1;?>" class="link-halaman">Selanjutnya</a></li>
        <?php else : ?>
        <li class="item-halaman disabled"><a href="?halaman=<?= $halamansekarang+1;?>"
                class="link-halaman">Selanjutnya</a></li>
        <?php endif; ?>
    </ul>
</nav>


<?php
include('../../assets/templates/app/footer.php');
?>