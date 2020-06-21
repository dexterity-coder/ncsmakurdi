<div style="position: fixed !important; width: 100%; background-color:#FFF; z-index:1; margin-bottom:300px !important;" class="header" id="home">
    <div class="content white agile-info">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <img style="" src="images/log.jpg" height="64" width="150">
                       <!-- <h1><span class="fa fa-desktop" aria-hidden="true"></span> NCS <label>Benue Chapter</label></h1> -->
                    </a>
                </div>
                <!--/.navbar-header-->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <nav class="link-effect-2" id="link-effect-2">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index" class="effect-3">Home</a></li>

                            <?php
                            if (!$_SESSION) {
                                ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">Membership <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="registration">Join Us</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Update Info</a></li>
                                        <li class="divider"></li>
                                        <?php
                                        if (!$_SESSION) {
                                            ?>
                                            <li><a href="login">Login</a></li>
                                            <li class="divider"></li>
                                            <?php
                                        } else {
                                            ?>
                                            <li><a href="logout">Logout</a></li>
                                            <li class="divider"></li>
                                            <?php
                                        }
                                        ?>

                                    </ul>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">Account <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        if (($_SESSION["role"] ? $_SESSION["role"] : "") == "admin") {
                                            ?>                                           
                                            <li><a href="logout">Logout</a></li>
                                            <?php
                                        } else {
                                            if (($_SESSION["status"] ? $_SESSION["status"] : "") == "active") {
                                                ?>
                                                <li><a href="printout">Profile</a></li>                                                 
                                                <?php
                                            } else {
                                                ?>
                                                <li><a href="joinus">Profile</a></li>
                                                <?php
                                            }
                                            ?>
                                            <li><a href="changepass">Change Password</a></li>
                                            <li><a href="logout">Logout</a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </li>                               
                                <?php
                            }
                            ?>


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">Events <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Annual Programs</a></li>
                                    <li><a href="#">Advocacy Visits</a></li>
                                    <li><a href="#">Next Events</a></li>
                                    <li><a href="#">Past Events</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">Get Involved <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Webiner Registration</a></li>
                                    <li><a href="#">General Meeting</a></li>
                                    <li><a href="#">Techies' Hangout Team(THT) </a></li>
                                    <li><a href="#">C4S Initiative Team (C4SiT)</a></li>
                                    <li><a href="#">Become a Sponsor</a></li>
                                    <li><a href="#">App Developer</a></li>
                                    <li><a href="#">Researcher</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">Initiatives <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Techies' Hangout Initiative(THI) </a></li>
                                    <li><a href="#">Computer-4-School Initiative(C4SI)</a></li>
                                    <li><a href="#">Tech Kids Dev(TKD)</a></li>
                                    <li><a href="#">Tech Day</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">Resources <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="blog">Our Blog</a></li>
                                    <li><a href="#">Chapter By-Laws</a></li>
                                    <li><a href="#">Multimedia</a></li>
                                    <li><a href="#">Tech Kids Dev(TKD)</a></li>
                                    <li><a href="#">Downloads</a></li>
                                    <li><a href="#">Research Work</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">About Us <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Chapter Executives</a></li>
                                    <li><a href="#">Advisory Group</a></li>
                                    <li><a href="#">National Excos</a></li>
                                    <li><a href="contact" class="effect-3">Contact Us</a></li>

                                </ul>
                            </li>                           

                        </ul>
                    </nav>
                </div>
            </div>
        </nav>
    </div>
</div>