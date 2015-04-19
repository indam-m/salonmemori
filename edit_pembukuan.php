<?php

$tipe = $_POST['tipe'];
$id = $_POST['id'];
$nominal = $_POST['nominal'];
$keterangan = $_POST['keterangan'];
$tanggal = $_POST['tanggal'];
$tanggal = date_format(date_create_from_format('d-m-Y', $tanggal), 'Y-m-d');

include 'connectdb.php';


if($id==0){
    if($tipe == 0){
        $adding = mysql_query("INSERT INTO pemasukan (keterangan, nominal, tanggal) VALUES ('$keterangan', '$nominal', '$tanggal')") or die (mysql_error());
    }
    else{
        $m_user = $_COOKIE['user'];
        $adding = mysql_query("INSERT INTO pengeluaran (keterangan, nominal, tanggal, username_manager) VALUES ('$keterangan', '$nominal', '$tanggal', '$m_user')") or die (mysql_error());
    }
}
else{
    $tipe2 = 'pemasukan';
    if($tipe == 1)
        $tipe2 = 'pengeluaran'; 
    $updating = mysql_query("UPDATE $tipe2 SET keterangan='$keterangan', nominal='$nominal', tanggal='$tanggal' WHERE id='$id'") or die (mysql_error());
}

mysql_close();

?>