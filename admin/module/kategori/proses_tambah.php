<?php
include "../../../inc/config.php";
if(!empty($_POST['kategori'])){
	mysqli_query($konek, "insert into kategori (nm_kategori) values ('$_POST[kategori]')");
	
	header('Location:../../dashboard.php?m=kategori');
}else{
	header('Location:../../dashboard.php?m=kategori');
}
?>