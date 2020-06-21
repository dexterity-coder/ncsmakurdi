<?php
session_start();
include 'includes/connection.php';
$content_id = isset($_GET["read"]) ? base64_decode($_GET["read"]) : "";
$row = mysqli_fetch_array(mysqli_query($conn, "select * from blog where blog_id='$content_id'")) or die(mysqli_error($conn));
$title = $row["topic"];
$writter = $row["author"];
$msg = $row["message"];
$type = $row["type"];
$image = $row["img"];
$date = date_format(date_create($row["date"]), "d M Y H:i A");
$blogid = $row["blog_id"];
$comments = mysqli_query($conn, "select * from comments where blog_id='$blogid' order by date desc");
$num_of_comments = mysqli_num_rows($comments);



if (isset($_POST["submit"])) {
    $name = htmlentities(addslashes($_POST["name"]));
    $msg = htmlentities(addslashes($_POST["message"]));
    $comm_date = date("Y-m-d H:m:s");

    $insert = mysqli_query($conn, "insert into comments values ('','$blogid','$name','$msg','$comm_date')");
    if ($insert) {
        $id = $_GET['read'];
        echo "<script>alert('Comment Posted Succesfully'); window.location.href='content?read=$id'</script>";
    } else {
        echo "<script>alert('Operations failed, please try after some minutes')</script>";
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title><?php echo $sitename; ?> | <?php echo $title; ?> </title>
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
        <div style="background-image:url('admin/media/blog_images/<?php echo $image; ?>'); width:100%; height:100%;" class="inner_page_agile">
            <h3><?php echo $title; ?></h3>


        </div>
        <!--//banner -->
        <!--/w3_short-->
        <div class="services-breadcrumb_w3layouts">
            <div class="inner_breadcrumb">

                <ul class="short_w3ls"_w3ls>
                    <li><a href="index">Home</a><span>|</span></li>
                    <li>Content</li>
                </ul>
            </div>
        </div>
        <!--//banner -->
        <div class="inner_content_info_agileits">
            <div class="container">

                <div class="inner_sec_grids_info_w3ls">
                    <div class="col-md-8 tab_grid_prof job_info_left">
                        <div class="  single-left1">
                            <img  src="admin/media/blog_images/<?php echo $image; ?>" style=" width:100%; height:100%;" alt=" " class="img-responsive" />
                            <h3 style="text-align:center;"><?php echo $title; ?></h3>
                            <ul>
                                <li><span class="fa fa-user" aria-hidden="true"></span><a href="content?read=<?php echo base64_encode($blogid); ?>"><?php echo $writter; ?></a></li>
                                <li><span class="fa fa-tag" aria-hidden="true"></span><a href="content?read=<?php echo base64_encode($blogid); ?>"><?php echo $date; ?></a></li>
                                <li><span class="fa fa-envelope-o" aria-hidden="true"></span><a href="content?read=<?php echo base64_encode($blogid); ?>"><?php
                                        if ($num_of_comments < 1) {
                                            echo 0;
                                        } else {
                                            echo $num_of_comments;
                                        }
                                        ?> Comments</a></li>
                            </ul>
                            <p style="text-align: justify;"><?php echo html_entity_decode($msg); ?></a></p>
                        </div>
                        <p ><b>Comment(s):</b></p>

                        <?php
                        while ($com = mysqli_fetch_array($comments)) {
                            $comentid = $com["comment_id"];
                            $bl_id = $com["blog_id"];
                            $fullname = $com["fullname"];
                            $com_msg = $com["comment"];
                            $comm_date = date_format(date_create($com["date"]), "d M Y H:i A");
                            ?>
                            <div style="border-radius:34px;" class="tab_grid_prof">                          
                                <div class="col-sm-9">
                                    <div class="location_box1">
                                        <span class="m_2_prof"><?php echo $fullname; ?> &nbsp; <small style="color:#01010f;"><?php echo $comm_date; ?></small></span>
                                        <p><?php echo html_entity_decode(addslashes($com_msg)); ?></p>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                            <?php
                        }
                        ?>

                        <div class="w3layouts_mail_grid">
                            <form action="" method="post">
                                <div class="col-md-12 wthree_contact_left_grid">
                                    <input type="text" name="name" placeholder="Name" required="">
                                </div>
                                <div class="col-md-12 wthree_contact_left_grid">
                                    <textarea name="message" placeholder="Enter comment..." required=""></textarea>
                                </div>
                                <div class="col-md-6 wthree_contact_left_grid">
                                    <input type="submit" name="submit" value="comment">
                                </div>
                                <div class="clearfix"> </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 job_info_right">
                        <div class="widget_search">
                            <img src="images/LOG.jpg" alt="">
                        </div>
                        <div class="widget_search">
                            <h5 class="widget-title">Like us on Facebook</h5>
                            <div class="widget-content">

                            </div>
                        </div>
                        <div class="col_3 permit">
                            <h3 style="text-align:center; text-decoration: underline;">Trending Topics</h3>
                            <ul class="list_2">
                                <?php
                                $get_recents_content = mysqli_query($conn, "select * from blog order by date desc limit 10") or die(mysqli_error($conn));
                                while ($row1 = mysqli_fetch_array($get_recents_content)) {
                                    $blog_id = $row1["blog_id"];
                                    $topic = $row1["topic"];
                                    ?>
                                    <li >
                                        <a  href="content?read=<?php echo base64_encode($blog_id); ?>">
                                            <p class="fa fa-clipboard" style="padding-bottom:25px; font-weight: bold;"><?php echo ucwords($topic); ?></p>
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>
                                <li>
                                    For more content 
                                    <a  href="blog">
                                        <b style="padding-bottom:25px; color: #00ca6d; font-weight: bold;">See Our Blog</b>
                                    </a>
                                </li>
                            </ul>
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