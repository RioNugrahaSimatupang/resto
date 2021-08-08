<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Data Pegawai</title></head>
<body>
<center>
<h1>Edit Data Pegawai</h1>
<?php
if(isset($_GET["id_pesanan"])){
	$db=dbConnect();
	$id_pesanan=$db->escape_string($_GET["id_pesanan"]);
	$sql="SELECT id_pesanan, nama_menu,jumlah,tgl_pesanan FROM detail_pesanan a, data_menu b 
where a.id_menu = b.id_menu and a.id_pesanan= $id_pesanan;";
	$res=$db->query($sql);
	if($res){
		?>
		Hello, Pelayan
		<table border="1" width="1000px">
		<tr><th>Id Pesanan</th><th>Nama Menu</th><th>Jumlah</th><th>Tanggal Pesanan</th>
	
			</tr>
		<?php
		$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
		foreach($data as $barisdata){ // telusuri satu per satu
			?>
			<tr>
			<td><?php echo $barisdata["id_pesanan"];?></td>
			<td><?php echo $barisdata["nama_menu"];?></td>
			<td><?php echo $barisdata["jumlah"];?></td>
			<td><?php echo $barisdata["tgl_pesanan"];?></td>
		
		
		
		
			
			</tr>
			<?php
		}
		?>
		</table>
		<a href="javascript:history.back()"><button>Back</button></a>
		<?php
		$res->free();
	}else
		echo "Gagal Eksekusi SQL".(DEVELOPMENT?" : ".$db->error:"")."<br>";
	
}
else
	echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
?>
</body>
</html>