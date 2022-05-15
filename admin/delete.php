<?php include '../customer/koneksi.php'; 
if (!empty($_GET['id_hapus'])) {
    $id_hapus = $_GET['id_hapus'];
    $sql = mysqli_query($koneksi,"DELETE FROM users WHERE id_user = '$id_hapus'");
    header('location:customer.php');
}
if (!empty($_GET['id_pesan'])) {
    $id_pesan = $_GET['id_pesan'];
    $sql = mysqli_query($koneksi,"DELETE FROM reservasi WHERE id_reservasi = '$id_pesan'");
    header('location:reservasi.php');
}if (!empty($_GET['id_paket'])) {
    $id_paket = $_GET['id_paket'];
    $sql = mysqli_query($koneksi,"DELETE FROM paket WHERE id_paket = '$id_paket'");
    header('location: paket.php');
}if (!empty($_GET['id_venue'])) {
    $id_venue = $_GET['id_venue'];
    $sql = mysqli_query($koneksi,"DELETE FROM venue WHERE id_venue = '$id_venue'");
    header('location: paket.php');
}
?>
