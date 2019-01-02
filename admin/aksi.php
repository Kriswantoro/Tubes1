<?php
include "../include/koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];
//$id=$_GET['id'];
//delete data dalam database
if ($module=='anime' AND $act=='hapus') {
	mysqli_query($koneksi,"delete from anime where
		id_anime='$_GET[id]'");
	header('location:server.php?module=anime');
}
//bagian user

//galeri user
elseif ($module=='anime' and $act=='input')
{
$set = true;
$msg = "";
//tentukan variabel file yg diupload dan tipe file
$tipe_file	= $_FILES['foto']['type'];
$lokasi_file = $_FILES['foto']['tmp_name'];
$nama_file	= $_FILES['foto']['name'];
$save_file =move_uploaded_file($lokasi_file,"images/$nama_file");

if(empty($lokasi_file))
{
$set=false;
$msg= $msg.'Upload gagal, Anda Lupa Mengambil Gambar..';
}
else
{
//tentukan tipe file harus image 
if ($tipe_file != "image/gif" and
$tipe_file != "image/jpeg" and
$tipe_file != "image/jpg" and
$tipe_file != "image/pjpeg" and
$tipe_file != "image/png")
{
$set=false;
$msg= $msg. 'Upload gagal, tipe file harus image..';
}
else
{
isset($save_file);
}
//replace di server 
if($save_file)
{
chmod("images/$nama_file", 0777);
}
else
{
$msg = $msg.'Upload Image gagal..';
$set =	false;
}
}
if($set)
{

$jud =$_POST['judul'];
$gen =$_POST['genre'];
$thn =$_POST['tahun'];

$sql=mysqli_query($koneksi,"insert into anime(foto_anime,judul,genre,tahun)values('$nama_file','$jud','$gen','$thn')");
$msg= $msg.'Upload Images Sukses..';
print "<meta http-equiv=\"refresh\" content=\"1;URL=server.php?module=anime\">";
}
echo "$msg";
}

//Update galeri
elseif ($module=='anime' and $act=='update')
{
$set = true;
$msg = "";

//tentukan variabel file yg diupload dan tipe file
$tipe_file	= $_FILES['foto']['type'];
$lokasi_file = $_FILES['foto']['tmp_name'];
$nama_file	= $_FILES['foto']['name'];
$save_file =move_uploaded_file($lokasi_file,"images/$nama_file");

if(empty($lokasi_file))
{
isset($set);
}
else
{
//tentukan tipe file harus image 
	if ($tipe_file != "image/gif" and
$tipe_file != "image/jpeg" and
$tipe_file != "image/jpg" and
$tipe_file != "image/pjpeg" and
$tipe_file != "image/png")
{
$set=false;
$msg= $msg. 'Upload gagal, tipe file harus image..';
}
else
{
$unlink=mysqli_query($koneksi, "select * from anime where id_anime='$_POST[id]'");
$CekLink=mysqli_fetch_array($unlink); 
if(!empty($CekLink['foto_anime']));
{
unlink("images/$CekLink[foto_anime]");
}
isset($save_file);
}

//replace di server 
if($save_file)
{
chmod("images/$nama_file", 0777);
}
else
{
$msg = $msg.'Upload Image gagal..';
$set =	false;
}
}
if($set)
{

$id =$_POST['id'];
$jud =$_POST['judul'];
$gen =$_POST['genre'];
$thn =$_POST['thn'];

if(empty($lokasi_file))
{
mysqli_query($koneksi, "update anime set judul='$jud', genre='$gen', tahun='$thn' where id_anime='$id'");}
else{mysqli_query($koneksi, "update anime set foto_anime='$nama_file',judul='$jud', genre='$gen', tahun='$thn' where id_anime='$id'");
}
$msg= $msg.'Update Images Sukses..'; print "<meta http-equiv=\"refresh\"
content=\"1;URL=server.php?module=anime\">";
}
echo "$msg";
}
?>