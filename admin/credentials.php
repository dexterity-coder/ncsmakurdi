<?php
session_start();
include '../includes/connection.php';
include 'includes/functions.php';
$role = isset($_SESSION['urole']) ? $_SESSION['urole'] : "";
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "";


if ($role != "admin") {
    header("location:login.php");
}

//these IDs are for removing entered credentials
$techid = isset($_GET["tech"]) ? base64_decode($_GET["tech"]) : "";
$qualid = isset($_GET["del"]) ? base64_decode($_GET["del"]) : "";
$dutyid = isset($_GET["did"]) ? base64_decode($_GET["did"]) : "";
$sponsorid = isset($_GET["sp"]) ? base64_decode($_GET["sp"]) : "";


//remove tech experience
if (isset($_GET["tech"])) {
    $remove_tech = mysqli_query($conn, "delete from techexperience where tech_id='$techid'");
    if ($remove_tech) {
        echo "<script>alert('Record Removed Successfully'); window.location.href='credentials'</script>";
    } else {
        echo "<script>alert('Operations Failed Please Try After Some Minutes')</script>";
    }
}


//remove sponsor record
if (isset($_GET["sp"])) {
    $remove_tech = mysqli_query($conn, "delete from sponsor where sprid='$sponsorid'");
    if ($remove_tech) {
        echo "<script>alert('Sponsor Removed Successfully'); window.location.href='credentials'</script>";
    } else {
        echo "<script>alert('Operations Failed Please Try After Some Minutes')</script>";
    }
}



//remove presently duty undertaking
if (isset($_GET["did"])) {
    $remove_duty = mysqli_query($conn, "delete from duties where did='$dutyid'");
    if ($remove_duty) {
        echo "<script>alert('Record Removed Successfully'); window.location.href='credentials'</script>";
    } else {
        echo "<script>alert('Operations Failed Please Try After Some Minutes')</script>";
    }
}

//removing educational information
if (isset($_GET["del"])) {
    $remove_eduinfo = mysqli_query($conn, "delete from qualification where qual_id='$qualid'");
    if ($remove_eduinfo) {
        echo "<script>alert('Record Removed Successfully'); window.location.href='credentials'</script>";
    } else {
        echo "<script>alert('Operations Failed Please Try After Some Minutes')</script>";
    }
}

//adding education Information
$mid = isset($_SESSION["mid"]) ? $_SESSION["mid"] : "";
if (isset($_POST["add"])) {
    $qualification = secure($_POST["qualification"]);
    $institution = secure($_POST["institution"]);
    $date = $_POST["date"];
    $insert_qual = mysqli_query($conn, "insert into qualification values ('','$mid','$qualification','$institution','$date')");
    if ($insert_qual) {
        echo "<script>alert('Record Added Successfully')</script>";
    } else {
        echo "<script>alert('Operations Failed, please Try after some minutes')</script>";
    }
}

//adding sponsor Information
if (isset($_POST["addspon"])) {
    $sprfullname = secure(ucwords($_POST["spfullname"]));
    $sprgrade = secure($_POST["spgrade"]);
    $sprmembership_no = secure($_POST["spmembership_no"]);
    $date = date("Y-m-d");
    $sprsign = "NO";
    $insert_sponsor = mysqli_query($conn, "insert into sponsor values ('','$sprfullname','$sprmembership_no','$sprgrade','$sprsign','$date','$mid')");
    if ($insert_sponsor) {
        echo "<script>alert('Record Added Successfully')</script>";
    } else {
        echo "<script>alert('Operations Failed, please Try after some minutes')</script>";
    }
}


//adding present duties 
if (isset($_POST["postduty"])) {
    $descrp = secure($_POST["pduty"]);
    $insert_duty = mysqli_query($conn, "insert into duties values ('','$mid','$descrp')");
    if ($insert_duty) {
        echo "<script>alert('Record Added Successfully')</script>";
    } else {
        echo "<script>alert('Operations Failed, please Try after some minutes')</script>";
    }
}


//adding Information Tech experiences
if (isset($_POST["addexp"])) {
    $organization = secure($_POST["organization"]);
    $duties = secure($_POST["duties"]);
    $designation = secure($_POST["designation"]);
    $dateto = $_POST["dateto"];
    $datefrom = $_POST["datefrom"];
    $insert_exp = mysqli_query($conn, "insert into techexperience values ('','$mid','$datefrom','$dateto','$designation','$organization','$duties')");
    if ($insert_exp) {
        echo "<script>alert('Experience Record Added Successfully')</script>";
    } else {
        echo "<script>alert('Operations Failed, please Try after some minutes')</script>";
    }
}


//submit form
if (isset($_POST["smform"])) {
    $submit_form = mysqli_query($conn, "update member set app_status='YES' where member_id='$mid'");
    if ($submit_form) {
        echo "<script>alert('Form Submitted Successfully'); window.location.href='printout'</script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin | Credential Registration</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <script src="js/scripts.js"></script>


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
                        Member Registration
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
                                    <h3 class="box-title">CREDENTIALS FORM</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <div class="btn-group">
                                            <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>

                                        </div>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form action="" name="form1" method="post">
                                        <div class="row  box-body">
                                            <div class="col-xs-4">
                                                Qualification:
                                                <div class="form-group has-feedback">
                                                    <input required="" name="qualification" type="text" class="form-control" placeholder="Enter Qualification "/>
                                                    <span class="glyphicon glyphicon-book form-control-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="col-xs-8">
                                                Name of Institution:
                                                <div class="form-group has-feedback">
                                                    <input required="" name="institution" type="text" class="form-control" placeholder="Enter Institution "/>
                                                    <span class="glyphicon glyphicon-tower form-control-feedback"></span>
                                                </div>
                                            </div>                                           
                                        </div>  


                                        <div class="row  box-body">
                                            <div class="col-xs-4">
                                                Graduation Date:
                                                <div class="form-group has-feedback">
                                                    <input required="" name="date" type="date" class="form-control"/>
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-8">
                                                &nbsp;
                                                <button type="submit" name="add" class="btn btn-primary btn-block btn-flat">Add Record</button>
                                            </div><!-- /.col -->
                                        </div>
                                    </form>   

                                    <div class="box-header with-border">
                                        <h3 class="box-title">EDUCATIONAL INFORMATION</h3>                                   
                                    </div><!-- /.box-header -->

                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                        <th>S/N</th>
                                        <th>Qualification(s)</th>
                                        <th>Institution(s) Attended</th>
                                        <th>Graduation Year</th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $get_qualifications = mysqli_query($conn, "select * from qualification WHERE member_id='$mid' order by date asc") or die(mysqli_error($conn));
                                            $a = 1;
                                            while ($row = mysqli_fetch_array($get_qualifications)) {
                                                $a++;
                                                $qualification = $row["qualification"];
                                                $institution = $row["institution"];
                                                $qual_id = $row["qual_id"];
                                                $year = date_format(date_create($row["date"]), "Y");
                                                ?>
                                                <tr>
                                                    <td><?php echo $a; ?></td>
                                                    <td><?php echo $qualification; ?></td>
                                                    <td><?php echo $institution; ?></td>
                                                    <td><?php echo $year; ?></td>
                                                    <td><a onclick="return confirm('You are about to remove this particuler record')" href="credentials.php?del=<?php echo base64_encode($qual_id); ?>">
                                                            <button class="btn btn-danger btn-block btn-flat">Remove</button>
                                                        </a></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="box-header with-border">
                                    <h3 class="box-title"> PROFFESSIONAL EXPERIENCE IN INFORMATION TECHNOLOGY</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <div class="btn-group">
                                            <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>

                                        </div>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <form action="" name="form2" method="post">
                                        <div class="row  box-body">
                                            <div class="col-xs-8">
                                                Organization:
                                                <div class="form-group has-feedback">
                                                    <input required="" name="organization" type="text" class="form-control" placeholder="Enter Organization Name"/>
                                                    <span class="glyphicon glyphicon-tower form-control-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="col-xs-4">
                                                Designation:
                                                <div class="form-group has-feedback">
                                                    <input required="" name="designation" type="text" class="form-control" placeholder="Enter Designation "/>
                                                    <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                                                </div>
                                            </div>                                           
                                        </div>  

                                        <div class="row  box-body">
                                            <div class="col-xs-6">
                                                Duties:
                                                <div class="form-group has-feedback">
                                                    <input required="" name="duties" type="text" class="form-control" placeholder="Enter Duties"/>
                                                    <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="col-xs-3">
                                                From:
                                                <div class="form-group has-feedback">
                                                    <input required="" name="datefrom" type="date" class="form-control"/>
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="col-xs-3">
                                                To:
                                                <div class="form-group has-feedback">
                                                    <input required="" name="dateto" type="date" class="form-control"/>
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>  


                                        <div class="row  box-body">
                                            <div class="col-xs-4">
                                                &nbsp;
                                                <div class="form-group has-feedback">
                                                </div>
                                            </div>
                                            <div class="col-xs-8">
                                                &nbsp;
                                                <button type="submit" name="addexp" class="btn btn-primary btn-block btn-flat">Add Experience</button>
                                            </div><!-- /.col -->
                                        </div>
                                    </form>   

                                    <div class="box-header with-border">
                                        <h3 class="box-title">PROFESSIONAL INFOTECH EXPERIENCE</h3>                                   
                                    </div><!-- /.box-header -->

                                    <table id="example1" style="text-align:center;" class="table table-bordered table-hover">
                                        <thead style="text-align:center;">
                                        <th>S/N</th>
                                        <th colspan="2">  
                                            <table style="text-align: center; margin:0px; border: 2px solid #f0f0f0; width: 100%; height:100%;" class="">
                                                <tr style="border: 0.5px solid #f0f0f0;">
                                                    <td colspan="2">Date</td>
                                                </tr>
                                                <tr>
                                                    <td>From</td>
                                                    <td>To</td>
                                                </tr>
                                            </table>
                                        </th>
                                        <th>Designation</th>
                                        <th>Organization</th>
                                        <th>Duties</th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $get_techexperience = mysqli_query($conn, "select * from techexperience WHERE member_id='$mid'") or die(mysqli_error($conn));
                                            $a = 0;
                                            while ($row = mysqli_fetch_array($get_techexperience)) {
                                                $a++;
                                                $organization = $row["organization"];
                                                $duties = $row["duties"];
                                                $from = date_format(date_create($row["start_date"]), "d M Y");
                                                $to = date_format(date_create($row["end_date"]), "d M Y");
                                                $designation = $row["designation"];
                                                $tech_id = $row["tech_id"];
                                                ?>
                                                <tr>
                                                    <td><?php echo $a; ?></td>
                                                    <td><?php echo $from; ?></td>
                                                    <td><?php echo $to; ?></td>
                                                    <td><?php echo $designation; ?></td>
                                                    <td><?php echo $organization; ?></td>
                                                    <td><?php echo $duties; ?></td>
                                                    <td><a onclick="return confirm('You are about to remove this particuler record')" href="credentials.php?tech=<?php echo base64_encode($tech_id) ?>">
                                                            <button class="btn btn-danger btn-block btn-flat">Remove</button>
                                                        </a></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="box-header with-border">
                                    <h3 class="box-title">FULL DESCRIPTION OF DUTIES PRESENTLY UNDERTAKING </h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <div class="btn-group">
                                            <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>

                                        </div>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <form action="" name="form3" method="post">
                                        <div class="row  box-body">
                                            <div class="col-xs-12">
                                                Present Duties:
                                                <div class="form-group">
                                                    <textarea name="pduty" required="" class="form-control" rows="3" placeholder="Enter duties present undrtaking..."></textarea>
                                                </div> 
                                            </div>  
                                            <div class="col-xs-4">
                                                &nbsp;
                                                <div class="form-group has-feedback">
                                                </div>
                                            </div>
                                            <div class="col-xs-8">
                                                &nbsp;
                                                <button type="submit" name="postduty" class="btn btn-primary btn-block btn-flat">Add Duty</button>
                                            </div><!-- /.col -->
                                        </div>
                                    </form>   

                                    <div class="box-header with-border">
                                        <h3 class="box-title">PRESENT DUTIES UNDERTAKING</h3>                                   
                                    </div><!-- /.box-header -->

                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                        <th>S/N</th>                                       
                                        <th>Present Duties</th>                                        
                                        <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $get_duties = mysqli_query($conn, "select * from duties WHERE member_id='$mid'") or die(mysqli_error($conn));
                                            $a = 0;
                                            while ($row = mysqli_fetch_array($get_duties)) {
                                                $a++;
                                                $description = $row["duty"];
                                                $duty_id = $row["did"];
                                                ?>
                                                <tr>
                                                    <td><?php echo $a; ?></td>                                                    
                                                    <td><?php echo $description; ?></td>
                                                    <td><a onclick="return confirm('You are about to remove this particuler record')" href="credentials.php?did=<?php echo base64_encode($duty_id) ?>">
                                                            <button class="btn btn-danger btn-block btn-flat">Remove</button>
                                                        </a></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="box-header with-border">
                                    <h3 class="box-title">SPONSORS </h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <div class="btn-group">
                                            <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>

                                        </div>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <form action="" name="form6" method="post">
                                    <div class="box-body">
                                        <div class="row  box-body">
                                            <div class="col-xs-4">
                                                Full Name <small>(SURNAME First)</small>:
                                                <div class="form-group has-feedback">
                                                    <input required="" name="spfullname" type="text" class="form-control" placeholder="Enter Fullname"/>
                                                    <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                                                </div>
                                            </div> 

                                            <div class="col-xs-4">
                                                Membership NO.:
                                                <div class="form-group has-feedback">
                                                    <input required="" name="spmembership_no" type="text" class="form-control" placeholder="Enter Membership Number"/>
                                                    <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                                                </div>
                                            </div> 

                                            <div class="col-xs-4">
                                                Grade:
                                                <div class="form-group has-feedback">
                                                    <input required="" name="spgrade" type="text" class="form-control" placeholder="Enter Membership Number"/>
                                                    <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                                                </div>
                                            </div> 
                                            <div class="col-xs-4">
                                            </div>
                                            <div class="col-xs-8">
                                                <button type="submit" name="addspon" class="btn btn-primary btn-block btn-flat">Add Sponsor</button>
                                            </div>
                                        </div>  

                                    </div>
                                </form>   

                                <div class="box-header with-border">
                                    <h3 class="box-title">SPONSORS INFORMATION</h3>                                   
                                </div><!-- /.box-header -->

                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <th>S/N</th>                                       
                                    <th>Sponsor Name</th>
                                    <th>Membership NO.</th>
                                    <th>Grade</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $get_sponsor = mysqli_query($conn, "select * from sponsor WHERE member_id='$mid'") or die(mysqli_error($conn));
                                        $a = 0;
                                        while ($row = mysqli_fetch_array($get_sponsor)) {
                                            $a++;
                                            $spname = ucwords($row["fullname"]);
                                            $sp_membership_no = $row["membership_no"];
                                            $grade = $row["grade"];
                                            $spid = $row["sprid"];
                                            ?>
                                            <tr>
                                                <td><?php echo $a; ?></td>                                                    
                                                <td><?php echo $spname; ?></td>
                                                <td><?php echo $sp_membership_no; ?></td>
                                                <td><?php echo $grade; ?></td>
                                                <td><a onclick="return confirm('You are about to remove this particuler record')" href="credentials.php?sp=<?php echo base64_encode($spid) ?>">
                                                        <button class="btn btn-danger btn-block btn-flat">Remove</button>
                                                    </a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <form method="post" action="" name="7" >
                                    <div class="box-body row ">
                                        <div class="col-xs-2"></div>
                                        <div class="col-xs-8">
                                            <button onclick="return confirm('Confrim all records have been entered correctly, if Yes click OK else Click Cancel')" type="submit"  name="smform" class="btn btn-primary btn-block btn-flat">Submit Form</button>
                                        </div>
                                        <div class="col-xs-2"></div>
                                    </div>
                                </form>
                            </div>

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
        <!-- FastClick -->
        <script src='plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="plugins/chartjs/Chart.min.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard2.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js" type="text/javascript"></script>

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