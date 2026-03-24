<?php

$conn=mysqli_connect("localhost","root","","gis3.2");


// cek koneksi
if(mysqli_connect_errno()){
	echo "koneksi database gagal:" .mysqli_connect_errno();
}
?>

