<div class="box-registrasi">
    <table class="table tabel-registrasi">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Jenis Layanan</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include('connectdb.php');
            $pesanan= mysql_query("SELECT *, SUM(biaya) as jumlah FROM pesanan NATURAL JOIN pesanan_layanan NATURAL JOIN layanan WHERE id = id_layanan AND status = FALSE GROUP BY nama_pelanggan ORDER BY id_layanan DESC") or die(mysql_error());
            while($row = mysql_fetch_assoc($pesanan)){
                $nama = $row['nama_pelanggan'];
                $biaya = $row['jumlah'];
                $pelayanan = mysql_query("SELECT nama FROM pesanan_layanan NATURAL JOIN layanan WHERE nama_pelanggan='$nama' AND id = id_layanan") or die(mysql_error());

                echo '
                <tr>
                    <td>'.date('d-m-Y').'</td>
                    <td>'.$nama.'</td>
                    <td>';
                while($rowpelayanan = mysql_fetch_assoc($pelayanan)){
                    echo $rowpelayanan['nama'].'<br>';
                }
                echo '
                    </td>
                    <td>'.$biaya.'</td>
                    <td><span class="glyphicon glyphicon-ok status-pelayanan" onclick="return selesaiLayanan(\''.$nama.'\', '.$biaya.');" ></span></td>
                </tr>';
            }
            mysql_close();
        ?>
        </tbody>
    </table>
</div>