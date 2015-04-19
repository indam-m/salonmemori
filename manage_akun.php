<?php

if(!isset($_COOKIE['user']))
    header("Location:login.php");
else if($_COOKIE['role'] != 1)
    header("Location:login.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Manajemen Akun</title>
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
                    <li><a href="pembukuan.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Pembukuan</a></li>
                    <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Manajemen Akun</a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-- END OF NAV BAR -->
        <div class="header">
        <font color="white"><h1>MANAJEMEN AKUN</h1></font>
        </div>
        
        <div class="box-registrasi">
            <div id="table" class="table-editable">
                <table class="table tabel-registrasi" >
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Gaji</th>
                        <th></th>
                        <th><span class="table-add glyphicon glyphicon-plus"></span></th>
                    </tr>

                    <?php include 'load_akun.php'; ?>

                    <!-- This is our clonable table line -->
                    <tr class="hide">
                        <td contenteditable="true" class="nama">Ketik di sini</td>
                        <td contenteditable="true" class="username">Ketik di sini</td>
                        <td contenteditable="true" class="password">Ketik di sini</td>
                        <td contenteditable="true" class="role">Ketik di sini</td>
                        <td contenteditable="true" class="gaji">Ketik di sini</td>
                        <td><span class="table-remove glyphicon glyphicon-remove"></span></td>
                        <td><span class="table-ok glyphicon glyphicon-ok"></span></td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </body>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/akun2.js"></script>
</html>