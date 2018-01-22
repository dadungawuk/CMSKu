<?php
if(isset($_GET['id'])){
	//tampilkan detail berita
	$sqlDetil = mysqli_query($konek, "select berita.*,
			kategori.nm_kategori,user.nama_lengkap 
			from berita inner join kategori on berita.id_kategori = kategori.id
			inner join user on berita.id_user = user.id
			where berita.id='$_GET[id]'");
	$dbrt=mysqli_fetch_array($sqlDetil);
	?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $dbrt['judul']; ?></h3>
		</div>
		<div class="panel-body">
			<?php echo $dbrt['isi']; ?>
		</div>
		<div class="panel-footer">
			<span>Ditulis Oleh : <b><?php echo $dbrt['nama_lengkap']; ?></b></span>
			<span class="pull-right">Diposting Pada : <?php echo $dbrt['tgl']; ?></span>
		</div>
	</div>
	<!-- tampil komentar -->
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Semua Komentar</h3>
		</div>
		<div class="panel-body">
			<ul class="media-list">
			<?php
			$sqlKomen = mysqli_query($konek, "SELECT * FROM komentar 
							WHERE id_berita='$dbrt[id]' AND aktif='Y' ORDER BY id DESC");
			while($dk=mysqli_fetch_array($sqlKomen)){
			?>
				<li class="media" style="border-bottom:solid 1px #ebebeb;">
					<div class="media-body">
						<h4><a href="mailto:<?php echo $dk['email']; ?>"><?php echo $dk['nama']; ?></a></h4>
						<?php echo $dk['komentar']; ?> [ <?php echo $dk['tgl']; ?> ]
					</div>
				</li>
			<?php
			}
			?>
			</ul>
		</div>
	</div>
	
	<!-- form komentar -->
	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3 class="panel-title">Tinggalkan Komentar</h3>
		</div>
		<div class="panel-body">
			<form method="POST" action="simpan_komentar.php">
				<input type="hidden" name="idberita" value="<?php echo $dbrt['id']; ?>">
				<div class="form-group">
					<label>Nama Anda</label>
					<input type="text" name="nama" class="form-control">
				</div>
				<div class="form-group">
					<label>Email Anda</label>
					<input type="email" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Isi Komentar</label>
					<textarea class="form-control" name="isi"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" name="simpan" class="btn btn-primary" value="Simpan Komentar">
				</div>
			</form>
		</div>
	</div>
	<?php
	
}elseif(isset($_GET['ktg'])){
	//tampilkan berita berdasarkan kategori
	$sqlKtg = mysqli_query($konek, "select * from kategori where id='$_GET[ktg]'");
	$ktg=mysqli_fetch_array($sqlKtg);
	?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Berita <b><?php echo $ktg['nm_kategori']; ?></b></h3>
		</div>
		<div class="panel-body">
			<ul>
			<?php
			$sqlBerita = mysqli_query($konek, "select * from berita 
							where id_kategori='$_GET[ktg]' order by id DESC");
			while($brt=mysqli_fetch_array($sqlBerita)){
				echo "<li>
					<a href='./?hal=berita&id=$brt[id]'>$brt[judul]</a>
				</li>";
			}
			?>
			</ul>
		</div>
	</div>
	<?php
}else{
	//tampilkan daftar berita
	?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Berita Terkini</h3>
		</div>
		<div class="panel-body">
			<ul>
			<?php
			$sqlBerita = mysqli_query($konek, "select * from berita order by id DESC");
			while($brt=mysqli_fetch_array($sqlBerita)){
				echo "<li>
					<a href='./?hal=berita&id=$brt[id]'>$brt[judul]</a>
				</li>";
			}
			?>
			</ul>
		</div>
	</div>
	<?php
}
?>