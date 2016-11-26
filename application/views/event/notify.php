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

            $('#select_all_student').prop('disabled', false);  

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

                $.get("<?php echo base_url(); ?>event/get_candidate_ajax", {"classes": classes.join(","), "sections": sections.join(",")}).done(function( data ) {
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

        $('#notify_submit').on('click', function() { 
            if ($('#Title')[0].checkValidity() && $('#Message')[0].checkValidity()) {
                if ($('#report_type_student').is(":checked") && $('input[name=student\\[\\]]:checked').length == 0) {
                    alert("Please select atleast one student.");
                }

                $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>event/do_notify_ajax",
                    data: {type: $('input:radio[name=student_report_type]:checked').val(),"classes": classes.join(','), "sections": sections.join(','), "students": students.join(','), "formdata": $('#notify_frm').serialize() },
                    dataType: "json"
                })
                .done(function( data ) {
                    if (data.success) {
                        $('#Title').val("");
                        $('#Message').val("");
                        $('#chars').val(160);
                        $('.flashInfo').text("Event notification has been sent.");
                        $('.flashInfo').show();
                    }
                });

                return false;
            }   
        });

        $('#notification_type_sms').on('click', function(){
            $('#Message').attr('maxlength', 160);
            $('#remaining').show();
            $('textarea').val("");
        });

        $('#notification_type_email').on('click', function(){
            $('#Message').removeAttr('maxlength');
            $('#remaining').hide();
            $('textarea').val("");
        });

        var maxLength = 160;
        $('textarea').keyup(function() {
            var msg_type = $('input[name=notification_type]:checked', '#notify_frm').val();
            if (msg_type == "sms") {                           
                var length = $(this).val().length;
                var length = maxLength-length;
                $('#chars').text(length);
            }
        });
    });
</script>
<div class="bodyPanel">
    <div class="container headingText">
    	<h1>Notify Event</h1>
    </div>
    <div class="container tblwrap">            
        <?php echo form_open(base_url('event/do_notify'), array('name' => 'notify_frm', 'id' => 'notify_frm', 'class' => 'form-horizontal'));?>
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
        <div><p class='flashMsg flashInfo'></p></div>
        <input type="hidden" name="Event_ID" value="<?php echo $Event_ID; ?>">
        <div class="innerPanel">
            <div class="form-group"> 
                <label for="Notification Type" class="col-md-3">* Notification Type</label>               
                <div class="col-md-8">
                    <div class="fldRowInline">
                        <label><input type="radio" name="notification_type" id="notification_type_email" value="email" checked="checked"> Email</label>
                        <label><input type="radio" name="notification_type" id="notification_type_sms" value="sms"> SMS</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="Title" class="col-md-3">* Title</label>
                <div class="col-md-8">
                <input type="text" name="Title" disabled="disabled" id="Title" value="<?php echo ($this->input->post('Title') ? $this->input->post('Title') : $event['Title']); ?>" class="form-control" id="School_Name" required="required" />
                </div>
            </div>
            <div class="form-group">
                <label for="Message" class="col-md-3">* Message</label>
                <div class="col-md-8">
                <textarea name="Message" id="Message" class="form-control" required="required"><?php echo ($this->input->post('Message') ? $this->input->post('Message') : ""); ?></textarea>
                <div id="remaining" style="display:none"><span id="chars">160</span> characters remaining</div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                <button id="notify_submit" type="submit" class="btn btn-success school_choose_submit">Notify</button>
                <a href="<?= base_url('event'); ?>" class="btn btn-cancel" >Cancel</a> </div>
            </div>
        </div>
    </div>
</div>
</form>