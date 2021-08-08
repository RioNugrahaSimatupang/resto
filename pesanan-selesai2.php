<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Data Pegawai</title></head>
<body>
<center>
<h1>Update Data Pegawai</h1>
<?php
		if (isset($_POST["TblUpdate"])) { $db = dbConnect();
		if ($db->connect_errno == 0) {
	// Bersihkan data
		$id_pesanan = $db->escape_string($_POST["id_pesanan"]);
		
	// Susun query update
		$sql = "update data_pesanan set status_pesanan='Selesai' where id_pesanan = $id_pesanan";
	// Eksekusi query update
		$res = $db->query($sql);
		if ($res) {
		if ($db->affected_rows > 0) { // jika ada update data
?>
Data updated successfully.<br>
	<a href="pesanan-koki.php"><button>Kembali Ke Pesanan</button></a>
<?php
	} else { // Jika sql sukses tapi tidak ada data yang berubah
?>
The data was successfully updated but without any data changes.<br>
	<br>
	<a href="javascript:history.back()"><button>Edit Again</button></a> 
	<a href="pesanan-koki.php"><button>Kembali Ke Pesanan</button></a>
<?php
} } else { // gagal query
?>
Data failed to update.
<br>
	<a href="javascript:history.back()"><button>Edit Again</button></a>
<?php
} } else
	echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>"; }
?>
</body>
</html>