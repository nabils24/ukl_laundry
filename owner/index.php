<?php
$title = 'dashboard';
require 'functions.php';
require 'layout_header.php';
$jTransaksi = ambilsatubaris($conn, 'SELECT COUNT(id_transaksi) as jumlahtransaksi FROM transaksi');
$jPelanggan = ambilsatubaris($conn, 'SELECT COUNT(id_member) as jumlahmember FROM member');
$joutlet = ambilsatubaris($conn, 'SELECT COUNT(id_outlet) as jumlahoutlet FROM outlet');
$query = "SELECT transaksi.*,member.nama_member , detail_transaksi.total_harga FROM transaksi INNER JOIN member ON member.id_member = transaksi.member_id INNER JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi   ORDER BY transaksi.id_transaksi DESC LIMIT 10";
$data = ambildata($conn, $query);
// count outlet from table outlet by id_owner
$joutlet2 = ambilsatubaris($conn, 'SELECT COUNT(id_outlet) as jumlahoutlet FROM outlet WHERE id_owner =' . $_SESSION['user_id']);
$penjualan = ambildata($conn, "SELECT * FROM transaksi JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi JOIN paket ON paket.id_paket = detail_transaksi.paket_id JOIN member ON member.id_member = transaksi.member_id  WHERE transaksi.outlet_id IN (SELECT id_outlet FROM `outlet` WHERE id_owner=$_SESSION[user_id]);");

// $dataoutlet = ambilsatubaris($conn,'SELECT nama_outlet FROM outlet');
// $outletname = $dataoutlet['nama_outlet'];
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
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Outlet</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?= htmlspecialchars($joutlet2['jumlahoutlet']); ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Pelanggan</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash2"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?= $jPelanggan['jumlahmember'] ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Transaksi</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?= $jTransaksi['jumlahtransaksi'] ?></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Transaksi Terbaru Di Outlet Mu</h3>
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Member</th>
                                <th>Status</th>
                                <th>Pemabayaran</th>
                                <th>Total Harga</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php $no = 1;
                            if (@$penjualan) {
                                foreach ($penjualan as $transaksi) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $transaksi['kode_invoice'] ?></td>
                                        <td><?= $transaksi['nama_member'] ?></td>
                                        <td><?= $transaksi['status'] ?></td>
                                        <td><?= $transaksi['status_bayar'] ?></td>
                                        <td><?= $transaksi['total_harga'] ?></td>
                                    </tr>
                            <?php endforeach;
                            } ?>
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