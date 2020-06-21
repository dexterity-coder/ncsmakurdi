<?php
session_start();
include 'includes/connection.php';
include 'includes/functions.php';

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
$db_dob = $rw["dob"];
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
            $update_member = mysqli_query($conn, "update member set sname='$sname', pob='$pob', fname='$fname', title='$title', oname='$oname', gender='$gender', phone='$phone', email='$email', state='$state', lga='$lga', mstatus='$mstatus', occupation='$occupation', rank='$rank', empphone='$empphone',empaddress='$empaddress',aoi='$aoi',img='$image_url', empemail='$empemail', employer='$employer', dob='$dob',pob='$pob', phaddress='$phaddress', paddress='$paddress',oaddress='$oaddress' where email='$id'") or die(mysqli_error($conn));

            if ($update_member) {
                $update_login = mysqli_query($conn, "update login set role='$mstatus' where username='$email'");
                $_SESSION["mid"] = $db_member_id;
                echo "<script>window.location.href='credentials'; </script>";
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


                        <div class="row">

                            <div class="col-md-12">
                                <div class="box">
                                    <div  class="box-header with-border">
                                        <h3 style="padding-left:30%; padding-right:30%; padding-bottom: 50px; color:black;" class="box-title">Member Registration Form</h3>

                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row  box-body">
                                                <div class="col-xs-2"> 
                                                    <div id="container2" class="form-group has-feedback">
                                                        <?php
                                                        if ($db_image == "") {
                                                            ?>
                                                            <img class="alt_img" id="output_image" width="120" height="130"/>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <img class = "alt_img" src='admin/media/members/<?php echo $db_image; ?>' width = "120" height = "130"/>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>   
                                                </div>
                                                <div class="row col-xs-10">
                                                    <div class="row">
                                                        <div class="col-xs-6"> 
                                                            Title:
                                                            <div class="form-group has-feedback">
                                                                <input required="" name="title" type="text" value="<?php echo $db_titile; ?>" class="form-control" placeholder="Title "/>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-6"> 
                                                            Passport:                                                           
                                                            <div  class="form-group has-feedback">
                                                                <input  required="" name="pic" accept=".jpg, .jpeg, .png, .gif" onchange="preview_image(event);" type="file" class="form-control"  placeholder="image "/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            Surname:
                                                            <div class="form-group has-feedback">
                                                                <input required="" value="<?php echo $db_sname; ?>" name="sname" type="text" class="form-control" placeholder="Surname "/>                                                               
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-6">
                                                            First Name:
                                                            <div class="form-group has-feedback">
                                                                <input required="" value="<?php echo $db_fname; ?>" name="fname" type="text" class="form-control" placeholder="First Name "/>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row  box-body">
                                                <div class="col-xs-6">
                                                    Othername(s):
                                                    <div class="form-group has-feedback">
                                                        <input name="oname" value="<?php echo $db_oname; ?>" type="text" class="form-control" placeholder="Othername "/>
                                                    </div>
                                                </div>

                                                <div class="col-xs-6"> 
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

                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="row  box-body">
                                                <div class="col-xs-6">
                                                    DOB:
                                                    <div class="form-group has-feedback">
                                                        <input required="" value="<?php echo $db_dob; ?>" name="dob" type="date" class="form-control"/>
                                                    </div>
                                                </div>

                                                <div class="col-xs-6">
                                                    Place of Birth:
                                                    <div class="form-group has-feedback">
                                                        <input required="" value="<?php echo $db_pob; ?>" name="pob" type="text" class="form-control"/>
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
                                                        <input required="" name="phone" value="<?php echo $db_phone; ?>" type="text" class="form-control" placeholder="Phone "/>

                                                    </div>
                                                </div>

                                                <div class="col-xs-6">
                                                    
                                                    Email:
                                                    <div class="form-group has-feedback">
                                                        <input required="" name="email" value="<?php echo $db_email; ?>" type="email" class="form-control" placeholder="Email "/>

                                                    </div>
                                                </div>

                                            </div> 

                                            <div class="row  box-body">
                                                <div class="col-xs-6"> 
                                                    <div class="form-group has-feedback">
                                                        State of Origin:
                                                        <div class="form-group">
                                                            <select id="state"  onchange="getlocals(this.value)" name="state" required="" class="form-control">
                                                                <option value="">Select State</option>
                                                                <?php
                                                                $get_state = mysqli_query($conn, "select * from states");
                                                                while ($db = mysqli_fetch_array($get_state)) {
                                                                    ?>
                                                                    <option value="<?php echo $db["state_id"]; ?>"><?php echo $db["name"]; ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-6"> 
                                                    <div class="form-group has-feedback">
                                                        L G A:
                                                        <div class="form-group">
                                                            <select id="lga" name="lga" required="" class="form-control">
                                                                <option>Select State First</option>                                                                                                          
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
                                                        <input required="" name="occupation" type="text" value="<?php echo $db_occupation; ?>" class="form-control" placeholder="Occupation "/>

                                                    </div>
                                                </div>

                                                <div class="col-xs-6">
                                                    Present Employer:
                                                    <div class="form-group has-feedback">
                                                        <input required="" name="employer" type="text" value="<?php echo $db_employer; ?>" class="form-control" placeholder="Employer "/>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row  box-body">
                                                <div class="col-xs-12">
                                                    Address:
                                                    <div class="form-group">
                                                        <textarea name="empaddress" class="form-control" rows="3" placeholder="Enter Address..."><?php echo $db_empaddress; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>  

                                            <div class="row  box-body">                                           
                                                <div class="col-xs-4">
                                                    Rank/Position:
                                                    <div class="form-group has-feedback">
                                                        <input name="rank" type="text" value="<?php echo $db_rank; ?>" class="form-control" placeholder="Rank or Position "/>

                                                    </div>
                                                </div>

                                                <div class="col-xs-4">
                                                    Phone
                                                    <div class="form-group has-feedback">
                                                        <input name="empphone" type="text" value="<?php echo $db_empphone; ?>" class="form-control" placeholder="Employer Phone "/>

                                                    </div>
                                                </div>

                                                <div class="col-xs-4">
                                                    Email
                                                    <div class="form-group has-feedback">
                                                        <input required="" value="<?php echo $db_empemail; ?>" name="empemail" type="email" class="form-control" placeholder="Employer Email"/>

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
                                                <span style="text-align: center; padding-left: 20px;"> Membership Grade :</span>
                                                <div class="row col-xs-12 box-body">
                                                    <div class="col-xs-2">    
                                                        <div class="form-group has-feedback">                                                    
                                                            <input required=""  type="radio" name="status" value="member" /> Member
                                                        </div>                        
                                                    </div><!-- /.col -->      

                                                    <div class="col-xs-2">    
                                                        <div class="form-group has-feedback">                                                    
                                                            <input required=""  type="radio" name="status" value="student" /> Student
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
                                                    <button type="submit" name="reg" class="btn btn-primary btn-block btn-flat">Proceed</button>
                                                </div><!-- /.col -->
                                            </div>
                                        </form>     
                                    </div>

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