<?
	include "koneksi.php";
	
	$kodedagri=$_POST['txtKodedagri'];
	$jumlah=$_POST['txtJumlah'];
	
	
	$sql="update jumlah set Jumlah='$jml' where Kodedagri='$kodedagri'";
	
	$hasil=mysqli_query($conn, $sql);
		if($hasil){
			header('location:display_update.php');
		} else {
			echo "<center>Data gagal diubah, error" .mysqli_error($conn);
			echo "<hr><a href='display_update.php'>kembali</a></center>";
		}
?>


