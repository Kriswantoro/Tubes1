<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Anime</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <a class="navbar-brand"><img src="images/anime.png"></a>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="daftar.php">Daftar Anime</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin/index.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Start Feature Area -->
      <section class="featured-area">
        <div class="container">
          <div class="row">
            <?php 
              include 'include/koneksi.php';
              $p = "select * from anime";
              $i = mysqli_query($koneksi, $p);
              while ($r = mysqli_fetch_array($i)) {
              
             ?>
            <div  class="col-sm-4 text-center">
              <div class="single-feature d-flex flex-wrap justify-content-between">
                <div class="icon">
                  <img class="mx-auto rounded-circle" height="100" src="<?php echo 'admin/images/'.$r['foto_anime']; ?>" alt="">
                </div>
                <div class="desc">
                  <h4><?php echo $r['judul'] ?></h4>
                  <p>Genre: <?php echo $r['genre'] ?></p>
                  <p>Tahun : <?php echo $r['tahun'] ?></p>
                </div>
              </div>
              
            </div>
            <?php  
                }
              ?>

    <!-- Page Content -->
   <div class="container">
      <div class="row">
        <div class="col-md-12" align="center">
        Copyright <b>Kriswantoro</b> &copy; 2018. All Right Reserved<br>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
