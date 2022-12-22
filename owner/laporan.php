<?php
$title = 'laporan';
require 'functions.php';
require 'layout_header.php';
$outlet_id = $_SESSION['outlet_id'];

$bulan = ambilsatubaris($conn, "SELECT SUM(total_harga) AS total FROM detail_transaksi INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id WHERE status_bayar = 'dibayar' AND MONTH(tgl_pembayaran) = MONTH(NOW())");
$tahun = ambilsatubaris($conn, "SELECT SUM(total_harga) AS total FROM detail_transaksi INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id WHERE status_bayar = 'dibayar' AND YEAR(tgl_pembayaran) = YEAR(NOW())");
$minggu = ambilsatubaris($conn, "SELECT SUM(total_harga) AS total FROM detail_transaksi INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id WHERE status_bayar = 'dibayar' AND WEEK(tgl_pembayaran) = WEEK(NOW())");

// $penjualan = ambildata($conn, "SELECT SUM(detail_transaksi.total_harga) AS total,COUNT(detail_transaksi.paket_id) as jumlah_paket,paket.nama_paket,transaksi.tgl_pembayaran FROM detail_transaksi
// JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id
// JOIN paket ON paket.id_paket = detail_transaksi.paket_id
// WHERE transaksi.status_bayar = 'dibayar' ");

$getoutletbro = ambildata($conn, "SELECT * FROM outlet where id_owner=$_SESSION[user_id]");
//SELECT * FROM transaksi JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi JOIN paket ON paket.id_paket = detail_transaksi.paket_id WHERE outlet_id IN (SELECT outlet_id FROM `outlet` WHERE id_owner=21);
// get * data from table transaksi where outlet_id = id_outlet from table outlet where id_owner = with $_SESSION['user_id'] and get total_harga from detail_transaksi where transaksi_id = id_transaksi from table transaksi;
$penjualan = ambildata($conn, "SELECT * FROM transaksi JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi JOIN paket ON paket.id_paket = detail_transaksi.paket_id  WHERE transaksi.outlet_id IN (SELECT id_outlet FROM `outlet` WHERE id_owner=$_SESSION[user_id]);");


?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <!-- ============================================================== -->
    <!-- Different data widgets -->
    <!-- ============================================================== -->
    <!-- .row -->
    <div class="row">

    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Laporan Penjualan Paket Di</h3>
                <?php
                foreach ($getoutletbro as $outletku) {
                    echo '<h5>';
                    echo  "- " . $outletku['nama_outlet'];
                    echo '</h5>';
                }
                ?>
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Paket</th>
                                <th>Jumlah</th>
                                <th>Jenis Pesanan</th>
                                <th>Tanggal Transaksi</th>
                                <th>Total Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if(@$penjualan){
                            foreach ($penjualan as $transaksi) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $transaksi['nama_paket'] ?></td>
                                    <td><?= $transaksi['qty'] ?></td>
                                    <td><?= $transaksi['jenis_paket'] ?></td>
                                    <td><?= $transaksi['tgl_pembayaran'] ?></td>
                                    <td><?= $transaksi['total_bayar'] ?></td>

                                </tr>
                            <?php endforeach; }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'layout_footer.php';
?>