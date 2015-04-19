<?php

$name = $_POST['name'];

include 'connectdb.php';

$insertpesanan = mysql_query("INSERT INTO pesanan (nama_pelanggan, status) VALUES ('$name', 0)") or die(mysql_error());

$listing = mysql_query("SELECT * FROM layanan") or die(mysql_close());
while($row = mysql_fetch_assoc($listing)){
	$nama = $row['nama'];
	if(isset($_POST[''.$nama.''])){
		$id = $_POST[''.$nama.''];
		$inserting = mysql_query("INSERT INTO pesanan_layanan (nama_pelanggan, id_layanan) VALUES ('$name', '$id')") or die(mysql_error());
	}
}

mysql_close();

header("location: registrasi.php");

?>