<?php
	
	include 'connectdb.php';

	$nama = $_GET['nama'];
	$biaya = $_GET['biaya'];
	$kasir = $_COOKIE['user'];
	date_default_timezone_set('UTC');
	$tanggal = date('Y-m-d');
	$ket = "Pelayanan jasa";

	$up_pesanan = mysql_query("UPDATE pesanan SET status=1 WHERE nama_pelanggan='$nama'") or die(mysql_error());

	$insert_m = mysql_query("INSERT INTO pemasukan (keterangan, nominal, tanggal, username_kasir, nama_pelanggan) VALUES ('$ket', '$biaya', '$tanggal', '$kasir', '$nama')")  or die(mysql_error());

	mysql_close();

	require 'loadregistrasi.php';
?>