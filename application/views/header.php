<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<title>KRP Educare</title>
<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/css/responsive-style.css') ?>" rel="stylesheet" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900,900italic' rel='stylesheet' type='text/css'>
</head>

<body class="theme3">
	<!--top panel starts -->
	<div class="topPanel">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-6">
                	<div class="logo">
                    	<h2><a href="<?= base_url('/') ?>">KRP Educare</a></h2>
                    </div>
                </div>
				<?php if (!empty($_SESSION['user'])) { ?>
				<div>
					<ul>
						<?php if (isset($_SESSION['user']) && $_SESSION['logged_in'] === true) { ?>							
							<li><a href="<?= base_url('logout') ?>">Logout</a></li>
						<?php } ?>							
					</ul>
				</div>
				<?php } ?>
                <div class="col-sm-6">
                	<div class="rightContact">
                    	<p>Phone : +91 9898989898<br />
						Email : <a href="mailto:info@krpsolutions.co.in">info@krpsolutions.co.in</a></p>
                    </div>
                </div>

				<?php /*if (isset($_SESSION)) : ?>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php var_dump($_SESSION); ?>
							</div>
						</div><!-- .row -->
					</div><!-- .container -->
				<?php endif;*/ ?>
            </div>
        </div>
    </div>
    <!--top panel ends -->
		
