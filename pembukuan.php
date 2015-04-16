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
                <form role="search" class="navbar-form navbar-left">
                    <span class="right-inner-addon">
                        <i class="form-control-feedback glyphicon glyphicon-search"></i>
                        <input type="text" placeholder="Search" class="form-control search-input">
                    </span>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" id="popup" onclick="div_show()"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah Registrasi</a></li>
                </ul>
            </div>
        </nav>
        <!-- END OF NAV BAR -->
        
        <font color="white"><h1>&nbsp;&nbsp;PEMBUKUAN KEUANGAN</h1></font>
        
        <div class="box-registrasi">
            <!-- RADIO BUTTON -->
            <form>
            <div class="btn-group" data-toggle="buttons">
                <div class="row">
                <div class="col-md-4"></div>
                
                <div class="col-md-1">
                <label class="btn btn-success active">
                    <input type="radio" name="options" id="option2" autocomplete="off" checked>
                    <span class="glyphicon glyphicon-ok"></span>
                </label>
                </div>
                
                <div class="col-md-1">
                <label class="btn btn-info">
                    <input type="radio" name="options" id="option2" autocomplete="off">
                    <span class="glyphicon glyphicon-ok"></span>
                </label>
                </div>
                <div class="col-md-2">
                <input type="text" id="datepicker" class="form-control transparent-input-field" placeholder="Tanggal Awal">
                </div>
                <div class="col-md-2">
                <font color="white">&nbsp;Sampai dengan&nbsp;</font>
                </div>
                <div class="col-md-2">
                <input type="text" id="datepicker2" class="form-control transparent-input-field" placeholder="Tanggal Akhir">
                </div>
                
                </div>
            </div>
            </form>
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
                        </tr>
                    </table>
                </div>

                <button id="export-btn" class="btn btn-primary">Export Data</button>
                <p id="export"></p>
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
                            <td>
                                <span class="table-remove glyphicon glyphicon-remove"></span>
                            </td>
                        </tr>
                    </table>
                </div>

                <button id="export-btn" class="btn btn-primary">Export Data</button>
                <p id="export"></p>
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