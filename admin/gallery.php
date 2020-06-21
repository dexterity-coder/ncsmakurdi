<?php
session_start();
include '../includes/connection.php';
include 'includes/functions.php';
$role = isset($_SESSION['urole']) ? $_SESSION['urole'] : "";
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "";

//removing post from home page
if (isset($_GET['h'])) {
    $gid = base64_decode($_GET['h']);
    $hide = mysqli_query($conn, "update gallery set status='NO' where gid='$gid'");
    if ($hide) {
        echo "<script>alert('Photo Hidden from home page successfully!'); window.location.href='gallery.php'</script>";
    } else {
        echo "<script>alert('Operations Failed, Please try again after some minutes!')</script>";
    }
}

//adding post to home page
if (isset($_GET['p'])) {
    $gids = base64_decode($_GET['p']);
    $hide = mysqli_query($conn, "update gallery set status='YES' where gid='$gids'");
    if ($hide) {
        echo "<script>alert('Gallery posted on home page successfully!'); window.location.href='gallery.php'</script>";
    } else {
        echo "<script>alert('Operations Failed, Please try again after some minutes!')</script>";
    }
}

//Deleting testing
if (isset($_GET['d'])) {
    $dids = base64_decode($_GET['d']);
    $img_url = mysqli_fetch_array(mysqli_query($conn, "select url from gallery where gid='$dids'"));
    $hide = mysqli_query($conn, "delete from gallery where gid='$dids'");
    if ($hide) {
        $image = $img_url["url"];
        unlink("media/gallery/$image");
        echo "<script>alert('photo deleted successfully!'); window.location.href='gallery.php'</script>";
    } else {
        echo "<script>alert('Operations Failed, Please try again after some minutes!')</script>";
    }
}



if ($role != "admin") {
    header("location:login.php");
}

if (isset($_POST["upload"])) {
    $header=$_POST["title"];
    $link=$_POST["link"];
    $comment = isset($_POST["comment"]) ? $_POST["comment"] : "";
    $date = date("Y-m-d H:i:s");
    $galid = "BN-" . date('ismymd');
    $status = "NO";

    // Images
    $pic_name = isset($_FILES['pic']['name']) ? $_FILES['pic']['name'] : "";

    if ($pic_name != "") {
        $screen_img1_ext = pathinfo($pic_name, PATHINFO_EXTENSION);

        $img_url = upload_gallery_image($_FILES['pic']['tmp_name'], $screen_img1_ext, 1);
        if ($img_url != "") {
            $insert_test = mysqli_query($conn, "insert into gallery values ('$galid','$img_url','$header','$comment','$link','$date','$status')");
            if ($insert_test) {
                echo "<script>alert('Banner Successfully!')</script>";
            } else {
                echo "<script>alert('Operations Failed, Please Try after some minutes!')</script>";
            }
        } else {
            echo "<script>alert('Operations Failed, Image could not be uploaded!')</script>";
        }
    } else {
        echo "<script>alert('Operations Failed, Image could not be uploaded!')</script>";
        // $img_url = "";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin | Banner Photo Upload</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <div class="wrapper">

            <?php
            include 'includes/header.php';
            ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php
            include 'includes/sidebar.php';
            ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Banner Photo
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Header Banner</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <?php include 'includes/dashboard.php' ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Upload Banner Photo</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <div class="btn-group">
                                            <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <div class="nav-tabs-custom">
                                    <!-- Tabs within a box -->
                                    <ul class="nav nav-tabs pull-right">
                                        <li ><a href="#revenue-chart" data-toggle="tab">UPLOAD PHOTO</a></li>
                                        <li class="active"><a href="#sales-chart" data-toggle="tab"> BANNER PHOTOS</a></li>
                                    </ul>
                                    <div class="tab-content no-padding">
                                        <!-- Morris chart - Sales -->
                                        <div class="chart tab-pane " id="revenue-chart" style="position: relative; height: 100%;">

                                            <div class="box-body">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="row  box-body">                              
                                                        <div class="col-xs-4">
                                                            <div class="row box-body">
                                                                Banner Photo:
                                                                <div class="form-group has-feedback">
                                                                    <input name="pic" required="" accept=".jpg, .jpeg, .png, .jif" type="file" class="form-control" placeholder="image "/>
                                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                                </div>   
                                                            </div>
                                                            <div class="row box-body">
                                                                HyperLink (Optional):
                                                                <div class="form-group has-feedback">
                                                                    <input name="link" type="text" class="form-control" placeholder="Hyperlink "/>
                                                                    <span class="glyphicon glyphicon-link form-control-feedback"></span>
                                                                </div>   
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-8"> 
                                                            <div class="row box-body">
                                                                 Banner Title:
                                                                <div class="form-group">
                                                                    <input name="title" required="" type="text" class="form-control" placeholder="Title "/>
                                                                </div>
                                                            </div>
                                                            <div class="row box-body">
                                                                Banner Sub-Title:
                                                                <div class="form-group">
                                                                    <textarea name="comment" class="form-control" rows="2" placeholder="Enter banner Caption..."></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row box-body">

                                                        <div class="col-xs-4">
                                                            <button type="submit" name="upload" class="btn btn-primary btn-block btn-flat">ADD BANNER</button>
                                                        </div><!-- /.col -->
                                                        <div class="col-xs-8">    
                                                            <div class="checkbox icheck">
                                                                <label>
                                                                </label>
                                                            </div>                        
                                                        </div><!-- /.col -->
                                                    </div>
                                                </form> 

                                            </div>
                                        </div>

                                        <div class="chart tab-pane active" id="sales-chart" style="position: relative; height: 100%;">
                                            <div class="box-body">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Uploaded Banner Photos </h3>
                                                    <div class="box-tools pull-right">
                                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                        <div class="btn-group">
                                                            <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#">Action</a></li>
                                                                <li><a href="#">Another action</a></li>
                                                                <li><a href="#">Something else here</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="#">Separated link</a></li>
                                                            </ul>
                                                        </div>
                                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div><!-- /.box-header -->
                                                <table id="example1" class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>SN</th>
                                                            <th>PHOTO</th>
                                                            <th>TITLE</th>
                                                            <th>SUB HEADINGS</th>
                                                            <th>HYPERLINK</th>
                                                            <th>DATE</th>                                                    
                                                            <th>ACTION</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $result = mysqli_query($conn, "select * from gallery order by date desc");
                                                        $posted_testimonies = mysqli_num_rows(mysqli_query($conn, "select * from gallery where status='YES'"));
                                                        $a = 1;
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            $photo = $row["url"];
                                                            $comment = $row["comment"];
                                                            $date = $row["date"];
                                                            $title = $row["title"];
                                                            $hplink = $row["link"];
                                                            $status = $row["status"];
                                                            $pic_id = $row["gid"];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $a; ?></td>
                                                                <td> <a target="blank" href="media/gallery/<?php echo $photo; ?>"> <img width="120" height="90" src="media/gallery/<?php echo $photo; ?>"> </a></td>
                                                                <td><?php echo $title; ?></td>
                                                                <td><?php echo $comment; ?></td>
                                                                <td><?php echo ($hplink != "") ? $hplink : "None"; ?></td>
                                                                <td> <?php echo date_format(date_create($date), " d M Y H:i A"); ?></td>

                                                                <td>
                                                                    <?php
                                                                    if ($posted_testimonies < 4) {
                                                                        ?>
                                                                        <?php if ($status == "NO") { ?> 
                                                                            <a href='gallery.php?p=<?php echo base64_encode($pic_id); ?>'>POST</a>
                                                                        <?php } else { ?>
                                                                            <a href='gallery.php?h=<?php echo base64_encode($pic_id); ?>'>HIDE</a>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <?php if ($status == "NO") { ?>
                                                                            <input style="background-color:red;" class="btn" onclick="return alert('Maximum number of photo posted on home page banner, please hide other photos and try again')" type="submit" readonly="" value="POST">
                                                                        <?php } else { ?>
                                                                            <a href='gallery.php?h=<?php echo base64_encode($pic_id); ?>'>HIDE</a>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>                                                       

                                                                </td> 
                                                                <td><a onclick="return confirm('press ok to delete Banner')" href="gallery.php?d=<?php echo base64_encode($pic_id); ?>">DELETE</a></td>
                                                            </tr>
                                                            <?php
                                                            $a++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div> 
                                        </div>

                                    </div>
                                </div>

                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- Main row -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <?php
            include 'includes/footer.php';
            ?>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.3 -->
        <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js" type="text/javascript"></script>
        <!-- page script -->
        <script type="text/javascript">
                                                                $(function () {
                                                                    $("#example1").dataTable();
                                                                    $('#example2').dataTable({
                                                                        "bPaginate": true,
                                                                        "bLengthChange": false,
                                                                        "bFilter": false,
                                                                        "bSort": true,
                                                                        "bInfo": true,
                                                                        "bAutoWidth": false
                                                                    });
                                                                });
        </script>

    </body>
</html>