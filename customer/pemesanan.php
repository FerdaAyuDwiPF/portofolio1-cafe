<?php $headertext = 'Riwayat Reservasi'; include '../template/head.php';include 'koneksi.php';
$sql = mysqli_query($koneksi,"SELECT*FROM reservasi WHERE id_user='".$_SESSION['id_user']."'");
if (isset($_POST['edit'])) {
    $id_reservasi = $_POST['id_reservasi'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $id_user = $_SESSION['id_user'];
    $tamu = $_POST['tamu'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $harga = $_POST['harga'];
    $acara = $_POST['jenis_acara'];
    $paket = implode(",",$_POST['paket']);
    $namaFile = $_FILES['bukti_bayar']['name'];
    $namaSementara = $_FILES['bukti_bayar']['tmp_name'];
    $dirUpload = "../resource/image/";
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
    $update = mysqli_query($koneksi,"UPDATE reservasi SET nama_pemesan='$nama',tanggal_pemesanan='$tanggal',paket='$paket',acara='$acara',harga='$harga',jumlah_tamu='$tamu',email='$email',no_hp='$phone',bukti_bayar='$namaFile', status_bayar='Lunas' WHERE id_reservasi='$id_reservasi'");
    echo "<script type='text/javascript'>document.location.href='pemesanan.php';</script>";
}
?>
<body>
<header class="masthead" style="background-image: url('https://i0.wp.com/blog.modalku.co.id/wp-content/uploads/2021/01/Kemudahan-Pembayaran-dalam-Bisnis-dengan-Transaksi-Non-Tunai.jpg?fit=1200%2C630&ssl=1')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Reservasi Gulo Klopo Kafe</h1>
            <!-- <span class="subheading">Great place, Great food, Great to meet you to join our Happiness</span> -->
          </div>
        </div>
      </div>
    </div>
</header>
<section>
    <div class="container">
        <table class="table">
            <tr>
                <th>Nomor</th>
                <th>Nama Pengguna</th>
                <th>Paket</th>
                <th>Acara</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
            <?php 
            $no = 1;
            while ($data = mysqli_fetch_array($sql)) {?>
                <tr>
                    <td><?=$no++;?></td>
                    <td><?= $data['nama_pemesan'];?></td>
                    <td><?= $data['paket'];?></td>
                    <td><?= $data['acara'];?></td>
                    <td><?= $data['harga'];?></td>
                    <td>
                        <a href="pemesanan.php?id_detail=<?= $data['id_reservasi'];?>" class="btn btn-info">Detail</a>
                        <a href="pemesanan.php?id_pesan=<?= $data['id_reservasi'];?>" class="btn btn-warning">Edit</a>
                        <a href="../admin/delete.php?id_pesan=<?= $data['id_reservasi'];?>" class="btn btn-danger">Delete</a>                        
                    </td>
                </tr>
            <?php } ?>
            <?php $value = mysqli_query($koneksi, "SELECT * FROM reservasi");
                    if ($value->num_rows < 1) {
                    echo "<div class='card'></div>";
                    echo "<h3 class='card-title text-center'><br>Belum Ada Riwayat Reservasi Gulo Klopo Cafe</h3><br>";
                    echo "<p style='text-align: center'>Silahkan untuk melakukan reservasi terlebih dahulu pada Layanan Penyewaan Restoran</p><br>";
                    }
                    ?>            
        </table>
        <?php
        if (!empty($_GET['id_detail'])) {
            $id_detail = $_GET['id_detail'];
            $sqls = mysqli_query($koneksi,"SELECT*FROM reservasi WHERE id_reservasi = '$id_detail'");
            $data = mysqli_fetch_array($sqls);
            $id_reservasi = $data['id_reservasi'];
            $nama_pemesan = $data['nama_pemesan'];
            $tanggal_pemesanan = $data['tanggal_pemesanan'];
            $acara = $data['acara'];
            $paket = $data['paket'];
            $harga = $data['harga'];
            $jumlah_tamu = $data['jumlah_tamu'];
            $email = $data['email'];
            $no_hp = $data['no_hp'];
            $status_bayar = $data['status_bayar'];
            ?>
            <div id="edit_form">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Nama">Nama Pemesan</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="nama" id="nama" class="form-control" readonly value="<?= $nama_pemesan?>">
                            <input type="hidden" name="id_reservasi" id="id_reservasi" class="form-control" value="<?= $id_reservasi?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Tanggal">Tanggal Pemesanan</label>
                        </div>
                        <div class="col-md-8">
                            <input type="datetime-local" name="tanggal" id="tanggal" class="form-control" readonly value="<?php echo date('Y-m-d\TH:i', strtotime($tanggal_pemesanan)) ?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Status">Status Pembayaran</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="status_bayar" id="status_bayar" class="form-control"readonly value="<?=$status_bayar ?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Jenis">Jenis Acara</label>
                        </div>
                        <div class="col-md-8">
                            <?php
                            $sqls = mysqli_query($koneksi,"SELECT*FROM venue");
                            while ($dats = mysqli_fetch_array($sqls)) {?>
                                <input type="radio" readonly="readonly" name="jenis_acara" <?php if ($acara==$dats['nama_venue']) {echo 'checked';};?> id="jenis_acara" disabled="disabled" value="<?= $dats['nama_venue'] ?>"> <?= $dats['nama_venue'] ?>
                            <?php }?>
                            <!-- <input type="radio" name="jenis_acara" id="jenis_acara" value="Ulang Tahun">Ulang Tahun
                            <input type="radio" name="jenis_acara" id="jenis_acara" value="Lamaran">Lamaran
                            <input type="radio" name="jenis_acara" id="jenis_acara" value="Arisan">Arisan
                            <input type="radio" name="jenis_acara" id="jenis_acara" value="Pernikahan">Pernikahan -->
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Paket">Paket Acara</label>
                        </div>
                        <div class="col-md-8">
                        <?php $sql = "select * from paket";
                        $rs = mysqli_query($koneksi, $sql);

                        while($row = mysqli_fetch_array($rs)){ 
                            $values = $row['nama_paket']; 
                            $array_of_values = explode(",", $values);               
                            for($i = 0; $i < count($array_of_values); $i++) {
                            echo "<input name='paket[]' class='paket_cek' ";
                            if (in_array($row['nama_paket'], explode(",",$paket))) {
                            echo 'checked="checked"';
                            } 
                            ?> 
                            value='<?php echo $array_of_values[$i]; ?>' disabled="disabled" type='checkbox'>&nbsp; <?php echo $array_of_values[$i]; ?> &nbsp;
                            <?php 
                        }
                        }?>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Harga">Harga</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" name="harga" id="harga" class="form-control"  readonly value="<?= $harga?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Tamu">Jumlah Tamu</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" name="tamu" id="tamu" class="form-control"  readonly value="<?= $jumlah_tamu?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Email">Email</label>
                        </div>
                        <div class="col-md-3">
                            <input type="email" name="email" id="email" class="form-control" readonly value="<?= $email?>">
                        </div>
                        <div class="col-md-2">
                            <label for="phone">Phone</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="phone" id="phone" class="form-control" readonly value="<?= $no_hp?>">
                        </div>
                    </div><br>
                    <div class="card">
                    <b style="margin: 0 10px">Important!</b>
                        <table style="margin: 0 10px">
                        <tr>
                            <td>*Silahkan melakukan pembayaran untuk pelunasan reservasi penyewaan Gulo Klopo Cafe.</td>                    
                        </tr>
                        <tr>
                            <td>Pembayaran bisa melalui:</td>
                        </tr>
                        <tr>
                            <td>Transfer Bank</td>                    
                        </tr>
                        <tr>
                            <td>1234567890 (BCA) A.N Ferda Ayu Dwi Putri Febrianti</td>                    
                        </tr>
                        <tr>
                            <td>1122334455 (BRI) A.N Ferda Ayu Dwi Putri Febrianti</td>
                        </tr>
                        <tr>
                            <td>9876543210 (BNI) A.N Ferda Ayu Dwi Putri Febrianti</td>
                        </tr>
                        <tr>
                            <td>*Jangan lupa untuk meng-upload bukti bayar pada menu Riwayat > Edit > Bukti Bayar > Upload file.</td>
                        </tr>
                        </table>
                    </div>

                    <div class="text-center">
                    <br><a href="invoice.php?id=<?=$id_detail;?>" class="btn btn-info">Print</a>
                    <a href="pemesanan.php" class="btn btn-secondary">Close</a>
                </form>
            </div>
        <?php }
        ?>
        <?php
        if (!empty($_GET['id_pesan'])) {
            $id_pesan = $_GET['id_pesan'];
            $sqls = mysqli_query($koneksi,"SELECT*FROM reservasi WHERE id_reservasi = '$id_pesan'");
            $data = mysqli_fetch_array($sqls);
            $id_reservasi = $data['id_reservasi'];
            $nama_pemesan = $data['nama_pemesan'];
            $tanggal_pemesanan = $data['tanggal_pemesanan'];
            $acara = $data['acara'];
            $paket = $data['paket'];
            $harga = $data['harga'];
            $jumlah_tamu = $data['jumlah_tamu'];
            $email = $data['email'];
            $no_hp = $data['no_hp'];
            ?>
            <div id="edit_form">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Nama">Nama Pemesan</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="nama" id="nama" class="form-control" value="<?= $nama_pemesan?>">
                            <input type="hidden" name="id_reservasi" id="id_reservasi" class="form-control" value="<?= $id_reservasi?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Tanggal">Tanggal Pemesanan</label>
                        </div>
                        <div class="col-md-8">
                            <input type="datetime-local" name="tanggal" id="tanggal" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($tanggal_pemesanan)) ?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Jenis">Jenis Acara</label>
                        </div>
                        <div class="col-md-8">
                            <?php
                            $sqls = mysqli_query($koneksi,"SELECT*FROM venue");
                            while ($dats = mysqli_fetch_array($sqls)) {?>
                                <input type="radio" name="jenis_acara" <?php if ($acara==$dats['nama_venue']) {echo 'checked';};?> id="jenis_acara" value="<?= $dats['nama_venue'] ?>"> <?= $dats['nama_venue'] ?>
                            <?php }?>
                            <!-- <input type="radio" name="jenis_acara" id="jenis_acara" value="Ulang Tahun">Ulang Tahun
                            <input type="radio" name="jenis_acara" id="jenis_acara" value="Lamaran">Lamaran
                            <input type="radio" name="jenis_acara" id="jenis_acara" value="Arisan">Arisan
                            <input type="radio" name="jenis_acara" id="jenis_acara" value="Pernikahan">Pernikahan -->
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Paket">Paket Acara</label>
                        </div>
                        <div class="col-md-8">
                        <?php $sql = "select * from paket";
                        $rs = mysqli_query($koneksi, $sql);

                        while($row = mysqli_fetch_array($rs)){  
                            $values = $row['nama_paket']; 
                            $array_of_values = explode(",", $values);
                            // echo print_r(explode(",",$paket));                        
                            for($i = 0; $i < count($array_of_values); $i++) {
                            echo "<input name='paket[]' class='paket_cek' ";
                            if (in_array($row['nama_paket'], explode(",",$paket))) {
                            echo 'checked="checked"';
                            } 
                            ?> 
                            value='<?php echo $array_of_values[$i]; ?>'  type='checkbox'>&nbsp; <?php echo $array_of_values[$i]; ?> &nbsp;
                            <?php 
                        }
                        }?>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Harga">Harga</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" name="harga" id="harga" class="form-control"  value="<?= $harga?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Tamu">Jumlah Tamu</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" name="tamu" id="tamu" class="form-control"  value="<?= $jumlah_tamu?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Bukti Bayar">Bukti Bayar</label>
                        </div>
                        <div class="col-md-8">
                            <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Email">Email</label>
                        </div>
                        <div class="col-md-3">
                            <input type="email" name="email" id="email" class="form-control" value="<?= $email?>">
                        </div>
                        <div class="col-md-2">
                            <label for="phone">Phone</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="phone" id="phone" class="form-control" value="<?= $no_hp?>">
                        </div>
                    </div><br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info" name="edit">Edit Reservasi</button>
                        <a href="pemesanan.php" class="btn btn-secondary">Close</a>
                    </div><br><br>
                </form>
            </div>
        <?php } ?>
    </div>
</section>
</body>
</html>

<?php include '../template/footer.php';?>
<script>
// function hitungHarga() {
//     var checkedValue = $('.paket_cek:checked').val();
//     if (checkedValue==1) {
//         $("#harga").val(120000);
//     }else if(checkedValue==2) {
//         $("#harga").val(220000);
//     }else if(checkedValue==3) {
//         $("#harga").val(420000);
//     }
// }
$(".paket_cek").change(function(){
    var getUserID = $(this).val();   
    if(getUserID != null)
    {
        $.ajax({
            type: 'GET',
            url: 'ajax.php',
            data: {nama_nya:getUserID},
            success: function(data){
                // $("#processing").hide(); 
                if ($("#harga").val()=="") {
                    var hargas = 0; 
                }else{
                    var hargas = $("#harga").val();
                }
                var hargax = data;
                $("#harga").val(data); 
                var total =  parseInt(hargas) + parseInt(hargax);
                $("#harga").val(total); 
            }
        });
    }else{
        // $("#person-data").html('');
        // $("#processing").hide();
    }
});
</script>