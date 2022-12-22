<?php
require 'functions.php';
$sql = "DELETE FROM detail_transaksi WHERE id_detail = " . $_GET['idp'];
$exe = mysqli_query($conn, $sql);

if ($exe) {
    $success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Transaksi';
    $type = 'success';
    header('location: transaksi_checkout.php?uid=' . $_GET['uid'] . '&idtran=' . $_GET['idtran'] . '&crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
}
