<?php
if(isset($_GET['tipe'])){
	if($_GET['tipe']=='edit'){
		$sql = mysqli_query($konek,"SELECT * FROM komentar WHERE id='$_GET[id]'");
		$de=mysqli_fetch_array($sql);
		echo "
			<h3>Edit Data</h3>
			<form method='POST' action='module/komentar/proses_edit.php'>
				<input type='hidden' name='id' value='$de[id]' />
				<label>Status Aktif</label>
				<select name='aktif'>
					<option value='$de[aktif]' selected>$de[aktif]</option>
					<option value='Y'>Y</option>
					<option value='N'>N</option>
				</select>
				<br/>
				<label>&nbsp;</label>
				<input type='submit' value='Update'/>
				<input type='button' value='Batal' onClick='history.back(1);' />
			</form>
		";
	}
}else{
?>
<h3>Manajemen Komentar</h3>
<table border='1' width="100%" cellspacing="0" cellpadding="4px">
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Isi Komentar</th>
		<th>Aktif</th>
		<th>Aksi</th>
	</tr>
	<?php
	$sql = mysqli_query($konek, "select * from komentar order by id desc");
	$no=1;
	while($k=mysqli_fetch_array($sql)){
		echo "<tr>
			<td align='center' width='40px'>$no</td>
			<td>$k[nama]</td>
			<td>$k[komentar]</td>
			<td>$k[aktif]</td>
			<td align='center' width='140px'>
				<a href='?m=komentar&tipe=edit&id=$k[id]'>Edit</a> | 
				<a href='module/komentar/proses_hapus.php?id=$k[id]' onClick='return confirm(\"Anda yakin akan menghapus data?\")'>Hapus</a>
			</td>
		</tr>";
		$no++;
	}
	?>
</table>
<?php
}
?>