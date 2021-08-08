<?php include_once("functions.php");
session_start();

	include("connection.php");
	

	$user_data = check_login($con);?>
<!DOCTYPE html>
<html><head><title>Kasir</title></head>
<body>
<center>
<h1>Cek Pesanan</h1>
<a href="lihat-pesanan.php">Lihat Pesanan</a> |
<a href="pembayaran.php">Pembayaran</a> |
<a href="kasir.php">Back</a>
<hr>
<?php
if(isset($_GET["id_pesanan"])){
	$db=dbConnect();
	$id_pesanan=$db->escape_string($_GET["id_pesanan"]);
	$sql="SELECT id_pesanan, nama_menu,jumlah,tgl_pesanan,harga FROM detail_pesanan a, data_menu b 
where a.id_menu = b.id_menu and a.id_pesanan= $id_pesanan;";
	$res=$db->query($sql);
	if($res){
		?>
		Hello, <?php echo $user_data['username']; ?>
		<table border="1" width="1000px">
		<tr><th>Id Pesanan</th><th>Nama Menu</th><th>Jumlah</th><th>Tanggal Pesanan</th><th>Harga</th>
	
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
			<td><?php echo 'Rp. ' .$barisdata["harga"];?></td>
		
		
		
		
			
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