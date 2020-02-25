<?php
session_start();
include('../../assets/sql/koneksi.php');
$base_url= "../../";
$judul = "Lihat jenis";
$breadcumb ="Jenis > Lihat";
$adminonly = 1;
include('../../assets/templates/app/header.php');
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $queryjenis = mysqli_query($koneksi,"SELECT * FROM jenis WHERE nama_jenis LIKE '%$cari%'");
    $no =1;
}else{
    $jumlahdatahalaman = 5;
    $halamansekarang = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
    $mulai = ($jumlahdatahalaman * $halamansekarang) - $jumlahdatahalaman;
    $queryjenis = mysqli_query($koneksi,"SELECT * FROM jenis ORDER BY nama_jenis LIMIT $mulai, $jumlahdatahalaman");
    $no = $mulai+1;
    
    
    $result = mysqli_query($koneksi,"SELECT * FROM jenis");
    $total = mysqli_num_rows($result);
    $jumlahhalaman = ceil($total/$jumlahdatahalaman);
}     
?>

<h2 class="center mt-1 mb-1">List Jenis</h2>

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
            <th>Nama jenis</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($tampiljenis = mysqli_fetch_array($queryjenis)):
        ?>
        <tr>
            <td><?= $no;?></td>
            <td><?= $tampiljenis['nama_jenis'];?></td>
            <td>
                <button class="button button-kuning"><a
                        href="<?= $base_url;?>app/jenis/edit.php?id_jenis=<?= $tampiljenis['id_jenis'];?>">Edit</a></button>
                <button class="button button-merah"><a
                        href="<?= $base_url;?>assets/sql/jenis/hapus.php?id_jenis=<?= $tampiljenis['id_jenis'];?>">Hapus</a></button>
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