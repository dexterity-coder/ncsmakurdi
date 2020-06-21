<?php
session_start();
include 'includes/connection.php';
include 'admin/includes/functions.php';
if (!$_SESSION) {
    header("location:login");
}
$role = isset($_SESSION['urole']) ? $_SESSION['urole'] : "";
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "";
$mid = isset($_SESSION['mid']) ? $_SESSION['mid'] : "";

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
        $update_login = mysqli_query($conn, "update login set status='active' where username='$userid'");
        echo "<script>alert('Form Submitted Successfully'); window.location.href='printout'</script>";
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>  Credential Upload | <?php echo $sitename; ?>  </title>
        <!--/tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="icon" href="images/LOG.jpg" type="image/png">
        <script src="admin/js/scripts.js"></script>
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

            .custom-file-input::-webkit-file-upload-button {
                visibility: hidden;
            }
            .custom-file-input::before {
                content: 'Select some files';
                display: inline-block;
                background: linear-gradient(top, #f9f9f9, #e3e3e3);
                border: 1px solid #999;
                border-radius: 3px;
                padding: 5px 8px;
                outline: none;
                white-space: nowrap;
                -webkit-user-select: none;
                cursor: pointer;
                text-shadow: 1px 1px #fff;
                font-weight: 700;
                font-size: 10pt;
            }
            .custom-file-input:hover::before {
                border-color: black;
            }
            .custom-file-input:active::before {
                background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
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

    <body style="background-color:#f0f0f0 !important;">
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
        <div style="padding-top:20px !important; padding-bottom:0px;" class="inner_content_info_agileits">

            <div class="container">

                <div class="inner_sec_grids_info_w3ls">
                    <div class="box-header with-border">
                    </div><!-- /.box-header -->
                    <div style="margin-left: 10%; margin-right: 10%;" class="col-md-10 tab_grid_prof ">


                        <div class="row">

                            <div class="col-md-12">
                                <div class="box">
                                    <div  class="box-header with-border">
                                        <h3 style="padding-left:30%; padding-right:30%; padding-bottom: 50px; color:black;" class="box-title">CREDENTIALS FORM</h3>

                                    </div><!-- /.box-header -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box">
                                                <div class="box-header with-border">
                                                </div><!-- /.box-header -->
                                                <div class="box-body">
                                                    <form action="" name="form1" method="post">
                                                        <div class="row  box-body">
                                                            <div class="col-xs-4">
                                                                Qualification:
                                                                <div class="form-group has-feedback">
                                                                    <input required="" name="qualification" type="text" class="form-control" placeholder="Enter Qualification "/>
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-8">
                                                                Name of Institution:
                                                                <div class="form-group has-feedback">
                                                                    <input required="" name="institution" type="text" class="form-control" placeholder="Enter Institution "/>
                                                                </div>
                                                            </div>                                           
                                                        </div>  


                                                        <div class="row  box-body">
                                                            <div class="col-xs-4">
                                                                Graduation Date:
                                                                <div class="form-group has-feedback">
                                                                    <input required="" name="date" type="date" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-8">
                                                                &nbsp;
                                                                <button type="submit" name="add" class="btn btn-primary btn-block btn-flat">Add Record</button>
                                                            </div><!-- /.col -->
                                                        </div>
                                                    </form>   

                                                    <div class="box-header with-border">
                                                        <h4 class="box-title" style="padding-top:20px;">EDUCATIONAL INFORMATION</h4>                                   
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
                                                    <h4 class="box-title" style="padding-top:20px;"> PROFFESSIONAL EXPERIENCE IN INFORMATION TECHNOLOGY</h4>

                                                </div><!-- /.box-header -->

                                                <div class="box-body">
                                                    <form action="" name="form2" method="post">
                                                        <div class="row  box-body">
                                                            <div class="col-xs-8">
                                                                Organization:
                                                                <div class="form-group has-feedback">
                                                                    <input required="" name="organization" type="text" class="form-control" placeholder="Enter Organization Name"/>
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-4">
                                                                Designation:
                                                                <div class="form-group has-feedback">
                                                                    <input required="" name="designation" type="text" class="form-control" placeholder="Enter Designation "/>
                                                                </div>
                                                            </div>                                           
                                                        </div>  

                                                        <div class="row  box-body">
                                                            <div class="col-xs-6">
                                                                Duties:
                                                                <div class="form-group has-feedback">
                                                                    <input required="" name="duties" type="text" class="form-control" placeholder="Enter Duties"/>
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-3">
                                                                From:
                                                                <div class="form-group has-feedback">
                                                                    <input required="" name="datefrom" type="date" class="form-control"/>
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-3">
                                                                To:
                                                                <div class="form-group has-feedback">
                                                                    <input required="" name="dateto" type="date" class="form-control"/>
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
                                                        <h4 class="box-title" style="padding-top:20px;">PROFESSIONAL INFOTECH EXPERIENCE</h4>                                   
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
                                                    <h4 class="box-title" style="padding-top:20px;">FULL DESCRIPTION OF DUTIES PRESENTLY UNDERTAKING </h4>

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
                                                        <h4 class="box-title" style="padding-top:20px;">PRESENT DUTIES UNDERTAKING</h4>                                   
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
                                                    <h4 class="box-title" style="padding-top:20px;">SPONSORS </h4>

                                                </div><!-- /.box-header -->

                                                <form action="" name="form6" method="post">
                                                    <div class="box-body">
                                                        <div class="row  box-body">
                                                            <div class="col-xs-4">
                                                                Full Name <small>(SURNAME First)</small>:
                                                                <div class="form-group has-feedback">
                                                                    <input required="" name="spfullname" type="text" class="form-control" placeholder="Enter Fullname"/>
                                                                </div>
                                                            </div> 

                                                            <div class="col-xs-4">
                                                                Membership NO.:
                                                                <div class="form-group has-feedback">
                                                                    <input required="" name="spmembership_no" type="text" class="form-control" placeholder="Enter Membership Number"/>
                                                                </div>
                                                            </div> 

                                                            <div class="col-xs-4">
                                                                Grade:
                                                                <div class="form-group has-feedback">
                                                                    <input required="" name="spgrade" type="text" class="form-control" placeholder="Enter Membership Number"/>
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
                                                    <h4 class="box-title" style="padding-top:20px;">SPONSORS INFORMATION</h4>                                   
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

                                </div><!-- /.box -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->

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