<?php

include 'connectdb.php';

$username = $_POST['username'];
$password = $_POST['password'];

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$result = mysql_query("SELECT * FROM karyawan WHERE username='$username' AND password='$password'");

$count = mysql_num_rows($result);

if($count == 1){

	setcookie("user", $username, time() + 86400, "/");
	$therole = mysql_query("SELECT * FROM manager WHERE username='$username'");

	//jika manager
	if(mysql_num_rows($therole) == 1){
		setcookie("role", 1, time() + 86400, "/");
		header("location: pembukuan.php");
	}
	else{ //jika kasir
		setcookie("role", 2, time() + 86400, "/");
		header("location: registrasi.php");
	}
	//session_register("role");
}
else{
	include 'login.php';
	echo '
		<script type="text/javascript">
			alert("Username atau password salah");
		</script>
	';
}

?>