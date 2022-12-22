<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'db_laundry');

$name = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['kelamin'];
$phone = $_POST['telp'];
$ktp = $_POST['ktp'];
$username = stripslashes($_POST['username']);
$password = md5($_POST['password']);
$uid = "LAUNDRY" . rand(22, 999);


$createuser = mysqli_query($conn, "INSERT INTO user (id_user, nama_user, username, password, outlet_id, uid, role) VALUES (NULL ,'$name', '$username', '$password', NULL, '$uid','user')");
$createmem = mysqli_query($conn, "INSERT INTO `member`(`id_member`, `nama_member`, `alamat_member`, `jenis_kelamin`, `telp_member`, `no_ktp` , `uid`) VALUES (NULL,'$name','$alamat','$jenis_kelamin','$phone','$ktp', '$uid')");
if ($createuser && $createmem) {

    header('location:index.php');
} else {
    $msg = 'Tidak boleh ada yang kosong!';
    header('location:buatakun.php?msg=' . $msg);
}
