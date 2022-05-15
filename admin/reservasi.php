<?php $reserve="active"; include 'head.php'; include '../customer/koneksi.php';
$sql = mysqli_query($koneksi,"SELECT*FROM reservasi");
if (isset($_POST['reservasi'])) {
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $tanggal = $_POST['tanggal'];
    $id_user = $_SESSION['id_user'];
    $tamu = $_POST['tamu'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $harga = $_POST['harga'];
    $acara = $_POST['jenis_acara'];
    $paket = implode(",",$_POST['paket']);
    $insert = mysqli_query($koneksi,"INSERT INTO `reservasi`(`nama_pemesan`, id_user, `tanggal_pemesanan`, `paket`, `acara`, `harga`, `jumlah_tamu`, `email`, `no_hp`, `reservedAt`,status_bayar) VALUES ('$nama_depan $nama_belakang','$id_user', '$tanggal','$paket','$acara','$harga','$tamu','$email','$phone',NOW(),'Belum lunas')");
    echo "<script type='text/javascript'>document.location.href='../customer/reservasi.php';</script>";
}
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
    $status_bayar = $_POST['status_bayar'];
    $paket = implode(",",$_POST['paket']);
    // ambil data file
    $namaFile = $_FILES['bukti_bayar']['name'];
    $namaSementara = $_FILES['bukti_bayar']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUpload = "../resource/image/";

    // pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
    $update = mysqli_query($koneksi,"UPDATE reservasi SET bukti_bayar='$namaFile', status_bayar='$status_bayar', nama_pemesan='$nama',tanggal_pemesanan='$tanggal',paket='$paket',acara='$acara',harga='$harga',jumlah_tamu='$tamu',email='$email',no_hp='$phone' WHERE id_reservasi='$id_reservasi'");
    echo "<script type='text/javascript'>document.location.href='../customer/reservasi.php';</script>";
}
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Reservasi Customer</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-10">
                    <h6 class="m-0 font-weight-bold text-primary">Data Table Reservasi Gulo Klopo Kafe</h6>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Tambah Reservasi</button>
                </div>
            </div>                
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Reservasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="Nama">Nama Pemesan</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="nama_depan" id="nama_depan" class="form-control" placeholder="Nama Depan">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" placeholder="Nama Belakang">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="Tanggal">Tanggal Pemesanan</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="datetime-local" name="tanggal" id="tanggal" class="form-control">
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
                                    <input type="radio" name="jenis_acara" id="jenis_acara" value="<?= $dats['nama_venue'] ?>"> <?= $dats['nama_venue'] ?>
                                <?php }?>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="Paket">Paket Acara</label>
                                </div>
                                <div class="col-md-8">
                                <?php
                                $sqls = mysqli_query($koneksi,"SELECT*FROM paket");
                                while ($dats = mysqli_fetch_array($sqls)) {?> 
                                <input type="checkbox" class="paket_cek" name="paket[]" value="<?= $dats['nama_paket'] ?>"> <?= $dats['nama_paket'] ?><br>
                                <?php }?>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="Harga">Harga</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" name="harga" id="harga" class="form-control">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="Tamu">Jumlah Tamu</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" name="tamu" id="tamu" class="form-control">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="Email">Email</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label for="phone">Phone</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="phone" id="phone" class="form-control">
                                </div>
                            </div><br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info" href="reservasi.php" name="reservasi">Reservasi</button>
                            </div><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>   
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Pengguna</th>
                            <th>Paket</th>
                            <th>Acara</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
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
                                <!-- <a href="#" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="btn btn-info">Edit</a> -->
                                <a href="reservasi.php?id_pesan=<?= $data['id_reservasi'];?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?id_pesan=<?= $data['id_reservasi'];?>" class="btn btn-danger">Delete</a>                        
                            </td>                    
                        </tr>
                    <?php } ?>            
                </table>                    
            </div>
        </div>
    </div>   
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
        $bukti_bayar = $data['bukti_bayar'];
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
                        <label for="Bukti Bayar">Bukti Bayar</label>
                    </div>
                    <div class="col-md-8">
                        <img src="../resource/image/<?= $bukti_bayar?>" alt="" height="150px">
                        <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control">
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
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="Paket">Paket Acara</label>
                    </div>
                    <div class="col-md-8">
                    <?php $sql = "select * from paket";
                        $rs = mysqli_query($koneksi, $sql);

                        while($row = mysqli_fetch_array($rs)){  // Looping data from Table 
                            $values = $row['nama_paket']; // Data "paket_id" already Selected in Database table
                            $array_of_values = explode(",", $values); //Explode Data "paket" already Selected in Database table
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
                <center> 
                
                </center>
                <div class="row">
                    <div class="col-md-3">
                        <label for="Harga">Harga</label>
                    </div>
                    <div class="col-md-8">                    
                        <input type="number" name="harga" id="harga_x" class="form-control"  value="<?= $harga?>">
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
                        <label for="Status Bayar">Status Bayar</label>
                    </div>
                    <div class="col-md-8">
                        <select name="status_bayar" id="status_bayar" class="form-control">
                            <option value="Lunas">Lunas</option>
                            <option value="Belum lunas">Belum lunas</option>
                        </select>
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
                    <a href="reservasi.php" class="btn btn-secondary">Close</a>
                </div><br><br>
            </form>
        </div>
    <?php }
    ?>
    </div>    
</div>
<?php include 'footer.php'; ?>
<script>
$(".paket_cek").change(function(){
            
    var getUserID = $(this).val();   
    
    if(getUserID != null)
    {
        $.ajax({
            type: 'GET',
            url: '../customer/ajax.php',
            data: {nama_nya:getUserID},
            success: function(data){
                if ($("#harga").val()=="") {
                    var hargas = 0; 
                }else{
                    var hargas = $("#harga").val();
                }
                var hargax = data;
                $("#harga").val(data); 
                var total =  parseInt(hargas) + parseInt(hargax);
                $("#harga").val(total); 
                
                // $("#processing").hide(); 
                if ($("#harga_x").val()=="") {
                    var hargas = 0; 
                }else{
                    var hargas = $("#harga_x").val();
                }
                var hargax = data;
                $("#harga_x").val(data); 
                var total =  parseInt(hargas) + parseInt(hargax);
                $("#harga_x").val(total); 
            }
        });
    }
    else
    {
        // $("#person-data").html('');
        // $("#processing").hide();
    }
});
</script>