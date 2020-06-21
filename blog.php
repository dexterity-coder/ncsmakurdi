<?php
session_start();
include 'includes/connection.php';
?>
<!DOCTYPE html>
<html>

    <head>
        <title><?php echo $sitename; ?> | Our Blog </title>
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
        <div class="inner_page_agile">
            <h3>News, Articles & Events</h3>
        </div>
        <!--//banner -->
        <!--/w3_short-->
        <div class="services-breadcrumb_w3layouts">
            <div class="inner_breadcrumb">
                <ul class="short_w3ls"_w3ls>
                    <li><a href="index">Home</a><span>|</span></li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
        <!--//banner -->
        <div class="inner_content_info_agileits">

            <div class="container">
                <span><h3 style="text-align: center; font-size: 34px; text-decoration: underline;">OUR BLOG</h3></span>
                <div class="inner_sec_grids_info_w3ls tab_grid_prof">                  

                    <?php
                    //Start Pagination 
                    $item_per_page = 10;
                    $number_of_items = mysqli_num_rows(mysqli_query($conn, "select * from blog"));
                    $number_of_pages = ceil($number_of_items / $item_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }
                    $current_page_first_item = ($page - 1) * $item_per_page;
                    //End Pagination

                    $blog_content = mysqli_query($conn, "select * from blog order by date desc limit $current_page_first_item,$item_per_page") or die(mysqli_error($conn));
                    while ($row = mysqli_fetch_array($blog_content)) {
                        $title = $row["topic"];
                        $writter = $row["author"];
                        $msg = $row["message"];
                        $type = $row["type"];
                        $image = $row["img"];
                        $date = date_format(date_create($row["date"]), "d M Y H:i A");
                        $blogid = $row["blog_id"];
                        $num_of_comments = mysqli_num_rows(mysqli_query($conn, "select * from comments where blog_id='$blogid'"));
                        ?>
                        <div class="col-md-12 tab_grid_prof job_info_left">                           
                            <div class="tab_grid last">
                                <div class="col-sm-3 loc_1">
                                    <a href="content?read=<?php echo base64_encode($blogid); ?>"><img src="admin/media/blog_images/<?php echo $image; ?>" style="height: 180px; width:100%;" alt=""></a>
                                </div>
                                <div class="col-sm-9">
                                    <div class="location_box1">
                                        <h6><a href="content?read=<?php echo base64_encode($blogid); ?>"> <?php echo html_entity_decode($title); ?>  </a></h6>
                                        <p><?php echo substr(html_entity_decode($msg), 0, 390); ?>...<a href="content?read=<?php echo base64_encode($blogid); ?>">Read More</a></p>
                                        <ul class="links_bottom">
                                            <li><a href="content?read=<?php echo base64_encode($blogid); ?>"><i class="fa  fa-calendar icon_1"> </i><span class="icon_text"> <span class="m_1"><?php echo $date; ?></span></span></a></li>
                                            <li><a href="content?read=<?php echo base64_encode($blogid); ?>"><i class="fa  fa-comments-o icon_1"> </i> <span class="icon_text"><?php echo $num_of_comments; ?> Comment(s)</span></a></li>
                                            <li class="last"><a href="content?read=<?php echo base64_encode($blogid); ?>"><span class="icon_text">Read More <i class="fa fa-caret-right icon_1"> </i></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>

                    <?php
                    if (isset($_GET['page']) && $_GET['page'] != "") {
                        //Pagination display
                        ?>
                        <div class="inner_sec_grids_info_w3ls tab_grid_prof">
                            <nav >
                                <ul class="pagination pagination-lg">
                                    <?php
                                    $nav = isset($_GET['page']) ? $_GET['page'] : "1";
                                    if ($nav > 1) {
                                        $prev = $nav - 1;
                                        ?>
                                        <li><a href="blog?page=<?php echo $prev; ?>">&laquo; Previous</a></li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    //Page navigation
                                    for ($page = 1; $page <= $number_of_pages; $page++) {
                                        if (isset($_GET['page']) && $_GET['page'] == $page) {
                                            $active = 'active';
                                        } elseif (!isset($_GET['page']) && $page == 1) {
                                            $active = 'active';
                                        } else {
                                            $active = "";
                                        }
                                        ?>
                                        <li class="<?php echo $active; ?>"><a href="blog?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($number_of_pages > $nav) {
                                        $next = $nav + 1;
                                        ?>
                                        <li><a href="blog?page=<?php echo $next; ?>">Next &raquo;</a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                        <?php
                    } else {
                        //Normal pagination display
                        ?>
                        <div class="inner_sec_grids_info_w3ls tab_grid_prof">
                            <nav >
                                <ul class="pagination  pagination-lg">
                                    <?php
                                    $nav = isset($_GET['page']) ? $_GET['page'] : "1";
                                    if ($nav > 1) {
                                        $prev = $nav - 1;
                                        ?>
                                        <li><a href="blog?page=<?php echo $prev; ?>">&laquo; Previous</a></li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="disabled"><a href="#">&laquo; Previous</a></li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    //Page navigation
                                    for ($page = 1; $page <= $number_of_pages; $page++) {
                                        if (isset($_GET['page']) && $_GET['page'] == $page) {
                                            $active = 'active';
                                        } elseif (!isset($_GET['page']) && $page == 1) {
                                            $active = 'active';
                                        } else {
                                            $active = "";
                                        }
                                        ?>
                                        <li class="<?php echo $active; ?>"><a href="blog?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($number_of_pages > $nav) {
                                        $next = $nav + 1;
                                        ?>
                                        <li><a href="blog?page=<?php echo $next; ?>">Next &raquo;</a></li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="disabled"><a href="#">Next &raquo;</a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                        <?php
                    }
                    ?>
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