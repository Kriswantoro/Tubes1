<?php
switch(@$_GET[act]){
//tampil user
	default:
	echo "<h2>Daftar Anime</h2>
	
	<table class='table'>
		<tr>
			<th scope='col'>No</th><th scope='col'>Foto Anime</th><th scope='col'>Judul</th><th scope='col'>Genre</th><th scope='col'>Tahun</th><th scope='col'>Aksi</th>
		</tr>";
		$tampil=mysqli_query($koneksi,"select * from anime order by id_anime asc");
		$no=1;
		while ($r=mysqli_fetch_array($tampil)) {
			echo "<tr>
			<td>$no</td>
			<td><img width='50' height='50' src ='images/$r[foto_anime]'></td>
			<td>$r[judul]</td>
			<td>$r[genre]</td>
			<td>$r[tahun]</td>
			<td><a class='btn btn-primary' href=?module=anime&act=editanime&id=$r[id_anime]>Edit</a>
				<a class='btn btn-danger' href=\"aksi.php?module=anime&act=hapus&id=$r[id_anime]\" onClick=\"return confirm('apakah anda benar akan menghapus daftar anime $r[id_anime]?')\">Hapus</a>
			</td></tr>";
			$no++;
		}
		echo "</table><form method=post action='?module=anime&act=tambahanime'>
	

		<input type=submit class='btn btn-primary' value='Tambah Anime'>
	</form>"
		;
		break;
//tambah
					case "tambahanime":
					echo "<h2>Tambah Anime</h2>
					<form method=post action='aksi.php?module=anime&act=input' enctype='multipart/form-data'>
					<div>
			  				<div class='form-group'>
			    				<input class='form-control' name='judul' type='text' id='nama_anime' placeholder= 'Judul Anime'>
			  				</div>
			  				<div class='form-group'>
			    				<textarea class='mytextarea' name='genre'id='mytextarea'></textarea>
			  				</div>
			  				<div class='form-group'>
			    				<input  name='tahun' type='no' id='tahun' placeholder='Tahun'>
			  				</div>
			  				<div class='form-group'>
			    				<input class='form-control'type='file' name='foto' >
			  				</div>

			  				<input type='submit' class='btn btn-primary' name='submit' value='Simpan'>
			  				<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
						</div>
								</form>";
								break;

//edit
					case "editanime":
					$edit=mysqli_query($koneksi,"select * from anime where
						id_anime='$_GET[id]'");
					$r=mysqli_fetch_array($edit);
					echo "<h2>Edit Anime</h2>
					<form method=post action='aksi.php?module=anime&act=update' enctype='multipart/form-data'>
					<div class='col-md-5'>
			  				<div class='form-group'>
			  					<input type='hidden' name='id' value='$r[id_anime]'>
			    				<input class='form-control' name='judul' type='text' id='judul'>
			  				</div>
			  				</div>
			  				<div class='form-group'>
			    				<textarea class='mytextarea' name='genre'id='mytextarea'></textarea>
			  				</div>
			  				<br>
			  				<div class='form-group'>
			    				<input  name='tahun' type='no' id='tahun' placeholder='Tahun'>
			  				</div>
			  				<div class='form-group'>
			    				<input class='form-control' name='foto' type='file'>
			  				</div>
			  				<br>
			  				<input type='submit' class='btn btn-primary' name='submit' value='Update'>
			  				<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
						</div>
								</form>";
								break;
							}
	?> 
	<script type="text/javascript" src="../tinymce/tinymce.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "#mytextarea"
        });
    </script>