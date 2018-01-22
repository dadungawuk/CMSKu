<?php
include "../../../inc/config.php";
if(!empty($_POST['judul'])){
	mysqli_query($konek, "update berita set id_kategori='$_POST[kategori]',
						judul='$_POST[judul]',
						isi='$_POST[isi]'
					where id='$_POST[id]'");
	
	header('Location:../../dashboard.php?m=berita');
}else{
	header('Location:../../dashboard.php?m=berita');
}
?>