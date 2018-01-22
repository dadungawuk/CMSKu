<?php
include "../../../inc/config.php";
if(!empty($_GET['id'])){
	mysqli_query($konek, "delete from kategori where id='$_GET[id]'");
	
	header('Location:../../dashboard.php?m=kategori');
}else{
	header('Location:../../dashboard.php?m=kategori');
}
?>