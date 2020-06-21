<?php
session_start();
include 'includes/connection.php';

if (isset($_POST["Submit"])) {
    $name = htmlentities(addslashes($_POST["name"]));
    $phone = htmlentities(addslashes($_POST["phone"]));
    $email = htmlentities(addslashes($_POST["email"]));
    $subject = htmlentities(addslashes($_POST["subject"]));
    $message = htmlentities(addslashes($_POST["message"]));
    $date = date("Y-m-d H:m:s");
    $status = "no";

    $insert = mysqli_query($conn, "insert into contact values ('','$name','$email','$subject','$message','$date','$status')");
    if ($insert) {
        echo "<script>alert('Message submitted successfully');</script>";
    } else {
        echo "<script>alert('Operations failed, please try after some minutes')</script>";
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title><?php echo $sitename; ?> | Contact Us ?> </title>
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
        <div  class="inner_page_agile">
            <h3>Contac Us</h3>


        </div>
        <!--//banner -->
        <!--/w3_short-->
        <div class="services-breadcrumb_w3layouts">
            <div class="inner_breadcrumb">

                <ul class="short_w3ls"_w3ls>
                    <li><a href="index">Home</a><span>|</span></li>
                    <li>Contact </li>
                </ul>
            </div>
        </div>
        <!--//banner -->
        <!-- /inner_content -->
        <div class="inner_content_info_agileits">
            <div class="container">
                <div class="tittle_head_w3ls">
                    <h3 class="tittle">Contact Us</h3>
                </div>

                <div class="inner_sec_grids_info_w3ls">
                    <div class="col-md-6 agile_info_mail_img_info">
                        <div class="address-grid">
                            <h4>Contact <span>Info</span></h4>
                            <div class="mail-agileits-w3layouts">
                                <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                <div class="contact-right">
                                    <p>Telephone </p><span>+2348135087166;<br> +2347030936478,<br> +2347038892859</span>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="mail-agileits-w3layouts">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <div class="contact-right">
                                    <p>Mail </p><a href="mailto:ncsbenue@yahoo.com">ncsbenue@yahoo.com</a>
                                    <?php
                                    $a = "a";
                                    echo md5($a);
                                    ?>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="mail-agileits-w3layouts">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <div class="contact-right">
                                    <p>Location</p><span style="text-align:justify;">73, Iyorchia Ayu Road(Topmost Floor), c/o Xitech Global Services Ltd. Directly Opposite Nobis Supermarket, Wurukum Makurdi, Benue State.</span>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="agileits_w3layouts_nav_right contact">
                                <div class="social two">
                                    <ul>
                                        <li><a target="blank" href="www.facebook.com/ncsbenue"><i class="fa fa-facebook"></i></a></li>
                                        <li><a target="blank" href="www.twitter.com/ncsbenue"><i class="fa fa-twitter"></i></a></li>
                                        <li><a target="blank" href="www.youtube.com/ncsbenue"><i class="fa fa-youtube"></i></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <img src="images/LOG.jpg" width="100%" height="100%" alt="">
                    </div>
                    <div class="clearfix"> </div>
                    <div class="w3layouts_mail_grid">
                        <form action="" method="post">
                            <div class="col-md-6 wthree_contact_left_grid">
                                <input type="text" name="name" placeholder="Name" required="">
                                <input type="email" name="email" placeholder="Email" required="">
                                <input type="text" name="phone" placeholder="Telephone" required="">
                                <input type="text" name="subject" placeholder="Subject" required="">
                            </div>
                            <div class="col-md-6 wthree_contact_left_grid">
                                <textarea name="message" placeholder="Message..." required=""></textarea>
                                <input type="submit" name="Submit" value="Submit">
                            </div>
                            <div class="clearfix"> </div>

                        </form>
                    </div>


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