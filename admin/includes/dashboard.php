<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class=" glyphicon glyphicon-camera"></i></span>
            <div class="info-box-content">
                <?php
                $num = mysqli_num_rows(mysqli_query($conn, "select * from contact"));
                ?>
                <span class="info-box-text">Feedback Messages</span>
                <span class="info-box-number"><?php echo $num; ?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-book"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Blog Content</span>
                <?php
                $art_num = mysqli_num_rows(mysqli_query($conn, "select * from blog"));
                ?>

                <span class="info-box-number"><?php echo $art_num; ?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
                <?php
                $members_num = mysqli_num_rows(mysqli_query($conn, "select * from member"));
                ?>
                <span class="info-box-text">Total Members</span>
                <span class="info-box-number"><?php echo $members_num; ?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i  class=" glyphicon glyphicon-user"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <?php
                $interval = "2 months";
                $date = date("Y-m-d");
                $date_object = date_create($date);
                $added_date = date_sub($date_object, date_interval_create_from_date_string($interval));
                $new_members_date_range = date_format($added_date, "Y-m-d");
                $new_members = mysqli_num_rows(mysqli_query($conn, "select * from member where reg_date > '$new_members_date_range'"));
                ?>

                <span class="info-box-number"><?php echo $new_members; ?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
</div><!-- /.row -->