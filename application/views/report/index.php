<script>  
    $(document).ready(function(){
        $(".accordion").on('click', function(){
            $(this).next().toggle();
        });

        $("#report_type_all").on('click', function(){
            $(this).closest('.reportInner').find('.row').hide();
        });

        $("#report_type_class").on('click', function(){
            $(this).closest('.reportInner').find('.row').hide();
            $("#class_section_block").show();

        });

        $("#report_type_student").on('click', function(){
            $(this).closest('.reportInner').find('.row').show();            
        });

        $(".select_all").on('change', function(){             
            $(this).closest('.reportHeading').next().find(".checkbox_cst").prop('checked', $(this).prop("checked"));
            $("#student_block").find('input').each(function () {
                $(this).prop('disabled', true);
            });
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

<!--body panel starts -->
<?php echo form_open('report/generate'); ?>
<div class="bodyPanel reportPanel">
    <div class="container">
        <div class="row paddingBtm40">
            <div class="col-sm-6">
                <h2>Attendence Report</h2>
            </div>
            <div class="col-sm-6 rightHeading">
                <h3>Demo School Name</h3>
            </div>
        </div>

        <div class="reportWhiteBox">
            <div class="reportHeading accordion">
                <div class="fldRowInline"><input type="radio" name="report_type" value="student" checked="checked"> <h4>Students Report</h4></div>
            </div>
            <div class="reportInner panel">
                <div class="paddingBtm20">
                    <div class="fldRowInline">
                        <label><input type="radio" name="student_report_type" id="report_type_all" value="all" checked="checked"> All</label>
                        <label><input type="radio" name="student_report_type" id="report_type_class" value="class"> Class</label>
                        <label><input type="radio" name="student_report_type" id="report_type_student" value="student"> Student</label>
                    </div>
                </div>
                <div class="row" id="class_section_block" style="display:none">
                    <div class="col-sm-6">
                        <div class="borderdWhiteBox">
                            <div class="reportHeading">
                                <div class="checkbox-inline"> <label><input type="checkbox" name="select_all_class" id="select_all_class" class="select_all" value="class">Class (Select All)</label></div>
                            </div>
                            <div class="reportBlockContent">
                                <?php foreach(range(1, 10) as $class) { ?>
                                    <div class="fldRowInline"><input type="checkbox" name="class[]" class="checkbox_cst" value="Class <?php echo $class; ?>"> <label>Class <?php echo $class; ?></label></div>
                                <?php } ?>                                 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="borderdWhiteBox">
                            <div class="reportHeading">
                                <div class="checkbox-inline"> <label><input type="checkbox" name="select_all_section" id="select_all_section" class="select_all" value="section">Section (Select All)</label></div>
                            </div>
                            <div class="reportBlockContent">
                                <?php foreach(range('A', 'I') as $section) { ?>
                                    <div class="fldRowInline"><input type="checkbox" class="checkbox_cst" name="section[]" value="<?php echo $section; ?>"> <label>Section <?php echo $section; ?></label></div>
                                <?php } ?>                                
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
                                <div class="fldRowInline">
                                    <!-- <input type="checkbox" name="class[]" class="checkbox_cst" value="<?php echo $class; ?>"> <label>Class <?php echo $class; ?></label></div> -->
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="reportWhiteBox">
            <div class="reportHeading accordion">
                <div class="fldRowInline"><input type="radio" name="report_type" value="staff"> <h4>Staff Attendence Report</h4></div>
            </div>
            <div class="reportInner panel" style="display:none">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="borderdWhiteBox">
                            <div class="reportHeading">
                                <div class="checkbox-inline"> <label><input type="checkbox"> Department</label></div>
                            </div>
                            <div class="reportBlockContent">
                                <div class="fldRowInline"><input type="checkbox"> <label>Department A</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Department B</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Department C</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Department D</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Department E</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Department F</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Department G</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Department H</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Department I</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Department J</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="borderdWhiteBox">
                            <div class="reportHeading">
                                <div class="checkbox-inline"> <label><input type="checkbox"> Staffs Name</label></div>
                            </div>
                            <div class="reportBlockContent">
                                <div class="fldRowInline"><input type="checkbox"> <label>Name 1</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Name 2</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Name 3</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Name 4</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Name 5</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Name 6</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Name 7</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Name 8</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Name 9</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Name 10</label></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="reportWhiteBox">
            <div class="reportHeading">
                <h4>Date Range</h4>
            </div>
            <div class="reportInner">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="borderdWhiteBox">
                            <div class="fldRowInline boxPadding inlineDateFlds">
                                <div class="fldRowInline dateFld">
                                    <label>From</label>
                                    <div class="well">
									  <div id="Fromdate" class="input-append startdatetime-from">
										<input data-format="dd/MM/yyyy" type="text" class="datetimepicker-input"></input>
										<span class="add-on">
										 <span class="glyphicon glyphicon-calendar"></span>
										</span>
									  </div>
									</div>
                                </div>
                                <div class="fldRowInline dateFld">
                                    <label>To</label>
                                    <div class="well">
									  <div id="todate" class="input-append startdatetime-from">
										<input data-format="dd/MM/yyyy" type="text" class="datetimepicker-input"></input>
										<span class="add-on">
										 <span class="glyphicon glyphicon-calendar"></span>
										</span>
									  </div>
									</div>
                                </div>
                                <div class="dateOption">
                                    <label><input type="radio" name="report_range_type" value="yly"> Yearly</label>             
                                    <label><input type="radio" name="report_range_type" value="hly"> Half yearly</label>             
                                    <label><input type="radio" name="report_range_type" value="qly"> Quaterly</label>             
                                    <label><input type="radio" name="report_range_type" value="mly"> Monthly</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="reportBtnsBtm">
                <input type="submit" name="process" value="Process" class="processBtn">
        </div>
    </div>
</div>
</form>
<script type="text/javascript">
/****** Form date To Date ***/
  $(function() {
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
	    var month = d.getMonth();
		var day = d.getDate();
		var output = (day<10 ? '0' : '') + day + '/' +
		(month<10 ? '0' : '') + month + '/' +
		 d.getFullYear();
		 return output;
	  };
	  
	  $("#Fromdate .datetimepicker-input").val(prevmonth);
	  $("#todate .datetimepicker-input").val(currentmonth);
		
       //var today= new Date();
	   var formfirstDate = new Date(d.getFullYear(), d.getMonth(0)-8, 1);
       var lastDate = new Date(d.getFullYear(), d.getMonth(0), 9);
	   var firstDate = new Date(d.getFullYear(), d.getMonth(0)-1, 9);
	   //console.log(d.getMonth(0)-7, 14);
	   //console.log(firstDate);
		$('#todate').datetimepicker({
			language: 'en',
			format: 'dd/MM/yyyy',
			startDate: firstDate,
            endDate: lastDate
		});
		
	  
		$('#Fromdate').datetimepicker({
			language: 'en',
			format: 'dd/MM/yyyy',
			startDate: formfirstDate,
            endDate: lastDate
		});
		
  });
 /****** End Form date To Date ***/
</script>
<!--body panel ends -->