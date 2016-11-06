<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>KRP Educare</title>
	    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/css/bootstrap-datetimepicker.min.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/responsive-style.css') ?>" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/slider.css') ?>" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.min.css') ?>" />
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900,900italic|Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>" type="image/x-icon">
		
		<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/jquery-1.12.3.js') ?>"></script>
        <script type="text/javascript" language="javascript" src="<?= base_url('assets/js/jquery.cookie.min.js') ?>"></script>        
		<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/jquery-ui.js') ?>"></script>
		<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
		<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/dataTables.bootstrap.min.js') ?>"></script>
        <script type="text/javascript" language="javascript" src="<?= base_url('assets/js/moment.min.js') ?>"></script>
		<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
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

                 $('.school_choose_submit').on('click', function(){ 
                    if(!$('#school_id')[0].checkValidity()) {
                        $("#school_choose_submit").trigger('click');
                        return false;
                    } else if ($('#mode').val() == 'add') {
                        var confrm = confirm('You are adding "' + $('#Candidate_Name').val() + '" to school "<?php echo (!empty($session_user["school"]["School_Name"])) ? $session_user["school"]["School_Name"] : ""; ?>". Are you sure?');
                        if (!confrm)
                            return false;
                    }             
                });       

                $('#school_id').on("change", function(){                                          
                    $.post("<?php echo base_url("school/choose_school_ajax") ?>", { school_id: $(this).val() }, function( data ) {
                        var response = $.parseJSON(data);
                        if (response.success) {
                            location.href = "";
                        }
                    });
                });

                $('.flashInfo').fadeIn(800).delay(8000).fadeOut(800);
            });
        </script>		
	</head>
	<body class="theme1 homePage">
        <?php //print_r($_SESSION); ?>
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
                            <?php if (!empty($session_user["user"])) { ?>         
                            <li>                                
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <a href="#">Welcome <?php echo $session_user["user"]->Name; ?></a>                                
                                <div class="adminDropdown">
                                    <ul>                                        
                                        <li class="updateBtn"><a href="<?= base_url('user/profile') ?>">Update Profile</a></li>
                                        <li class="updateBtn"><a href="<?= base_url('user/change_password') ?>">Change Password</a></li>
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
                            <?php if (!empty($session_user['logged_in']) && $session_user['logged_in'] === true) { ?> 
                                <h2><a href="<?= base_url('/') ?>">KRP Educare</a></h2>
                            <?php } else { ?>
                                <h2><a href="<?= base_url('home') ?>">KRP Educare</a></h2>
                            <?php } ?>
                        </div>
                    </div>                    
                    <div class="col-xs-6">                        
						<?php if (!empty($session_user['logged_in']) 
                                    && $session_user['logged_in'] === true
                                    && $session_user["user"]->User_Type_ID != 3) { ?>     
                                                       
                        <?php $type = $session_user["user"]->User_Type_ID; ?>
                        <span class="navBar"></span>                        
                        <div class="dropDownMenu">
                            <?php
                                $CI =& get_instance();  
                                $CI->load->library('menu');
                                echo $CI->menu->build_menu($type);
                            ?>
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
                    <li><img src="<?= base_url('assets/images/banner1.jpg'); ?>" /></li>
                    <li><img src="<?= base_url('assets/images/banner2.jpg'); ?>" /></li>
                    <li><img src="<?= base_url('assets/images/banner3.jpg'); ?>" /></li>
                </ul>
            </div>
        </div>
        <!--header slider ends-->    
        <?php
            //print_r($session_user);            
            if (!empty($session_user['user']) 
                && $this->router->fetch_class() != "user" 
                && $this->router->fetch_method() != "generate" 
                && ($session_user['user']->User_Type_ID == "1" || $session_user['user']->User_Type_ID == "4")) {
        ?>
        <div class="admin_common_dd container">
            <form id="school_choose" name="school_choose" method="post">
            <select name="school_id" id="school_id" required="required" oninvalid="this.setCustomValidity('Please choose a school to proceed')">
                <option value="">--- Select School ---</option>
                <?php foreach($school_list as $SN)  { ?>
                    <?php
                        $selected = ($this->input->post('school_id')) ? $this->input->post('school_id') : $session_user["school_id"];  
                    ?>
                    <option value="<?php echo $SN['ID']; ?>" <?php echo ($selected == $SN['ID']) ? "selected" : ""; ?>><?php echo $SN['School_Name']; ?></option>
                <?php } ?>
            </select>
            <button type="submit" id="school_choose_submit" class="btn btn-success" style="display:none">Select</button>
            </form>
        </div>
        <?php } else if (!empty($session_user['user']) && ($session_user['user']->User_Type_ID == "2" || $session_user['user']->User_Type_ID == "3")) { ?>           
            <h3><?php echo $session_user['school']['School_Name']; ?></h3>
        <?php } ?>
		
