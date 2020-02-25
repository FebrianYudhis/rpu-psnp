<?php
session_start();
include('../../assets/sql/koneksi.php');
$base_url= "../../";
$judul = "Lihat inventaris";
$breadcumb ="Inventaris > Lihat";
$adminonly = 1;
include('../../assets/templates/app/header.php');
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $queryinventaris = mysqli_query($koneksi,"SELECT * FROM inventaris WHERE nama_barang LIKE '%$cari%' OR id_jenis LIKE '%$cari%' OR id_ruang LIKE '%$cari%'");
    $no =1;
}else{
    $jumlahdatahalaman = 5;
    $halamansekarang = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
    $mulai = ($jumlahdatahalaman * $halamansekarang) - $jumlahdatahalaman;
    $queryinventaris = mysqli_query($koneksi,"SELECT * FROM inventaris ORDER BY nama_barang LIMIT $mulai, $jumlahdatahalaman");
    $no = $mulai+1;
    
    
    $result = mysqli_query($koneksi,"SELECT * FROM inventaris");
    $total = mysqli_num_rows($result);
    $jumlahhalaman = ceil($total/$jumlahdatahalaman);
}     
?>

<h2 class="center mt-1 mb-1">List inventaris</h2>

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
<table class="table table-berborder table-garis mx-auto center table-hover table-responsif" style="width: 90%;">
    <thead class="kepala-dark">
        <tr>
            <th>#</th>
            <th>Nama barang</th>
            <th>Kondisi</th>
            <th>Jumlah</th>
            <th>Tanggal register</th>
            <th>Jenis</th>
            <th>Ruang</th>
            <th>Dikelola oleh</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($tampilinventaris = mysqli_fetch_array($queryinventaris)):
                $tampiljenis = $tampilinventaris['id_jenis'];
                $tampilruang = $tampilinventaris['id_ruang'];
                $jenis= mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM jenis WHERE id_jenis='$tampiljenis'"));
                $ruang= mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM ruang WHERE id_ruang='$tampilruang'"));
        ?>
        <tr>
            <td><?= $no;?></td>
            <td><?= $tampilinventaris['nama_barang'];?></td>
            <td><?= $tampilinventaris['kondisi'];?></td>
            <td><?= $tampilinventaris['jumlah'];?></td>
            <td><?= $tampilinventaris['tanggal_register'];?></td>
            <td><?= $jenis['nama_jenis'];?></td>
            <td><?= $ruang['nama_ruang'];?></td>
            <td><?= $tampilinventaris['username'];?></td>
            <td>
                <button class="button button-kuning"><a
                        href="<?= $base_url;?>app/inventaris/edit.php?id_inventaris=<?= $tampilinventaris['id_inventaris'];?>">Edit</a></button>
                <button class="button button-merah"><a
                        href="<?= $base_url;?>assets/sql/inventaris/hapus.php?id_inventaris=<?= $tampilinventaris['id_inventaris'];?>">Hapus</a></button>
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