<?php
session_start();
include '../includes/connection.php';
include 'includes/functions.php';
$role = isset($_SESSION['urole']) ? $_SESSION['urole'] : "";
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "";



if ($role != "admin") {
    header("location:login.php");
}

if (isset($_GET['d'])) {
    $qid = base64_decode($_GET['d']);
    $del = mysqli_query($conn, "delete from qoutes where sn='$qid'");
    if ($del) {
        echo "<script>alert('Quote deleted successfully!'); window.location.href='addqoutes.php'</script>";
    } else {
        echo "<script>alert('Operations Failed, Please try again after some minutes!')</script>";
    }
}

if (isset($_POST["upload"])) {
    $quote = $_POST["quote"];
    $author = $_POST["author"];
    $date = date("Y-m-d H:i:s");
    $status = "NO";
    $insert_qoute = mysqli_query($conn, "insert into qoutes values ('','$author','$quote','$date','$status')") or die(mysqli_error($conn));
     if ($insert_qoute) {
        echo "<script>alert('Quote Added successfully!'); window.location.href='addqoutes.php'</script>";
    } else {
        echo "<script>alert('Operations Failed, Please try again after some minutes!')</script>";
    }
    // media
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin | Manage Quotes</title>
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
                        Quotes
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
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
                                    <h3 class="box-title">Quotes </h3>
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
                                        <li ><a href="#revenue-chart" data-toggle="tab"> ADD QUOTES</a></li>
                                        <li class="active"><a href="#sales-chart" data-toggle="tab">QUOTES</a></li>

                                    </ul>
                                    <div class="tab-content no-padding">
                                        <!-- Morris chart - Sales -->
                                        <div class="chart tab-pane " id="revenue-chart" style="position: relative; height: 100%;">
                                            <div class="box-body">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="row  box-body">                                        
                                                        <div class="col-xs-12"> 
                                                            Author:
                                                            <div class="form-group has-feedback">
                                                                <input required="" name="author" type="text" class="form-control" placeholder="Author Name "/>
                                                                <span class="glyphicon glyphicon-video form-control-feedback"></span>
                                                            </div> 
                                                        </div>                                                       
                                                    </div>

                                                    <div class="row  box-body"> 

                                                        <div class="col-xs-12"> 
                                                            Quote:
                                                            <div class="form-group">
                                                                <textarea required="" name="quote" class="form-control" rows="3" placeholder="Enter Quote..."></textarea>
                                                            </div>
                                                        </div>                                                    
                                                    </div>

                                                    <div class="row box-body">
                                                        <div class="col-xs-8">    
                                                            <div class="checkbox icheck">
                                                                <label>
                                                                </label>
                                                            </div>                        
                                                        </div><!-- /.col -->
                                                        <div class="col-xs-4">
                                                            <button type="submit" name="upload" class="btn btn-primary btn-block btn-flat">Add Quote</button>
                                                        </div><!-- /.col -->
                                                    </div>
                                                </form> 

                                            </div>

                                        </div>

                                        <div class="chart tab-pane active" id="sales-chart" style="position: relative; height: 100%;">
                                            <div class="box-body">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Qoutes </h3>
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
                                                            <th>AUTHOR</th>
                                                            <th>QUOTE</th>
                                                            <th>UPLOAD DATE</th>                                                    
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $result = mysqli_query($conn, "select * from QOUTES order by date desc");
                                                        $posted_media = mysqli_num_rows(mysqli_query($conn, "select * from QOUTES where status='YES'"));
                                                        $a = 1;
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            $author = $row["author"];
                                                            $message = $row["message"];
                                                            $date = $row["date"];
                                                            $status = $row["status"];                                                           
                                                            $quote_id = $row["sn"];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $a; ?></td>
                                                                <td><?php echo $author; ?></td>
                                                                <td><?php echo $message; ?></td>
                                                                <td> <?php echo date_format(date_create($date), " d M Y H:i:s A"); ?></td>

                                                                 
                                                                <td><a onclick="return confirm('Press ok to delete quote')" href="addqoutes.php?d=<?php echo base64_encode($quote_id); ?>">DELETE</a></td>
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