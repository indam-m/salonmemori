<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Login</title>
        <link href="assets/css/my-css.css" rel="stylesheet" />
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
    </head>

    <body class="background">
		<div class="logo">
			<h1>Memory Salon</h1>
			<p>Expensive Quality with Cheap Price</p>
		</div>
        <article class="glass">
            <font color="white">
                <h1>Log In Here</font-color></h1>
                <p>Mohon setiap <i>field</i> diisi </p> <hr color="white" />
            
                <form method="post" action="check_login.php">

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon transparent-input-field"><i class="glyphicon glyphicon-user"></i></span>
                    <input required id="login-username" type="text" class="form-control transparent-input-field" name="username" value="" placeholder="Username">                                        
                </div>
            
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon transparent-input-field"><i class="glyphicon glyphicon-lock"></i></span>
                    <input required id="login-password" type="password" class="form-control transparent-input-field" name="password" placeholder="Password">
                </div>
            
                <!--<a href="#"><div class="float-right dark-button"></div></a>-->
                <input type="submit" name="submit" value="" class="float-right dark-button">

                </form>

            </font>
        </article>
    </body>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</html>