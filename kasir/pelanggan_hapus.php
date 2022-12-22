<?php 
require 'functions.php';
$sql = "DELETE FROM member WHERE uid = " .$_GET['uid'];
$exe = mysqli_query($conn,$sql);

if($exe){
	$success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Pelanggan';
    $type = 'success';
    header('location: pelanggan.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
}
?>
