<?php
// koneksi database db_laundry dengan user root dan password 
$conn = mysqli_connect('localhost','root','','db_laundry');
// cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>