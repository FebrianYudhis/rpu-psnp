<?php
session_start();
include('../../assets/sql/koneksi.php');
$base_url= "../../";
$judul = "Laporan";
$breadcumb ="Laporan";
$adminonly =1;
include('../../assets/templates/app/header.php');
$ambilnama = $_SESSION['username'];
$ambilrole = $_SESSION['role'];

if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $querylaporan = mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE username LIKE '%$cari%'");
    $no =1;
}else{
    $jumlahdatahalaman = 5;
    $halamansekarang = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
    $mulai = ($jumlahdatahalaman * $halamansekarang) - $jumlahdatahalaman;
    $querylaporan = mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE tanggal_kembali!='0000-00-00' ORDER BY tanggal_kembali LIMIT $mulai, $jumlahdatahalaman");
    $no = $mulai+1; 
    $result = mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE tanggal_kembali!='0000-00-00'");
    $total = mysqli_num_rows($result);
    $jumlahhalaman = ceil($total/$jumlahdatahalaman);
}     

$ambilinventaris = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM inventaris"));
$jumlahpengguna = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM user WHERE status='Aktif'"));
$keseluruhan = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM peminjaman"));
$datapinjam = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE tanggal_kembali ='0000-00-00'"));
?>
<nav class="laporan">
    <div class="kotakan mx-auto">
        <div class="kotak ml-1 mt-4">
            <div class="kotak-kepala center"><b>
                    <h4>Jumlah pengguna</>
                </b></div>
            <div class="kotak-badan center">
                <i>
                    <h3 class="mt-2"><?= $jumlahpengguna;?> Data</h3>
                </i>
            </div>
        </div>
        <div class="kotak ml-1 mt-4">
            <div class="kotak-kepala center"><b>
                    <h4>Jumlah data inventaris</>
                </b></div>
            <div class="kotak-badan center">
                <i>
                    <h3 class="mt-2"><?= $ambilinventaris;?> Data</h3>
                </i>
            </div>
        </div>
        <div class="kotak ml-1 mt-4">
            <div class="kotak-kepala center"><b>
                    <h4>Jumlah data barang yang masih dipinjam</>
                </b></div>
            <div class="kotak-badan center">
                <i>
                    <h3 class="mt-2"><?= $datapinjam;?> Data</h3>
                </i>
            </div>
        </div>
        <div class="kotak ml-1 mt-4">
            <div class="kotak-kepala center"><b>
                    <h4>Jumlah keseluruhan data yang dipinjam</>
                </b></div>
            <div class="kotak-badan center">
                <i>
                    <h3 class="mt-2"><?= $keseluruhan;?> Data</h3>
                </i>
            </div>
        </div>

    </div>
    <div class="clear"></div>
    <h2 class="center mt-4 mb-1">List Barang Yang Sudah Dikembalikan</h2>
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
    <table class="table table-berborder table-garis mx-auto center table-hover table-responsif">
        <thead class="kepala-dark">
            <tr>
                <th>#</th>
                <th>Nama barang</th>
                <th>Tanggal pinjam</th>
                <th>Tanggal kembali</th>
                <th>Jumlah</th>
                <th>Dipinjam oleh</th>
                <th>Dikelola oleh</th>
                <th class="aksi">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($tampillaporan = mysqli_fetch_array($querylaporan)):
                $idinventaris = $tampillaporan['id_inventaris'];
                $ceknamabarang = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM inventaris WHERE id_inventaris ='$idinventaris'"));
        ?>
            <tr>
                <td><?= $no;?></td>
                <td><?= $ceknamabarang['nama_barang'];?></td>
                <td><?= $tampillaporan['tanggal_pinjam'];?></td>
                <td><?= $tampillaporan['tanggal_kembali'];?></td>
                <td><?= $tampillaporan['jumlah'];?></td>
                <td><?= $tampillaporan['username'];?></td>
                <td><?= $tampillaporan['pengelola'];?></td>
                <td class="aksi">
                    <button class='button button-merah'><a
                            href='<?= $base_url;?>assets/sql/laporan/rollback.php?id_peminjaman=<?= $tampillaporan['id_peminjaman'];?>'>Rollback</a></button>
                    <button class='button button-merah'><a
                            href='<?= $base_url;?>assets/sql/laporan/hapus.php?id_peminjaman=<?= $tampillaporan['id_peminjaman'];?>'>Hapus</a></button>
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
            <li class="item-halaman"><a href="?halaman=<?= $halamansekarang-1;?>" class="link-halaman">Sebelumnya</a>
            </li>
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
            <li class="item-halaman"><a href="?halaman=<?= $halamansekarang+1;?>" class="link-halaman">Selanjutnya</a>
            </li>
            <?php else : ?>
            <li class="item-halaman disabled"><a href="?halaman=<?= $halamansekarang+1;?>"
                    class="link-halaman">Selanjutnya</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <div class="mx-auto center mb-3 mt-3 print"><button style="width: 40%; height:3rem;"
            onClick="window.print()">Print</button>
    </div>

</nav>
<?php
include('../../assets/templates/app/footer.php');
?>