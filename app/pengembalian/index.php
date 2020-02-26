<?php
session_start();
include('../../assets/sql/koneksi.php');
$base_url= "../../";
$judul = "List pengembalian";
$breadcumb ="List Pengembalian";
$operatorakses = 1;
include('../../assets/templates/app/header.php');

if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $querypengembalian = mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE username LIKE '%$cari%'  AND tanggal_kembali='0000-00-00'");
    $no =1;
}else{
    $jumlahdatahalaman = 5;
    $halamansekarang = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
    $mulai = ($jumlahdatahalaman * $halamansekarang) - $jumlahdatahalaman;
    $querypengembalian = mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE tanggal_kembali='0000-00-00' ORDER BY tanggal_pinjam asc LIMIT $mulai, $jumlahdatahalaman");
    $no = $mulai+1; 
    $result = mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE tanggal_kembali='0000-00-00'");
    $total = mysqli_num_rows($result);
    $jumlahhalaman = ceil($total/$jumlahdatahalaman);
}     
?>

<h2 class="center mt-1 mb-1">List pengembalian</h2>

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
            <th>Nama barang</th>
            <th>Tanggal pinjam</th>
            <th>Jumlah</th>
            <th>Dipinjam oleh</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($tampilpengembalian = mysqli_fetch_array($querypengembalian)):
                $idinventaris = $tampilpengembalian['id_inventaris'];
                $ceknamabarang = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM inventaris WHERE id_inventaris ='$idinventaris'"));
        ?>
        <tr>
            <td><?= $no;?></td>
            <td><?= $ceknamabarang['nama_barang'];?></td>
            <td><?= $tampilpengembalian['tanggal_pinjam'];?></td>
            <td><?= $tampilpengembalian['jumlah'];?></td>
            <td><?= $tampilpengembalian['username'];?></td>
            <td>
                <button class="button button-biru"><a
                        href="<?= $base_url; ?>app/pengembalian/pengembalian.php?id_peminjaman=<?= $tampilpengembalian["id_peminjaman"];?>">Pengembalian</a></button>
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