<?php
$title = 'transaksi';
require 'functions.php';
require 'layout_header.php';
$query = "SELECT transaksi.*,member.nama_member FROM transaksi INNER JOIN member ON member.id_member = transaksi.member_id  WHERE transaksi.outlet_id = " . $_SESSION['outlet_id'];
$data = ambildata($conn, $query);

// jika transaksi_id sama maka jumlahkan total_harga dari query 


?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master <?= $title ?></h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Paket</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="transaksi_cari_member.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                        <?php
                        // disable button when all transaksi status is dibayar
                        $query1 = "SELECT * FROM transaksi WHERE status_bayar = 'belum' AND outlet_id = " . $_SESSION['outlet_id'];
                        $data1 = ambildata($conn, $query1);
                        if (@count($data1) == 0) {
                        } else {
                            echo '<a href="transaksi_konfirmasi.php" class="btn btn-primary box-title"><i class="fa fa-check fa-fw"></i> Konfirmasi Pembayaran</a>';
                        }

                        ?>

                    </div>
                    <div class="col-md-6 text-right">
                        <button id="btn-refresh" class="btn btn-primary box-title text-right" title="Refresh Data"><i class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered thead-dark" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Member</th>
                                <th>Status</th>
                                <th>Pemabayaran</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($data) != null) : ?>
                                <?php foreach ($data as $transaksi) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $transaksi['kode_invoice'] ?></td>
                                        <td><?= $transaksi['nama_member'] ?></td>
                                        <td><?= $transaksi['status'] ?></td>
                                        <td><?= $transaksi['status_bayar'] ?></td>
                                        <td align="center">
                                            <a href="transaksi_detail.php?id=<?= $transaksi['id_transaksi']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-success btn-block">Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- table -->
    <!-- ============================================================== -->
    <div class="row">

    </div>
</div>
<?php
require 'layout_footer.php';
