<?php
session_start();
include '../includes/connection.php';
include 'includes/functions.php';

$role = isset($_SESSION['urole']) ? $_SESSION['urole'] : "";
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "";

if ($role != "admin") {
    header("location:login.php");
}

//member records
$id=$_SESSION["mid"];
$rw = mysqli_fetch_array(mysqli_query($conn, "select * from member where member_id='$id'"));
$db_member_id = $rw["member_id"];
$db_sname = $rw["sname"];
$db_oname = $rw["oname"];
$db_fname = $rw["fname"];
$db_gender = $rw["gender"];
$db_phone = $rw["phone"];
$db_email = $rw["email"];
$db_dob = date_format(date_create($rw["dob"]), "d, M Y");
$db_pob= $rw["pob"];
$db_titile = $rw["title"];
$db_paddress = $rw["paddress"];
$db_oaddress = $rw["oaddress"];
$db_phaddress = $rw["phaddress"];
$db_occupation = $rw["occupation"];
$db_employer = $rw["employer"];
$db_rank = $rw["rank"];
$db_empphone = $rw["empphone"];
$db_empemail = $rw["empemail"];
$db_empaddress = $rw["empaddress"];
$db_aoi = $rw["aoi"];
$db_image = $rw["img"];
$db_app_status = $rw["app_status"];
$db_date = $rw["reg_date"];
$db_state = $rw["state"];
$db_lga = $rw["lga"];
$db_mstatus = $rw["mstatus"];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin | Form Printout</title>
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

        <!-- CK-EDITOR -->
        <script src="ckeditor/ckeditor.js"></script>
        <script src="ckeditor/samples/js/sample.js"></script>

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
                        Form Printout
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <?php
                    include 'includes/dashboard.php';
                    ?>



                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Form Print</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <div class="btn-group">
                                            <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>

                                        </div>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <?php include 'print.php'; ?>


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
        <script src="plugins/jQuery/jQueryk-2.1.3.min.js"></script>
        <script src="plugins/jQuery/js/jquery.min.js"></script>

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

            function printtab() {
                var tab = document.getElementById('dataTable');
                newwin = window.open("");
                newwin.document.write(tab.outerHTML);
                newwin.print();
                newwin.close();
            }
        </script>

    </body>
</html>