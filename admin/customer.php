<?php $customer="active"; include 'head.php'; include '../customer/koneksi.php';
if (isset($_POST['add_customer'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $no_hp = $_POST['no_hp'];
    $role = $_POST['fix'];
    $sql = mysqli_query($koneksi,"INSERT INTO users(username, password, level, createdAt, nama, email, no_hp) VALUES ('$username','$password','$role', NOW(), '$nama','$email','$no_hp')");    
    if (!$sql) {
        echo $role;
    }
}?><?php

if (isset($_POST['update_customer'])) {
    $nama = $_POST['nama'];
    $id_user = $_POST['id_user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $no_hp = $_POST['no_hp'];
    $role = $_POST['fixx'];
    $sql = mysqli_query($koneksi,"UPDATE users SET username='$username',password='$password',level='$role',nama='$nama',email='$email',no_hp='$no_hp' WHERE id_user='$id_user'");    
    echo "<script type='text/javascript'>document.location.href='customer.php';</script>";
}
?>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Data Customer</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-10">
                        <h6 class="m-0 font-weight-bold text-primary">Data Table Customer Gulo Klopo Cafe</h6>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Tambah Customer</button>
                    </div>
                </div>                
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="col-md-12 mb-3">
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap" required aria-label="Username">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Alamat E-Mail" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan UserName" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan Nomor Handphone" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi Anda" onkeyup='check();' required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <input type="password" class="form-control" name="repassword" id="repassword" placeholder="Konfirmasi Kata Sandi Anda" onkeyup='check();' required>
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    
                                    <div class="row">                                        
                                        <div class="col-md-4">
                                            <label for="Level">Level</label>                                            
                                        </div>
                                        <div class="col-md-1">
                                            <input type="radio" name="level" onclick="displayRadioValue()" value="admin">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="Admin">Admin</label>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="radio" name="level" onclick="displayRadioValue()" value="pengunjung">
                                            <input type="hidden" id="ye" name="fix">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="Pengunjung">Pengunjung</label>
                                        </div>
                                    </div>
                                    
                                </div><br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="add_customer">Add Customer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
            <div id="result"></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; 
                            $sql = mysqli_query($koneksi,"SELECT level, id_user, nama, email, no_hp FROM users");
                            while ($data = mysqli_fetch_array($sql)) {?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['email']; ?></td>
                                <td><?= $data['no_hp']; ?></td>
                                <td><?= $data['level']; ?></td>
                                <td>
                                    <a href="customer.php?id_edit=<?= $data['id_user']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="delete.php?id_hapus=<?= $data['id_user']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php            
            if (!empty($_GET['id_edit'])) {
                $id_edit = $_GET['id_edit'];
                $sql = mysqli_query($koneksi,"SELECT * FROM users WHERE id_user='$id_edit'");
                $data = mysqli_fetch_array($sql);
                $id_user = $data['id_user'];
                $nama_pengguna = $data['nama'];
                $email = $data['email'];
                $password = $data['password'];
                $username = $data['username'];
                $no_hp = $data['no_hp'];
                $role = $data['level'];?>
                <div id="container-fluid">
                    <form action="" method="post">
                        <div class="col-md-12 col-md-12 mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    Nama
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap" value="<?= $nama_pengguna; ?>" required aria-label="Username">
                                </div>
                            </div>                             
                            <input type="hidden" class="form-control" name="id_user" id="id_user" value="<?= $id_user; ?>">
                        </div>

                        <div class="col-md-12 col-md-12 mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    Email 
                                </div>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Alamat E-Mail" required value="<?= $email; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                Username 
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan UserName" required value="<?= $username; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                No.Phone 
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan Nomor Handphone" required value="<?= $no_hp; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    Password 
                                </div>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi Anda" onkeyup='check();' required  value="<?= $password; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                Confirm Password 
                                </div>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" name="repassword" id="repassword" placeholder="Konfirmasi Kata Sandi Anda" onkeyup='check();' required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            
                            <div class="row">                                        
                                <div class="col-md-4">
                                    <label for="Level">Level</label>                                            
                                </div>
                                <div class="col-md-1">
                                    <input type="radio" name="levels" onclick="displayRadioValues()" value="admin">
                                </div>
                                <div class="col-md-2">
                                    <label for="Admin">Admin</label>
                                </div>
                                <div class="col-md-1">
                                    <input type="radio" name="levels" onclick="displayRadioValues()" value="pengunjung">
                                    <input type="hidden" id="yes" name="fixx">
                                </div>
                                <div class="col-md-2">
                                    <label for="Pengunjung">Pengunjung</label>
                                </div>
                            </div>
                            
                        </div><br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"name="update_customer">Edit Customer</button>
                            <a href="customer.php" class="btn btn-secondary">Close</a>
                        </div>
                    </form>
                </div>
                <?php }?>
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