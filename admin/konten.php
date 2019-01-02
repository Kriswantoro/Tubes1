<?php
include "../include/koneksi.php";
//bagian home admin
if ($_GET['module']=='home') {
	echo "<h2>Halaman Utama</h2><br
	<h1>Selamat Datang Di Halaman Admin</h1>
    <p>Ini Adalah halaman untuk admin Anime</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>";
		}
//bagian user
		elseif ($_GET['module']=='anime') {
			include "modul/anime.php";
		}
// Apabila modul tidak ditemukan
		else{
			echo "<p><b>MODUL BELUM ADA</b></p>";
		}
		?>