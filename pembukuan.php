<?php

if(!isset($_COOKIE['user']))
    header("Location:login.php");
else if($_COOKIE['role'] != 1)
    header("Location:login.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Pembukuan</title>
        <link href="assets/css/my-css.css" rel="stylesheet" />
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
    </head>

    <body class="background">
        <!-- NAV BAR -->
        <nav role="navigation" class="navbar navbar-inverse">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">Memory Information System</a>
            </div>
            <!-- Collection of nav links, forms, and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Pembukuan</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Manajemen Akun</a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-- END OF NAV BAR -->
        <div class="header">
        <font color="white"><h1>PEMBUKUAN KEUANGAN</h1></font>
        </div>
        
        <div class="box-registrasi">
            
            <div class="radio-wrapper">
            <!-- RADIO BUTTON -->
            <form>
            <div class="btn-group" data-toggle="buttons">
                <div class="row">
                <table class="tabel-radio">
                <th>
                <label class="btn btn-success active">
                    <input type="radio" name="options" id="option2" autocomplete="off" checked>
                    &nbsp;Tampilkan Semua Tanggal
                    <!-- <span class="glyphicon glyphicon-ok"></span> -->
                </label>
                </th>
                <th class="narrow-width">&nbsp;</th>
                <th>
                <label class="btn btn-info">
                    <input type="radio" name="options" id="option2" autocomplete="off">
                    <!-- <span class="glyphicon glyphicon-ok"></span> -->
                    &nbsp;Ambil Tanggal Tertentu
                </label>
                </th>
                
                <th><input type="text" id="datepicker" class="form-control transparent-input-field" placeholder="Tanggal Awal"></th>
                <th class="narrow-width"><center><font color="white">s.d.</font></center></th>
                <th><input type="text" id="datepicker2" class="form-control transparent-input-field" placeholder="Tanggal Akhir"></th>
                </table>
                </div>
            </div>
            </form>
            </div>
            <!-- END OF RADIO BUTTON -->

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
                            $pemasukan= mysql_query("SELECT *, DATE_FORMAT(tanggal, '%d-%m-%Y') as _tanggal FROM pemasukan ORDER BY tanggal DESC") or die(mysql_error());
                            while($row = mysql_fetch_assoc($pemasukan)){
                                $keterangan = $row['keterangan'];
                                $nominal = $row['nominal'];
                                $tanggal = $row['_tanggal'];
                                echo "<tr>";
                                echo "<td contenteditable=\"true\">" .$tanggal. "</td>";
                                echo "<td contenteditable=\"true\">" .$keterangan. "</td>";
                                echo "<td contenteditable=\"true\">" .$nominal. "</td>";
                                echo "<td>";
                                echo "<span class=\"table-remove glyphicon glyphicon-remove\"></span>";
                                echo "</td>";
                                echo "<td>";
                                echo "<span class=\"table-ok glyphicon glyphicon-ok\"></span>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            mysql_close();
                        ?>
                        <tr class="hide">
                            <td contenteditable="true">
                                    <?php
                                        date_default_timezone_set('UTC');
                                        echo date('d-m-Y');
                                    ?>
                            </td>
                            <td contenteditable="true">Ketik di sini</td>
                            <td contenteditable="true">Ketik di sini</td>
                            <td><span class="table-remove glyphicon glyphicon-remove"></span></td>
                            <td><span class="table-ok glyphicon glyphicon-ok"></span></td>
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
                            $pengeluaran= mysql_query("SELECT *, DATE_FORMAT(tanggal, '%d-%m-%Y') as _tanggal FROM pengeluaran ORDER BY tanggal DESC") or die(mysql_error());
                            while($row = mysql_fetch_assoc($pengeluaran)){
                                $keterangan = $row['keterangan'];
                                $nominal = $row['nominal'];
                                $tanggal = $row['_tanggal'];
                                echo "<tr>";
                                echo "<td contenteditable=\"true\">" .$tanggal. "</td>";
                                echo "<td contenteditable=\"true\">" .$keterangan. "</td>";
                                echo "<td contenteditable=\"true\">" .$nominal. "</td>";
                                echo "<td>";
                                echo "<span class=\"table-remove glyphicon glyphicon-remove\"></span>";
                                echo "</td>";
                                echo "<td>";
                                echo "<span class=\"table-ok glyphicon glyphicon-ok\"></span>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            mysql_close();
                        ?>
                        <tr class="hide">
                            <td contenteditable="true">
                                <?php
                                    date_default_timezone_set('UTC');
                                    echo date('d-m-Y');
                                ?>
                            </td>
                            <td contenteditable="true">Ketik di sini</td>
                            <td contenteditable="true">Ketik di sini</td>
                            <td><span class="table-remove glyphicon glyphicon-remove"></span></td>
                            <td><span class="table-ok glyphicon glyphicon-ok"></span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- END OF TABEL PENGELUARAN -->
        </div>
        </div>
    </body>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/script-pembukuan.js"></script>
    <script src="assets/js/datepicker.js"></script>  
    <link rel="stylesheet" href="assets/css/datepicker.css">
</html>