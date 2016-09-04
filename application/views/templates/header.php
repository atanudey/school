<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
		<title>KRP Educare</title>
		<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/jquery-1.12.3.js') ?>"></script>
		<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/jquery-ui.js') ?>"></script>
		<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
		<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/dataTables.bootstrap.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/slider.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/script.js') ?>"></script>

		<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/responsive-style.css') ?>" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/slider.css') ?>" />
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900,900italic' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>" type="image/x-icon">
	</head>

	<body class="theme1 homePage">
		<!--top nav panel starts-->
        <div class="topNavPanel">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="themeSelect">
                            <li>Choose your theme</li>
                            <li class="theme1"><a href="#">Theme 1</a></li>
                            <li class="theme2"><a href="#">Theme 2</a></li>
                            <li class="theme3"><a href="#">Theme 3</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <ul class="topLinks">
                            <li>Phone : +91 9898989898 | </li>
                            <li>Email : <a href="mailto:info@krpsolutions.co.in">info@krpsolutions.co.in</a></li>
							<?php if (!empty($_SESSION['user'])) { ?>
								<li><span> | <img src="<?= base_url('assets/images/user-icon.png')?>" /></span> Welcome Admin | </li>
								<li><a href="<?= base_url('logout') ?>">Logout</a></li>
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
						<?php if (!empty($_SESSION['user'])) { ?>
                        <span class="navBar"></span>
                        <div class="dropDownMenu">
                            <ul>
                                <?php if (isset($_SESSION['user']) && $_SESSION['logged_in'] === true) { ?>
									<li><a href="<?= base_url('school') ?>">School</a><li>
									<li><a href="<?= base_url('report') ?>">View Report</a><li>									
								<?php } ?>
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
		
