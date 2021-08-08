<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Employee Data Storage</title></head>
<body>
<center>
<h1>Penyimpanan Data Pembayaran</h1>
<?php
if(isset($_POST["TblSimpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$total = $db->escape_string($_POST["total"]);
		$metode_pembayaran = $db->escape_string($_POST["metode_pembayaran"]);
		$tgl_pembayaran = $db->escape_string($_POST["tgl_pembayaran"]);
		$id_pesanan = $db->escape_string($_POST["id_pesanan"]);
		
		// Susun query insert
		$sql="INSERT INTO data_pembayaran(total,metode_pembayaran,tgl_pembayaran,id_pesanan)
			  VALUES($total,'$metode_pembayaran','$tgl_pembayaran',$id_pesanan)";
		// Eksekusi query insert
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada penambahan data
				?>
				Data saved successfully.<br>
				<a href="pembayaran.php"><button>Lihat Data pembayaran</button></a>
				<?php
			}
		}
		else{
			?>
			The data failed to save because the Employee Id may already exist.<br>
			<a href="javascript:history.back()"><button>Back</button></a>
			<?php
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>