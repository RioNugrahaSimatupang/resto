<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Employee Data Management</title></head>
<body>
<center>
<?php
date_default_timezone_set("Asia/Jakarta");
$date=  date("Y-m-d h:i:s");
	?>
<h1>Tambah Data Pembayaran</h1>
<a href="pembayaran.php"><button>Lihat Pembayaran</button></a>
<form method="post" name="frm" action="pembayaran-simpan.php">
<table border="1">
<tr><td>Total</td>
    <td><input type="text" name="total" size="10" maxlength="12"></td></tr>
<tr><td>Metode Pembayaran</td>
	<td><input type="text" name="metode_pembayaran" size="10" maxlength="12"></td></tr>	
<tr><td>Tanggal Pembayaran </td>
	<td><input type="datetime" name="tgl_pembayaran" size="13" maxlength="13"  value="<?php echo $date; ?>" readonly  ></td></tr>
<tr><td>Id Pesanan</td>
	<td><input type="text" name="id_pesanan" size="20" maxlength="22"></td></tr>	
<tr><td>&nbsp;</td>
	<td><input type="submit" name="TblSimpan" value="Save"></td></tr>
</table>
</form>
</body>
</html>