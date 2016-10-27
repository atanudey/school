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

        $('#fromdate').datetimepicker({
            language: 'en',
            format: 'dd/MM/yyyy',
        });
	});
</script>
<div class="bodyPanel">
    <div class="container tblwrap"> 
        <div class="headingText school_center">
            <h3><?php echo $school["School_Name"]; ?></h3>
            <p><?php echo $school['Address1'] . ", " . $school['Address2'] . " - ". $school['Pin']; ?></p>
        </div>   
        <div class="fldRowInline boxPadding inlineDateFlds datarange">
            <div class="fldRowInline dateFld">
                <label>From</label>
                <div class="well">
                    <div id="fromdate" class="input-append startdatetime-from">
                    <input name="start_date" data-format="dd/MM/yyyy" type="text" class="datetimepicker-input"></input>
                    <span class="add-on">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="pull-right">
            <a href="<?php echo site_url('report/prnt'); ?>" target="__blank" class="btn btn-success">Print</a> 
            <a href="<?php echo site_url('report/pdf'); ?>" target="__blank" class="btn btn-success">PDF</a>
            <a href="<?php echo site_url('report/excel'); ?>" class="btn btn-success">Excel</a>
        </div>

        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Roll #</th>		
                    <th>RFID #</th>			
                    <th>Candidate Name</th>                    
                    <th>Class Section</th>
                    <th>Guardian Name</th>
                    <th>Contact</th>
                    <th>Address</th>                    
                    <th>In Time</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($report as $s): ?>	
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
            <?php endforeach; ?>
            </tbody> 
        </table>
    </div>
</div>