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
        <link type="text/css" href="assets/css/my-css.css" rel="stylesheet" />
        <link type="text/css" href="assets/css/bootstrap.css" rel="stylesheet" />
    </head>

    <body class="background" onload="loadPembukuan();">
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
                    <li><a href="manage_akun.php"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Manajemen Akun</a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
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
                    <input type="radio" name="options" id="option2" autocomplete="off" value="semua" checked onclick="loadPembukuan()">
                    &nbsp;Tampilkan Semua Tanggal
                    <!-- <span class="glyphicon glyphicon-ok"></span> -->
                </label>
                </th>
                <th class="narrow-width">&nbsp;</th>
                <th>
                <label class="btn btn-info">
                    <input type="radio" name="options" id="option2" value="tidak" autocomplete="off" onclick="pembukuanTanggal()">
                    <!-- <span class="glyphicon glyphicon-ok"></span> -->
                    &nbsp;Ambil Tanggal Tertentu
                </label>
                </th>
                
                <th><input type="text" id="datepicker" name="tgl1" class="form-control transparent-input-field" placeholder="Tanggal Awal"></th>
                <th class="narrow-width"><center><font color="white">s.d.</font></center></th>
                <th><input type="text" id="datepicker2" name="tgl2" class="form-control transparent-input-field" placeholder="Tanggal Akhir"></th>
                <th>&nbsp;&nbsp;&nbsp;&nbsp;<label class="btn btn-warning float-right"><a href="https://dl.dropboxusercontent.com/s/9ydbtp5fjb5hce4/Pembukuan_Memori.pdf?dl=0">Buat Laporan Pembukuan</a></label></th>
                </table>
                </div>
            </div>
            </form>
            </div>
            <!-- END OF RADIO BUTTON -->
            <div id="page-inner">
            </div>
            
    </body>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/script-pembukuan.js"></script>
    <script src="assets/js/datepicker.js"></script>   
    <link rel="stylesheet" href="assets/css/datepicker.css">
</html>