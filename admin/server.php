<?php
session_start();
//apabila user yang mengakses tidak sah
if (empty($_SESSION['user']) and
	empty($_SESSION['pass'])) {
	echo "<center>Untuk mengakses halaman ini, anda harus login
terlebih dahulu <br>";
echo "<a href=index.php><b>LOGIN</b></a></center>";
}
//apabila user yang mengakses sah
else {
	?>
	<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#"> <img src="anime.png"></a>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <?php include "menu.php"; ?>
                </div>
                <div class="col-md-9">
                    <?php include "konten.php"; ?>
                </div>
                <div class="col-md-12" align="center">
                Copyright <b>Kriswantoro</b> &copy; 2018. All Right Reserved<br>
                </div>
            </div>
        </div>
        
    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
	<?php
		}
	?>