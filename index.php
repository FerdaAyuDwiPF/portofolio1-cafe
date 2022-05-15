<?php 
session_start();
include 'customer/koneksi.php';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = mysqli_query($koneksi,"SELECT * FROM users WHERE password='$password' AND email = '$email'");    
    if (mysqli_num_rows($sql)>0) {
        $data = mysqli_fetch_array($sql);
        $role = $data['level'];
        if ($role=="admin") {
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = "admin";
            header('location: ../admin/');
            $_SESSION['login']='berhasil'; 
            if (isset($_POST['remember'])){
                setcookie('email', $email, time() + (60 * 60 * 24 * 15), '/');
                setcookie('password', $password, time() + (60 * 60 * 24 * 15), '/');
              }
        }elseif ($role=="pengunjung") {
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = "pengunjung";
            header('location: ../customer/home.php');
            $_SESSION['login']='berhasil';
            if (isset($_POST['remember'])){
                setcookie('email', $email, time() + (60 * 60 * 24 * 15), '/');
                setcookie('password', $password, time() + (60 * 60 * 24 * 15), '/');
              } 
        }
    }else {
        echo '<div class="alert alert-danger m-0 p-2 alert-dismissible" id="reg_word" role="alert">Anda belum memiliki akun, silahkan untuk melakukan Registrasi terlebih dahulu!';
        echo '<button type="button" class="btn btn-close p-3" data-bs-dismiss="alert" aria-label="Close">Close</button>';
        echo '</div>';
    }
}

$koneksi->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login Page</title>
  <link href="../resource/css/style.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.js" integrity="sha512-oHBLR38hkpOtf4dW75gdfO7VhEKg2fsitvHZYHZjObc4BPKou2PGenyxA5ZJ8CCqWytBx5wpiSqwVEBy84b7tw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
</head>

<body style="background-color: #eee;">
    <div class='bold-line'></div>
    <div class='container'>
        <div class='window'>
            <div class='overlay'></div>
            <div class='content'>
                <div class='welcome' style="margin-top: 30px;">Welcome to Gulo Klopo Kafe!</div>
                <?php if (!empty($_SESSION['register'])) {?>
                    <div class="alert alert-success m-0 p-0 alert-dismissible text-center" id="reg_word" role="alert">Berhasil Registrasi
                        <button type="button" class="btn btn-close p-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
                    </div>
                <?php }?>
                <div class="d-flex justify-content-center align-items-center" style="margin-top: 30px;">
                    <div class="col-md-12">
                        <form action="" method="POST">
                            <hr>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Alamat E-Mail" value="<?php if (isset($_COOKIE['email'])){echo $_COOKIE['email']; }?>" required>
                            </div>

                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi Anda" value="<?php if (isset($_COOKIE['password'])){echo $_COOKIE['password']; }?>" required required><br>
                            </div>

                            <div class="mt-1" style="margin-top: 30px;">
                                <input type="checkbox" id="remember" name="remember" value="Remember">
                                <label for="remember"> Remember Me</label>
                            </div>

                            <div class="row mt-3 mb-2" style="margin-top: 30px;">
                                <div class="col-sm-3 col-md-4"></div>
                                <div class="col-sm-3 col-md-4 text-center">
                                    <button type="submit" name="login" class=" btn btn-primary ghost-round full-width">Login</button>
                                </div>
                                <div class="col-sm-3 col-md-3"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <h7 class="mb-4" style="text-align: center;">Anda belum punya akun? <a href="../akun/register.php">Register</a></h7>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $(".btn-close").click(function(){
        $("#reg_word").hide();
    });
</script>