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
<div class="container tblwrap">
    <div><h3><?php echo $School_Name; ?></h3></div>
    <div class="pull-right">
        <a href="<?php echo site_url('report/prnt'); ?>" target="__blank" class="btn btn-success">Print</a> 
        <a href="<?php echo site_url('report/pdf'); ?>" target="__blank" class="btn btn-success">PDF</a>
        <a href="<?php echo site_url('report/excel'); ?>" class="btn btn-success">Excel</a>
    </div>

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
</div>