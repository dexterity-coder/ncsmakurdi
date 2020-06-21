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
            $get_qualifications = mysqli_query($conn, "select * from qualification WHERE member_id='$id' order by date asc") or die(mysqli_error($conn));
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
                    <td><a onclick="return confirm('You are about to remove this particuler record')" href="editmembers.php?del=<?php echo base64_encode($qual_id); ?>">
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
        <h3 class="box-title">PROFESSIONAL INFO-TECH EXPERIENCE</h3>                                   
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
            $get_techexperience = mysqli_query($conn, "select * from techexperience WHERE member_id='$id'") or die(mysqli_error($conn));
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
                    <td><a onclick="return confirm('You are about to remove this particuler record')" href="editmembers.php?tech=<?php echo base64_encode($tech_id) ?>">
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
            $get_duties = mysqli_query($conn, "select * from duties WHERE member_id='$id'") or die(mysqli_error($conn));
            $a = 0;
            while ($row = mysqli_fetch_array($get_duties)) {
                $a++;
                $description = $row["duty"];
                $duty_id = $row["did"];
                ?>
                <tr>
                    <td><?php echo $a; ?></td>                                                    
                    <td><?php echo $description; ?></td>
                    <td><a onclick="return confirm('You are about to remove this particuler record')" href="editmembers.php?did=<?php echo base64_encode($duty_id) ?>">
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
    $get_sponsor = mysqli_query($conn, "select * from sponsor WHERE member_id='$id'") or die(mysqli_error($conn));
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
            <td><a onclick="return confirm('You are about to remove this particuler record')" href="editmembers.php?sp=<?php echo base64_encode($spid) ?>">
                    <button class="btn btn-danger btn-block btn-flat">Remove</button>
                </a></td>
        </tr>
        <?php
    }
    ?>
</tbody>
</table>
