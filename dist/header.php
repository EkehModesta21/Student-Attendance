<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>SAS - Dashboard</title>
        <link rel="icon" href="<?php echo base_url();?>./dist/img/BIMS_icon.png">
        <meta name="viewport" content="width = device-width, initial-scale = 1.0">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url();?>./dist/plugins/datatables/dataTables.bootstrap4.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url();?>./dist/css/adminlte.min.css">
        <!-- Custom styles -->
        <link rel="stylesheet" href="<?php echo base_url();?>./dist/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>./dist/css/animate.css">
        <link rel="stylesheet" href="<?php echo base_url();?>./dist/font-awesome-4.7.0/css/font-awesome.css">
    </head>
    <body>
        <main class="dashboard-main-container">
            <header class="top-header">
                <article class="logo"><i class="fa fa-book"></i></article>
                <article class="label"><h1>Student Attendance System</h1><p>&nbsp;(SAS)</p><h2>SAS</h2></article>
                <article class="profile">
                    <div class="header-profile-img"><i class="fa fa-user"></i></div>
                    <p class="standBy"><a href="#">Support</a></p> 
                    <p class="SignOut"><a href="<?php echo base_url();?>home/logout">Sign out</a></p>
                </article>
            </header>
            <div class="general-main-container">
                
                <section class="left-bar" id = "leftSlide">
                    <table class="left-bar-container">
                    <?php if ($title != 'admin') { ?>
                        <tr class="slideArrow"><td><span class = "fa fa-angle-double-right" id="slideArrow1"></span><span class = "fa fa-angle-double-left" id="slideArrow2"></span></td></tr>
                        <tr class="<?php if (isset($active1)){ echo $active1;} ?>" title="Dashboard">
                            <td><a href="<?php echo base_url();?>home/loadDashboard"><i class="fa fa-dashboard"></i> <span class = "leftBarText">&nbsp;Dashboard</span></a></td>
                        </tr>         
                        <!-- added new 1 begin -->
                        <tr title="Report" class="repSign <?php if (isset($active3)){ echo $active3;} ?>">
                            <td><a href="<?php echo base_url();?>home/report"><i class="fa fa-bar-chart-o"></i> <span class = "leftBarText">&nbsp;Report</span></a></td>
                        </tr>
                    <?php }?>
                        <tr title="Sign out" class="repSign">
                            <td><a href="<?php echo base_url();?>home/exit"><i class="fa fa-sign-out"></i> <span class = "leftBarText">&nbsp;Sign out</span></a></td>
                        </tr>   
                        <!-- added new 1 end -->
                    </table>
                </section>

                <div class="right-content">
                    <section class="main-content">  
                    
                        <div class="menuTitle">
                            <p><span><i class="fa fa-user"></i> user: &nbsp; <?php if ($title != '') { echo $title; } ?> &nbsp; | &nbsp;</span> <?php if ($titleHeader != '') { echo $titleHeader; } ?></p>
                            <p class="titleIcons"><a href="#"><i class="fa fa-plus"></i></a><a href="#"><i class="fa fa-bell-o"></i></a><a href="#"><i class="fa fa-envelope-o"></i></a><a href="#"><i class="fa fa-gear"></i></a></p>
                        </div> 
                        <?php if (isset($msg)){echo '<label class="Err">'.$msg.'</label>';}?>
                        