<?php
include "../../../inc/config.php";
if(!empty($_POST['kategori'])){
	mysqli_query($konek, "update kategori set nm_kategori='$_POST[kategori]' where id='$_POST[id]'");
	
	header('Location:../../dashboard.php?m=kategori');
}else{
	header('Location:../../dashboard.php?m=kategori');
}
?>