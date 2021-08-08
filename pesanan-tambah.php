<?php include_once("functions.php");
session_start();

	include("connection.php");
	

	$user_data = check_login($con);?>
<!DOCTYPE html>
<html><head><title>pesanan</title></head>
<body>
<center>
<h1>Tambah Data Pesanan</h1>
<hr>
<?php
date_default_timezone_set("Asia/Jakarta");
$date=  date("Y-m-d h:i:s");
	?>
	
<a href="pelayan.php"><button>Back</button></a>
<form method="post" name="frm" action="pesanan-simpan.php">
<table border="1">
<tr><td>Id Pegawai</td>
	<td><input type="text" name="id_pegawai" size="30" maxlength="32" value="<?php echo $user_data['id_pegawai']; ?>" readonly ></td></tr>

		 <tr><td><label for="Jabatan">Menu</label></td>
		<td>
		<select name="id_menu" 	>
			
			
		<?php
			$datanamabarang=getlistmenu();
			foreach($datanamabarang as $data){
				echo "<option value=\"".$data["id_menu"]."\"";
				if($data["id_menu"]==$datanamabarang)
					echo " selected"; // default sesuai kategori sebelumnya
				echo ">".$data["nama_menu"]."</option>";

			}
		?>
	
		</select>
	</td></tr>
    </td>
<tr><td>Jumlah </td>
	<td><input type="text" name="jumlah" size="13" maxlength="13"   ></td></tr>
<tr><td>Id Pesanan</td>
		
	
			
		<?php
			$datanamapesanan=getidpesanan();
			foreach($datanamapesanan as $datapesanan){
				echo "<td> <input name='id_pesanan' type='text' value='".$datapesanan['id_pesanan']."'/>";

			}
		?>

		
	</tr>
<tr><td>Tanggal </td>
	<td><input type="datetime" name="tgl_pesanan" size="13" maxlength="13"  value="<?php echo $date; ?>" readonly  ></td></tr>
<tr><td>&nbsp;</td>
	<td><input type="submit" name="TblSimpan" value="Save"></td></tr>
</table>
</form>
</body>
</html>