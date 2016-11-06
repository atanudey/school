<?php if ($report_parameters['type'] != "student") { ?>
<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$('#example').DataTable({
            "ordering": false,
            "columns": [
                { "width": "14%" },
                null,
                null,
                null,
                null,
                null,
                null,
                null
            ],
            "searching": false
        });
	});
</script>
<?php } else { ?>
<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$('#example').DataTable({
            "ordering": false,
            "columns": [
                { "width": "16%" },
                null,
                null,
                null,
                null,
                null,
                null
            ],
            "searching": false
        });
	});
</script>
<?php } ?>
<div class="bodyPanel">
    <div class="container tblwrap"> 
        <div class="headingText school_center">
            <h3><?php echo $school["School_Name"]; ?></h3>
            <p><?php echo $school['Address1'] . ", " . $school['Address2'] . " - ". $school['Pin']; ?></p>
        </div>   
        <div class="pull-right">
            <a href="<?php echo site_url('report'); ?>" class="btn btn-primary back-btn">Back</a>
            <a href="<?php echo site_url('report/prnt'); ?>" target="__blank" class="btn btn-success">Print</a> 
            <a href="<?php echo site_url('report/pdf'); ?>" target="__blank" class="btn btn-success">PDF</a>
            <a href="<?php echo site_url('report/excel'); ?>" class="btn btn-success">Excel</a>
        </div>
        <?php if ($report_parameters['type'] != "student") { ?>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Information</th>		
                    <th>Roll</th>			
                    <th>Name</th>
                    <th>Address</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Present</th>
                    <th>Absent</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($report as $s): ?>	
                <?php if ($s['Type'] == "data") { ?>
                    <tr>
                        <td></td>               
                        <td><?php echo $s['Roll']; ?></td>
                        <td><?php echo $s['Name']; ?></td>
                        <td><?php echo $s['Address']; ?></td>
                        <td><?php echo $s['Class']; ?></td>
                        <td><?php echo $s['Section']; ?></td>
                        <td><?php echo $s['Present']; ?></td>
                        <td><?php echo $s['Absent']; ?></td>
                    </tr>
                <?php } else if ($s['Type'] == "header") { ?>
                    <tr class="header info">
                        <td><strong><?php echo $s['Information']; ?></strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>                
                    </tr>            
                <?php
                } else {
                ?>
                    <tr>
                        <td><strong><?php echo $s['Information']; ?></strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong><?php echo $s['Present']; ?></strong></td>
                        <td><strong><?php echo $s['Absent']; ?></strong></td>                
                    </tr>
                <?php
                }
                ?>
                    
            <?php endforeach; ?>
            </tbody> 
        </table>
        <?php } else { ?>
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Information</th>		
                        <th>Date</th>			
                        <th>Guardian</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>IN Time</th>
                        <th>OUT Time</th>                
                    </tr>
                </thead>
                <tbody>
                <?php foreach($report as $s): ?>	
                    <?php if ($s['Type'] == "data") { ?>
                        <tr>
                            <td>&nbsp;</td>               
                            <td><?php echo $s['Date']; ?></td>
                            <td><?php echo $s['Guardian']; ?></td>
                            <td><?php echo $s['Phone']; ?></td>                    
                            <td><?php echo $s['Address']; ?></td>                    
                            <td><?php echo $s['IN']; ?></td>
                            <td><?php echo $s['OUT']; ?></td>
                        </tr>
                    <?php } else if ($s['Type'] == "header") { ?>
                        <tr class="header info">
                            <td><strong><?php echo $s['Name']; ?>, <?php echo $s['Class']; ?></strong></td>
                            <td><strong><?php echo $s['Date']; ?></strong></td>
                            <td></td>
                            <td></td>                    
                            <td></td>
                            <td></td>
                            <td></td>                
                        </tr>            
                    <?php
                    } 
                    ?>               
                <?php endforeach; ?>
                </tbody> 
            </table>
        <?php } ?>
    </div>
</div>