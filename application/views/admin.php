<?php include_once('./dist/header.php'); ?>
<section class="dashboard">
    <div class="dashboard-trans">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Courses Table:</h3>
            </div>
           <!-- new added 2 begin -->
           <form method="POST" action="<?php echo base_url() ?>home/adminAddCourse" class="editBox">
                <input type="text" class="editBox-cat" placeholder="Course Code.." name = "code" value="<?php if($queryC != ''){echo $queryC[0]->code;}?>" required>
                <textarea name="title" id="" class="editBox-tArea" placeholder="Course Title.." cols="32" rows="2" required><?php if($queryC != ''){echo $queryC[0]->title;}?></textarea>
                <input type="text" class="editBox-cat" placeholder="Venue.." name = "venue" value="<?php if($queryC != ''){echo $queryC[0]->venue;}?>" required>
                <button type="submit" class="editBox-eBtn">Add / edit</button>
            </form><hr>
            <!-- new added 2 end -->
            <div class="card-body">
                <table id="example4" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>s/n</th>
                            <th>Course Code</th>
                            <th>Course Title</th>
                            <th>Venue</th>
                            <th>Edit</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($adminCourses as $row) {?>
                        <tr>
                            <td><?php echo $row->id ?></td>
                            <td><?php echo $row->code ?></td>
                            <td><?php echo $row->title ?></td>
                            <td><?php echo $row->venue ?></td>
                            <td><a href="<?php echo base_url() ?>home/adminEdit/courses/<?php echo $row->id ?>" class="blue"><i class="fa fa-edit"></i> edit</a></td>
                            <td><a href="<?php echo base_url() ?>home/adminRemove/courses/<?php echo $row->id ?>" class="red"><i class="fa fa-close"></i> remove</a></td>
                        </tr>
                    <?php }?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>s/n</th>
                            <th>Course Code</th>
                            <th>Course Title</th>
                            <th>Venue</th>
                            <th>Edit</th>
                            <th>Remove</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
            <!-- /.card end-->
    </div>

    <div class="dashboard-trans">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lecturer Table:</h3>
            </div>
           <!-- new added 2 begin -->
           <form method="POST" action="<?php echo base_url() ?>home/adminAddLecturer" class="editBox">
                <input type="text" class="editBox-cat" placeholder="Username.." value="<?php if($queryL != ''){echo $queryL[0]->username;}?>" name = "user" required>
                <input type="text" class="editBox-cat" placeholder="Password.." value="<?php if($queryL != ''){echo $queryL[0]->password;}?>" name = "pass" required>
                <input type="text" class="editBox-cat" placeholder="Name.." value="<?php if($queryL != ''){echo $queryL[0]->name;}?>" name = "name" required>
                <input type="text" class="editBox-cat" placeholder="Courses ID (1,2,3).." value="<?php if($queryL != ''){echo $queryL[0]->courses;}?>" name = "code" required>
                <button type="submit" class="editBox-eBtn">Add / edit</button>
            </form><hr>
            <!-- new added 2 end -->
            <div class="card-body">
                <table id="example5" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>s/n</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Name</th>
                            <th>Courses</th>
                            <th>Edit</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($adminLecturers as $row) {?>
                        <tr>
                            <td><?php echo $row->id ?></td>
                            <td><?php echo $row->username ?></td>
                            <td><?php echo $row->password ?></td>
                            <td><?php echo $row->name ?></td>
                            <td><?php echo $row->courses ?></td>
                            <td><a href="<?php echo base_url() ?>home/adminEdit/lecturer/<?php echo $row->id ?>" class="blue"><i class="fa fa-edit"></i> edit</a></td>
                            <td><a href="<?php echo base_url() ?>home/adminRemove/lecturer/<?php echo $row->id ?>" class="red"><i class="fa fa-close"></i> remove</a></td>
                        </tr>
                    <?php }?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>s/n</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Name</th>
                            <th>Courses</th>
                            <th>Edit</th>
                            <th>Remove</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
            <!-- /.card end-->
    </div>

    <div class="dashboard-trans">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Student Table:</h3>
            </div>
           <!-- new added 2 begin -->
           <form method="POST" action="<?php echo base_url() ?>home/adminAddStudents" class="editBox">
                <input type="text" class="editBox-cat" placeholder="Mat. no.." value="<?php if($queryS != ''){echo $queryS[0]->username;}?>" name = "user" required>
                <input type="text" class="editBox-cat" placeholder="Password.." value="<?php if($queryS != ''){echo $queryS[0]->password;}?>" name = "pass" required>
                <input type="text" class="editBox-cat" placeholder="Name.." value="<?php if($queryS != ''){echo $queryS[0]->name;}?>" name = "name" required>
                <input type="text" class="editBox-cat" placeholder="Faculty.." value="<?php if($queryS != ''){echo $queryS[0]->faculty;}?>" name = "fac" required>
                <input type="text" class="editBox-cat" placeholder="Department.." value="<?php if($queryS != ''){echo $queryS[0]->department;}?>" name = "dept" required>
                <input type="text" class="editBox-cat" placeholder="Level.." value="<?php if($queryS != ''){echo $queryS[0]->level;}?>" name = "level" required>
                <button type="submit" class="editBox-eBtn">Add / edit</button>
            </form><hr>
            <!-- new added 2 end -->
            <div class="card-body">
                <table id="example6" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>s/n</th>
                            <th>Mat. no</th>
                            <th>Password</th>
                            <th>Name</th>
                            <th>Faculty</th>
                            <th>Department</th>
                            <th>Level</th>
                            <th>Edit</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($adminStudents as $row) {?>
                        <tr>
                            <td><?php echo $row->id ?></td>
                            <td><?php echo $row->username ?></td>
                            <td><?php echo $row->password ?></td>
                            <td><?php echo $row->name ?></td>
                            <td><?php echo $row->faculty ?></td>
                            <td><?php echo $row->department ?></td>
                            <td><?php echo $row->level ?></td>
                            <td><a href="<?php echo base_url() ?>home/adminEdit/student/<?php echo $row->id ?>" class="blue"><i class="fa fa-edit"></i> edit</a></td>
                            <td><a href="<?php echo base_url() ?>home/adminRemove/student/<?php echo $row->id ?>" class="red"><i class="fa fa-close"></i> remove</a></td>
                        </tr>
                    <?php }?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>s/n</th>
                            <th>Mat. no</th>
                            <th>Password</th>
                            <th>Name</th>
                            <th>Faculty</th>
                            <th>Department</th>
                            <th>Level</th>
                            <th>Edit</th>
                            <th>Remove</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
            <!-- /.card end-->
    </div>
</section>
<?php include_once('./dist/footer.php'); ?>
