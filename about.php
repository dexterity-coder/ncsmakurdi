<?php
session_start();
include 'includes/connection.php';

if (isset($_POST["Submit"])) {
    $name = htmlentities(addslashes($_POST["name"]));
    $phone = htmlentities(addslashes($_POST["phone"]));
    $email = htmlentities(addslashes($_POST["email"]));
    $subject = htmlentities(addslashes($_POST["subject"]));
    $message = htmlentities(addslashes($_POST["message"]));
    $date = date("Y-m-d H:m:s");
    $status = "no";

    $insert = mysqli_query($conn, "insert into contact values ('','$name','$email','$subject','$message','$date','$status')");
    if ($insert) {
        echo "<script>alert('Message submitted successfully');</script>";
    } else {
        echo "<script>alert('Operations failed, please try after some minutes')</script>";
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title><?php echo $sitename; ?> | Contact Us ?> </title>
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
        <div  class="inner_page_agile">
            <h3>Contac Us</h3>


        </div>
        <!--//banner -->
        <!--/w3_short-->
        <div class="services-breadcrumb_w3layouts">
            <div class="inner_breadcrumb">

                <ul class="short_w3ls"_w3ls>
                    <li><a href="index">Home</a><span>|</span></li>
                    <li>About Us </li>
                </ul>
            </div>
        </div>
        <!--//banner -->
        <!-- /inner_content -->
        <div class="inner_content_info_agileits">
            <div class="container">
                <div class="tittle_head_w3ls">
                    <h3 class="tittle">About Us</h3>
                </div>

                <div class="inner_sec_grids_info_w3ls">
                    <div class="col-md-4 agile_info_mail_img_info">
                        <img src="images/LOG.jpg" width="100%" height="100%" alt="">
                    </div>
                    <div class="col-md-8" >
                        <p align='left'>  The Nigeria Computer Society (NCS) is the umbrella organization of all Information Technology Professionals,
                            Interest Groups and Stakeholders in Nigeria. Formed in 1978 as Computer Association of Nigeria (COAN); and 
                            Transformed into NCS in 2002 as a result of harmonization with other stakeholder and interest groups. 
                            NCS is the national platform for the advancement of Information Technology Science and Practice in Nigeria
                            Mission:&nbsp;&nbsp;&nbsp;</p><br>

                        <p align='left'> Advancement of Information Technology Science and Practice;  and their deployments as solutions and business 
                            enablers to all industry practices of human endeavour. The Constitution of the Nigeria Computer Society</p><br>

                        Strategic Objectives:<br>

                        <ol>
                            <li> Promotion of the education and training of Computer & Information Scientists, Computer Engineers, Information Architects and Information Technology & Systems Professionals.</li>

                            <li>    Actively encourage research in the advancement of Computer & Information Science, Information Technology & Systems, and practice; and disseminate results of scientific works carried out in industry, military and education sectors.</li>

                            <li>  To promote the interchange of information about the sciences and arts of information processing and management among specialists and the public.</li>

                            <li>   To develop the competence of members and encourage integrity among members who are engaged in the practice of Computing, and to uphold the ethics of the profession as contained in the Code of Conduct and the Code of Practice of the Society.</li>

                            <li>   To promote and protect the professional interests of its members.</li>

                            <li>  To advise members, governments, other competent authorities and the general public, on national and international policy matters affecting the computing, information & systems technology industry.</li>

                            <li>    To build global affiliations, to cooperate with similar professional organizations throughout the world, and to receive, render or reciprocate such services as are beneficial to and consistent with the objectives of the Society.</li>

                            <li>   To position as the sole representative of members of the Society in all negotiations and consultations with the Federal, State and Local governments and their agencies on matters of policy affecting the conduct and practice of the computing and information technology & systems profession and industry.</li>

                            <li>    To contribute to the formulation of polices, and the development and assessment of educational and training curricula relating to the profession.</li>

                            <li>To recognise and advance the interests of gender, the handicapped and other disadvantaged groups as enshrined in the Constitution of the Federal Republic of Nigeria as relates to the information and computing society.</li>

                            <li>To advocate for the recognition by Government of that complex of issues and concepts subsumed in the “Digital Divide”.

                            <li>To collaborate with relevant governments, institutions and organisations in proffering solutions to the issues of the “Digital Divide”.</li>

                            <li>To institute National merit awards for deserving members of the Society and other promoters of Information Technology.
                        </ol><br>


                        <b>Interest Groups:</b>

                        <ol type='i'>
                            <li>Information Technology Association of Nigeria – ITAN</li>
                            <li> Institute of Software Practitioners of Nigeria – ISPON</li>
                            <li> Internet Service Providers Association of Nigeria – ISPAN</li>
                            <li> Nigerian Women In Information Technology – NIWIIT</li>
                            <li> Nigerian Information Technology Professionals in the Civil Service (NITPCS)</li>
                            <li> Information Technology Systems and Security Professionals (ITSSP)</li>
                        </ol><br>


                        <b>Student Group:</b>

                        <ol type='i'>
                            <li> Nigerian Association of Computer Science Students – NACOSS</li>
                            <li>  NACOSS comprises of all Computer Science/Information Technology Students in all Tertiary Institutions and other NCS/CPN recognized Information Technology Training Centers in Nigeria</li>
                        </ol>
                        
                        <a href='registration'>JOIN US</a>
                    </div>
                    <div class="clearfix"> </div>


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