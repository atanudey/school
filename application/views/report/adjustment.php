<script type="text/javascript" language="javascript">
    var dtable = null;
	$(document).ready(function(){
		dtable = $('#example').DataTable({
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
            "searching": false,
            "processing": true
        });

        $('#reportdate').datetimepicker({
            language: 'en',
            format: 'dd/MM/yyyy',
        }).on('changeDate', function(ev){
            $(this).datetimepicker('hide');             
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
            $('#student_block').hide();
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

        var classes = [], sections = [], students = [];
        var candidate_ids = [];

        // Initially when all selected user should not be able to select any options for class and section
        $("#class_section_block").find('input').each(function () {
            $(this).prop('disabled', true);
        });
                
        $('.select_all').on('change', function() {
            $.fn.get_selection();
        });

        $('.reportBlockContent').on('change', 'input[type="checkbox"]', function() {
            $.fn.get_selection();

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
                
                classes = sections = students = [];
            }

            if ($('#report_type_student').prop('checked') && $(this).attr('name') != 'student[]') {
                $("#student_container").empty();
                $("#student_container").append("<div class='wait'> Getting list of students. Be Patient! </div>");

                $.get("<?php echo base_url(); ?>report/get_candidate", {"classes": classes.join(","), "sections": sections.join(",")}).done(function( data ) {                
                    $("#student_container").empty();
                    $.each(JSON.parse(data), function(item, user) {
                        $("#student_container").append('<div class="fldRowInline"><input type="checkbox" name="student[]" class="checkbox_cst" value="' + user.Candidate_ID + '"><label>' + user.Candidate_Name + '</label></div></div>')
                    });
                });
            }
        });

        $.fn.get_selection = function() {
            classes = [];
            sections = [];
            students = [];

            $.each($('input[name=class\\[\\]]:checked'), function(){
                classes.push($(this).val());
            });

            $.each($('input[name=section\\[\\]]:checked'), function(){
                sections.push($(this).val());
            });    

            $.each($('input[name=student\\[\\]]:checked'), function(){
                students.push($(this).val());
            });        
        }

        $("#view_report").on("click", function(){
            var parameters = {"classes": classes.join(","), "sections": sections.join(","), "students": students.join(","), "correction_date": $("#report_date").val() };
    
            $(".dataTables_processing").show();

            //Clearing currently listed rows
            dtable.rows().remove().draw();

            $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>report/adjustment_list_ajax",
                data: parameters
            })
            .done(function( data ) {
                var data = JSON.parse(data);
                $.each(data, function(item, value){
                    var row_data = $.map( value, function( v, k ) {
                        return v;
                    });
                    buttonHtml = '<a href="javascript:void(0)" rel="'+ row_data[0] +'" class="btn btn-info adjust">Adjust</a>';
                    row_data.push(buttonHtml);

                    //Removing first element, which is candidate_id. This will not be in the list.
                    row_data.shift();

                    dtable.row.add(row_data).draw();
                });

                $(".dataTables_processing").hide();
            });
            
            //console.log(parameters);
        });

        $('#example').on('click', 'a.btn', function(){
            if ($(this).hasClass('adjust')) {
                $(this).removeClass('adjust');
                $(this).addClass('btn-cancel');
                $(this).html('Absent');
                $.fn.do_adjust($(this).attr('rel'), 'adjust');
            } else {
                $(this).removeClass('btn-cancel');
                $(this).addClass('adjust');
                $(this).html('Adjust');
                $.fn.do_adjust($(this).attr('rel'), 'absent');
            }
        });

        $.fn.do_adjust = function(candidate_id, type) {
            var op = "";
            if (type == 'adjust') {
                candidate_ids.push(candidate_id);
                op = 'IN';
            }
            else {
                candidate_ids.remove(candidate_id);
                op = 'OUT';
            }

            $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>report/do_adjustment_ajax",
                data: { "school_id": "<?php echo $session_user["school_id"]; ?>", "candidate_id": candidate_id, "op": op, "correction_date": $("#report_date").val() }
            })
            .done(function( data ) {
            }); 
        }

        Array.prototype.remove = function() {
            var what, a = arguments, L = a.length, ax;
            while (L && this.length) {
                what = a[--L];
                while ((ax = this.indexOf(what)) !== -1) {
                    this.splice(ax, 1);
                }
            }
            return this;
        };


        /*$('#report_frm').on('click', function() {
            //if ($('#report_type_student').is(":checked") && $('input[name=student\\[\\]]:checked').length == 0) {
            //    alert("Please select atleast one student.");
            //}

            $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>report/do_adjustment_ajax",
                data: { "school_id": "<?php echo $session_user["school_id"]; ?>", "candidate_ids": candidate_ids.join(','), "op": , "correction_date": $("#report_date").val() }
            })
            .done(function( data ) {
            });    

            return false;
        });*/

        //Triggering to fetch todays report beforehand
        $('#view_report').trigger('click');
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
                    <input name="report_date" id="report_date" value="<?php echo (!empty($_REQUEST["report_date"])) ? $_REQUEST["report_date"]:date('d/m/Y'); ?>" data-format="dd/MM/yyyy" type="text" class="datetimepicker-input"></input>
                    <span class="add-on">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0)" id="view_report" class="btn btn-success">View Report</a>
        </div>
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
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($report as $s): ?>	
                <tr>                             
                    <td><?php echo $s['Roll_No']; ?></td>
                    <td><?php echo $s['RFID_NO']; ?></td>
                    <td><?php echo $s['Candidate_Name']; ?></td>
                    <td><?php echo $s['Class']; ?></td>
                    <td><?php echo $s['Guardian_Name']; ?></td>
                    <td><?php echo $s['Mob1']; ?></td>
                    <td><?php echo $s['Address']; ?></td>
                    <td><a href="javascript:void(0)" class="btn btn-info adjust">Adjust</a></td>
                </tr>                    
            <?php endforeach; ?>
            </tbody> 
        </table>
    </div>
    <div>&nbsp;</div>
    <div class="reportBtnsBtm">
        <input type="button" id="report_frm" name="process" value="Process" class="processBtn">
    </div>
</div>
</form>