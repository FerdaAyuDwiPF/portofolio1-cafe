<?php 
include 'koneksi.php';

if (!empty($_GET['nama_nya'])) {
    $q = $_GET['nama_nya'];
    $harg = mysqli_query($koneksi,"SELECT*FROM paket where nama_paket = '$q'");
    while($row = mysqli_fetch_array($harg)) {
        echo $row['harga'];
    }
} 
?>