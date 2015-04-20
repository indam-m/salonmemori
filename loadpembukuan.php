<div class="row">
    <!-- TABEL PEMASUKAN -->
    <div class="col-md-6">
        <table class="table tabel-registrasi">
            <thead>
                <th><h3>Total Pemasukan</h3></th>
                <?php
                    include('connectdb.php');
                    $pemasukan= mysql_query("SELECT SUM(nominal) as total FROM pemasukan") or die(mysql_error());
                    while($row = mysql_fetch_assoc($pemasukan)){
                        $total = $row['total'];
                    }
                    mysql_close();
                    echo "<th><h3>" .$total. "</h3></th>"
                ?>
            </thead>
        </table>
        
        <div id="table" class="table-editable">
            <table class="table tabel-registrasi" id="table-pemasukan">
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Pemasukan</th>
                    <th></th>
                    <th><span class="table-add-pemasukan glyphicon glyphicon-plus"></span></th>
                </tr>
                <!-- This is our clonable table line -->
                <?php
                    include('connectdb.php');
                    $pemasukan= mysql_query("SELECT *, DATE_FORMAT(tanggal, '%d-%m-%Y') as _tanggal FROM pemasukan ORDER BY tanggal ASC, id ASC") or die(mysql_error());
                    while($row = mysql_fetch_assoc($pemasukan)){
                        $keterangan = $row['keterangan'];
                        $nominal = $row['nominal'];
                        $tanggal = $row['_tanggal'];
                        $id = $row['id'];
                        echo "<tr id=".$id.">";
                        echo "<td contenteditable=\"true\" class='tanggal'>" .$tanggal. "</td>";
                        echo "<td contenteditable=\"true\" class='keterangan'>" .$keterangan. "</td>";
                        echo "<td contenteditable=\"true\" class='nominal'>" .$nominal. "</td>";
                        echo "<td>";
                        echo "<span class=\"table-remove-pemasukan glyphicon glyphicon-remove\"></span>";
                        echo "</td>";
                        echo "<td>";
                        echo "<span class=\"table-ok-pemasukan glyphicon glyphicon-ok\"></span>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    mysql_close();
                ?>
                <tr id="0" class="hide" >
                    <td contenteditable="true" class="tanggal"><?php date_default_timezone_set('UTC');echo date('d-m-Y'); ?></td>
                    <td contenteditable="true" class="keterangan">Ketik di sini</td>
                    <td contenteditable="true" class="nominal">Ketik di sini</td>
                    <td><span class="table-remove-pemasukan glyphicon glyphicon-remove"></span></td>
                    <td><span class="table-ok-pemasukan glyphicon glyphicon-ok"></span></td>
                </tr>
            </table>
        </div>
    </div>
    <!-- END OF  TABEL PEMASUKAN -->

    <!-- TABEL PENGELUARAN -->
    <div class="col-md-6">
        <table class="table tabel-registrasi">
            <thead>
                <th><h3>Total Pengeluaran</h3></th>
                <?php
                    include('connectdb.php');
                    $pengeluaran= mysql_query("SELECT SUM(nominal) as total FROM pengeluaran") or die(mysql_error());
                    while($row = mysql_fetch_assoc($pengeluaran)){
                        $total = $row['total'];
                    }
                    mysql_close();
                    echo "<th><h3>" .$total. "</h3></th>"
                ?>
            </thead>
        </table>
        
        <div id="table" class="table-editable">
            <table class="table tabel-registrasi" id="table-pengeluaran">
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Pengeluaran</th>
                    <th></th>
                    <th><span class="table-add-pengeluaran glyphicon glyphicon-plus"></span></th>
                </tr>
                <!-- This is our clonable table line -->
                <?php
                    include('connectdb.php');
                    $pengeluaran= mysql_query("SELECT *, DATE_FORMAT(tanggal, '%d-%m-%Y') as _tanggal FROM pengeluaran ORDER BY tanggal ASC, id ASC") or die(mysql_error());
                    while($row = mysql_fetch_assoc($pengeluaran)){
                        $keterangan = $row['keterangan'];
                        $nominal = $row['nominal'];
                        $tanggal = $row['_tanggal'];
                        $id = $row['id'];
                        echo "<tr id=".$id.">";
                        echo "<td contenteditable=\"true\" class=\"tanggal\">" .$tanggal. "</td>";
                        echo "<td contenteditable=\"true\" class=\"keterangan\">" .$keterangan. "</td>";
                        echo "<td contenteditable=\"true\" class=\"nominal\">" .$nominal. "</td>";
                        echo "<td>";
                        echo "<span class=\"table-remove-pengeluaran glyphicon glyphicon-remove\"></span>";
                        echo "</td>";
                        echo "<td>";
                        echo "<span class=\"table-ok-pengeluaran glyphicon glyphicon-ok\"></span>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    mysql_close();
                ?>
                
                <tr id="0" class="hide" >
                    <td contenteditable="true" class="tanggal"><?php date_default_timezone_set('UTC');echo date('d-m-Y'); ?></td>
                    <td contenteditable="true" class="keterangan">Ketik di sini</td>
                    <td contenteditable="true" class="nominal">Ketik di sini</td>
                    <td><span class="table-remove-pengeluaran glyphicon glyphicon-remove"></span></td>
                    <td><span class="table-ok-pengeluaran glyphicon glyphicon-ok"></span></td>
                </tr>
            </table>
        </div>
    </div>
    <!-- END OF TABEL PENGELUARAN -->
</div>

