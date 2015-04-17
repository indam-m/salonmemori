<?php

include 'connectdb.php';

$user = $_POST['username'];
$role = $_POST['role'];
$role2 = "kasir";
if($role == "Manajer")
	$role2 = "manager";

$delete = mysql_query("UPDATE karyawan NATURAL JOIN $role2 SET status=0 WHERE username='$user'") or die(mysql_error());

mysql_close();

?>