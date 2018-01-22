<?php
include "../../../inc/config.php";
if(!empty($_GET['id'])){
	mysqli_query($konek, "delete from komentar where id='$_GET[id]'");
	
	header('Location:../../dashboard.php?m=komentar');
}else{
	header('Location:../../dashboard.php?m=komentar');
}
?>