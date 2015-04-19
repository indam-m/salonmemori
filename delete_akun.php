<?php

include 'connectdb.php';

$user = $_POST['username'];

$delete = mysql_query("UPDATE karyawan SET status=0 WHERE username='$user'") or die(mysql_error());

mysql_close();

?>