<?php
session_start();
include('../../assets/sql/koneksi.php');
$base_url= "../../";
$judul = "List akun";
$breadcumb ="List akun";
$adminonly = 1;
include('../../assets/templates/app/header.php');
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $queryakun = mysqli_query($koneksi,"SELECT * FROM user WHERE username LIKE '%$cari%' OR nama_user LIKE '%$cari%' OR kontak LIKE '%$cari%'");
    $no =1;
}else{
    $jumlahdatahalaman = 5;
    $halamansekarang = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
    $mulai = ($jumlahdatahalaman * $halamansekarang) - $jumlahdatahalaman;
    if($_SESSION['username']=="admin"){
        $queryakun = mysqli_query($koneksi,"SELECT * FROM user LIMIT $mulai, $jumlahdatahalaman");
    }else{
        $queryakun = mysqli_query($koneksi,"SELECT * FROM user WHERE username != 'admin' AND id_level != '1' LIMIT $mulai, $halaman");
    }
    $no = $mulai+1;

    $result = mysqli_query($koneksi,"SELECT * FROM user");
    $total = mysqli_num_rows($result);
    $jumlahhalaman = ceil($total/$jumlahdatahalaman);
}   

?>

<h2 class="center mt-1 mb-1">List akun</h2>

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
<table class="table table-berborder table-garis mx-auto center table-hover table-responsif" style="width: 80%;">
    <thead class="kepala-dark">
        <tr>
            <th>#</th>
            <th>Level</th>
            <th>Nama</th>
            <th>kontak</th>
            <th>Username</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($tampilakun = mysqli_fetch_array($queryakun)):
        ?>
        <tr>
            <td><?= $no;?></td>
            <?php
                $idlevel = $tampilakun['id_level'];
                $querylevel =mysqli_query($koneksi,"SELECT * FROM level WHERE id_level= '$idlevel'");
                $tampillevel = mysqli_fetch_array($querylevel);
            ?>
            <td><?= $tampillevel['nama_level'];?></td>
            <td><?= $tampilakun['nama_user'];?></td>
            <td><?= $tampilakun['kontak'];?></td>
            <td><?= $tampilakun['username'];?></td>
            <td><?= $tampilakun['status'];?></td>
            <td>
                <?php
                    if($tampilakun['status']=="Belum aktif"){
                        echo "<button class='button button-biru'><a
                        href='{$base_url}assets/sql/akun/aktivasi.php?username={$tampilakun['username']}'>Aktivasi</a></button>";
                    }
                ?>

                <button class='button button-kuning'><a
                        href='<?= $base_url;?>app/akun/edit.php?username=<?= $tampilakun['username'];?>'>Edit</a></button>
                <button class='button button-merah'><a
                        href='<?= $base_url;?>assets/sql/akun/hapus.php?username=<?= $tampilakun['username'];?>'>Hapus</a></button>
            </td>
        </tr>

        <?php
            $no++;
            endwhile;
        ?>
    </tbody>
</table>

<nav class="mt-2">
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