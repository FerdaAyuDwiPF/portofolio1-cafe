<?php session_start();
include '../customer/koneksi.php';
if (isset($_POST['daftar'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $username = $_POST['username'];
  $no_hp = $_POST['no_hp'];
  $role = "pengunjung";
  $sql = mysqli_query($koneksi,"INSERT INTO users(username, password, level, createdAt, nama, email, no_hp) VALUES ('$username','$password','$role', NOW(), '$nama','$email','$no_hp')");
  if ($sql) {
    $_SESSION['register'] = "berhasil";
    header('location: ../index.php/');
  }else
  var_dump($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Register Page</title>
  <link href="../resource/css/style.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.js" integrity="sha512-oHBLR38hkpOtf4dW75gdfO7VhEKg2fsitvHZYHZjObc4BPKou2PGenyxA5ZJ8CCqWytBx5wpiSqwVEBy84b7tw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

  <script>
    $(document).ready(function () {
      $("#te").click(function () {
        $("#top-message").css("visibility", "hidden");
        $("#coverz").css("visibility", "hidden");
      });
      $(".logo").click(function () {
        $("#top-message").css("visibility", "visible");
        $("#coverz").css("visibility", "visible");
      });
    });
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
</head>

<body style="background-color: #eee;">
    <div class='bold-line'></div>
    <div class='container'>
        <div class='windows'>
        <div class='regis'></div>
            <div class='content'>
                <div class='welcome' style="margin-top: 15px;">Welcome to Gulo Klopo Kafe!</div>
                <div class="d-flex justify-content-center align-items-center" style="margin-top: 10px;">
                    <div class="col-md-12">
                        <form action="" method="POST">
                            <hr>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control input-line full-width" name="nama" id="nama" placeholder="Masukkan Nama Lengkap" required aria-label="Username">
                            </div>

                            <div class="input-group mb-3">
                                <input type="email" class="form-control input-line full-width" name="email" id="email" placeholder="Masukkan Alamat E-Mail" required>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control input-line full-width" name="username" id="username" placeholder="Masukkan UserName" required>
                            </div>

                            <div class="input-group mb-3">
                                <input type="number" class="form-control input-line full-width" name="no_hp" id="no_hp" placeholder="Masukkan Nomor Handphone" required>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" class="form-control input-line full-width" name="password" id="password" placeholder="Kata Sandi Anda" onkeyup='check();' required>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" class="form-control input-line full-width" name="repassword" id="repassword" placeholder="Konfirmasi Kata Sandi Anda" onkeyup='check();' required>
                            </div>
                            
                            <span id='cek' style="color: white;"></span>
                            <div class="row mt-1 mb-6">
                                <div class="col-sm-3 col-md-4"></div>
                                <div class="col-sm-3 col-md-4">
                                  <button type="submit" class="ps-5 pe-5 btn btn-primary ghost-round full-width" name="daftar">Daftar</button>
                                </div>
                                <div class="col-sm-3 col-md-3"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <h7 class="mb-4" style="text-align: center;">Anda sudah punya akun? <a href="../index.php/">Login</a></h7>
            </div>
        </div>
    </div>
</body>
</html>