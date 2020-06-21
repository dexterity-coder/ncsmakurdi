<?php
session_start();
include '../includes/connection.php';
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $get_rc = mysqli_query($conn, "select * from login where username='$email' and password='$password'");
    $num_rows = mysqli_num_rows($get_rc);
    if ($num_rows > 0) {
        $row = mysqli_fetch_array($get_rc);
        $_SESSION["userid"] = $row["username"];
        $_SESSION["urole"] = $row["role"];
        if ($row["role"] == "admin") {
            $_SESSION["userid"] = $row["username"];
            $_SESSION["urole"] = $row["role"];
            header("location:index.php");
        } else {
            $_SESSION["userid"] = $row["username"];
            $_SESSION["urole"] = $row["role"];
            header("location:index1.php");
        }
    } else {
        echo "<script>alert('Incorrect username or password, please check and try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $sitename; ?> | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Admin</b></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="" method="post">
                    <div class="form-group has-feedback">
                        <input name="email" type="text" class="form-control" placeholder="Email"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input name="password" type="password" class="form-control" placeholder="Password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">    
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>                        
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button name="login" type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div><!-- /.col -->
                    </div>
                </form>

                <!-- <div class="social-auth-links text-center">
                   <p>- OR -</p>
                   <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
                   <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
                 </div><!-- /.social-auth-links -->

                <!--<a href="#">I forgot my password</a><br>
                <a href="register.html" class="text-center">Register a new membership</a>-->

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>