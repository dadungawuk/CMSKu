<?php
if(isset($_GET['tipe'])){
	if($_GET['tipe']=='tambah'){
		echo "
			<h3>Tambah Data</h3>
			<form method='POST' action='module/kategori/proses_tambah.php'>
				<label>Nama Kategori</label>
				<input type='text' name='kategori' size='40' /><br/>
				<label>&nbsp;</label>
				<input type='submit' value='Simpan'/>
				<input type='button' value='Batal' onClick='history.back(1);' />
			</form>
		";
	}elseif($_GET['tipe']=='edit'){
		$sql = mysqli_query($konek,"SELECT * FROM kategori WHERE id='$_GET[id]'");
		$de=mysqli_fetch_array($sql);
		echo "
			<h3>Edit Data</h3>
			<form method='POST' action='module/kategori/proses_edit.php'>
				<input type='hidden' name='id' value='$de[id]' />
				<label>Nama Kategori</label>
				<input type='text' name='kategori' size='40' value='$de[nm_kategori]' /><br/>
				<label>&nbsp;</label>
				<input type='submit' value='Update'/>
				<input type='button' value='Batal' onClick='history.back(1);' />
			</form>
		";
	}
}else{
?>
<h3>Manajemen Kategori</h3>
<a href="?m=kategori&tipe=tambah">Tambah Data</a>
<table border='1' width="100%" cellspacing="0" cellpadding="4px">
	<tr>
		<th>No.</th>
		<th>Nama Kategori</th>
		<th>Aksi</th>
	</tr>
	<?php
	$sql = mysqli_query($konek, "select * from kategori order by id asc");
	$no=1;
	while($k=mysqli_fetch_array($sql)){
		echo "<tr>
			<td align='center' width='40px'>$no</td>
			<td>$k[nm_kategori]</td>
			<td align='center' width='140px'>
				<a href='?m=kategori&tipe=edit&id=$k[id]'>Edit</a> | 
				<a href='module/kategori/proses_hapus.php?id=$k[id]' onClick='return confirm(\"Anda yakin akan menghapus data?\")'>Hapus</a>
			</td>
		</tr>";
		$no++;
	}
	?>
</table>
<?php
}
?>