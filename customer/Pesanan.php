<?php
$headertext = 'Pemesanan Layanan';
include '../template/head.php';?>

<header class="masthead" style="background-image: url('https://blog.grabon.in/wp-content/uploads/2015/03/food-ordering-mobile.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Layanan pemesanan Gulo Klopo Kafe</h1>
            <span class="subheading">Halaman pemesanan layanan katering makanan. Silahkan untuk mengisi data Anda!</span>
          </div>
        </div>
      </div>
    </div>
  </header>

<body>

<?php
     $method_selected = '';
     $image_selected = '';
     $Paket_1 = isset($_POST['card1']);
     $Paket_2 = isset($_POST['card2']);
     $Paket_3 = isset($_POST['card3']);
     $img_src = ["Paket1.jpg", "Paket2.jpg", "Paket3.jpg"];

     if ($Paket_1) {
          $method_selected = '
               <select class="custom-select" name="Paket_Type" disabled>
               <option value="Paket Bombastis">Paket Bombastis</option>
               <input type="hidden" name="Paket_Type" value="Paket Bombastis">
               </select>';
          $image_selected = $img_src[0];
     }

     else if ($Paket_2){
          $method_selected = '
               <select class="custom-select" name="Paket_Type" disabled>
               <option value="Paket Hemat">Paket Hemat</option>
               <input type="hidden" name="Paket_Type" value="Paket Hemat">
               </select>';
          $image_selected = $img_src[1];
     }

     else if ($Paket_3){
          $method_selected = '
               <select class="custom-select" name="Paket_Type" disabled>
               <option value="Paket Vegetarian">Paket Vegetarian</option>
               <input type="hidden" name="Paket_Type" value="Paket Vegetarian">
               </select>';
          $image_selected = $img_src[2];
     }

     else {
            $method_selected = '
                <select class="custom-select" name="Paket_Type">
                <option value="Paket Bombastis">Paket Bombastis</option>
                <option value="Paket Hemat">Paket Hemat</option>
                <option value="Paket Vegetarian">Paket Vegetarian</option>
                </select>';
          $image_selected = $img_src[0];
     }
?>

     <div class="container-fluid">

          <div class="row">
               <div class="col-md-6"><br><br><br><br><br><img src=<?=$image_selected?> alt="Preview Paket" class="image-preview" style="width: 620px; height: 400px; margin-left: 20px"></div>
               <div class="col-md-6">
                    <form action="ReservasiKatering.php" method="POST">
                         <div class="form-group">Nama Pemesan
                              <input type="text" class="form-control" id="Nama" name="Nama" required>
                         </div>
                         
                         <div class="form-group">Tanggal Pemesanan
                              <input type="date" class="form-control" id="Tanggal_Pemesanan" name="Tanggal_Pemesanan" required>
                         </div>
                    
                         <div class="form-group">Waktu Pemesanan
                              <input type="time" class="form-control" id="Start_Time" name="Start_Time" required>
                         </div>
                    
                         <div class="form-group">Jumlah Orang/Pesanan.
                              <input type="number" class="form-control" id="Jumlah_Orang" name="Jumlah_Orang" aria-describedby="jumlahorang_info" value=0>
                         </div>
                    
                         <div class="form-group" placeholder="Choose...">Pilihan Paket<?=$method_selected?></div>
                    
                         <div class="form-group">Nomor HP
                              <input type="number" class="form-control" id="Nomor_HP" name="Nomor_HP" required><br>
                         </div>
                    
                         <div class="form-group">Tambahan Menu
                              <div class="form-check">
                                   <input class="form-check-input" type="checkbox" id="service_check1" name="service[]" value="Air Mineral Aqua Gelas">
                                        <label for="Air Mineral Aqua Gelas">Air Mineral Aqua Gelas Rp82.500/karton.</label><br/>
                                   <input class="form-check-input" type="checkbox" id="service_check2" name="service[]" value="Es Buah">
                                        <label for="Es Buah">Es Buah Rp7.000/gelas.</label><br/>
                                   <input class="form-check-input" type="checkbox" id="service_check3" name="service[]" value="Tambahan Kue Kering">
                                        <label for="Tambahan Kue Kering">Tambahan Kue Kering Rp5.000/pcs.</label><br/>
                                   <input class="form-check-input" type="checkbox" id="service_check4" name="service[]" value="Extra Sendok dan Gelas Plastik">
                                        <label for="Extra Sendok dan Gelas Plastik">Extra Sendok dan Gelas Plastik Rp2.500/pcs.</label><br/>
                              </div>
                         </div>

                         <div class="form-group">
                              <input type="submit" class="btn btn-primary btn-block" value="Pesan Sekarang"></input>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</body>

<?php include '../template/footer.php'; ?>