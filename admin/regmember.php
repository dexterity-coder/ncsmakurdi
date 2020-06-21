<?php
session_start();
include '../includes/connection.php';
include 'includes/functions.php';
$role = isset($_SESSION['urole']) ? $_SESSION['urole'] : "";
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "";


if ($role != "admin") {
    header("location:login.php");
}

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
    $memberid = uniqueCode($conn);
    $reg_date = date("Y-m-d H:i:s");
    // Images
    $pic_name = isset($_FILES['pic']['name']) ? $_FILES['pic']['name'] : "";

    $img_ext = pathinfo($pic_name, PATHINFO_EXTENSION);


    if ($pic_name != "") {
        $image_url = upload_member_passport($_FILES["pic"]["tmp_name"], $img_ext);
        if ($image_url != "") {
            $chk_email = mysqli_num_rows(mysqli_query($conn, "select * from member where email='$email'"));
            if ($chk_email > 0) {
                echo "<script>alert('This email have already been registered!')</script>";
            } else {
                $reg_member = mysqli_query($conn, "insert into member values ('$memberid','$title','$sname','$fname','$oname','$gender','$dob','$pob','$paddress','$oaddress','$phone','$email','$state','$lga','$phaddress','$occupation','$employer','$empaddress','$rank','$empphone','$empemail','$mstatus','$aoi','$image_url','$app_status','$reg_date')");

                if ($reg_member) {
                    $_SESSION["mid"] = $memberid;
                    $password= md5($email);
                    $insert_login = mysqli_query($conn, "insert into login values ('$email','$password','$mstatus','active')");
                    echo "<script>window.location.href='credentials'</script>";
                } else {
                    echo "<script>alert('Operations Failed, Please Try after some minutes!')</script>";
                }
            }
        } else {
            echo "<script>alert('Please Upload Passport Image!');</script>";
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
        <meta charset="UTF-8">
        <title>Admin | Member Registration</title>
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
                                    <h3 class="box-title">Member Registration Form</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <div class="btn-group">
                                            <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>

                                        </div>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row  box-body">
                                            <div class="col-xs-2"> 
                                                <div id="container2" class="form-group has-feedback">
                                                    <img class="alt_img" id="output_image" width="120" height="130"/>
                                                </div>   
                                            </div>
                                            <div class="row col-xs-10">
                                                <div class="row">
                                                    <div class="col-xs-6"> 
                                                        Title:
                                                        <div class="form-group has-feedback">
                                                            <input required="" name="title" type="text" class="form-control" placeholder="Title "/>
                                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-6"> 
                                                        Passport:
                                                        <div class="form-group has-feedback">
                                                            <input required="" name="pic" accept=".jpg, .jpeg, .png, .gif" onchange="preview_image(event);" type="file" class="form-control" placeholder="image "/>
                                                            <span class="glyphicon glyphicon-camera form-control-feedback"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        Surname:
                                                        <div class="form-group has-feedback">
                                                            <input required="" name="sname" type="text" class="form-control" placeholder="Surname "/>
                                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-6">
                                                        First Name:
                                                        <div class="form-group has-feedback">
                                                            <input required="" name="fname" type="text" class="form-control" placeholder="First Name "/>
                                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row  box-body">
                                            <div class="col-xs-6">
                                                Othername(s):
                                                <div class="form-group has-feedback">
                                                    <input name="oname" value="" type="text" class="form-control" placeholder="Othername "/>
                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="col-xs-6"> 
                                                Gender:
                                                <div class="form-group has-feedback">
                                                    <div class="form-group">
                                                        <select name="gender" required="" class="form-control">
                                                            <option value="">Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>                                                           
                                                        </select>
                                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>                                           
                                        </div>     

                                        <div class="row  box-body">
                                            <div class="col-xs-6">
                                                DOB:
                                                <div class="form-group has-feedback">
                                                    <input required="" name="dob" type="date" class="form-control"/>
                                                    <span class="glyphicon glyphicon-calender form-control-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="col-xs-6">
                                                Place of Birth:
                                                <div class="form-group">
                                                    <input required="" name="pob" type="text" class="form-control"/>
                                                    <span class="glyphicon glyphicon-calender form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row  box-body">
                                            <div class="col-xs-6">
                                                Postal Address:
                                                <div class="form-group">
                                                    <textarea name="paddress" class="form-control" rows="3" placeholder="Enter postal address..."></textarea>
                                                </div>
                                            </div>

                                            <div class="col-xs-6">
                                                Office Address:
                                                <div class="form-group">
                                                    <textarea name="oaddress" class="form-control" rows="3" placeholder="Enter office address..."></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row  box-body">
                                            <div class="col-xs-6">
                                                Phone:
                                                <div class="form-group has-feedback">
                                                    <input required="" name="phone" type="text" class="form-control" placeholder="Phone "/>
                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="col-xs-6">
                                                Email:
                                                <div class="form-group has-feedback">
                                                    <input required="" name="email" type="email" class="form-control" placeholder="Email "/>
                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
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
                                                    <textarea name="phaddress" class="form-control" rows="3" placeholder="Enter permanent address..."></textarea>
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
                                                    <input required="" name="occupation" type="text" class="form-control" placeholder="Occupation "/>
                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="col-xs-6">
                                                Present Employer:
                                                <div class="form-group has-feedback">
                                                    <input required="" name="employer" type="text" class="form-control" placeholder="Employer "/>
                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row  box-body">
                                            <div class="col-xs-12">
                                                Address:
                                                <div class="form-group">
                                                    <textarea name="empaddress" class="form-control" rows="3" placeholder="Enter Address..."></textarea>
                                                </div>
                                            </div>
                                        </div>  

                                        <div class="row  box-body">                                           
                                            <div class="col-xs-4">
                                                Rank/Position:
                                                <div class="form-group has-feedback">
                                                    <input name="rank" type="text" class="form-control" placeholder="Rank or Position "/>
                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="col-xs-4">
                                                Phone
                                                <div class="form-group has-feedback">
                                                    <input name="empphone" type="text" class="form-control" placeholder="Employer Phone "/>
                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="col-xs-4">
                                                Email
                                                <div class="form-group has-feedback">
                                                    <input required="" name="empemail" type="email" class="form-control" placeholder="Employer Email"/>
                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12">
                                                Areas Of Interest:
                                                <div class="form-group">
                                                    <textarea name="aoi" class="form-control" rows="3" placeholder="Programming, Networking etc..."></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4><hr></h4>
                                            </div>
                                        </div>

                                        <div class="row box-body">
                                            <span style="text-align: center;"> Tick Grade Membership:</span>
                                            <div class="row col-xs-12 box-body">
                                                <div class="col-xs-2">    
                                                    <div class="form-group has-feedback">                                                    
                                                        <input  type="radio" name="status" value="member" /> MEMBER
                                                    </div>                        
                                                </div><!-- /.col -->      
                                                <div class="col-xs-2">    
                                                    <div class="form-group has-feedback">                                                    
                                                        <input  type="radio" name="status" value="associate" /> ASSOCIATE
                                                    </div>                 
                                                </div><!-- /.col -->   
                                                <div class="col-xs-2">    
                                                    <div class="form-group has-feedback">                                                    
                                                        <input  type="radio" name="status" value="graduate" /> GRADUATE
                                                    </div>                        
                                                </div><!-- /.col -->      
                                                <div class="col-xs-2">    
                                                    <div class="form-group has-feedback">                                                    
                                                        <input  type="radio" name="status" value="technologist" /> TECHNOLOGIST
                                                    </div>                        
                                                </div><!-- /.col -->      
                                                <div class="col-xs-2">    
                                                    <div class="form-group has-feedback">                                                    
                                                        <input  type="radio" name="status" value="affiliate" /> AFFILIATE
                                                    </div>                        
                                                </div><!-- /.col -->      
                                                <div class="col-xs-2">    
                                                    <div class="form-group has-feedback">                                                    
                                                        <input  type="radio" name="status" value="student" /> STUDENT
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