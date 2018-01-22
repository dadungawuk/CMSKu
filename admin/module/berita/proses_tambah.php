<?php
session_start();
include "../../../inc/config.php";
if(!empty($_POST['judul'])){
	$tgl 	= date("Y-m-d");
	$iduser = $_SESSION['id'];
	mysqli_query($konek, "insert into berita (id_kategori,judul,isi,tgl,id_user) 
			values ('$_POST[kategori]','$_POST[judul]','$_POST[isi]','$tgl','$iduser')");
	
	header('Location:../../dashboard.php?m=berita');
}else{
	header('Location:../../dashboard.php?m=berita');
}
?>