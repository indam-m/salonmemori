<?php

include 'connectdb.php';

$id = $_POST['id'];
$tipe = 'pemasukan';
if($_POST['tipe'] == 1)
	$tipe = 'pengeluaran';

$delete = mysql_query("DELETE FROM $tipe WHERE id='$id'") or die(mysql_error());

mysql_close();

?>