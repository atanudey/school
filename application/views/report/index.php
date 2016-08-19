<script>  
    $(document).ready(function(){
        $(".accordion").on('click', function(){
            $(this).next().toggle();
        });
    });    
</script>

<!--body panel starts -->
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
                <div class="fldRowInline"><input type="radio" name="report_type"> <h4>Students Report</h4></div>
            </div>
            <div class="reportInner panel" style="display:none">
                <div class="paddingBtm20">
                    <div class="fldRowInline">
                        <label><input type="radio" name="student_report_type"> All</label>
                        <label><input type="radio" name="student_report_type"> Class</label>
                        <label><input type="radio" name="student_report_type"> Student</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="borderdWhiteBox">
                            <div class="reportHeading">
                                <div class="checkbox-inline"> <label><input type="checkbox">If Class</label></div>
                            </div>
                            <div class="reportBlockContent">
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 1</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 2</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 3</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 4</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 5</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 6</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 7</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 8</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 9</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 10</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="borderdWhiteBox">
                            <div class="reportHeading">
                                <div class="checkbox-inline"> <label><input type="checkbox"> Section</label></div>
                            </div>
                            <div class="reportBlockContent">
                                <div class="fldRowInline"><input type="checkbox"> <label>Section A</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Section B</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Section C</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Section D</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Section E</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Section F</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Section G</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Section H</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Section I</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Section J</label></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="borderdWhiteBox">
                            <div class="reportHeading" class="accordion">
                                <div class="checkbox-inline"> <label><input type="checkbox"> Student</label></div>
                            </div>
                            <div class="reportBlockContent">
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 1</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 2</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 3</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 4</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 5</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 6</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 7</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 8</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 9</label></div>
                                <div class="fldRowInline"><input type="checkbox"> <label>Class 10</label></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="reportWhiteBox">
            <div class="reportHeading accordion">
                <div class="fldRowInline"><input type="radio" name="report_type"> <h4>Staff Attendence Report</h4></div>
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
                                    <input type="date" />
                                </div>
                                <div class="fldRowInline dateFld">
                                    <label>To</label>
                                    <input type="date" />
                                </div>
                                <div class="dateOption">
                                    <label><input type="radio"> Yearly</label>             
                                    <label><input type="radio"> Half yearly</label>             
                                    <label><input type="radio"> Quaterly</label>             
                                    <label><input type="radio"> Monthly</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="reportBtnsBtm">
                <a href="#" class="processBtn">Process</a>
        </div>
    </div>
</div>
<!--body panel ends -->