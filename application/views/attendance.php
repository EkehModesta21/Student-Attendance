<?php include_once('./dist/header.php'); ?>
<input type="hidden" value="<?php if($title == 'lecturer'){ echo $showPortal[0]->portal;} ?>" id="portal">
<section class="dashboard">
    <div class="dashboard-trans">
        <div class="card">
        <?php if($title == 'lecturer'){?>
            <div class="card-header">
                <h3 class="card-title">Students Present on <?php if (isset($showActiveCourse)){ echo $showActiveCourse;} ?>:</h3>
            </div>
            <div class="portalCheck">
                <form action="<?php echo base_url() ?>home/attendancePortal" method="post">
                <label>Attendance Control port: </label>
                    <label class = "radioContainer" style="border-right: 1px solid grey;" for="close">&nbsp;&nbsp;<i class="fa fa-lock"></i> Lock Attendance
                        <input type="radio" name = "portal" id="close" class="portalC" value="close">
                        <span class = "circle"></span>
                    </label>
                    <label class = "radioContainer" for="open">&nbsp;&nbsp;<i class="fa fa-unlock"></i> Unlock Attendance
                        <input type="radio" name = "portal" id="open" class="portalC" value="open">
                        <span class = "circle"></span>
                    </label>
                    <input type="submit" class="btn" name="portalBtn" value="set">
                </form><hr>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>s/n</th>
                            <th>image</th>
                            <th>mat. no</th>
                            <th>Name</th>
                            <th>Faculty</th>
                            <th>Department</th>
                            <th>level</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($x = 1; $x <= $num2; $x++){ ?>
                        <tr>
                            <td><?php if ($non != 'yes') { echo $x; }?></td>
                            <td> <?php if ($non != 'yes'){?><img src="<?php echo base_url().'./dist/img/student.jpg'?>" alt=""><?php }?></td>
                            <td><?php echo $username[$x]; ?></td>
                            <td><?php echo $name[$x]; ?></td>
                            <td><?php echo $faculty[$x]; ?></td>
                            <td><?php echo $department[$x]; ?></td>
                            <td><?php echo $level[$x]; ?></td>
                            <td><?php if ($non != 'yes'){?><i class="fa fa-check"></i><?php }?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>s/n</th>
                            <th>image</th>
                            <th>mat. no</th>
                            <th>Name</th>
                            <th>Faculty</th>
                            <th>Department</th>
                            <th>level</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            <?php }else if($title == 'student'){?> 
            <div class="card-header">
                <h3 class="card-title">Attendance Sheet on <?php if (isset($showActiveCourse)){ echo $showActiveCourse;} ?>:</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>s/n</th>
                            <th>image</th>
                            <th>mat. no</th>
                            <th>Name</th>
                            <th>Faculty</th>
                            <th>Department</th>
                            <th>level</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($STD as $row){ ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><img src="<?php echo base_url().'./dist/img/student.jpg'?>" alt=""></td>
                            <td><?php echo $row->username; ?></td>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->faculty; ?></td>
                            <td><?php echo $row->department; ?></td>
                            <td><?php echo $row->level; ?></td>
                            <td>
                            <?php if ($captured == $showActiveCourse) {?>
                                captured
                            <?php }else{?>
                                <a href="<?php echo base_url();?>home/attendanceSign/<?php echo $userID ?>" class="activate"><i class="fa fa-edit"></i> capture</a>
                            <?php }?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>s/n</th>
                            <th>image</th>
                            <th>mat. no</th>
                            <th>Name</th>
                            <th>Faculty</th>
                            <th>Department</th>
                            <th>level</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            <?php }?> 
        </div>
            <!-- /.card end-->
    </div>
    <div class="dashboard-trans">
        <div class="card">
        <?php if($title == 'student'){?> 
            <div class="card-header">
                <h3 class="card-title">Other Students Present:</h3>
            </div>
            <div class="card-body">
                <table id="example4" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>s/n</th>
                            <th>image</th>
                            <th>mat. no</th>
                            <th>Name</th>
                            <th>Faculty</th>
                            <th>Department</th>
                            <th>level</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($x = 1; $x <= $num2; $x++){ ?>
                        <?php if ($id[$x] != $userID) {?>
                        <tr>
                            <td><?php if ($non != 'yes') { echo $x; } ?></td>
                            <td> <?php if ($non != 'yes'){?><img src="<?php echo base_url().'./dist/img/student.jpg'?>" alt=""><?php }?></td>
                            <td><?php echo $username[$x]; ?></td>
                            <td><?php echo $name[$x]; ?></td>
                            <td><?php echo $faculty[$x]; ?></td>
                            <td><?php echo $department[$x]; ?></td>
                            <td><?php echo $level[$x]; ?></td>
                            <td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>s/n</th>
                            <th>image</th>
                            <th>mat. no</th>
                            <th>Name</th>
                            <th>Faculty</th>
                            <th>Department</th>
                            <th>level</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            <?php } ?>
        </div>
            <!-- /.card end-->
    </div>
</section>
<script>
    let portal = document.querySelector('#portal').value;
    let portalBox = document.querySelectorAll('.portalC');
    if(portal === 'open'){
        portalBox[1].setAttribute('checked','checked');
    }else if(portal === 'close'){
        portalBox[0].setAttribute('checked','checked');
    }
</script>
<?php include_once('./dist/footer.php'); ?>
