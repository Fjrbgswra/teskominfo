<?php
//memasukkan file config.php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pegawai</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- library jquery -->
	<script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="jquery/jquery.validate.js"></script>
</head>
<body>
	<div class="jumbotron text-center" style="margin-bottom:0">
		<h1>DATA KEPEGAWAIAN</h1> 
	</div>
	<!-- tambah data -->
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
			$no			= $_POST['no'];
			$nama1		= $_POST['nama_depan'];
			$nama2		= $_POST['nama_belakang'];			
			// $nip  		= $_POST['nip'];
			$alamat  	= $_POST['alamat'];
			$ttl  		= $_POST['ttl'];
			$telp	    = $_POST['telp'];
			$jabatan	= $_POST['jabatan'];
			$instansi 	= $_POST['instansi'];
			
			// $nip = 	strlen($_POST ['nip']);  
            //  		$length = strlen($nip);  
      
   	        //  		if ($length < 10 && $length > 10) {  
   	        //     		echo "NIP harus 10 digit, silahkan masukan kembali nip anda";    
          	// 	} 



  			// else {  
   
			$sql = "SELECT nip FROM pegawai_mvc WHERE nip='$nip'";
			$cek_nip = mysqli_query($koneksi, $sql);
     
 			if (mysqli_num_rows($cek_nip) > 0) {
 			
	 			echo '<div class="alert alert-warning">Gagal Duplicate NIP</div>';
				
			}
			else{
			
			mysqli_query($koneksi, "SELECT * FROM pegawai_mvc WHERE no='$no'") or die(mysqli_error($koneksi));				
		
		
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO pegawai_mvc( no , nama_depan, nama_belakang, nip, alamat, ttl, telp, jabatan, instansi) VALUES('$no', '$nama1','$nama2', '$nip', '$alamat', '$ttl', '$telp', '$jabatan', '$instansi' )") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, .</div>';
			}
		}
	}

		?>
		
			<div class="container col-sm-8">
				<form action="" method="post" name="input" id="frm-pgw">
					<div class="form-group">
						<div class="form-group">
						<div class="form-group">
							<input type="hidden" name="no" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<div class="form-group">
							<input type="hidden" name="no" class="form-control" >
						</div>
					</div>
						<label for="nama">Nama Lengkap:</label>
						<div class="row">
							<div class="col">
								<input type="text" class="form-control" placeholder="First name" name="nama_depan" required>
							</div>
							<div class="col">
								<input type="text" class="form-control" placeholder="Last name" name="nama_belakang" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-group">
							<label for="no">NIP</label>
							<input type="text" name="text" class="form-control" minlength="10" maxlength="10" placeholder="NIP" required>
						</div>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" required></textarea>
					</div>
					<div class="form-group">
						<div class="form-group">
							<label for="no">Tanggal Lahir</label>
							<input type="date" name="ttl" class="form-control" placeholder="TTL" min="2000-12-30" required>
						</div>
					</div>
					<div class="form-group">
						<label for="jml">No HP:</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">+62</span>
							</div>
							<input type="text" class="form-control" placeholder="text" name="telp" maxlength="12" minlength="12" required>
						</div>
					</div>
					<div class="form-group">
						<label for="warna">Jabatan:</label>
						<select name="jabatan" class="form-control" required>
							<option value="Jabatan A">Jabatan A</option>
							<option value="Jabatan B">Jabatan B</option>
							<option value="Jabatan C">Jabatan C</option>
							<option value="Jabatan D">Jabatan D</option>
						</select>
					</div>
					<div class="form-group">
						<label for="warna">Instansi:</label>
						<select name="instansi" class="form-control" required>
							<option value="Instansi A">Instansi A</option>
							<option value="Instansi B">Instansi B</option>
							<option value="Instansi C">Instansi C</option>
							<option value="Instansi D">Instansi D</option>
						</select>
					
					</div>
					<button type="submit" class="btn btn-primary" name="submit">Submit</button>
					<button type="reset" class="btn btn-primary">Reset</button><br><br>
				</form>
			</div>


	<div class="container" style="margin-top:10px">
		
		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>Nama</th>
					<th>NIP</th>
					<th>Alamat</th>
					<th>TTL</th>
					<th>Nomor Telepon</th>
					<th>Jabatan</th>
					<th>Instansi</th>
					<th>Foto</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel siswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM pegawai_mvc ORDER BY no DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					// $data = mysqli_fetch_assoc($sql);
					// echo "<pre>";
					// var_dump($data);
					// die();
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
						<td>'.$data['nama_depan'].' '.$data['nama_belakang'].'</td>
						<td>'.$data['nip'].'</td>
						<td>'.$data['alamat'].'</td>
						<td>'.$data['ttl'].'</td>
						<td>'.$data['telp'].'</td>
						<td>'.$data['jabatan'].'</td>
						<td>'.$data['instansi'].'</td>
						<td>'.$data['foto'].'</td>
						<td>
						<a href="edit.php?id='.$data['no'].'" class="btn btn-warning">Edit</a>
						<a href="delete.php?id='.$data['no'].'" class="btn btn-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>

						</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
					<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
  
				<tbody>
				</table>
			</div>

			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		</body>
		</html>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#frm-pgw').validate();
				rules: {
					nim : {
						digits: true,
						minlength:10,
						maxlength:10
					}
				}
			});
		</script>