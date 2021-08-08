<?php include_once("functions.php");?>
<!DOCTYPE html>
<html>
<body>
<center>
<h1>Edit Data Pesanan</h1>
<?php
if(isset($_GET["id_pesanan"])){
	$db=dbConnect();
	$id_pesanan=$db->escape_string($_GET["id_pesanan"]);
	if($datapegawai=getDataPesanan($id_pesanan)){// cari data produk, kalau ada simpan di $data
		?>
<a href="pesanan-koki.php"><button>Lihat Data Pesanan</button></a>
<form method="post" name="frm" action="pesanan-selesai2.php">
<table border="1">
<tr><td>Id Pesanan</td>
    <td><input type="text" name="id_pesanan" size="11" maxlength="13"
	     value="<?php echo $datapegawai["id_pesanan"];?>" readonly></td></tr>
<tr><td>Nama Menu</td>
	<td><input type="text" name="nama_pegawai" size="30" maxlength="32"
		  value="<?php echo $datapegawai["nama_menu"];?>"readonly></td></tr>
<tr><td>Jumlah</td>
    <td><input type="text" name="jumlah" size="10" maxlength="12"
		 value="<?php echo $datapegawai["jumlah"];?>"readonly ></td></tr>
<tr><td>Status Pesanan</td>
	<td><input type="text" name="status_pesanan" size="10" maxlength="12"
		 value="<?php echo $datapegawai["status_pesanan"];?>"readonly></td></tr>		 
		 
<tr><td>&nbsp;</td>
	<td><input type="submit" name="TblUpdate" value="Update">
	  </td></tr>
</table>
</form>
		<?php
	}
	else
		echo "Employee with id : $id_pegawai nothing. Edit cancelled";
?>
<?php
}
else
	echo "Employe id nothing. Edit Cancelled.";
?>
</body>
</html>