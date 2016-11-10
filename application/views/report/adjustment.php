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
            $('#adjustment_frm').submit();
        });
	});
</script>
<script>  
    $(document).ready(function(){
        $("#student_select").on("change", function(){
            $("#student").show();
            $("#staff").hide();
        });

        $("#staff_select").on("change", function(){
            $("#staff").show();
            $("#student").hide();
        });

        $("#report_type_all").on('click', function(){
            //$(this).closest('.reportInner').find('.row').hide();
            $(this).closest('.reportInner').find( "[type=checkbox]" ).prop('checked', false);

            $("#class_section_block").find('input').each(function () {
                $(this).prop('disabled', true);
            });
			
			$('.dateOption').find('input').each(function(){
                if ($(this).val() != 'mly') {
                    $(this).prop('disabled', false);
				} else {
					$(this).prop('checked', true);					
				}
			});
			
			$.fn.changeCalendar('mly');
        });

        $("#report_type_class").on('click', function(){
            $(this).closest('.reportInner').find('.row').hide();
            $("#class_section_block").show();
            $(this).closest('.reportInner').find( "[type=checkbox]" ).prop('checked', false);

            $("#class_section_block").find('input').each(function () {
                $(this).prop('disabled', false);
            });

            $(".select_all").find('input').each(function () {
                $(this).prop('disabled', false);
            });
			
			$('.dateOption').find('input').each(function(){
                if ($(this).val() != 'mly') {
                    $(this).prop('disabled', false);
				} else {
					$(this).prop('checked', true);					
				}
			});
			
			$.fn.changeCalendar('mly');
        });

        $("#report_type_student").on('click', function(){
            $(this).closest('.reportInner').find('.row').show(); 
            $(this).closest('.reportInner').find( "[type=checkbox]" ).prop('checked', false); 
			
            $("#class_section_block").find('.class_block').find('input').each(function () {				
                $(this).prop('disabled', false);
            }); 

            $('#select_all_class').prop('disabled', true);
            $('#select_all_section').prop('disabled', true);  

            $('.dateOption').find('input').each(function(){
                if ($(this).val() != 'mly') {
                    $(this).prop('disabled', true);
				} else {
					$(this).prop('checked', true);					
				}
			});
			
			$.fn.changeCalendar('mly');			
        });

        $("#class_section_block").find(".select_all").on('change', function(){             
            $(this).closest('.reportHeading').next().find(".checkbox_cst").prop('checked', $(this).prop("checked"));
            $("#student_block").find('input').each(function () {
                $(this).prop('disabled', true);
            });
        });

        $("#student_block").find(".select_all").on('change', function(){             
            $(this).closest('.reportHeading').next().find(".checkbox_cst").prop('checked', $(this).prop("checked"));
        });

        $('.checkbox_cst').on('change', function(){ 						
            if(false == $(this).prop("checked")){				
                $(this).closest('.reportBlockContent').prev().find('.select_all').prop('checked', false);				
            }

            if ($(this).closest('.reportBlockContent').find('.checkbox_cst:checked').size() == $(this).closest('.reportBlockContent').find('.checkbox_cst').size() ){
                $(this).closest('.reportBlockContent').prev().find('.select_all').prop('checked', true);
            }
        });
    });  
</script>
<!-- Bootstrap Datepicker Script -->
<script type="text/javascript">
    $(document).ready(function() {
        $.fn.changeCalendar = function(type) { 
            var offset;
            switch(type) {
                case "mly":
                    offset = 1;
                    break;
                case "qly":
                    offset = 3;
                    break;
                case "hly":
                    offset = 6;
                    break;
                case "yly":
                    offset = 12;
                    break;
            }

            var d = new Date();
            var currentmonth = function(){
                var month = d.getMonth()+1;
                var day = d.getDate();
                var output = (day<10 ? '0' : '') + day + '/' + 
                (month<10 ? '0' : '') + month + '/' +
                d.getFullYear();
                return output;
            };

            var prevmonth = function(){
                var month = (d.getMonth()+1) - offset;
                var day = d.getDate();
                if (month < 1) {
                    month = 1;
                    day = 1;
                }
                var output = (day<10 ? '0' : '') + day + '/' + 
                (month<10 ? '0' : '') + month + '/' +
                d.getFullYear();
                return output;
            };        

            $("#fromdate .datetimepicker-input").val(prevmonth);
            $("#todate .datetimepicker-input").val(currentmonth);

            var formfirstDate = new Date(d.getFullYear(), 0, 1);       

            var first = prevmonth().split("/");
            var last = currentmonth().split("/");            

            var firstDate = new Date(first[1] + "/" + first[0] + "/" + first[2]);
            var lastDate = new Date(last[1]  + "/" + last[0]  + "/" + last[2]);

            $('#todate').datetimepicker({
                language: 'en',
                format: 'dd/MM/yyyy',
                startDate: firstDate,
                endDate: lastDate
            });

            $('#fromdate').datetimepicker({
                language: 'en',
                format: 'dd/MM/yyyy',
                startDate: formfirstDate,
                endDate: lastDate
            });
        }

        $('input[name=report_range_type]:radio').on('change', function() { 
            $.fn.changeCalendar($(this).val());            
        });

        $.fn.changeCalendar('mly');  

        // Initially when all selected user should not be able to select any options for class and section
        $("#class_section_block").find('input').each(function () {
            $(this).prop('disabled', true);
        });
                
        $('.checkbox_cst').on('change', function() {
            if ($('#report_type_student').prop('checked')) {            
                var classes = [], sections = [];				
				
                $.each($('input[name=class\\[\\]]:checked'), function(){
                    classes.push($(this).val());
                });

                $.each($('input[name=section\\[\\]]:checked'), function(){
                    sections.push($(this).val());
                });
				
				if (classes.length > 0 && $(this).prop('checked') == true) {
					$("#class_section_block").find('.section_block').find('input').each(function () {				
						$(this).prop('disabled', false);
						$(this).prop('checked', true);
					});
				} else if (classes.length == 0 && $(this).prop('checked') == false) {					
					$("#class_section_block").find('.section_block').find('input').each(function () {		
						$(this).prop('checked', false);
						$(this).prop('disabled', true);
					});
					
					classes = sections = [];
				}

                $("#student_container").empty();
                $("#student_container").append("<div class='wait'> Getting list of students. Be Patient! </div>");

                $.get("<?php echo base_url(); ?>report/get_candidate", {"classes": classes.join(","), "sections": sections.join(",")}).done(function( data ) {                
                    $("#student_container").empty();
                    $.each(JSON.parse(data), function(item, user) {
                        $("#student_container").append('<input type="checkbox" name="student[]" class="checkbox_cst" value="' + user.Candidate_ID + '"><label>' + user.Candidate_Name + '</label></div>')
                    });
                });            
            }
        });

        $('#report_frm').on('submit', function() {
            if ($('#report_type_student').is(":checked") && $('input[name=student\\[\\]]:checked').length == 0) {
                alert("Please select atleast one student.");
                return false;
            }       
        });
    });
</script>
<div class="bodyPanel">
    <div class="container headingText">
    	<h1>Daily Absent Student & Adjustment</h1>
    </div>
    <div class="container tblwrap">            
        <?php echo form_open('report/adjustment', array('name' => 'adjustment_frm', 'id' => 'adjustment_frm'));?>
        <div class="reportWhiteBox">
            <div class="reportInner panel" id="student">
                <div class="paddingBtm20">
                    <div class="fldRowInline">
                        <label><input type="radio" name="student_report_type" id="report_type_all" value="all" checked="checked"> All</label>
                        <label><input type="radio" name="student_report_type" id="report_type_class" value="class"> Class</label>
                        <label><input type="radio" name="student_report_type" id="report_type_student" value="student"> Student</label>
                    </div>
                </div>
                <div class="row" id="class_section_block">
                    <div class="col-sm-6 class_block">
                        <div class="borderdWhiteBox">
                            <div class="reportHeading">
                                <div class="checkbox-inline"> <label><input type="checkbox" name="select_all_class" id="select_all_class" class="select_all" value="class">Class (Select All)</label></div>
                            </div>
                            <div class="reportBlockContent">
                                <?php foreach($classes as $class) {
	?>
                                    <div class="fldRowInline"><input type="checkbox" name="class[]" rel="class" class="checkbox_cst" value="<?php echo $class;
?>"> <label><?php echo $class;
?></label></div>
                                <?php
}
?>                                 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 section_block">
                        <div class="borderdWhiteBox">
                            <div class="reportHeading">
                                <div class="checkbox-inline"> <label><input type="checkbox" name="select_all_section" id="select_all_section" class="select_all" value="section">Section (Select All)</label></div>
                            </div>
                            <div class="reportBlockContent">
                                <?php foreach($sections as $section) {
	?>
                                    <div class="fldRowInline"><input type="checkbox" class="checkbox_cst" rel="section" name="section[]" value="<?php echo $section;
?>"> <label>Section <?php echo $section;
?></label></div>
                                <?php
}
?>                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="student_block" style="display:none">
                    <div class="col-sm-6">
                        <div class="borderdWhiteBox">
                            <div class="reportHeading" class="accordion">
                                <div class="checkbox-inline"> <label><input type="checkbox" name="select_all_student" id="select_all_student" class="select_all" value="student">Student</label></div>
                            </div>
                            <div class="reportBlockContent">
                                <div id="student_container" class="fldRowInline" style="position:relative; height:100%; margin:0; padding:0;">
                                    
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                </tr>                    
            <?php endforeach; ?>
            </tbody> 
        </table>
    </div>
</div>