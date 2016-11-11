<link rel="stylesheet" type="text/css" href="<?= site_url('report/save_style') ?>" />
<div class="pdf">
    <div class="headingText">
        <?php //print_r($report); ?>
        <h3><?php echo $school["School_Name"]; ?></h3>
        <p><?php echo $school['Address1'] . ", " . $school['Address2'] . " - ". $school['Pin']; ?></p>
        <?php if ($report_parameters['type'] == "missing" || $report_parameters['type'] == "adjustment") { ?> 
            <p>Report For Date: <?php echo $report_parameters['date']; ?></p>
        <?php } else { ?>
            <p>Date Range: <?php echo $report_parameters['start_date']; ?> - <?php echo $report_parameters['end_date']; ?></p>
        <?php } ?>
        <p>Date: <?php echo date('m/d/Y H:i:s'); ?> </p>        
    </div>

    <?php $array_attendance_type = array('1' => 'Monthly', '3' => 'Quarterly', '6' => 'Half Yearly', '12' => 'Yearly'); ?>

    <?php if ($report_parameters['type'] == "other") { ?>
        
        <h2><?php echo $array_attendance_type[$report_parameters['interval']] ?> Attendance Report</h2>
        <table id="example" class="table table-striped table-bordered attablePdf" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th align="left" class="th">Roll</th>			
                    <th align="left" class="th">Name</th>
                    <th align="left" class="th">Address</th>
                    <th align="left" class="th">Class</th>
                    <th align="left" class="th">Section</th>
                    <th align="left" class="th">Present</th>
                    <th align="left" class="th">Absent</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($report as $s): ?>	
                <?php if ($s['Type'] == "data") { ?>
                    <tr>                                
                        <td align="left" class="td"><?php echo $s['Roll']; ?></td>
                        <td align="left" class="td"><?php echo $s['Name']; ?></td>
                        <td align="left" class="td"><?php echo $s['Address']; ?></td>
                        <td align="left" class="td"><?php echo $s['Class']; ?></td>
                        <td align="left" class="td"><?php echo $s['Section']; ?></td>
                        <td align="left" class="td"><?php echo $s['Present']; ?></td>
                        <td align="left" class="td"><?php echo $s['Absent']; ?></td>
                    </tr>
                <?php } else if ($s['Type'] == "header") { ?>
                    <tr class="header info">
                        <td colspan="7" align="center" class="td info" style="background-color: #d9edf7; color: #333; font-weight:bold"><?php echo $s['Information']; ?></td>
                    </tr>            
                <?php
                } else {
                ?>
                    <tr>
                        <td colspan="5" align="left" class="td" style="background-color:#f1f1f1;color:#333; font-weight:bold"><?php echo $s['Information']; ?></td>
                        <td align="left" class="td" style="background-color:#f1f1f1; color:#333; font-weight:bold"><?php echo $s['Present']; ?></td>
                        <td align="left" class="td" style="background-color:#f1f1f1; color:#333; font-weight:bold"><?php echo $s['Absent']; ?></td>                
                    </tr>
                <?php
                }
                ?>
                    
            <?php endforeach; ?>
            </tbody> 
        </table>
    <?php } else if ($report_parameters['type'] == "missing") {?>
        <h2>Missing Report</h2>
        <table id="example" class="table table-striped table-bordered attablePdf" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th align="left" class="th">Roll #</th>		
                    <th align="left" class="th">RFID #</th>			
                    <th align="left" class="th">Candidate Name</th>                    
                    <th align="left" class="th">Class Section</th>
                    <th align="left" class="th">Guardian Name</th>
                    <th align="left" class="th">Contact</th>
                    <th align="left" class="th">Address</th>                    
                    <th align="left" class="th">In Time</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($report as $s): ?>	
                <tr>                             
                    <td align="left" class="td"><?php echo $s['Roll_No']; ?></td>
                    <td align="left" class="td"><?php echo $s['RFID_NO']; ?></td>
                    <td align="left" class="td"><?php echo $s['Candidate_Name']; ?></td>
                    <td align="left" class="td"><?php echo $s['ClassSection']; ?></td>
                    <td align="left" class="td"><?php echo $s['Guardian_Name']; ?></td>
                    <td align="left" class="td"><?php echo $s['Mob1']; ?></td>
                    <td align="left" class="td"><?php echo $s['Address']; ?></td>
                    <td align="left" class="td"><?php echo $s['IN_Time']; ?></td>
                </tr>                    
            <?php endforeach; ?>
            </tbody> 
        </table>
    <?php } else if ($report_parameters['type'] == "adjustment"){ ?>
        <h2>Attendance Adjustment Report</h2>
        <table id="example" class="table table-striped table-bordered attablePdf" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th">Roll #</th>		
                    <th class="th">RFID #</th>			
                    <th class="th">Candidate Name</th>                    
                    <th class="th">Class Section</th>
                    <th class="th">Guardian Name</th>
                    <th class="th">Contact</th>
                    <th class="th">Address</th>
                    <th class="th">Status</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($report as $s): ?>	
                <tr>                             
                    <td class="td"><?php echo $s['Roll_No']; ?></td>
                    <td class="td"><?php echo $s['RFID_NO']; ?></td>
                    <td class="td"><?php echo $s['Candidate_Name']; ?></td>
                    <td class="td"><?php echo $s['Class']; ?></td>
                    <td class="td"><?php echo $s['Guardian_Name']; ?></td>
                    <td class="td"><?php echo $s['Mob1']; ?></td>
                    <td class="td"><?php echo $s['Address']; ?></td>
                    <td class="td"></td>
                </tr>                    
            <?php endforeach; ?>
            </tbody> 
        </table>
    <?php } else { ?>
        <h2>Monthwise Daily Attendance Report</h2>
        <table id="example" class="table table-striped table-bordered attablePdf" cellspacing="0" width="100%">
            <thead>
                <tr>                    	
                    <th align="left" class="th">Date</th>			
                    <th align="left" class="th">Guardian</th>
                    <th align="left" class="th">Phone</th>
                    <th align="left" class="th">Address</th>
                    <th align="left" class="th">IN Time</th>
                    <th align="left" class="th">OUT Time</th>                
                </tr>
            </thead>
            <tbody>
            <?php foreach($report as $s): ?>	
                <?php if ($s['Type'] == "data") { ?>
                    <tr>                        
                        <td align="left" class="td"><?php echo $s['Date']; ?></td>
                        <td align="left" class="td"><?php echo $s['Guardian']; ?></td>
                        <td align="left" class="td"><?php echo $s['Phone']; ?></td>                    
                        <td align="left" class="td"><?php echo $s['Address']; ?></td>                    
                        <td align="left" class="td"><?php echo $s['IN']; ?></td>
                        <td align="left" class="td"><?php echo $s['OUT']; ?></td>
                    </tr>
                <?php } else if ($s['Type'] == "header") { ?>
                    <tr class="header info">
                        <td class="td info" style="background-color: #d9edf7; color: #333; font-weight:bold"><?php echo $s['Date']; ?></td>
                        <td colspan="5" align="right" class="td info" style="background-color: #d9edf7; color: #333; font-weight:bold">Name: <?php echo $s['Name']; ?>, <?php echo $s['Class']; ?></td>
                    </tr>            
                <?php
                }
                ?>
                    
            <?php endforeach; ?>
            </tbody> 
        </table>
    <?php } ?>
</div>