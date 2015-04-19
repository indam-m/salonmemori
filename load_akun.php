<?php

include 'connectdb.php';

$akuns = mysql_query("SELECT * FROM manager NATURAL JOIN karyawan WHERE status=1") or die (mysql_error());

while($row = mysql_fetch_assoc($akuns)){

	$nama = $row['nama'];
	$user = $row['username'];
	$password = $row['password'];
	$role = "Manajer";
	$gaji = $row['gaji'];

	echo'
		<tr>
		    <td contenteditable="true" class="nama">'.$nama.'</td>
		    <td class="username">'.$user.'</td>
		    <td contenteditable="true" class="password">'.$password.'</td>
		    <td contenteditable="true" class="role">'.$role.'</td>
		    <td contenteditable="true" class="gaji">'.$gaji.'</td>
		    <td><span class="table-remove glyphicon glyphicon-remove"></span></td>
		    <td><span class="table-ok glyphicon glyphicon-ok"></span></td>
		</tr>
	';
}

$akuns2 = mysql_query("SELECT * FROM kasir NATURAL JOIN karyawan WHERE status=1") or die (mysql_error());

while($row = mysql_fetch_assoc($akuns2)){

	$nama = $row['nama'];
	$user = $row['username'];
	$password = $row['password'];
	$role = "Kasir";
	$gaji = $row['gaji'];

	echo'
		<tr>
		    <td contenteditable="true" class="nama">'.$nama.'</td>
		    <td class="username">'.$user.'</td>
		    <td contenteditable="true" class="password">'.$password.'</td>
		    <td contenteditable="true" class="role">'.$role.'</td>
		    <td contenteditable="true" class="gaji">'.$gaji.'</td>
		    <td><span class="table-remove glyphicon glyphicon-remove"></span></td>
		    <td><span class="table-ok glyphicon glyphicon-ok"></span></td>
		</tr>
	';
}

mysql_close();

?>