<?php
session_start();
include 'includes/connection.php';
$error = "";
if (isset($_POST["submit"])) {
    $email = htmlentities(trim(addslashes($_POST["mail"])));
  

    $get_rec = mysqli_query($conn, "select * from login where username='$email' and status='active' ");

    if (mysqli_num_rows($get_rec) > 0) {
        $row = mysqli_fetch_array($get_rec);
        $email = $row["mail"];
    } else {
        $error = "Wrong email entered,please try again. if error persist please contact system administrator";
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Password Recovery |<?php echo $sitename; ?> </title>
        <!--/tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="icon" href="images/LOG.jpg" type="image/png">
        <meta name="keywords" content="Soft Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript">
            addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
            window.scrollTo(0, 1);
            }
        </script>

        <style type="text/css">
            .input{
                border-radius: 1px;
                width: 98%;
                height:40px;
                margin: 10px;
                border-top-color: #008d4c;
                border-bottom-right-radius: 10px;
                border-top-left-radius: 10px;
                border: 0.01em solid grey;
                padding-left: 10px;
            }

            .img{
                height:10%;
                width: 20%;
            }
        </style>
        <!--//tags -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

        <link href="css/font-awesome.css" rel="stylesheet">
        <!-- //for bootstrap working -->
        <link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
              rel='stylesheet' type='text/css'>
    </head>

    <body>
        <!-- header -->
        <?php
        include 'includes/header.php';
        ?>
        <!--/.navbar-collapse-->
        <!--/.navbar-->

        <!-- banner -->
        <!-- banner -->

        <!--//banner -->
        <!--/w3_short-->

        <!--//banner -->
        <div class="inner_content_info_agileits">
            <div class="container">

                <div class="inner_sec_grids_info_w3ls">
                    <div style="margin-left: 10%; margin-right: 10%;" class="col-md-10 tab_grid_prof ">
                        <?php
                        if ($error != "") {
                            ?>
                            <div style="background-color: orange; z-index: -156;  border-bottom-right-radius: 30px; padding: 10px; border-top-left-radius: 30px;">
                                <?php echo $error; ?>
                            </div>
                            <?php
                        }
                        ?>
                        <h3 style="text-align:center; font-family: serif; color: #00a65a;"><img class="img" src="images/recover.png" /><br>Password Recovery</h3>
                        <div class="w3layouts_mail_gridi">
                            <form action="" method="post">
                                <div class="col-md-12  form-group wthree_contact_left_grid">
                                    Please enter the email address for your account. A verification code will be sent to you. Once you have received the verification code, you will be able to choose a new password for your account.
                                </div>
                                <div  class="col-md-12 form-group wthree_contact_left_grid">
                                    <input class="input form-group" type="email" name="mail" placeholder="Enter Email" required="">
                                </div>                                   
                                <div class="col-md-6 wthree_contact_right_grid">
                                    <input style="background-color: #00a65a"  class="btn btn-block btn-primary btn-toolbar" type="submit" name="submit" value="Send Verification Code">
                                </div>
                                <div class="clearfix"> </div>
                            </form>

                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>



        <!-- footer -->
        <?php
        include 'includes/footer.php';
        ?>
        <!-- //footer -->

        <a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
        <!-- js -->
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>

</html>