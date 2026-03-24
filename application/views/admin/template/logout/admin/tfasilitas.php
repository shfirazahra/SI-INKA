<?php

//  koneksi database
	include 'koneksi.php';

		$id=$_POST['txtid'];
		$nama=$_POST['txtnama'];
		$kategori=$_POST['txtkategori'];
		$alamat=$_POST['txtalamat'];
		$lat=$_POST['txtlat'];
		$lng=$_POST['txtlng'];
			
		$sql="insert into uts_fasilitaskesehatan(id, nama, kategori, alamat, lat, lng) 
		values('$id','$nama','$kategori','$alamat','$lat','$lng')";
		$hasil=mysqli_query($conn, $sql);
		
		if($hasil){
			header('location:tambah_fasilitas.php');
		} else {
			echo "<center>Data gagal disimpan, error".mysqli_error($conn);
			echo "<hr><a href='tambah_fasilitas.php'>kembali</a></center>";
		}
	
	?>
	
