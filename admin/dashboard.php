<?php
session_start();
if(!isset($_SESSION['login'])){
	header('Location:index.php');
}
include "../inc/config.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Halaman Administrator - Content Manajemen System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script src="../assets/ckeditor/ckeditor.js"></script>
</head>
<body>
<table width="100%">
	<tr>
		<td colspan="2" bgcolor="#ebebeb"><h1>Content Management System</h1></td>
	</tr>
	<tr>
		<td valign="top" width="250px" bgcolor="#ebebeb">
			<div class="menu">
				<ul>
					<li><a href="./dashboard.php">Home</a></li>
					<li><a href="./dashboard.php?m=kategori">Manajemen Kategori</a></li>
					<li><a href="./dashboard.php?m=berita">Manajemen Berita</a></li>
					<li><a href="./dashboard.php?m=komentar">Manajemen Komentar</a></li>
					<li><a href="./dashboard.php?m=halaman">Manajemen Halaman</a></li>
					<li><a href="./dashboard.php?m=pegawai">Data Pegawai</a></li>
					<li><a href="./logout.php">Logout</a></li>
				</ul>
			</div>
		</td>
		<td valign="top">
			<div class="content">
				<?php include "content.php"; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2" bgcolor="#ebebeb" align="center">Copyright &copy; 2017</td>
	</tr>
</table>

<script>
	CKEDITOR.replace('editor1',{
		filebrowserImageBrowseUrl: '../assets/kcfinder'
	});
</script>
</body>
</html>