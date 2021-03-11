<?php include_once('./dist/header.php'); ?>
<section class="dashboard">
    <div class="dashboard-trans">
        <div class="card">
        <?php if($title == 'lecturer'){?>
            <div class="card-header">
                <h3 class="card-title">List of Assigned Courses:</h3>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>s/n</th>
                            <th>Course Code</th>
                            <th>Course Title</th>
                            <th>Venue</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($x = 1; $x <= $num; $x++){ ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $code[$x]; ?></td>
                            <td><?php echo $Ctitle[$x]; ?></td>
                            <td><?php echo $venue[$x]; ?></td>
                            <td><a href="<?php echo base_url();?>home/attendance/<?php echo $code[$x].'-'.$lect ?>" class="activate">activate <i class="fa fa-sign-in"></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>s/n</th>
                            <th>Course Code</th>
                            <th>Course Title</th>
                            <th>Venue</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <?php }else if($title == 'student'){?>
                    <div class="card-header">
                        <h3 class="card-title">List of Offered Courses:</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>s/n</th>
                            <th>Course Code</th>
                            <th>Course Title</th>
                            <th>Venue</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($STDcourses as $row){ ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->code; ?></td>
                            <td><?php echo $row->title; ?></td>
                            <td><?php echo $row->venue; ?></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>s/n</th>
                            <th>Course Code</th>
                            <th>Course Title</th>
                            <th>Venue</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <?php }?>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
            <!-- /.card end-->

            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Attendance History:</h3>
            </div>
            <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                <?php if($title == 'lecturer'){?>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Course</th>
                            <th>Venue</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($history as $row) {?>
                        <tr>
                            <td><?php echo $row->date; ?></td>
                            <td><?php echo $row->time; ?></td>
                            <td><?php echo $row->course; ?></td>
                            <td><?php echo $row->venue; ?></td>
                            <td><?php echo $row->present; ?></td>
                            <td><?php echo $row->absent; ?></td>
                            <td><a href="<?php echo base_url();?>home/attendance/<?php echo $row->course.'-'.$row->lecturer_id ?>" class="activate">view <i class="fa fa-arrow-right"></i></a></td>
                        </tr>
                    <?php }?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Course</th>
                            <th>Venue</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Details</th>
                        </tr>
                    </tfoot>
                    <?php }else if($title == 'student'){?>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Course</th>
                            <th>Venue</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($history as $row) {?>
                        <tr>
                            <td><?php echo $row->date; ?></td>
                            <td><?php echo $row->time; ?></td>
                            <td><?php echo $row->course; ?></td>
                            <td><?php echo $row->venue; ?></td>
                            <td><?php echo $row->present; ?></td>
                            <td><?php echo $row->absent; ?></td>
                            <td>
                            <?php if ($row->portal == 'open') {?>
                            <a href="<?php echo base_url();?>home/attendance/<?php echo $row->course.'-'.$userID ?>"><?php echo $row->portal; ?> <i class="fa fa-arrow-right"></i></a>
                            <?php }else if ($row->portal == 'close') {?>
                            <i class="fa fa-ban"></i> closed
                            <?php }?>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Course</th>
                            <th>Venue</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <?php }?>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
            <!-- /.card end-->
    </div>
</section>
<?php include_once('./dist/footer.php'); ?>
