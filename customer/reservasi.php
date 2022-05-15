<?php $headertext = 'Reservasi'; include '../template/head.php';
if (empty($_SESSION['id_user'])) {
    header('location:../index.php/');
}
include 'koneksi.php';
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
    echo "<script type='text/javascript'>document.location.href='./invoice.php';</script>";
}
?> 
<header class="masthead" style="background-image: url('https://media.istockphoto.com/vectors/reception-service-receptionist-and-customer-in-hotel-lobby-hall-vector-id1159237690?k=20&m=1159237690&s=170667a&w=0&h=JPqcGMsw36gTLhiRyT_gxwtB0N-z_4ecUkf2gWdwS-Y=')">
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
        <h4 class="text-center"><b>Form Pemesanan</b></h4><br>
        <div><br>
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
                        <?php
                        $sqls = mysqli_query($koneksi,"SELECT*FROM paket");
                        while ($dats = mysqli_fetch_array($sqls)) {?>
                            <input type="checkbox" class="paket_cek" name="paket[]" value="<?= $dats['nama_paket'] ?>"> <?= $dats['nama_paket'] ?><br>
                        <?php }?>
                        <!-- <input type="checkbox" class="paket_cek" name="paket[]" onclick="hitungHarga()" value="1"> Makanan 250 pax <br>
                        <input type="checkbox" class="paket_cek" name="paket[]" onclick="hitungHarga()" value="2"> Dekorasi<br>
                        <input type="checkbox" class="paket_cek" name="paket[]" onclick="hitungHarga()" value="3"> Hiburan<br> -->
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
                    <button type="submit" class="btn btn-info" name="reservasi">Reservasi</button>
                    <a href="Home.php" class="btn btn-secondary">Close</a>
                </div><br><br>
            </form>
        </div>
        <div class="card">
            <b style="margin: 0 10px">Important!</b>
            <table style="margin: 0 10px">
                <tr>
                    <td>*Pastikan seluruh data yang diisi benar sebelum reservasi.</td>                    
                </tr>
                <tr>
                    <td>*Setelah Anda mengklik tombol reservasi, Anda akan menerima invoice dalam bentuk format pdf.</td>
                </tr>
                <tr>
                    <td>*Pada hari H, harap datang tepat waktu untuk memverifikasi reservasi Anda.</td>
                </tr>
            </table>
        </div>
    </div>    
</section>
<?php include '../template/footer.php';
?>
<script>
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
            }
            else
            {
                // $("#person-data").html('');
                // $("#processing").hide();
            }
    });
    function hitungHarga() {
        // var checkedValue = $('.paket_cek:checked').val();
        var harga = $('#harga').val();
        var total =+ harga;
        $("#harga").val(total); 
        // if (checkedValue==1 && 2) {
        //     var harga = harga+12000;
        //     $("#harga").val(harga);
        // }
        // if (checkedValue==1) {
        //     $("#harga").val(120000);
        // }else if(checkedValue==2) {
        //     $("#harga").val(220000);
        // }else if(checkedValue==3) {
        //     $("#harga").val(420000);
        // }
    }
</script>