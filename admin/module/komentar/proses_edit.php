<?php
include "../../../inc/config.php";
	mysqli_query($konek, "update komentar set aktif='$_POST[aktif]' where id='$_POST[id]'");
	
	header('Location:../../dashboard.php?m=komentar');
?>