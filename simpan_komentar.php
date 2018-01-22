<?php
include "./inc/config.php";

$tgl = date("Y-m-d");
$idb = $_POST['idberita'];

$simpan = mysqli_query($konek, "INSERT INTO komentar
					(nama,email,komentar,tgl,id_berita)
					VALUES('$_POST[nama]',
					'$_POST[email]',
					'$_POST[isi]',
					'$tgl',
					'$idb')");
if($simpan){
	header("Location:./?hal=berita&id=$idb");
}
?>