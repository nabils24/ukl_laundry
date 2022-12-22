<?php
$title = 'pengguna';
require 'functions.php';
$tgl_sekarang = Date('Y-m-d h:i:s');
$tujuh_hari   = mktime(0, 0, 0, date("n"), date("j") + 7, date("Y"));
$batas_waktu  = date("Y-m-d h:i:s", $tujuh_hari);



$invoice   = 'DRY' . Date('Ymdsi');
$outlet_id = $_SESSION['outlet_id'];
$user_id   = $_SESSION['user_id'];
$member_id = $_GET['uid'];

$outlet = ambilsatubaris($conn, 'SELECT nama_outlet from outlet WHERE id_outlet = ' . $outlet_id);
$member = ambilsatubaris($conn, 'SELECT nama_member from member WHERE id_member = ' . $member_id);
$paket = ambildata($conn, 'SELECT * FROM paket WHERE outlet_id = ' . $outlet_id);

$cart = ambildata($conn, "SELECT * FROM detail_transaksi JOIN paket ON detail_transaksi.paket_id = paket.id_paket WHERE transaksi_id = '" . $_GET['idtran'] . "'");

if (isset($_POST['btn-kirim'])) {
    $kode_invoice = $_POST['kode_invoice'];
    $biaya_tambahan = $_POST['biaya_tambahan'];
    $diskon = $_POST['diskon'];
    $pajak = $_POST['pajak'];

    $query = "INSERT INTO transaksi (outlet_id,kode_invoice,member_id,tgl,batas_waktu,biaya_tambahan,diskon,pajak,status,status_bayar,user_id) VALUES ('$outlet_id','$kode_invoice','$member_id','$tgl_sekarang','$batas_waktu','$biaya_tambahan','$diskon','$pajak','baru','belum','$user_id')";

    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $paket_id = $_POST['paket_id'];
        $qty = $_POST['qty'];
        $hargapaket = ambilsatubaris($conn, 'SELECT harga from paket WHERE id_paket = ' . $paket_id);
        $total_harga = $hargapaket['harga'] * $qty;
        $kode_invoice;
        $transaksi = ambilsatubaris($conn, "SELECT * FROM transaksi WHERE kode_invoice = '" . $kode_invoice . "'");
        $transaksi_id = $transaksi['id_transaksi'];

        $sqlDetail = "INSERT INTO detail_transaksi (transaksi_id,paket_id,qty,total_harga) VALUES ('$transaksi_id','$paket_id','$qty','$total_harga')";

        $executeDetail = bisa($conn, $sqlDetail);
        if ($executeDetail == 1) {
            header('location: transaksi_tambah.php?id=' . $member_id);
        } else {
            echo "Gagal Tambah Data";
        }
    }
}


require 'layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master Transaksi</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="outlet.php">Transaksi</a></li>
                <li><a href="#">Tambah Transaksi</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <!-- <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-primary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a> -->
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="btn-refresh" class="btn btn-primary box-title text-right" title="Refresh Data"><i class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="table-responsive">
                    <table class="table table-bordered thead-dark" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th width="5%">#</th>
                                <th>Nama Paket</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (@$cart) {

                                foreach ($cart as $cartku) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $cartku['nama_paket'] ?></td>
                                        <td><?= $cartku['qty'] ?></td>
                                        <td><?= $cartku['total_harga'] ?></td>
                                        <td align="center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="transaksi_hapus.php?uid=<?= $_GET['uid']; ?>&idp=<?= $cartku['id_detail']; ?>&idtran=<?= $_GET['idtran']; ?>" onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php endforeach;
                            } ?>
                        </tbody>
                    </table>
                    <div class="col-md-6">
                        <a href="transaksi_tambah.php?uid=<?= $_GET['uid']; ?>&idtran=<?= $_GET['idtran']; ?>" class="btn btn-primary box-title"><i class="fa fa-arrow-right fa-fw"></i> Tambah Pesanan</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="transaksi.php" class="btn btn-primary box-title"><i class="fa fa-arrow-right fa-fw"></i> Selesai</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require 'layout_footer.php';
    ?>