<?php
session_start();
include 'includes/connection.php';
?>
<!DOCTYPE html>
<html>

    <head>
        <title><?php echo $sitename; ?> | Home </title>
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

        <script>
           
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
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                <li data-target="#myCarousel" data-slide-to="3" class=""></li>
            </ol>
            <div  class="carousel-inner" role="listbox">
                <div id="it1" class="item active">
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Improving workplace <span>Productivity.</span></h3>
                            <p>Technology. Innovation. Accessability.</p>
                            <div class="agileits-button top_ban_agile">
                                <a class="btn btn-primary btn-lg" href="#">Read More »</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item item2">
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Inspiring leadership <span>innovation.</span></h3>
                            <p>Technology. Innovation. Accessability.</p>
                            <div class="agileits-button top_ban_agile">
                                <a class="btn btn-primary btn-lg" href="#">Read More »</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item item3">
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Improving Economic <span>Proficiency.</span></h3>
                            <p>Technology. Innovation. Accessability.</p>
                            <div class="agileits-button top_ban_agile">
                                <a class="btn btn-primary btn-lg" href="#">Read More »</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item item4">
                    <div class="container">
                        <div class="carousel-caption">

                            <h3>Inspiring leadership <span>innovation.</span></h3>
                            <p>Technology. Innovation. Credibility.</p>
                            <div class="agileits-button top_ban_agile">
                                <a class="btn btn-primary btn-lg scroll" href="#welcome" role="button">Read More »</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="fa fa-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="fa fa-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!-- The Modal -->
        </div>
        <!--//banner -->

        <!--/search_form -->
        <div class="inner_content_info_agileits">
            <div class="container">
                <div class="tittle_head_w3ls">
                    <h3 class="tittle">Who We Are <br><small>NCS Benue</small></h3>
                </div>
                <div class="inner_sec_grids_info_w3ls">
                    <div class="col-md-4 blog-grid one">
                        <a href="#"><img src="images/ab1.png" width="330" height="350" alt=""></a>
                        <div class="events_info">
                            <h3>About Us</h3>					
                            <p style="text-align: justify;">The Nigeria Computer Society (NCS) 
                                is the umbrella organization of all Information Technology 
                                Professionals, Interest Groups and Stakeholders in Nigeria.
                                Formed in 1978 ;
                                <a href="about">Read more</a>.</p>

                        </div>
                    </div>

                    <div class="col-md-4 blog-grid one">
                        <a href="#"><img src="images/e11.jpg" width="330" height="350" alt=""></a>
                        <div class="events_info">
                            <h3>Our Mission</h3>					
                            <p style="text-align: justify;">Advancement of Information Technology Science and Practice; 
                                and their deployments as solutions and business enablers to all industry 
                                practices of human endeavour. <a href="about">Read more</a>.</p>

                        </div>
                    </div>

                    <div class="col-md-4 blog-grid one">
                        <a href="#"><img src="images/obj2.jpg" width="330" height="350" alt=""></a>
                        <div class="events_info">
                            <h3>Our Objectives</h3>					
                            <p style="text-align: justify;">Promotion of the education and training of Computer &
                                Information Scientists, Computer Engineers, Information Architects and Information 
                                Technology & Systems Professionals..  <a href="about">Read more</a>.</p>

                        </div>
                    </div>

                    <div class="clearfix"></div>

                </div>

            </div>
        </div>
        <!--//search_form -->
        <!-- //banner-bottom -->
        <div class="team_work_agile">
            <h4>Whether we play a large or small role, by working together we achieve our objectives.</h4>
        </div>
        <!-- services -->

        <!-- //services -->
        <!-- /mid-services -->
        <!-- /inner_content -->
        <?php
        $get_content = mysqli_query($conn, "select * from blog where status='YES' and type='news' or type='article' ") or die(mysqli_error($conn));
        $row = mysqli_fetch_array($get_content);
        $title = $row["topic"];
        $writter = $row["author"];
        $msg = $row["message"];
        $type = $row["type"];
        $image = $row["img"];
        $date = date_format(date_create($row["date"]), "d M Y H:i A");
        $blogid = $row["blog_id"];
        $num_of_comments = mysqli_num_rows(mysqli_query($conn, "select * from comments where blog_id='$blogid'"));
        ?>
        <div class="inner_content_info_agileits">
            <div class="container">
                <div class="inner_sec_grids_info_w3ls">
                    <div class="col-md-8 job_info_left">
                        <div class="single-left1">
                            <img src="admin/media/blog_images/<?php echo $image; ?>" style=" width:100%; height:100%;" alt=" " class="img-responsive" />
                            <h3><?php echo $title; ?></h3>
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
                            <p style="text-align: justify;"><?php echo substr(html_entity_decode($msg), 0, 2000); ?><a title="click to continue reading" href="content?read=<?php echo base64_encode($blogid); ?>">...Continue Reading</a></p>
                        </div>
                        <div class="admin">
                            <span style="color: #fff;">Quote</span>
                            <?php
                            $q = mysqli_fetch_array(mysqli_query($conn, "select * from qoutes ORDER BY RAND()  limit 1")) or die(mysqli_error($conn));
                            ?>
                            <p><i class="fa fa-quote-left" aria-hidden="true"></i> 
                                <?php echo $q["message"]; ?>
                            </p>
                            <a href="#"><span> <?php echo $q["author"]; ?></span></a>
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