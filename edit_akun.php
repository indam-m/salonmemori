<?php

include 'connectdb.php';

$user = $_POST['username'];
$name = $_POST['name'];
$password = $_POST['password'];
$role = $_POST['role'];
$role2 = "kasir";
if($role == "Manajer")
	$role2 = "manager";
$gaji = $_POST['gaji'];

$isexist = mysql_query("SELECT * FROM karyawan WHERE username='$user'") or die(mysql_error());

if(mysql_num_rows($isexist) == 0){
	$insert = mysql_query("INSERT INTO karyawan (`username`, `password`, `nama`, `gaji`, `status`) VALUES ('$user', '$password', '$name', '$gaji', 1)") or die(mysql_error());
	$insert2 = mysql_query("INSERT INTO $role2 (`username`) VALUES ('$user')") or die(mysql_error());
}
else{
	$update = mysql_query("UPDATE karyawan SET nama='$name', password='$password', gaji='$gaji' WHERE username='$user'") or die(mysql_error());

	$ismanager = mysql_query("SELECT * FROM manager WHERE username='$user'") or die(mysql_error());
	if(mysql_num_rows($ismanager) == 1){
		if($role2 == 'kasir'){
			$deletemanager = mysql_query("DELETE FROM manager WHERE username='$user'") or die(mysql_error());
			$addkasir = mysql_query("INSERT INTO kasir (username) VALUES ('$user')") or die(mysql_error());
		}
	}
	else{
		if($role2 == 'manager'){
			$deletekasir = mysql_query("DELETE FROM kasir WHERE username='$user'") or die(mysql_error());
			$addmanager = mysql_query("INSERT INTO manager (username) VALUES ('$user')") or die(mysql_error());
		}
	}
}

//$upp = mysql_query("UPDATE karyawan SET nama='agiagi' WHERE username='Ketik di sini'");

mysql_close();

?>