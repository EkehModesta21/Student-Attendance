<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>SAS - Sign in</title>
        <link rel="icon" href="<?php echo base_url();?>./dist/img/BIMS_icon.png">
        <meta name="viewport" content="width = device-width, initial-scale = 1.0">
        <link rel="stylesheet" href="<?php echo base_url();?>./dist/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>./dist/css/animate.css">
        <link rel="stylesheet" href="<?php echo base_url();?>./dist/css/responsive.css">
        <link rel="stylesheet" href="<?php echo base_url();?>./dist/font-awesome-4.7.0/css/font-awesome.css">
    </head>
    <body>
    <?php if (isset($msg)){echo '<label class="Err">'.$msg.'</label>';}?>
        <main class="main-containerL">
            <div class = "main-contentL">
                <header class="top-headerL"><h1>STUDENTS ATTENDANCE SYSTEM</h1></header>
                <article class="mid-contentL">
                    <section class="leftL">
                    <article class="left-content">
                        <center><img src="<?php echo base_url();?>./dist/img/pic1.png" alt="intro-img"></center>
                        <p>
                            <b>Overview: </b> This project is focused on design and implementation of students’ attendance using finger print.
I was motivated to create a more efficient way of tracking student attendance using finger print biometrics because the manual method of marking attendance is rather tedious, time consuming and prone to errors.
The proposed system has the capability to eliminate every form of impersonation since each finger thumb is unique for an individual and also it is very fast and efficient in producing report of attendance sheet for all student and lecturers so decision can be made using this report. 
The methodology used in this system is the Object-Oriented Analysis and Design Methodology (OOADM). This system is designed to have interactive forms which are control by the manipulating technique of program coding and the language used for the implementation is HTML, CSS and JavaScript for the front-end and PHP and MYSQL database as the back-end.
The result of this research work is a system that takes students’ attendance using fingerprint for the department of Computer Science in Imo State University.

                        </p>
                    </article>
                    </section>
                    <section class="right">
                        <form class="login-form" action="<?php echo base_url() ?>home/loginProcess" method="post">
                            <div class="logo-img"><center><img src="<?php echo base_url();?>./dist/img/student.jpg"></center></div>
                            <div class="input-default">
                                <span class="fa fa-sort"></span>
                                <select name="dir" class="input-default-in" required>
                                    <option selected disabled value="">Select user</option>
                                    <option value="student">Student</option>
                                    <option value="lecturer">Lecturer</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="input-default">
                                <span class="fa fa-user"></span>
                                <input type="text" class="input-default-in" placeholder="Username..." name = "username" required>
                            </div>
                            <div class="input-default">
                                <span class="fa fa-lock"></span>
                                <input type="password" class="input-default-in" placeholder="Password..." name = "password" required>
                            </div>
                            <br><center><input type="submit" class="btn-login" name="login" value="Login"></center>
                        </form>
                    </section>
                </article>
            </div>
        </main>
        <script type="text/javascript">
            let prompT = document.querySelector('.prompT');
            let Pclose = document.querySelector('.Pclose');
            if(Pclose != null){
                Pclose.addEventListener('click', function(){
                    prompT.style.display = 'none';
                });
            }
        </script>
    </body>
</html>