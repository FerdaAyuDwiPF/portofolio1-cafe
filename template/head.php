<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Gulo Clopo Cafe</title>
  <link href="../resource/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../resource/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href="../resource/css/clean-blog.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="sidebar-brand-icon">
      <img src="../resource/image/logo.png" width="100" height="50"></i>
    </div>
    <div class="container">
      <a class="navbar-brand" href="../customer/Home.php"><?php echo $headertext; ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../customer/Home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../customer/MenuAbout.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../customer/Post.php">Postingan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../customer/MenuEvent.php">Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../customer/MenuContact.php">Contact</a>
          </li>
          <?php if (!empty($_SESSION['id_user'])) {?>
            <li class="nav-item">
              <a class="nav-link" href="../customer/pemesanan.php">Riwayat</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../customer/Pesanan.php">Pesan<span class="sr-only">(current)</span></a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="../akun/logout.php">Logout</a>
            </li>
          <?php } else {?>
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Login</a>
            </li>
          <?php }?>
        </ul>
      </div>
    </div>
  </nav>