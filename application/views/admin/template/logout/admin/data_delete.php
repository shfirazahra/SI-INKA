<?
	include "koneksi.php";
	
	$id=$_REQUEST['id'];
	echo $id;
	
	$sql="delete from uts_fasilitaskesehatan where id='$id'";
	$hasil=mysqli_query($conn, $sql);
	if($hasil){
		header('location:fasilitas.php');
	} else {
		echo "Hapus data barang gagal, error : " .mysqli_error($conn);
	}
?>