<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$('#example').DataTable({
            "ordering": false,
            "columns": [
                { "width": "6%" },
                { "width": "8%" },
                { "width": "16%" },
                { "width": "14%" },
                { "width": "16%" },
                { "width": "10%" },
                { "width": "24%" },
                { "width": "6%" },
            ],
            "searching": false
        });

        $('#reportdate').datetimepicker({
            language: 'en',
            format: 'dd/MM/yyyy',
        }).on('changeDate', function(ev){
            $(this).datetimepicker('hide');             
        });

        $("#view_report").on("click", function(){
            $('#missing_frm').submit();
        });
	});
</script>
<div class="bodyPanel">
    <div class="container headingText">
    	<h1>Missing Report</h1>
    </div>
    <div class="container tblwrap">            
        <?php echo form_open('report/missing', array('name' => 'missing_frm', 'id' => 'missing_frm'));?>
        <div class="fldRowInline inlineDateFlds datarange">
            <div class="fldRowInline dateFld">
                <label>Date </label>
                <div class="well">
                    <div id="reportdate" class="input-append startdatetime-from">
                    <input name="report_date" value="<?php echo $report_parameters["date"]; ?>" data-format="dd/MM/yyyy" type="text" class="datetimepicker-input"></input>
                    <span class="add-on">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0)" id="view_report" class="btn btn-success">View Report</a>
        </div>
        </form>
        <hr />
        <?php if (!empty($school["School_Name"])) { ?>
        <div class="headingText school_center">
            <h3><?php echo $school["School_Name"]; ?></h3>
            <p><?php echo $school['Address1'] . ", " . $school['Address2'] . " - ". $school['Pin']; ?></p>
        </div>
        <?php } ?>
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
                    <td><?php echo $s['Roll_No']; ?></td>
                    <td><?php echo $s['RFID_NO']; ?></td>
                    <td><?php echo $s['Candidate_Name']; ?></td>
                    <td><?php echo $s['ClassSection']; ?></td>
                    <td><?php echo $s['Guardian_Name']; ?></td>
                    <td><?php echo $s['Mob1']; ?></td>
                    <td><?php echo $s['Address']; ?></td>
                    <td><?php echo $s['IN_Time']; ?></td>
                </tr>                    
            <?php endforeach; ?>
            </tbody> 
        </table>
    </div>
</div>