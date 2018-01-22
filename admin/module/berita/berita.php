<?php
if(isset($_GET['tipe'])){
	if($_GET['tipe']=='tambah'){
		echo "
			<h3>Tambah Data</h3>
			<form method='POST' action='module/berita/proses_tambah.php'>
				<table width='100%'>
					<tr>
						<td>Judul Berita</td>
						<td><input type='text' name='judul' size='100' /></td>
					</tr>
					<tr>
						<td>Kategori</td>
						<td>
							<select name='kategori'>";
							$sql=mysqli_query($konek, "select * from kategori order by nm_kategori asc");
							while($k=mysqli_fetch_array($sql)){
								echo "<option value='$k[id]'>$k[nm_kategori]</option>";
							}
							echo "</select>
						</td>
					</tr>
					<tr>
						<td valign='top'>Isi Berita</td>
						<td>
							<textarea name='isi' id='editor1'></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type='submit' value='Simpan'/>
							<input type='button' value='Batal' onClick='history.back(1);' />
						</td>
					</tr>
				</table>
			</form>
		";
	}elseif($_GET['tipe']=='edit'){
		$sql = mysqli_query($konek,"SELECT * FROM berita WHERE id='$_GET[id]'");
		$de=mysqli_fetch_array($sql);
		echo "
			<h3>Edit Data</h3>
			<form method='POST' action='module/berita/proses_edit.php'>
				<input type='hidden' name='id' value='$de[id]' />
				<table width='100%'>
					<tr>
						<td>Judul Berita</td>
						<td><input type='text' name='judul' size='100' value='$de[judul]' /></td>
					</tr>
					<tr>
						<td>Kategori</td>
						<td>
							<select name='kategori'>";
							$sql=mysqli_query($konek, "select * from kategori order by nm_kategori asc");
							while($k=mysqli_fetch_array($sql)){
								echo "<option value='$k[id]'>$k[nm_kategori]</option>";
							}
							echo "</select>
						</td>
					</tr>
					<tr>
						<td valign='top'>Isi Berita</td>
						<td>
							<textarea name='isi' id='editor1'>$de[isi]</textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type='submit' value='Update'/>
							<input type='button' value='Batal' onClick='history.back(1);' />
						</td>
					</tr>
				</table>
			</form>
		";
	}
}else{
?>
<h3>Manajemen Berita</h3>
<a href="?m=berita&tipe=tambah">Tambah Data</a>
<table border='1' width="100%" cellspacing="0" cellpadding="4px">
	<tr>
		<th>No.</th>
		<th>Judul</th>
		<th>Aksi</th>
	</tr>
	<?php
	$sql = mysqli_query($konek, "select * from berita order by id asc");
	$no=1;
	while($k=mysqli_fetch_array($sql)){
		echo "<tr>
			<td align='center' width='40px'>$no</td>
			<td>$k[judul]</td>
			<td align='center' width='140px'>
				<a href='?m=berita&tipe=edit&id=$k[id]'>Edit</a> | 
				<a href='module/berita/proses_hapus.php?id=$k[id]' onClick='return confirm(\"Anda yakin akan menghapus data?\")'>Hapus</a>
			</td>
		</tr>";
		$no++;
	}
	?>
</table>
<?php
}
?>