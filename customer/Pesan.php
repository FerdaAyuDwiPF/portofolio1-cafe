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
            <span class="subheading">Halaman pemesanan layanan katering makanan. Silahkan memilih!</span>
          </div>
        </div>
      </div>
    </div>
  </header>

     <section>
          <div class="container text-center">
               <h4><br><br><br>Selamat datang di halaman pemesanan layanan katering Gulo Klopo Kafe. Silahkan memilih!<br><br></h4>
          </div>
     </section>

<?php
     $img_src = ["Paket1.jpg", "Paket2.jpg", "Paket3.jpg"];
?>          
          <form action="Pesanan.php" method="POST">
               <div class="row justify-content-center align-content-center">
                    <div class="col-md-3">
                         <div class="card" style="width: auto">
                              <img src=<?=$img_src[0]?> class="card-img-top" alt="nusantara" width ="336" height="250">
                                   <div class="card-body">
                                        <h5 class="card-title text-left"><b>Paket Bombastis</b></h5>
                                        <p class="card-text text-left">Rp20.000/kotak makan</p>
                                        <p class="text-left">Max.1000orang/Pesanan</p>
                                        <p class="text-left"><b>Sudah include (dimasukkan secara random) :</b></p>
                                             <li class="list-group-item text-success"><b>Lauk Pauk Daging Ayam/Ikan/Seafood/Sapi/ Telur.</b></li>
                                             <li class="list-group-item text-success"><b>Buah-buahan Pisang/Jeruk/Pepaya/Melon.</b></li>
                                             <li class="list-group-item text-success"><b>Lauk Pauk Sayuran Kangkung/Capcay/Terong Balado/Tumis Kacang Panjang.</b></li>
                                             <li class="list-group-item text-success"><b>Nasi, Sambal, Kerupuk, Mie Bihun, Minum, Tisu, Tusuk Gigi, Sendok Garpu.</b></li>
                                        </ul>
                                   </div>

                                   <div class="card-footer">
                                        <div class="row justify-content-center align-content-center">
                                             <button name="card1" class="btn btn-primary">Pesan</button>
                                        </div>
                                   </div>
                         </div>
                    </div>
                
                    <div class="col-md-3">
                         <div class="card" style="width: auto">
                              <img src=<?=$img_src[1]?> class="card-img-top" alt="garuda" width ="336" height="250">
                                   <div class="card-body">
                                        <h5 class="card-title text-left"><b>Paket Hemat</b></h5>
                                        <p class="card-text text-left">Rp10.000/kotak makan</p>
                                        <p class="text-left">Max.200orang/Pesanan</p>
                                        <p class="text-left"><b>Sudah include (dimasukkan secara random) :</b></p>
                                             <li class="list-group-item text-success"><b>Lauk Pauk Daging Ayam/Telur/Tempe/Tahu.</b></li>
                                             <li class="list-group-item text-success"><b>Buah-buahan Pisang/Jeruk/Salak</b></li>
                                             <li class="list-group-item text-success"><b>Lauk Pauk Sayuran Kangkung/Tumis Kacang Panjang.</b></li>
                                             <li class="list-group-item text-success"><b>Nasi, Sambal, Kerupuk, Mie Bihun, Minum, Tisu, Tusuk Gigi.</b></li>
                                             <li class="list-group-item text-warning"><b>Tidak include Sendok Garpu.</b></li>
                                        </ul>
                                   </div>

                                   <div class="card-footer">
                                        <div class="row justify-content-center align-content-center">
                                             <button name="card2" class="btn btn-primary">Pesan</button>
                                        </div>
                                   </div>
                         </div>
                    </div>

                    <div class="col-md-3">
                         <div class="card" style="width: auto">
                              <img src=<?=$img_src[2]?> class="card-img-top" alt="gsg" width ="336" height="250">
                              <div class="card-body">
                                        <h5 class="card-title text-left"><b>Paket Vegetarian</b></h5>
                                        <p class="card-text text-left">Rp35.000/kotak makan</p>
                                        <p class="text-left">Max.50orang/Pesanan</p>
                                        <p class="text-left"><b>Sudah include (dimasukkan secara random) :</b></p>
                                             <li class="list-group-item text-danger"><b>Tidak include Lauk Pauk Daging.</b></li>
                                             <li class="list-group-item text-success"><b>Buah-buahan Pisang/Jeruk/Salak/Melon/Pepaya/Semangka/Buah Naga</b></li>
                                             <li class="list-group-item text-success"><b>Lauk Pauk Sayuran Kangkung/Capcay/Terong Balado/Tumis Kacang Panjang/Sayur Soup.</b></li>
                                             <li class="list-group-item text-success"><b>Nasi, Sambal, Kerupuk, Mie Bihun, Minum, Tisu, Tusuk Gigi, Sendok Garpu.</b></li>
                                        </ul>
                                   </div>
                         
                                   <div class="card-footer">
                                        <div class="row justify-content-center align-content-center">
                                             <button name="card3" class="btn btn-primary">Pesan</button>
                                        </div>
                                   </div>
                         </div>
                    </div>
               </div>
          </form>
     </div>
</body>

<?php include '../template/footer.php'; ?>

</html>