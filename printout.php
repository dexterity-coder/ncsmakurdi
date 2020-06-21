<?php
session_start();
include 'includes/connection.php';
include 'admin/includes/functions.php';
if (!$_SESSION) {
    header("location:login");
}
$id = isset($_SESSION["userid"]) ? $_SESSION["userid"] : "";

//member records
$rw = mysqli_fetch_array(mysqli_query($conn, "select * from member where email='$id'"));
$db_member_id = $rw["member_id"];
$db_sname = $rw["sname"];
$db_oname = $rw["oname"];
$db_fname = $rw["fname"];
$db_gender = $rw["gender"];
$db_phone = $rw["phone"];
$db_email = $rw["email"];
$db_pob = $rw["pob"];
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
$db_aoi = $rw["aoi"];
$db_image = $rw["img"];
$db_app_status = $rw["app_status"];
$db_date = $rw["reg_date"];
$db_state = $rw["state"];
$db_lga = $rw["lga"];
$db_mstatus = $rw["mstatus"];


if (isset($_POST["reg"])) {
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
    $app_status = "no";
    $aoi = secure($_POST["aoi"]);
    // Images
    $pic_name = isset($_FILES['pic']['name']) ? $_FILES['pic']['name'] : "";

    $img_ext = pathinfo($pic_name, PATHINFO_EXTENSION);


    if ($pic_name != "") {
        $image_url = upload_member_passport($_FILES["pic"]["tmp_name"], $img_ext);
        if ($image_url != "") {

            $update_member = mysqli_query($conn, "update member set sname='$sname', pob='$pob', fname='$fname', title='$title', oname='$oname', gender='$gender', phone='$phone', email='$email', state='$state', lga='$lga', mstatus='$mstatus', occupation='$occupation', rank='$rank', empphone='$empphone', empemail='$empemail', employer='$employer', dob='$dob', phaddress='$phaddress', paddress='$paddress',oaddress='$oaddress' where email='$id'") or die(mysqli_error($conn));

            if ($update_member) {
                $update_login = mysqli_query($conn, "update login set role='$mstatus' where username='$email'");
                $_SESSION["mid"] = $db_member_id;
                echo "<script>alert('Member record added successfully!'); window.location.href='credentials'</script>";
            } else {
                echo "<script>alert('Operations Failed, Please Try after some minutes!')</script>";
            }
        } else {
            echo "<script>alert('Please Upload Passport Image!')</script>";
        }
    } else {
        ?>
        <script>alert('Please Upload Passport Image!');</script>   
        <?php
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>  Member Registration | <?php echo $sitename; ?>  </title>
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


                        <div class="box-body">
                            <form method="post" name="form1" action="">   


                                <table width="842" align="center" id="dataTable" style="border:2px #066 solid">
                                    <tr>
                                        <td style="padding-top:12px; " align="right"><img src="images/single.jpg" width="220" height="110" />
                                            <span style="text-align: right; color:green !important; -webkit-print-color-adjust: exact; padding-right:15px; font-size:22px;  font-weight: bold;">www.ncs.org.ng</span></td>
                                        <td>
                                            <p align="justify" style=" padding-bottom:0px; margin-top:0px; margin-right: 10px;  padding-right:20px; background-color: #8FBC8F; margin-left:0px;">
                                                <b>Secretariat:</b>  c/o Xttech Global Services Limited 73 Iyorchia Ayu Road (Topmost Floor), 
                                                Opposite Nobis Supermarket, Wurukum,  Makurdi, Benue State.  
                                                <br><b> Tel:</b> +2348135087166; +2347030936478, +2347038892859.   
                                                <br><b> Email:</b> info@ncsbenue.org.ng, ncsbenue@yahoo.com 
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" colspan="2"><hr /></td>
                                    </tr>    
                                    <tr align="center">
                                        <td colspan="2"   align="center">
                                            <h4><b> State Membership Registration Form</b></h4>
                                        </td>                            
                                    </tr>

                                    <tr align="center">
                                        <td   align="right">
                                            <p  style="padding-right: 0px; text-align: right;"> <b</b> </p>
                                        </td> 
                                        <td  style="padding-right: 60px;" align="right">
                                            <img src="admin/media/members/<?php echo $db_image; ?>" width="140" height="140"/>
                                        </td> 
                                    </tr>

                                    <tr align="center">
                                        <td colspan="2"   align="center">
                                            <b><u>FORM A</u></b>
                                        </td>                            
                                    </tr>
                                    <tr align="center">
                                        <td colspan="2"   align="center">
                                            <b>  CHAPTER:&nbsp;&nbsp;</b> BENUE CHAPTER
                                        </td>                            
                                    </tr>
                                    <tr align="center">
                                        <td colspan="2"   align="center">
                                            <hr>
                                        </td>                            
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <table align='center' class="tablhe" style="margin: 10px; padding: 20px;" width='100%'>                     
                                                <tr>                                                     
                                                    <td colspan="3" align="left" >
                                                        <b >Chapter ID:&nbsp;&nbsp;</b> <u>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo strtoupper($db_member_id); ?> &nbsp;&nbsp;&nbsp;&nbsp;</u>
                                                        &nbsp;&nbsp; <b >Title:&nbsp;&nbsp;</b> <u style="">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo strtoupper($db_titile); ?> &nbsp;&nbsp;&nbsp;&nbsp;</u>
                                                        &nbsp;&nbsp; <b> Full Name:&nbsp;&nbsp;</b><u>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo strtoupper($db_sname); ?> &nbsp;&nbsp; <?php echo strtoupper($db_fname); ?> &nbsp; &nbsp; <?php echo strtoupper($db_oname); ?> &nbsp;&nbsp;&nbsp;&nbsp;</u>
                                                    </td>                            
                                                </tr>  

                                                <tr>
                                                    <td colspan="3"> &nbsp;&nbsp;</td>
                                                </tr>

                                                <tr>
                                                    <td align="left">
                                                        <b >Phone:&nbsp;&nbsp;</b> <u>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo strtoupper($db_phone); ?> &nbsp;&nbsp;&nbsp;&nbsp;</u>
                                                    </td>
                                                    <td align="left" colspan="2">
                                                        <b >Email:&nbsp;&nbsp;</b> <u >&nbsp;&nbsp;&nbsp;&nbsp; <?php echo strtoupper($db_email); ?> &nbsp;&nbsp;&nbsp;&nbsp;</u>
                                                    </td>
                                                                            
                                                </tr>

                                                <tr>
                                                    <td colspan="3"> &nbsp;&nbsp;</td>
                                                </tr>

                                                <tr>                                                  
                                                    <td align="left">
                                                        <b> Date of Birth:&nbsp;&nbsp;</b><u>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $db_dob; ?>&nbsp;&nbsp;&nbsp;&nbsp;</u>
                                                    </td>   
                                                    <td align="left" colspan="2">
                                                        <b> Place of Birth:&nbsp;&nbsp;</b><u>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $db_pob; ?>&nbsp;&nbsp;&nbsp;&nbsp;</u>
                                                    </td>    
                                                </tr>


                                                <tr>
                                                    <td colspan="3"> &nbsp;&nbsp;</td>
                                                </tr>

                                                <tr>                            
                                                    <td colspan="3">
                                                        <b >Postal Address:&nbsp;&nbsp;</b> <u>&nbsp;&nbsp;<?php echo ucfirst($db_paddress); ?>&nbsp;&nbsp;</u> 
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="3">&nbsp;</td>
                                                </tr>

                                                <tr>                            
                                                    <td colspan="3">
                                                        <b >Office Address:&nbsp;&nbsp;</b> <u>&nbsp;&nbsp;<?php echo ucfirst($db_oaddress); ?>&nbsp;&nbsp;</u>
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="3">&nbsp;</td>
                                                </tr>

                                                <tr>                            
                                                    <td colspan="3" align="left">
                                                        <b> Permanent Address:&nbsp;&nbsp;</b> <u>&nbsp;&nbsp;<?php echo ucfirst($db_phaddress); ?>&nbsp;&nbsp;</u>
                                                    </td>                         
                                                </tr>

                                                <tr>
                                                    <td colspan="3"><hr></td>
                                                </tr>

                                                <tr>                            
                                                    <td >
                                                        <b >Occupation:&nbsp;&nbsp;</b> <u>&nbsp;&nbsp;<?php echo strtoupper($db_occupation); ?>&nbsp;&nbsp;</u>
                                                    </td>
                                                    <td colspan="2">
                                                        <b >Present Emplyer:&nbsp;&nbsp;</b> <u>&nbsp;&nbsp;<?php echo strtoupper($db_employer); ?>&nbsp;&nbsp;</u>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3">&nbsp;</td>
                                                </tr>

                                                <tr>                            
                                                    <td colspan="3" align="left">
                                                        <b> Employer Address:&nbsp;&nbsp;</b> <u>&nbsp;&nbsp;<?php echo ucwords($db_empaddress); ?>&nbsp;&nbsp;</u>
                                                    </td>                         
                                                </tr>

                                                <tr>
                                                    <td colspan="3">&nbsp;</td>
                                                </tr>


                                                <tr>                            
                                                    <td align="left">
                                                        <b> Position/Rank:&nbsp;&nbsp;</b> <u>&nbsp;&nbsp;<?php echo ucwords($db_rank); ?>&nbsp;&nbsp;</u>
                                                    </td>    
                                                    <td align="left">
                                                        <b> Phone:&nbsp;&nbsp;</b> <u>&nbsp;&nbsp;<?php echo ucwords($db_empphone); ?>&nbsp;&nbsp;</u>
                                                    </td>
                                                    <td align="left">
                                                        <b> Email:&nbsp;&nbsp;</b> <u>&nbsp;&nbsp;<?php echo ucwords($db_empemail); ?>&nbsp;&nbsp;</u>
                                                    </td>                         
                                                </tr>

                                                <tr>
                                                    <td colspan="3"><hr></td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3" align='center'> 
                                                        <table width='802' style="border: 1px solid black;">
                                                            <tr>                                        
                                                                <td colspan="3" align='center'>
                                                                    MEMBERSHIP GRADE: &nbsp;&nbsp; <b><?php echo strtoupper($db_mstatus) ?></b>
                                                                </td>

                                                            </tr>
                                                        </table>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td colspan="3"><hr></td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3"><b>EDUCATIONAL INFORMATION</b></td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <table width='802' align='center' border='1'>
                                                            <tr align='center'>
                                                                <td><b>S/N</b></td>
                                                                <td><b>Qualification(s)</b></td>
                                                                <td><b>Institution(s) Attended</b></td>
                                                                <td><b>Graduation Year</b></td>                                    
                                                            </tr>
                                                            <?php
                                                            $get_qualifications = mysqli_query($conn, "select * from qualification WHERE member_id='$db_member_id' order by date asc") or die(mysqli_error($conn));
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
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                        </table>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <hr>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3"><b>PROFESSIONAL EXPERIENCE IN INFORMATION TECHNOLOGY</b></td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <table width='802' border='1' style="text-align:center;" >
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
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $get_techexperience = mysqli_query($conn, "select * from techexperience WHERE member_id='$db_member_id'") or die(mysqli_error($conn));
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
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <hr>
                                                    </td>
                                                </tr>                    


                                                <tr>
                                                    <td colspan="3">
                                                        <b>AREA OF INTEREST:&nbsp;&nbsp;</b> <?php echo strtoupper($db_aoi) ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        &nbsp;&nbsp;
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <b> FULL DESCRIPTION OF DUTIES PRESENTLY UNDERTAKING </b>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <table width='802' align='center' border='1'>
                                                            <thead>
                                                            <th>S/N</th>                                       
                                                            <th>Present Duties</th>                                        
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $get_duties = mysqli_query($conn, "select * from duties WHERE member_id='$db_member_id'") or die(mysqli_error($conn));
                                                                $a = 0;
                                                                while ($row = mysqli_fetch_array($get_duties)) {
                                                                    $a++;
                                                                    $description = $row["duty"];
                                                                    $duty_id = $row["did"];
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $a; ?></td>                                                    
                                                                        <td><?php echo $description; ?></td>

                                                                    </tr>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <hr>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <b> SPONSORS INFORMATION</b>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <table align="center" width="802" border="1">
                                                            <thead>
                                                            <th>S/N</th>                                       
                                                            <th>Sponsor Name</th>
                                                            <th>Membership NO.</th>
                                                            <th>Grade</th>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $get_sponsor = mysqli_query($conn, "select * from sponsor WHERE member_id='$db_member_id'") or die(mysqli_error($conn));
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

                                                                    </tr>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>

                                                    </td>
                                                </tr>

                                            </table>
                                        </td>
                                    </tr>


                                </table>
                                <span align="right"> <a href="javascript:printtab()"><b>Print</b></a></span>
                            </form>

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