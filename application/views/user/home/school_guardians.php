<?php  
$school = $this->session->userdata('school'); 
?>
<!--home bodyPanel starts-->
    <div class="homeBodyPanel noBg">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-8">
                	<div class="leftContent">
                    	<div class="leftContentInner">
                        	<div class="mainHeading floatHolder">
                            	<img src="<?php echo base_url('assets/images/no-logo.png'); ?>" width="65" />
                                <div class="headingText">
                                	<h1><?php echo $school['School_Name']; ?></h1>
                                    <p><?php echo $school['Address1'] . ", " . $school['Address2'] . " - ". $school['Pin']; ?></p>
                                </div>
                            </div>
                            <div class="mainContent">
                                <div class="mainContentInner">
                                    <p><?php echo $school['Description']; ?></p>
                                </div>                                
                            </div>
                            <a href="#" class="exapandBtn">+ Expand</a>	
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                	<div class="rightContentBlock">
                    	<h3><span class="eventIcon"></span>Upcomming Events <?php echo date('Y') ?></h3>
                        <div class="blockContentOuter eventContentPanelOuter">
                        	<div class="blockContent eventContentPanel">
                                <?php foreach($event as $e) { ?>
                            	<div class="eventRow floatHolder">
                                	<div class="dateBlock">
                                        <?php
                                            $month = strtoupper(date("M", strtotime($e["Date"])));
                                            $day = strtoupper(date("j", strtotime($e["Date"])));
                                            $weekday = strtoupper(date("l", strtotime($e["Date"])));
                                        ?>
                                    	<p><?=$month?> <strong><?=$day?></strong> <span><?=$weekday?></span></p>
                                    </div>
                                    <div class="eventContent">
                                    	<h4><?php echo word_limiter($e["Title"], 30); ?></h4>
                                        <p><?php echo (!empty($e["Description"])) ? word_limiter($e["Description"], 30) : "No information available" ?></p>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="rightContentBlock noticeBoardPanel">
                    	<h3><span class="noticeIcon"></span>Notice Board</h3>
                        <div class="blockContentOuter noticeContentPanelOuter">
                        	<div class="blockContent noticeContentPanel">
                                <?php foreach($notice as $n) { ?>
                        		<div class="noticeBoardRow">
                                	<h4><?php echo word_limiter($n["Title"], 30); ?></h4>
                                    <p><?php echo (!empty($n["Description"])) ? word_limiter($n["Description"], 30) : "No information available" ?></p>
                                    <?php if (!empty($n['File_Name'])) { ?>
                                        <h5><span><a href="<?php echo base_url("assets/sitedata/".$this->session->userdata('school_id')."/events/".$n['File_Name']); ?>"><img src="<?php echo base_url('assets/images/pdf-icon.png') ?>" /></span>Click the icon to download the routine</a></h5>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                       		 </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="col-md-12">
                	<div class="mapArea">
                    	<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d942538.6228720575!2d88.0923673!3d22.6615613!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1472929406217" width="600" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--home bodyPanel ends-->