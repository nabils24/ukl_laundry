<?php
require 'functions.php';
$status = ['baru', 'proses', 'selesai', 'diambil'];
$query = "SELECT *, SUM(total_harga) as total_harga FROM transaksi JOIN member ON member.id_member = transaksi.member_id JOIN outlet ON outlet.id_outlet = transaksi.outlet_id JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi JOIN paket ON paket.id_paket = detail_transaksi.paket_id where transaksi.id_transaksi =" . $_GET['id'];
$data = ambilsatubaris($conn, $query);
$q = "SELECT * FROM transaksi JOIN member ON member.id_member = transaksi.member_id JOIN outlet ON outlet.id_outlet = transaksi.outlet_id JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi JOIN paket ON paket.id_paket = detail_transaksi.paket_id where transaksi.id_transaksi =" . $_GET['id'];
$datas = ambildata($conn, $q);
if (isset($_POST['btn-simpan'])) {
    $status     = $_POST['status'];
    $query = "UPDATE transaksi SET status = '$status' WHERE id_transaksi = " . $_GET['id'];
    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil mengubah status transaksi';
        $type = 'success';
        header('location: transaksi.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
    } else {
        echo "Gagal Tambah Data";
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
                        <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-primary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Kode Invoice</label>
                        <input type="text" name="kode_invoice" class="form-control" readonly="" value="<?= $data['kode_invoice'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Outlet</label>

                        <input type="text" name="username" class="form-control" readonly="" value="<?= $data['nama_outlet'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Pelanggan</label>
                        <input type="text" name="password" class="form-control" readonly="" value="<?= $data['nama_member'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis Paket</label>

                        <input type="text" name="password" class="form-control" readonly="" value="<?php
                                                                                                    foreach ($datas as $key => $value) {
                                                                                                        echo $value['nama_paket'] . ' |  Qty => ' . $value['qty'] . " | " . ", ";
                                                                                                    }

                                                                                                    ?>">
                    </div>
                    <div class="form-group">
                        <label>Total Harga</label>
                        <input readonly="" type="text" name="biaya_tambahan" class="form-control" value="<?= $data['total_harga'] ?>">
                    </div>
                    <?php if ($data['total_bayar'] > 0) : ?>
                        <div class="form-group">
                            <label>Total Bayar</label>
                            <input readonly="" type="text" name="biaya_tambahan" class="form-control" value="<?= $data['total_bayar'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Di Bayar Pada Tanggal </label>
                            <input readonly="" type="text" name="biaya_tambahan" class="form-control" value="<?= $data['tgl_pembayaran'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Status Transaksi</label>
                            <select name="status" class="form-control">
                                <?php foreach ($status as $key) : ?>
                                    <?php if ($key == $data['status']) : ?>
                                        <option value="<?= $key ?>" selected><?= $key ?></option>
                                    <?php endif ?>
                                    <option value="<?= $key ?>"><?= $key ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="text-right">
                            <button type="submit" name="btn-simpan" class="btn btn-primary">Ubah</button>
                        </div>
                    <?php else : ?>
                        <div class="form-group">
                            <label>Total Bayar</label>
                            <input readonly="" type="text" name="biaya_tambahan" class="form-control" value="Belum Melakukan Pembayaran">
                        </div>
                        <div class="form-group">
                            <label>Status Transaksi</label>
                            <select name="status" class="form-control" disabled>
                                <?php foreach ($status as $key) : ?>
                                    <?php if ($key == $data['status']) : ?>
                                        <option value="<?= $key ?>" selected><?= $key ?></option>
                                    <?php endif ?>
                                    <option value="<?= $key ?>"><?= $key ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <small>Tidak Bisa Mengubah Status Karena Belum Dibayar!</small>
                    <?php endif; ?>

                </form>
            </div>
        </div>
    </div>
</div>
<?php
require 'layout_footer.php';
?>