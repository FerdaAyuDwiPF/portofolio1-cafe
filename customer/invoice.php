<?php
include('koneksi.php');
require_once("../resource/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
if (!empty($_GET['id_detail'])) {
   $id_detail=$_GET['id_detail'];
   $query = mysqli_query($koneksi,"SELECT * FROM reservasi WHERE id_reservasi='$id_detail'");
}else {
   $query = mysqli_query($koneksi,"SELECT * FROM reservasi ORDER BY id_reservasi DESC LIMIT 1");
}
$row = mysqli_fetch_array($query);
$html = '<img src="resource/image/logo.png" alt="" style="height: 50px; float: left;">';
$html = '<center><h3>Data Reservasi Restaurant Gulo Klopo Cafe</h3></center><hr/><br><br><br>';
$html .= '<table width="100%">
 <tr>
    <td>Atas Nama</td>
    <td>:</td>
    <td>'.$row['nama_pemesan'].'</td>
 </tr>
 <tr>
    <td>Jumlah Tamu</td>
    <td>:</td>
    <td>'.$row['jumlah_tamu'].'</td>
 </tr>
 <tr>
    <td>Jenis Acara</td>
    <td>:</td>
    <td>'.$row['acara'].'</td>
 </tr>
 <tr>
    <td>Jenis Paket</td>
    <td>:</td>
    <td>'.$row['paket'].'</td>
 </tr>
 <tr>
    <td>Harga</td>
    <td>:</td>
    <td>'.$row['harga'].'</td>
 </tr>
 <tr>
    <td>Tanggal Reservasi</td>
    <td>:</td>
    <td>'.$row['tanggal_pemesanan'].'</td>
 </tr>
 <tr>
    <td>Email</td>
    <td>:</td>
    <td>'.$row['email'].'</td>
 </tr>
 <tr>
    <td>Nomor Handphone</td>
    <td>:</td>
    <td>'.$row['no_hp'].'</td>
 </tr>';

$html .= "</html>";
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$dompdf->stream('invoice.pdf');
?>