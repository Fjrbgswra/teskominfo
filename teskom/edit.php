<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pegawai</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
	.fakeimg {
		height: 200px;
		width: 200px;
		background: #aaa;
	}
</style>
</head>
<body>
	<div class="jumbotron text-center" style="margin-bottom:0">
		<h1>Data Kepegawaian</h1> 
	</div>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<a class="navbar-brand" href="index.php">Home</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#">About us</a>
				</li>    
			</ul>
		</div>  
	</nav>	
	<div class="container" style="margin-top:20px">
		<h2>Edit Data Pegawai</h2>
		
		<hr>
		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$no = $_GET['id'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM pegawai_mvc WHERE no='$no'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning"> tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$no			= $_POST['no'];
			$nama1		= $_POST['nama_depan'];
			$nama2		= $_POST['nama_belakang'];			
			$nip  		= $_POST['nip'];
			$alamat	    = $_POST['alamat'];
			$ttl	    = $_POST['ttl'];
			$telp	    = $_POST['telp'];
			$jabatan	= $_POST['jabatan'];
			$instansi	= $_POST['instansi'];
			
			$sql = mysqli_query($koneksi, "UPDATE pegawai_mvc SET nama_depan='$nama1', nama_belakang='$nama2' , nip='$nip', alamat='$alamat', ttl='$ttl', telp='$telp', jabatan='$jabatan', instansi='$instansi'  WHERE no='$no'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
	}
		?>
		<div class="container ">
		<form method="post">
			<div class="form-group">
				<div class="form-group">
					<label for="no">No:</label>
					<input type="hidden" name="no" class="form-control" value="<?php echo $data['no']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="nama">Nama Lengkap:</label>
				<div class="row">
					<div class="col">
						<input type="text" class="form-control" placeholder="First name" name="nama_depan" value="<?php echo $data['nama_depan']; ?>">
					</div>
					<div class="col">
						<input type="text" class="form-control" placeholder="Last name" name="nama_belakang" value="<?php echo $data['nama_belakang']; ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="alamat">NIP:</label>
				<input type="number" class="form-control" name="nip" placeholder="NIP" value="<?php echo $data['nip']; ?>">
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<textarea type="text" class="form-control" name="alamat" placeholder="<?php echo $data['alamat']; ?>"><?php echo $data['alamat']; ?></textarea>
			</div>
			<div class="form-group">
				<label for="alamat">TTL</label>
				<textarea type="text" class="form-control" name="ttl" placeholder="<?php echo $data['ttl']; ?>"><?php echo $data['ttl']; ?></textarea>
			</div>
			<div class="form-group">
				<label for="jml">No HP:</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">+62</span>
					</div>
					<input type="text" class="form-control" placeholder="Number" name="telp" value="<?php echo $data['telp']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="warna">Jabatan:</label>
				<select name="jabatan" class="form-control">
					<option value="Jabatan A" <?php if($data['jabatan'] == 'Jabatan A'){ echo 'selected'; } ?>>Jabatan A</option>
					<option value="Jabatan B" <?php if($data['jabatan'] == 'Jabatan B'){ echo 'selected'; } ?>>Jabatan B</option>
					<option value="Jabatan C" <?php if($data['jabatan'] == 'Jabatan C'){ echo 'selected'; } ?>>Jabatan C</option>
					<option value="Jabatan D" <?php if($data['jabatan'] == 'Jabatan D'){ echo 'selected'; } ?>>Jabatan D</option>
				</select>
			</div>
			<div class="form-group">
				<label for="warna">Instansi:</label>
				<select name="instansi" class="form-control">
					<option value="Instansi A" <?php if($data['instansi'] == 'Instansi A'){ echo 'selected'; } ?>>Instansi A</option>
					<option value="Instansi B" <?php if($data['instansi'] == 'Instansi B'){ echo 'selected'; } ?>>Instansi B</option>
					<option value="Instansi C" <?php if($data['instansi'] == 'Instansi C'){ echo 'selected'; } ?>>Instansi C</option>
					<option value="Instansi D" <?php if($data['instansi'] == 'Instansi D'){ echo 'selected'; } ?>>Instansi D</option>
				</select>
			</div>
			<div class="form-group row">
				<div class="col-sm-10">
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
					<a href="index.php" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>