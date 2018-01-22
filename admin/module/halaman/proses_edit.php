<?php
include "../../../inc/config.php";
if(!empty($_POST['judul'])){
	mysqli_query($konek, "update halaman set judul='$_POST[judul]',
						isi='$_POST[isi]'
					where id='$_POST[id]'");
	
	header('Location:../../dashboard.php?m=halaman');
}else{
	header('Location:../../dashboard.php?m=halaman');
}
?>