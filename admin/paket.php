<?php $resto="active"; include 'head.php'; include '../customer/koneksi.php';
$sql = mysqli_query($koneksi,"SELECT*FROM paket");
if (isset($_POST['add_tempat'])) {
    $nama_tempat = $_POST['nama_tempat'];
    $sql = mysqli_query($koneksi,"INSERT INTO venue(nama_venue) values('$nama_tempat')");
}
if (isset($_POST['add_paket'])) {
    $nama_paket = $_POST['nama_paket'];
    $harga = $_POST['harga'];
    $catatan = $_POST['catatan'];
    $sql = mysqli_query($koneksi,"INSERT INTO paket(nama_paket, harga, catatan) values('$nama_paket','$harga','$catatan')");
}
if (isset($_POST['edit_paket'])) {
    $id_paket = $_POST['id_paket'];
    $nama_paket = $_POST['nama_paket'];
    $harga = $_POST['harga'];
    $catatan = $_POST['catatan'];
    $sql = mysqli_query($koneksi,"UPDATE `paket` SET `nama_paket`='$nama_paket',`harga`='$harga',`catatan`='$catatan' WHERE `id_paket`='$id_paket'");
    echo "<script type='text/javascript'>document.location.href='paket.php';</script>";
}
if (isset($_POST['edit_venue'])) {
    $id_venue = $_POST['id_venue'];
    $nama_venue = $_POST['nama_venue'];
    $sql = mysqli_query($koneksi,"UPDATE `venue` SET `nama_venue`='$nama_venue' WHERE `id_venue`='$id_venue'");
    echo "<script type='text/javascript'>document.location.href='paket.php';</script>";
}
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Restoran Gulo Klopo Kafe</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-8">
                    <h6 class="m-0 font-weight-bold text-primary">Data Table Reservasi Gulo Klopo Kafe</h6>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#Paket">Tambah Paket</button>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#Tempat">Tambah Event</button>
                </div>
            </div>                
        </div>
        <div class="modal fade" id="Paket" tabindex="-1" role="dialog" aria-labelledby="PaketLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="PaketLabel">Add Paket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="Nama Paket">Nama Paket</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="nama_paket" id="nama_paket" class="form-control">
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
                                    <label for="Catatan">Catatan</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="catatan" id="catatan" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div><br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info" name="add_paket">Add Paket</button>
                            </div><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Tempat" tabindex="-1" role="dialog" aria-labelledby="TempatLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TempatLabel">Add Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="Nama Tempat">Nama Event</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="nama_tempat" id="nama_tempat" class="form-control">
                                </div>
                            </div><br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info" name="add_tempat">Tambah</button>
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
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Catatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $sqls = mysqli_query($koneksi,"SELECT*FROM paket");
                    $no = 1;
                    while ($data = mysqli_fetch_array($sqls)) {?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?= $data['nama_paket'];?></td>
                            <td><?= $data['harga'];?></td>
                            <td><?= $data['catatan'];?></td>
                            <td>
                                <!-- <a href="#" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="btn btn-info">Edit</a> -->
                                <a href="paket.php?id_paket=<?= $data['id_paket'];?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?id_paket=<?= $data['id_paket'];?>" class="btn btn-danger">Delete</a>                        
                            </td>                    
                        </tr>
                    <?php } ?>            
                </table>                    
            </div>
        </div>        
    </div>
    
    <?php if (!empty($_GET['id_paket'])) {
        $id_paket = $_GET['id_paket'];
        $sqls = mysqli_query($koneksi,"SELECT*FROM paket WHERE id_paket = '$id_paket'");
        $data = mysqli_fetch_array($sqls);
        $id_paket = $data['id_paket'];
        $nama_paket = $data['nama_paket'];
        $harga = $data['harga'];
        $catatan = $data['catatan'];?>
        <div class="edit_form">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <label for="Nama Paket">Nama Paket</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="nama_paket" id="nama_paket" class="form-control" value="<?=$nama_paket?>">
                        <input type="hidden" name="id_paket" id="id_paket" class="form-control" value="<?=$id_paket?>">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="Harga">Harga</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" name="harga" id="harga" class="form-control" value="<?=$harga?>">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="Catatan">Catatan</label>
                    </div>
                    <div class="col-md-8">
                        <textarea name="catatan" id="catatan" cols="30" rows="10" class="form-control"><?=$catatan?></textarea>
                    </div>
                </div><br>
                <div class="text-center">
                    <button type="submit" class="btn btn-info" name="edit_paket">Edit Paket</button>
                    <a href="paket.php" class="btn btn-secondary">Close</a>
                </div><br><br>
            </form>
        </div>
    <?php }?>
             
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Event</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php 
                    $sql = mysqli_query($koneksi,"SELECT*FROM venue");
                    $no = 1;
                    while ($datas = mysqli_fetch_array($sql)) {?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?= $datas['nama_venue'];?></td>
                            <td>
                                <!-- <a href="#" datas-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="btn btn-info">Edit</a> -->
                                <a href="paket.php?id_venue=<?= $datas['id_venue'];?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?id_venue=<?= $datas['id_venue'];?>" class="btn btn-danger">Delete</a>                        
                            </td>                    
                        </tr>
                    <?php } ?>            
                </table>                    
            </div>
        </div>
    </div>
    <?php if (!empty($_GET['id_venue'])) {
        $id_venue = $_GET['id_venue'];
        $sqls = mysqli_query($koneksi,"SELECT*FROM venue WHERE id_venue = '$id_venue'");
        $data = mysqli_fetch_array($sqls);
        $id_venue = $data['id_venue'];
        $nama_venue = $data['nama_venue'];?>
        <div class="modal-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <label for="Nama venue">Nama Event</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="nama_venue" id="nama_venue" class="form-control" value="<?=$nama_venue?>">
                        <input type="hidden" name="id_venue" id="id_venue" class="form-control" value="<?=$id_venue?>">
                    </div>
                </div><br>
                <div class="text-center">
                    <button type="submit" class="btn btn-info" name="edit_venue">Update</button>
                    <a href="paket.php" class="btn btn-secondary">Close</a>
                </div><br><br>
            </form>
        </div>
    <?php }?>
</div>
<?php include 'footer.php'; ?>