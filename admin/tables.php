<?php $customer="active"; include 'head.php'; include '../customer/koneksi.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Tables</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Data Restoran Gulo Klopo Cafe</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table Pegawai Gulo Klopo Cafe</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Posisi</th>
                                            <th>Umur</th>
                                            <th>Awal Bekerja</th>
                                            <th>Gaji</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Posisi</th>
                                            <th>Umur</th>
                                            <th>Awal Bekerja</th>
                                            <th>Gaji</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Utami Sania Atun</td>
                                            <td>Koki</td>
                                            <td>41</td>
                                            <td>2017/04/25</td>
                                            <td>Rp.4.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Aulia Wijayanti</td>
                                            <td>Kasir</td>
                                            <td>25</td>
                                            <td>2020/07/25</td>
                                            <td>Rp.3.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Andhika Bayu</td>
                                            <td>Pelayan</td>
                                            <td>26</td>
                                            <td>2021/01/08</td>
                                            <td>Rp.3.500.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Hadi Chandra Putra</td>
                                            <td>Delivery Driver</td>
                                            <td>22</td>
                                            <td>2017/03/29</td>
                                            <td>Rp.2.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Annisa Fitriani</td>
                                            <td>Pelayan</td>
                                            <td>27</td>
                                            <td>2019/11/28</td>
                                            <td>Rp.3.500.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Fajar Adiwiyo</td>
                                            <td>Koki</td>
                                            <td>38</td>
                                            <td>2018/12/02</td>
                                            <td>Rp.4.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Putri Retno Lestari</td>
                                            <td>Cleaning Service</td>
                                            <td>23</td>
                                            <td>2012/08/06</td>
                                            <td>Rp.2.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Wulandari Dwi</td>
                                            <td>Koki</td>
                                            <td>28</td>
                                            <td>2010/10/14</td>
                                            <td>Rp.4.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Nurul Ramadhani</td>
                                            <td>Pelayan</td>
                                            <td>39</td>
                                            <td>2020/09/15</td>
                                            <td>Rp.3.500.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Armando Ilham</td>
                                            <td>Delivery Driver</td>
                                            <td>23</td>
                                            <td>2020/12/13</td>
                                            <td>Rp.2.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Rini Arumi Sasa</td>
                                            <td>Staff Gudang</td>
                                            <td>30</td>
                                            <td>2008/12/19</td>
                                            <td>Rp.3.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Yadi Kusuma</td>
                                            <td>Resepsionis</td>
                                            <td>22</td>
                                            <td>2019/03/03</td>
                                            <td>Rp.3.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Rizki Amarta</td>
                                            <td>Pelayan</td>
                                            <td>36</td>
                                            <td>2020/10/16</td>
                                            <td>Rp.3.500.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Dinda Romani</td>
                                            <td>Admin</td>
                                            <td>43</td>
                                            <td>2012/12/18</td>
                                            <td>Rp.3.500.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Andrea Dirgawansyah</td>
                                            <td>Koki</td>
                                            <td>19</td>
                                            <td>2021/03/17</td>
                                            <td>Rp.4.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Ari Wahyuda</td>
                                            <td>Marketing</td>
                                            <td>22</td>
                                            <td>2012/11/27</td>
                                            <td>Rp.3.500.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Maria Yusni Renjana</td>
                                            <td>Koki</td>
                                            <td>35</td>
                                            <td>2010/06/09</td>
                                            <td>Rp.4.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Gloria Senjarani</td>
                                            <td>Kasir</td>
                                            <td>26</td>
                                            <td>2020/04/10</td>
                                            <td>Rp.3.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Wahyudani Akbar</td>
                                            <td>Akuntan</td>
                                            <td>41</td>
                                            <td>2018/10/13</td>
                                            <td>Rp.4.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Mila Rosalina</td>
                                            <td>Marketing</td>
                                            <td>34</td>
                                            <td>2019/09/26</td>
                                            <td>Rp.3.500.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Lia Gundamarla</td>
                                            <td>Resepsionis</td>
                                            <td>27</td>
                                            <td>2018/09/03</td>
                                            <td>Rp.3.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Yurina Kartika</td>
                                            <td>Cleaning Service</td>
                                            <td>26</td>
                                            <td>2020/06/25</td>
                                            <td>Rp.2.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Indra Satmaja</td>
                                            <td>Koki</td>
                                            <td>48</td>
                                            <td>2019/12/12</td>
                                            <td>Rp.4.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Dodit Wicaksono</td>
                                            <td>Admin</td>
                                            <td>23</td>
                                            <td>2020/09/20</td>
                                            <td>Rp.3.500.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Eko Viktor Rahman</td>
                                            <td>Pelayan</td>
                                            <td>25</td>
                                            <td>2018/10/09</td>
                                            <td>Rp.3.500.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Dani Kurniawan</td>
                                            <td>Staff Gudang</td>
                                            <td>34</td>
                                            <td>2020/12/22</td>
                                            <td>Rp.3.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Tania Ratna Sari</td>
                                            <td>Akuntan</td>
                                            <td>28</td>
                                            <td>2021/09/14</td>
                                            <td>Rp.4.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Ajie Oktaviano</td>
                                            <td>Pelayan</td>
                                            <td>28</td>
                                            <td>2011/06/07</td>
                                            <td>Rp.3.500.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Sri Ayu Citra</td>
                                            <td>Koki</td>
                                            <td>29</td>
                                            <td>2010/03/11</td>
                                            <td>Rp.4.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Dian Yuningtyas</td>
                                            <td>Marketing</td>
                                            <td>20</td>
                                            <td>2011/08/14</td>
                                            <td>Rp.3.500.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Reza Simanjuntak</td>
                                            <td>Staff Gudang</td>
                                            <td>37</td>
                                            <td>2019/06/02</td>
                                            <td>Rp.3.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>I Made Putri Agung</td>
                                            <td>Resepsionis</td>
                                            <td>25</td>
                                            <td>2020/10/22</td>
                                            <td>Rp.3.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Indah Nur Hasani</td>
                                            <td>Koki</td>
                                            <td>27</td>
                                            <td>2021/05/07</td>
                                            <td>Rp.4.000.000,-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include 'footer.php'; ?>
<script>
    // $("#edit_form").hide();
    function displayRadioValue() {
        var ele = document.getElementsByName('level');
            
        for(i = 0; i < ele.length; i++) {
            if(ele[i].checked)
            document.getElementById("ye").value
                    = ele[i].value;
        }
    }
    function displayRadioValues() {
        var ele = document.getElementsByName('levels');
            
        for(i = 0; i < ele.length; i++) {
            if(ele[i].checked)
            document.getElementById("yes").value
                    = ele[i].value;
        }
    }
    // $(".btn-warning").click(function(){
    //     $("#edit_form").show();
    // });
    var check = function () {
      if (document.getElementById('password').value ==
        document.getElementById('repassword').value) {
        document.getElementById('cek').style.color = 'white';
        document.getElementById('cek').innerHTML = 'Password matching';
      } else {
        document.getElementById('cek').style.color = 'red';
        document.getElementById('cek').innerHTML = 'Password not matching';
      }
    }
</script>