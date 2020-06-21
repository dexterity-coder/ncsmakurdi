<div class="box-body">
    <form method="post" name="form1" action="">   


        <table width="842" align="center" id="dataTable" style="border:2px #066 solid">
            <tr>
                <td style="padding-top:12px;" align="right"><img src="../images/single.jpg" width="220" height="110" />
                    <span style="text-align: right; color:green !important; -webkit-print-color-adjust: exact; padding-right:15px; font-size:22px;  font-weight: bold;">www.ncs.org.ng</span></td>
                <td>
                    <p align="justify" style=" padding-bottom:0px; margin-top:0px; margin-right: 10px; background-color: #8FBC8F; margin-left:0px;">
                        <b>Secretariat:</b>  c/o Xttech Global Services Limited 73 Iyorchia Ayu Road (Topmost Floor), 
                        Opposite Nobis Supermarket, Wurukum,  Makurdi, Benue State.  
                        <b> Tel:</b> +2348135087166; +2347030936478, +2347038892859.   
                        <b> Email:</b> info@ncsbenue.org.ng, ncsbenue@yahoo.com 
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
                    <img src="media/members/<?php echo $db_image; ?>" width="140" height="140"/>
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