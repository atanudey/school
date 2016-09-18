<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>KRP Educare</title>
	    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/bootstrap-datetimepicker.min.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/responsive-style.css') ?>" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/slider.css') ?>" />
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900,900italic|Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>" type="image/x-icon">
		
		<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/jquery-1.12.3.js') ?>"></script>
        <script type="text/javascript" language="javascript" src="<?= base_url('assets/js/jquery.cookie.min.js') ?>"></script>        
		<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/jquery-ui.js') ?>"></script>
		<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
		<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/dataTables.bootstrap.min.js') ?>"></script>
        <script type="text/javascript" language="javascript" src="<?= base_url('assets/js/moment.min.js') ?>"></script>
		<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/bootstrap-datetimepicker.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/slider.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/script.js') ?>"></script>

        <script language="javascript">
            $(document).ready(function() {
                if ($.cookie("theme")) {
                    setTheme($.cookie("theme"));            
                }
                
                $(".themeSelect").find("li").on("click", function() {                    
                    var theme = $(this).prop("class");
                    setTheme(theme);
                });

                function setTheme(theme) {
                    $("body").prop("class", theme);
                    $("body").addClass("homePage");

                    $.cookie('theme', theme, {expires:5*365, path: '/'});
                }
            });
        </script>		
	</head>

	<body class="theme1 homePage">
		<!--top nav panel starts-->
        <div class="topNavPanel">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="themeSelect">
                            <li>Choose your theme</li>
                            <li id="theme1" class="theme1"><a href="javascript:void(0)">Theme 1</a></li>
                            <li id="theme2" class="theme2"><a href="javascript:void(0)">Theme 2</a></li>
                            <li id="theme3" class="theme3"><a href="javascript:void(0)">Theme 3</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <ul class="topLinks">
                            <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+919898989898">+91 9898989898</a></li>        
                            <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:info@krpsolutions.co.in">info@krpsolutions.co.in</a></li>   
                            <?php if (!empty($this->site_data["session_user"]["user"])) { ?>         
                            <li>                                
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <a href="#">Welcome <?php echo $this->site_data["session_user"]["user"]->Name; ?></a>                                
                                <div class="adminDropdown">
                                    <ul>                                        
                                        <li class="updateBtn"><a href="<?= base_url('#') ?>">Update Profile</a></li>
                                        <li class="logOutBtn"><a href="<?= base_url('logout') ?>">Logout</a></li>                                        
                                    </ul>
                                </div>
                            </li>
                            <?php } ?> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--top nav panel ends-->
		<!--top panel starts -->
        <div class="topPanel">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="logo">
                            <h2><a href="<?= base_url('/') ?>">KRP Educare</a></h2>
                        </div>
                    </div>
                    <div class="col-xs-6">
						<?php if (!empty($_SESSION['user']) && $_SESSION['logged_in'] === true) { ?>
                        <span class="navBar"></span>
                        <div class="dropDownMenu">
                            <ul>
                                <li><a href="#">School Events</a></li>
                                <li><a href="#">School Candidates</a></li>
                                <li><a href="#">School Point of Contact</a></li>
                                <li><a href="#">Class Master</a></li>
                                <li><a href="<?= base_url('school') ?>">School Master</a><li>
                                <li class="subMenu"><a href="#">Report</a>
                                    <ul>
                                        <li><a href="<?= base_url('report') ?>">Attendance Report</a> </li>
                                        <li><a href="#">Missing Report</a></li>
                                    </ul>
                                </li>        
                            </ul>                            
                        </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!--top panel ends -->
        <!--header slider starts-->
        <div class="sliderPanel">
            <div class="flexslider">
                <ul class="slides">
                    <li><img src="<?= base_url('assets/images/slide-1.jpg'); ?>" /></li>
                    <li><img src="<?= base_url('assets/images/slide-2.jpg'); ?>" /></li>
                    <li><img src="<?= base_url('assets/images/slide-3.jpg'); ?>" /></li>
                </ul>
            </div>
        </div>
        <!--header slider ends-->        
		
