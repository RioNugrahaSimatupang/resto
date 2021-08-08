<?php include_once("functions.php");
session_start();

	include("connection.php");
	

	$user_data = check_login($con);?>
<!DOCTYPE html>
<html><head><title>Koki</title></head>
<body>
<center>
<h1>Data Pesanan</h1>
<a href="pesanan-koki.php">Pesanan</a> |
<a href="koki.php">Back</a>
<hr>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	$sql="SELECT a.id_pesanan,status_pesanan FROM data_pesanan a, detail_pesanan b, data_menu c
where a.id_pesanan = b.id_pesanan and c.id_menu=b.id_menu 
group by id_pesanan;";
	$res=$db->query($sql);
	if($res){
		?>
		Hello, <?php echo $user_data['username']; ?>
		<br>
		<table border="1" width="1000px">
		<tr><th>Id Pesanan</th><th>Status Pesanan</th>
		<th width="110px">Action</th>
			</tr>
		<?php
		$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
		foreach($data as $barisdata){ // telusuri satu per satu
			?>
			<tr>
			<td><?php echo $barisdata["id_pesanan"];?></td>
			<td><?php echo $barisdata["status_pesanan"];?></td>
		
		
			<td><a href="pesanan-selesai.php?id_pesanan=<?php echo $barisdata["id_pesanan"];?>"><button>Selesai</button></a> 
			<a href="pesanan-cek.php?id_pesanan=<?php echo $barisdata["id_pesanan"];?>"><button>Cek</button></a> 
			
			</tr>
			<?php
		}
		?>
		</table>
		<a href="logout.php">Logout</a>
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
