<?php
include "../../../inc/config.php";
if(!empty($_GET['id'])){
	mysqli_query($konek, "delete from berita where id='$_GET[id]'");
	
	header('Location:../../dashboard.php?m=berita');
}else{
	header('Location:../../dashboard.php?m=berita');
}
?>