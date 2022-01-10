<?php
//koneksi ke database mysql, silahkan di rubah dengan koneksi agan sendiri
$koneksi = mysqli_connect("localhost","root","","pegawai_mvc");
 
//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (!$koneksi){
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
?>