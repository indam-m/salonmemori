<?php

if(($_GET['search']) == '')
	header("location: loadregistrasi.php");

else{

$search = $_GET['search'];

include('connectdb.php');
$pesanan= mysql_query("SELECT *, SUM(biaya) as jumlah FROM pesanan NATURAL JOIN pesanan_layanan NATURAL JOIN layanan WHERE id = id_layanan AND status = FALSE AND nama_pelanggan LIKE '%$search%' GROUP BY nama_pelanggan ORDER BY nama_pelanggan ASC") or die(mysql_error());

echo '<div class="header"><font color="white"><h2>';
if(mysql_num_rows($pesanan) > 0)
	echo '<div class="search-result-found">Hasil pencarian \''.$search.'\' </div>';
else
	echo '<div class="search-result-not-found">Tidak ada hasil pencarian \''.$search.'\' </div>';

echo'
</h2></font></div>

<div class="box-registrasi">
    <table class="table tabel-registrasi">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Jenis Layanan</th>
                <th>Harga</th>
                <th style="text-align:center">Status</th>
            </tr>
        </thead>
        <tbody>';
        while($row = mysql_fetch_assoc($pesanan)){
            $nama = $row['nama_pelanggan'];
            $biaya = $row['jumlah'];
            $pelayanan = mysql_query("SELECT nama FROM pesanan_layanan NATURAL JOIN layanan WHERE nama_pelanggan='$nama' AND id = id_layanan") or die(mysql_error());

            echo '
            <tr>
                <td valign="middle">'.date('d-m-Y').'</td>
                <td valign="middle">'.$nama.'</td>
                <td>';
            while($rowpelayanan = mysql_fetch_assoc($pelayanan)){
                echo $rowpelayanan['nama'].'<br>';
            }
            echo '
                </td>
                <td valign="middle">'.$biaya.'</td>
                <td valign="middle" align="center"><span class="glyphicon glyphicon-ok status-pelayanan" onclick="return selesaiLayanan(\''.$nama.'\', '.$biaya.');" ></span></td>
            </tr>';
        }
        mysql_close();
echo '
        </tbody>
    </table>
</div>';

}
?>