<?php
$headertext = 'Detail Pemesanan Anda';
include '../template/head.php';?>

<header class="masthead" style="background-image: url('https://images.ctfassets.net/x4we65bqi45q/4x0eLapOitl0nBFLQ8YicK/9d39f34298dda897620329118efcdf46/shutterstock_248825623-e1460664714802-720x415.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Detail Pemesanan Layanan Gulo Klopo Cafe</h1>
            <span class="subheading">Halaman tampilan detail pemesanan.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

<?php
    $Booking_No = rand();
    $name = $_POST['Nama'];
    $checkin = $_POST['Tanggal_Pemesanan'];
    $checkin_display = '';
    $jumlahorang = $_POST['Jumlah_Orang'];
    $checkout = '';
    $Pakettype = $_POST['Paket_Type'];
    $phone = $_POST['Nomor_HP'];
    $service = $_POST['service'];
    $service_display = 'no service';
    $total_price = 0;
    $harga = 0;
    $starttime = $_POST['Start_Time'];

    if (!empty($checkin)){
        $checkin_display = date('d/m/Y h:i:s', strtotime("$checkin $starttime"));
    }

    if ($Pakettype == 'Paket Bombastis'){
        $total_price = $jumlahorang*17000;
    }
    
    else if ($Pakettype == 'Paket Hemat'){
        $total_price = $jumlahorang*5000;
    }
    
    else if ($Pakettype == 'Paket Vegetarian'){
        $total_price = $jumlahorang*34600;
    }
    
    foreach ($service as $pilihan){
        if ($pilihan == 'Air Mineral Aqua Gelas'){
            $harga+=82500;
        }
        
        else if ($pilihan == 'Es Buah'){
            $harga+=7000;
        }
        
        else if ($pilihan == 'Tambahan Kue Kering'){
            $harga+=5000;
        }

        else if ($pilihan == 'Extra Sendok dan Gelas Plastik'){
            $harga+=2500;
        }
    }

    $total = $total_price + $harga;
    if (isset($service)){
        $service_display = '';
        foreach ($service as $srv){
            $service_display .= "<li> $srv </li>";
        }
    }
?>

    <div class="container-fluid">
        <div class="col-md-12 col-sm-12">
            <H3 class="text-center"><br><br><br>Terima kasih banyak <?=$name?> telah memesan melalui layanan kami!</H3>
            <p class="text-center">Silakan periksa kembali detail pemesanan Anda. Selamat menikmati!<br><br></p>
                <div class="row justify-content-center align-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Kode Pesanan</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col">Tanggal Pemesanan</th>
                                <th scope="col">Jumlah Orang/Pesanan</th>
                                <th scope="col">Pilihan Paket</th>
                                <th scope="col">Nomor HP</th>
                                <th scope="col">Tambahan Menu</th>
                                <th scope="col">Total Biaya Pemesanan</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <th scope="row"><?=$Booking_No?></th>
                                <td><?=$name?></td>
                                <td><?=$checkin_display?></td>
                                <td><?=$jumlahorang?></td>
                                <td><?=$Pakettype?></td>
                                <td><?=$phone?></td>
                                <td><ul><?=$service_display?></ul></td>
                                <td><?=$total?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</body>

<?php include '../template/footer.php'; ?>