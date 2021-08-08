<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Pelayan</title></head>
<body>
<center>
<h1>Pesanan</h1>
<hr>
<?php
if(isset($_POST["TblSimpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$id_menu = $db->escape_string($_POST["id_menu"]);
		$id_pegawai = $db->escape_string($_POST["id_pegawai"]);
		$id_pesanan = $db->escape_string($_POST["id_pesanan"]);
		$jumlah = $db->escape_string($_POST["jumlah"]);
		$tgl_pesanan = $db->escape_string($_POST["tgl_pesanan"]);
		
		// Susun query insert
		$sql="Replace INTO data_pesanan(id_pesanan)
			  VALUES($id_pesanan);
				INSERT INTO detail_pesanan(id_menu,id_pegawai,id_pesanan,jumlah,tgl_pesanan)
			  VALUES($id_menu,$id_pegawai,$id_pesanan,$jumlah,'$tgl_pesanan');
			  ";

		// Eksekusi query insert
		$res=$db->multi_query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada penambahan data
				?>
				Data saved successfully.<br>
				<a href="pesanan-tambah.php"><button>Tambah Pesanan</button></a>
				<?php
			}
		}
		else{
			?>
			<?php
			echo $id_menu.'<br>';
			echo $id_pegawai.'<br>';
			echo $id_pesanan.'<br>';
			echo $jumlah.'<br>';
			echo $tgl_pesanan.'<br>';
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