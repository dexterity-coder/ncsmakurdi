<?php
session_start();
include '../includes/connection.php';
include 'includes/functions.php';
$role = isset($_SESSION['urole']) ? $_SESSION['urole'] : "";
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "";

//this is what i used to get back to this page once a record is been updated
$mem_id = base64_encode($_SESSION["mem_id"]);

$id = isset($_GET["m"]) ? base64_decode($_GET["m"]) : "";

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
        echo "<script>alert('Record Removed Successfully'); window.location.href='editmembers.php?m=$mem_id';</script>";
    } else {
        echo "<script>alert('Operations Failed Please Try After Some Minutes')</script>";
    }
}


//remove sponsor record
if (isset($_GET["sp"])) {
    $remove_tech = mysqli_query($conn, "delete from sponsor where sprid='$sponsorid'");
    if ($remove_tech) {
        echo "<script>alert('Sponsor Removed Successfully'); window.location.href='editmembers.php?m=$mem_id'</script>";
    } else {
        echo "<script>alert('Operations Failed Please Try After Some Minutes')</script>";
    }
}



//remove presently duty undertaking
if (isset($_GET["did"])) {
    $remove_duty = mysqli_query($conn, "delete from duties where did='$dutyid'");
    if ($remove_duty) {
        echo "<script>alert('Record Removed Successfully'); window.location.href='editmembers.php?m=$mem_id'</script>";
    } else {
        echo "<script>alert('Operations Failed Please Try After Some Minutes')</script>";
    }
}

//removing educational information
if (isset($_GET["del"])) {
    $remove_eduinfo = mysqli_query($conn, "delete from qualification where qual_id='$qualid'");
    if ($remove_eduinfo) {
        echo "<script>alert('Record Removed Successfully'); window.location.href='editmembers.php?m=$mem_id'</script>";
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
    $insert_qual = mysqli_query($conn, "insert into qualification values ('','$id','$qualification','$institution','$date')");
    if ($insert_qual) {
        echo "<script>alert('Record Added Successfully'); window.location.href='editmembers.php?m=$mem_id'</script>";
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
    $insert_sponsor = mysqli_query($conn, "insert into sponsor values ('','$sprfullname','$sprmembership_no','$sprgrade','$sprsign','$date','$id')");
    if ($insert_sponsor) {
        echo "<script>alert('Record Added Successfully'); window.location.href='editmembers.php?m=$mem_id'</script>";
    } else {
        echo "<script>alert('Operations Failed, please Try after some minutes')</script>";
    }
}


//adding present duties 
if (isset($_POST["postduty"])) {
    $descrp = secure($_POST["pduty"]);
    $insert_duty = mysqli_query($conn, "insert into duties values ('','$id','$descrp')");
    if ($insert_duty) {
        echo "<script>alert('Record Added Successfully'); window.location.href='editmembers.php?m=$mem_id'</script>";
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
    $insert_exp = mysqli_query($conn, "insert into techexperience values ('','$id','$datefrom','$dateto','$designation','$organization','$duties')");
    if ($insert_exp) {
        echo "<script>alert('Experience Record Added Successfully'); window.location.href='editmembers.php?m=$mem_id'</script>";
    } else {
        echo "<script>alert('Operations Failed, please Try after some minutes')</script>";
    }
}


//member records
$rw = mysqli_fetch_array(mysqli_query($conn, "select * from member where member_id='$id'"));
$db_member_id = $rw["member_id"];
$db_sname = $rw["sname"];
$db_oname = $rw["oname"];
$db_fname = $rw["fname"];
$db_gender = $rw["gender"];
$db_phone = $rw["phone"];
$db_email = $rw["email"];
$db_pob= $rw["pob"];
$db_dob = date_format(date_create($rw["dob"]), "d, M Y");
$db_titile = $rw["title"];
$db_paddress = $rw["paddress"];
$db_oaddress = $rw["oaddress"];
$db_phaddress = $rw["phaddress"];
$db_occupation = $rw["occupation"];
$db_employer = $rw["employer"];
$db_empaddress = $rw["empaddress"];
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

if (isset($_POST["update"])) {
    $fname = secure($_POST["fname"]);
    $title = secure($_POST["title"]);
    $oname = secure($_POST["oname"]);
    $sname = secure($_POST["sname"]);
    $gender = secure($_POST["gender"]);
    $phone = secure($_POST["phone"]);
    $email = secure($_POST["email"]);
    $paddress = secure($_POST["paddress"]);
    $oaddress = secure($_POST["oaddress"]);
    $phaddress = secure($_POST["phaddress"]);
    $dob = secure($_POST["dob"]);
    $pob = secure($_POST["pob"]);
    $employer = secure($_POST["employer"]);
    $empemail = secure($_POST["empemail"]);
    $empphone = secure($_POST["empphone"]);
    $rank = secure($_POST["rank"]);
    $occupation = secure($_POST["occupation"]);
    $state = secure($_POST["state"]);
    $lga = secure($_POST["lga"]);
    $mstatus = $_POST["status"];
    $empaddress = secure($_POST["empaddress"]);
    $aoi = secure($_POST["aoi"]);


    $update_member = mysqli_query($conn, "update member set sname='$sname', fname='$fname', pob='$pob', title='$title', oname='$oname', gender='$gender', phone='$phone', email='$email', state='$state', lga='$lga', mstatus='$mstatus', occupation='$occupation', rank='$rank', empaddress='$empaddress', empphone='$empphone', empemail='$empemail', employer='$employer', dob='$dob',aoi='$aoi', phaddress='$phaddress', paddress='$paddress',oaddress='$oaddress' where member_id='$id'") or die(mysqli_error($conn));

    if ($update_member) {
        echo "<script>alert('Member record updated successfully!'); window.location.href='editmembers.php?m=$mem_id'</script>";
    } else {
        echo "<script>alert('Operations Failed, Please Try after some minutes!')</script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin | Member Profile Update</title>
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
        <style>
            .inputs{               
                border-bottom:1px solid #000;
                border-right:0px;
                border-left:0px;
                margin-top:20px;
                border-top:0px;
                text-align: center;
            }
        </style>

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
                        Member Profile Update
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
                                    <h3 class="box-title">Member Profile</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <div class="btn-group">
                                            <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>

                                        </div>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="nav-tabs-custom">
                                    <!-- Tabs within a box -->
                                    <ul class="nav nav-tabs pull-right">                                       
                                        <li ><a href="#sales-chart" data-toggle="tab">UPDATE FORM A-2</a></li>
                                        <li ><a href="#revenue-chart" data-toggle="tab">UPDATE FORM A-1</a></li>
                                        <li class="active" ><a href="#printout" data-toggle="tab">PRINT FORM</a></li>
                                    </ul>
                                    <div class="tab-content no-padding">
                                        <!-- Morris chart - Sales -->
                                        <div class="chart tab-pane active" id="printout" style="position: relative; height: 100%;">
                                            <?php include 'print.php'; ?>
                                        </div>

                                        <div class="chart tab-pane" id="revenue-chart" style="position: relative; height: 100%;">
                                            <div class="box-body">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="row  box-body">
                                                        <div class="col-xs-2"> 
                                                            <div id="container2" class="form-group has-feedback">
                                                                <img src="media/members/<?php echo $db_image; ?>" id="output_image" width="120" height="130"/>
                                                            </div>   
                                                        </div>
                                                        <div class="row col-xs-10">
                                                            <div class="row">
                                                                <div class="col-xs-6"> 
                                                                    Title:
                                                                    <div class="form-group has-feedback">
                                                                        <input required="" value="<?php echo $db_titile; ?>" name="title" type="text" class="form-control" placeholder="Title "/>
                                                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xs-6">
                                                                    First Name:
                                                                    <div class="form-group has-feedback">
                                                                        <input required="" name="fname" value="<?php echo $db_fname; ?>" type="text" class="form-control" placeholder="First Name "/>
                                                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-6">
                                                                    Othername(s):
                                                                    <div class="form-group has-feedback">
                                                                        <input name="oname" value="<?php echo $db_oname; ?>" type="text" class="form-control" placeholder="Othername "/>
                                                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xs-6">
                                                                    Surname:
                                                                    <div class="form-group has-feedback">
                                                                        <input required="" name="sname" value="<?php echo $db_sname; ?>" type="text" class="form-control" placeholder="Surname "/>
                                                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                                    </div>
                                                                </div>                                                   
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row  box-body">
                                                        <div class="col-xs-4"> 
                                                            Gender:
                                                            <div class="form-group has-feedback">
                                                                <div class="form-group">
                                                                    <select name="gender" required="" class="form-control">
                                                                        <option value="">Gender</option>
                                                                        <option value="Male" <?php
                                                                        if ($db_gender == "Male") {
                                                                            echo "selected='selected'";
                                                                        } else {
                                                                            
                                                                        }
                                                                        ?> >Male</option>
                                                                        <option value="Female" <?php
                                                                        if ($db_gender == "Female") {
                                                                            echo "selected='selected'";
                                                                        } else {
                                                                            
                                                                        }
                                                                        ?>>Female</option>                                                           
                                                                    </select>
                                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-4">
                                                            DOB:
                                                            <div class="form-group has-feedback">
                                                                <input required="" value="<?php echo $db_dob; ?>" name="dob" type="date" class="form-control"/>
                                                                <span class="fa-calender form-control-feedback"></span>
                                                            </div>
                                                        </div>
                                                        
                                                         <div class="col-xs-4">
                                                            Place of Birth:
                                                            <div class="form-group has-feedback">
                                                                <input required="" value="<?php echo $db_pob; ?>" name="pob" type="text" class="form-control"/>
                                                                <span class="fa-calender form-control-feedback"></span>
                                                            </div>
                                                        </div>
                                                    </div>                                        

                                                    <div class="row  box-body">
                                                        <div class="col-xs-6">
                                                            Postal Address:
                                                            <div class="form-group">
                                                                <textarea name="paddress" class="form-control" rows="3" placeholder="Enter postal address..."><?php echo $db_paddress; ?></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-6">
                                                            Office Address:
                                                            <div class="form-group">
                                                                <textarea name="oaddress" class="form-control" rows="3" placeholder="Enter office address..."><?php echo $db_oaddress; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row  box-body">
                                                        <div class="col-xs-6">
                                                            Phone:
                                                            <div class="form-group has-feedback">
                                                                <input required="" value="<?php echo $db_phone; ?>" name="phone" type="text" class="form-control" placeholder="Phone "/>
                                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-6">
                                                            Email:
                                                            <div class="form-group has-feedback">
                                                                <input required="" name="email" type="email" value="<?php echo $db_email; ?>" class="form-control" placeholder="Email "/>
                                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                            </div>
                                                        </div>

                                                    </div> 

                                                    <div class="row  box-body">
                                                        <div class="col-xs-6"> 
                                                            <div class="form-group has-feedback">
                                                                <div class="form-group">
                                                                    <select id="state"  onchange="getlocals(this.value)" name="state" required="" class="form-control">
                                                                        <option value="">Select State</option>
                                                                        <?php
                                                                        $get_state = mysqli_query($conn, "select * from states");
                                                                        while ($db = mysqli_fetch_array($get_state)) {
                                                                            ?>
                                                                            <option value="<?php echo $db["state_id"]; ?>"  <?php
                                                                            if ($db["state_id"] == $db_state) {
                                                                                echo "selected='selected'";
                                                                            } else {
                                                                                
                                                                            }
                                                                            ?>><?php echo $db["name"]; ?></option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-6"> 
                                                            <div class="form-group has-feedback">
                                                                <?php $get_lga = mysqli_query($conn, "select * from locals where state_id='$db_state'"); ?>
                                                                <div class="form-group">
                                                                    <select id="lga" name="lga" required="" class="form-control">
                                                                        <?php
                                                                        while ($lg = mysqli_fetch_array($get_lga)) {
                                                                            ?>
                                                                            <option value="<?php echo $lg["local_id"]; ?>" <?php
                                                                            if ($lg["local_id"] == $db_lga) {
                                                                                echo "selected='selected'";
                                                                            } else {
                                                                                
                                                                            }
                                                                            ?>><?php echo $lg["local_name"]; ?></option> 
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function getlocals(val) {
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "get_lga.php",
                                                                data: 'state_id=' + val,
                                                                success: function (data) {
                                                                    $("#lga").html(data);
                                                                }
                                                            });
                                                        }
                                                    </script>                                       

                                                    <div class="row  box-body">
                                                        <div class="col-xs-12">
                                                            Permanent Address:
                                                            <div class="form-group">
                                                                <textarea name="phaddress" class="form-control" rows="3" placeholder="Enter permanent address..."><?php echo $db_phaddress; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>     

                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <h4><hr></h4>
                                                        </div>
                                                    </div>

                                                    <div class="row  box-body">
                                                        <div class="col-xs-6">
                                                            Occupation:
                                                            <div class="form-group has-feedback">
                                                                <input required="" name="occupation" value="<?php echo $db_occupation; ?>" type="text" class="form-control" placeholder="Occupation "/>
                                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-6">
                                                            Present Employer:
                                                            <div class="form-group has-feedback">
                                                                <input required="" name="employer" value="<?php echo $db_employer; ?>" type="text" class="form-control" placeholder="Employer "/>
                                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row  box-body">
                                                        <div class="col-xs-12">
                                                            Address:
                                                            <div class="form-group">
                                                                <textarea name="empaddress"  class="form-control" rows="3" placeholder="Enter Address..."><?php echo $db_empaddress; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="row  box-body">                                           
                                                        <div class="col-xs-4">
                                                            Rank/Position:
                                                            <div class="form-group has-feedback">
                                                                <input value="<?php echo $db_rank; ?>" name="rank" type="text" class="form-control" placeholder="Rank or Position "/>
                                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-4">
                                                            Phone
                                                            <div class="form-group has-feedback">
                                                                <input name="empphone" value="<?php echo $db_empphone; ?>" type="text" class="form-control" placeholder="Employer Phone "/>
                                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-4">
                                                            Email
                                                            <div class="form-group has-feedback">
                                                                <input required="" name="empemail" value="<?php echo $db_empemail; ?>" type="email" class="form-control" placeholder="Employer Email"/>
                                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            Areas Of Interest:
                                                            <div class="form-group">
                                                                <textarea name="aoi" class="form-control" rows="3" placeholder="Programming, Networking etc..."><?php echo $db_aoi; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <h4><hr></h4>
                                                        </div>
                                                    </div>

                                                    <div class="row box-body">
                                                        <span style="text-align: center;"> Tick Membership Grade:</span>
                                                        <div class="row col-xs-12 box-body">
                                                            <div class="col-xs-2">    
                                                                <div class="form-group has-feedback">                                                    
                                                                    <input <?php
                                                                    if ($db_mstatus == "Member") {
                                                                        echo "checked='checked'";
                                                                    } else {
                                                                        
                                                                    }
                                                                    ?>  type="radio" name="status" value="Member" /> MEMBER
                                                                </div>                        
                                                            </div><!-- /.col -->      
                                                            <div class="col-xs-2">    
                                                                <div class="form-group has-feedback">                                                    
                                                                    <input  type="radio" <?php
                                                                    if ($db_mstatus == "Associate") {
                                                                        echo "checked='checked'";
                                                                    } else {
                                                                        
                                                                    }
                                                                    ?> name="status" value="Associate" /> ASSOCIATE
                                                                </div>                 
                                                            </div><!-- /.col -->   
                                                            <div class="col-xs-2">    
                                                                <div class="form-group has-feedback">                                                    
                                                                    <input  type="radio" <?php
                                                                    if ($db_mstatus == "Graduate") {
                                                                        echo "checked='checked'";
                                                                    } else {
                                                                        
                                                                    }
                                                                    ?> name="status" value="Graduate" /> GRADUATE
                                                                </div>                        
                                                            </div><!-- /.col -->      
                                                            <div class="col-xs-2">    
                                                                <div class="form-group has-feedback">                                                    
                                                                    <input  type="radio" name="status" <?php
                                                                    if ($db_mstatus == "Technologist") {
                                                                        echo "checked='checked'";
                                                                    } else {
                                                                        
                                                                    }
                                                                    ?> value="Technologist" /> TECHNOLOGIST
                                                                </div>                        
                                                            </div><!-- /.col -->      
                                                            <div class="col-xs-2">    
                                                                <div class="form-group has-feedback">                                                    
                                                                    <input  type="radio" <?php
                                                                    if ($db_mstatus == "Affiliate") {
                                                                        echo "checked='checked'";
                                                                    } else {
                                                                        
                                                                    }
                                                                    ?> name="status" value="Affiliate" /> AFFILIATE
                                                                </div>                        
                                                            </div><!-- /.col -->      
                                                            <div class="col-xs-2">    
                                                                <div class="form-group has-feedback">                                                    
                                                                    <input  type="radio" name="status" <?php
                                                                    if ($db_mstatus == "Student") {
                                                                        echo "checked='checked'";
                                                                    } else {
                                                                        
                                                                    }
                                                                    ?> value="Student" /> STUDENT
                                                                </div>                        
                                                            </div><!-- /.col -->    
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
                                                            <button type="submit" name="update" class="btn btn-primary btn-block btn-flat">UPDATE RECORD</button>
                                                        </div><!-- /.col -->
                                                    </div>
                                                </form>     
                                            </div>

                                        </div>

                                        <div class="chart tab-pane " id="sales-chart" style="position: relative; height: 100%;">
                                            <?php include 'credential_update.php'; ?>
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