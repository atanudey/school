<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

    private $school_id;

    function __construct() {
        parent::__construct();
        $this->load->model('report_model');
        $this->load->model('school_model');
        $this->load->model('edu_class_model');

        // Load Third Party PDF Library MPDF
        $this->load->library('mpdf60/mpdf');

        // Load Third Party Excel Library PHPExcel
        $this->load->library('PhpExcelLib');

        // Load Template parsing library
        $this->load->library('parser');
        $this->load->library('session');

        $this->school_id = $this->session->userdata('school_id');
        $this->data['report'] = $this->session->userdata('report');
        $this->data['report_parameters'] = $this->session->userdata('report_parameters');
        $this->data['school'] = $this->session->userdata('school');
    }

    function index() {
        
        //print_r($_SESSION); die;

        $data = $this->data;
        if (!empty($this->school_id))
            $classes = $this->edu_class_model->get_all_class_by_school($this->school_id);

        $data['classes'] = array();
        $data['sections'] = array();
        if (!empty($classes)) {
            foreach ($classes as $class) {
                if (!in_array($class['Name'], $data['classes'])) {
                    $data['classes'][] = $class['Name'];
                }
            }

            foreach ($classes as $class) {
                if (!in_array($class['Section'], $data['sections'])) {
                    $data['sections'][] = $class['Section'];
                }
            }
        }
        
        $data['Session_Start_Month'] = 	$this->data['school']['Session_Start_Month'];
        //print_r($data); die;

        $this->load->template('report/index', $data);
    }

    function populate_data() {

        /* require_once(APPPATH . "../assets/reportico44/reportico.php"); 
          $q = new reportico();
          $q->embedded_report = true;
          $q->forward_url_get_parameters = "execute_mode=EXECUTE&project=educare&project_password=guitar&xmlin=student_attendance_report.xml&target_format=HTML";
          $q->execute(); */

        $date_arr = array();
        $str = "";
        for ($i = 1; $i <= 1000; $i++) {
            //for  ($j=1; $j < 11; $j++) {
            $date = "2016-" . rand(1, 12) . "-" . rand(1, 30);
            $time_in = "10:00:00";
            $time_out = "16:00:00";

            if (!in_array($date, $date_arr)) {
                $date_arr[] = $date;
            } else {
                continue;
            }

            $ci = rand(1, 7);

            $str .= "INSERT INTO `educare_db`.`SC00001_Attendance` (`ID`, `Date_Attendance`, `IN_Time`, `OUT_Time`, `Candidate_ID`) VALUES (NULL, '" . $date . "', '" . $time_in . "', '" . $time_out . "', '" . $ci . "');" . "\n";
            //$str .= "INSERT INTO `educare_db`.`sc00001_attendance` (`ID`, `DateTime`, `IN_OUT`, `SC00001_Candidate_ID`) VALUES (NULL, '".$date." ".$time_out."', 'OUT', '".$ci."');" . "\n";
            //$str .= "INSERT INTO `educare_db`.`school_days` (`School_ID`, `Month`, `Year`, `school_days`) VALUES ('SC00001', ". $i .", '2016', " . rand(18, 25) ."); \n";
            //}
            //$str .= "INSERT INTO `educare_db`.`school_days` (`ID`, `Month`, `Month_Days`, `Month_Off_Days`, `Extra_Leave`, `Remarks`, `School_ID`, `Added_On`, `Updated_On`, `Updated_By`) VALUES (NULL, $i, 30, ". (30 - rand(18, 25)) .", '0', NULL, 'SC00001', '2016-08-28 14:52:46', '2016-08-28 14:52:46', '1');" . "\n";		
        }

        //for ($i=1; $i < 40; $i++) {
        //	$str .= "UPDATE  `educare_db`.`sc00001_attendance` SET  `IN_OUT` =  'OUT' WHERE  `sc00001_attendance`.`ID` = " . rand(1, 159) . "; \n";
        //}

        echo $str;
        die;

        /* if(isset($_POST) && count($_POST) > 0)     
          {
          $params = array(
          'class' => $this->input->post('class')
          );
          }

          $session_user = $this->session->userdata('user');

          $SQL = "CREATE OR REPLACE VIEW attendance_view AS
          SELECT
          '" . $session_user->ID . "' as Session_User_ID,
          Roll_No Roll,
          Candidate_Name Name,
          CONCAT( `Address1` , ', ', `Address2` ) Address,
          `Class_ID` Class,
          SUM( CASE WHEN a.IN_OUT = 'IN' THEN 1 ELSE 0 END ) Present,
          (COUNT( A.IN_OUT ) - SUM(CASE WHEN a.IN_OUT = 'IN' THEN 1 ELSE 0 END )) Absent
          FROM `sc00001_candidate` C, `sc00001_attendance` A
          WHERE `Candidate_ID` = `SC00001_Candidate_ID`
          AND `School_ID` = '" . $session_user->School_ID . "'
          AND `Class_ID` = 1
          GROUP BY SC00001_Candidate_ID";

          $result = $this->db->query($SQL);

          $this->load->template('report/output'); */
    }

    function generate() {
        $data["report"] = array();
        if (!empty($this->school_id)) {
            $data = $this->data;

            $start_date = explode("/", $this->input->post('start_date'));
            $end_date = explode("/", $this->input->post('end_date'));

            if ($this->input->post('student_report_type') == "all") {
                $class = "";
                $section = "";
            } else if ($this->input->post('student_report_type') == "class") {
                if (!empty($_REQUEST['class'])) {
                    $class = implode(",", $this->input->post('class'));
                } else {
                    $class = "";
                }
                if (!empty($_REQUEST['section'])) {
                    $section = implode(",", $this->input->post('section'));
                } else {
                    $section = "";
                }
            }

            $interval = array('yly' => 12, 'hly' => 6, 'qly' => 3, 'mly' => 1);

            //print_r($_REQUEST); die;

            if ($this->input->post('student_report_type') != "student") {
                $params = array(
                    'type' => 'other',
                    'start_month' => intval($start_date[1]),
                    'end_month' => intval($end_date[1]),
                    'school_id' => $this->school_id,
                    'classes' => $class,
                    'sections' => $section,
                    'interval' => $interval[$this->input->post('report_range_type')]
                );
            } else {
                $params = array(
                    'type' => 'student',
                    'start_date' => $start_date[2] . "-" . $start_date[1] . "-" . $start_date[0],
                    'end_date' => $end_date[2] . "-" . $end_date[1] . "-" . $end_date[0],
                    'school_id' => $this->school_id,
                    'student_id_list' => implode(",", $this->input->post('student'))
                );
            }

            //print_r($params); die;

            $data['report'] = $this->report_model->get_attendance($params);
            $data["report_parameters"] = $params;

            //Modifying date format to show in pdf report			
            $params['start_date'] = $this->input->post('start_date');
            $params['end_date'] = $this->input->post('end_date');

            $this->session->set_userdata('report_parameters', $params);
            $this->session->set_userdata('report', $data['report']);
        }

        //print_r($data); die;

        $this->load->template('report/output', $data);
    }

    function getReportContent($type = "") {
        $content = $this->parser->parse('report/save', $this->data, true);

        if ($type == "prnt") {
            $style = "<style>" . $this->parser->parse('report/save_style', $this->data, true) . "</style>";
            $content = $style . $content;
        }

        return $content;
    }

    function prnt() {
        $this->data["font"] = "Arial";
        echo $this->getReportContent('prnt');
    }

    function pdf() {
        $this->data["font"] = "DejaVuSans";
        $content = $this->getReportContent();
        $this->getReport($content);
    }

    function excel() {
        $this->data["font"] = "Arial";

        $content = $this->getReportContent();
        $inputFileName = tempnam(sys_get_temp_dir(), "excel_report");
        $outputFileName = REPORT_PATH . "excel_report_" . time() . ".xlsx";
        $handle = fopen($inputFileName, 'w');
        fwrite($handle, $content);
        fclose($handle);

        $objPHPExcelReader = PHPExcel_IOFactory::createReader('HTML');
        $objPHPExcel = $objPHPExcelReader->load($inputFileName);

        $objPHPExcelWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objPHPExcel = $objPHPExcelWriter->save($outputFileName);

        unlink($inputFileName);

        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=" . basename($outputFileName));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($outputFileName));

        readfile($outputFileName);
        unlink($outputFileName);
    }

    function getReport($content, $output = 'download') {
        $this->mpdf->SetDisplayMode('fullpage');

        $this->mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list
        // LOAD a stylesheet
        $stylesheet = $this->parser->parse('report/save_style', $this->data, true);
        $this->mpdf->WriteHTML($stylesheet, 1); // The parameter 1 tells that this is css/style only and no body/html/text
        // If download requested
        if ($output == 'download') {
            $this->mpdf->WriteHTML($content, 2);
            $this->mpdf->Output('report.pdf', 'I');
        } elseif ($output == 'mail') { //if  mail requested
            $this->mpdf->WriteHTML(utf8_encode($content));
            return $customer;
        }
    }

    function missing() {
        $date = $this->input->post('report_date');
        if (empty($date))
            $date = date('d/m/Y');

        $this->data["report"] = $this->report_model->get_missing(implode("-", array_reverse(explode("/", $date))), $this->school_id);

        $params = array(
            'type' => 'missing',
            'date' => $date,
            'school_id' => $this->school_id
        );

        $this->data["report_parameters"] = $params;

        $this->session->set_userdata('report', $this->data['report']);
        $this->session->set_userdata('report_parameters', $params);

        //print_r($params); die;

        $this->load->template('report/missing', $this->data);
    }

    function adjustment() {
        $data = $this->get_adjustments();
        $this->load->template('report/adjustment', $data);
    }

    function do_adjustment_ajax() {
        $response = $this->report_model->do_adjustment($this->input->post(NULL, TRUE));
        echo json_encode(array("success" => true));
    }

    function adjustment_list_ajax() {
        $data = $this->get_adjustments();
        echo json_encode($data['report']);
    }

    function get_adjustments() {
        $data = $this->data;
        if (!empty($this->school_id)) {
            $classes = $this->edu_class_model->get_all_class_by_school($this->school_id);
        }

        $data['classes'] = array();
        $data['sections'] = array();
        if (!empty($classes)) {
            foreach ($classes as $class) {
                if (!in_array($class['Name'], $data['classes'])) {
                    $data['classes'][] = $class['Name'];
                }
            }

            foreach ($classes as $class) {
                if (!in_array($class['Section'], $data['sections'])) {
                    $data['sections'][] = $class['Section'];
                }
            }
        }

        $sp_params["school_id"] = $this->school_id;
        $sp_params = array_merge($sp_params, $this->input->post(NULL, TRUE));

        $sp_params['correction_date'] = convert_to_mysql_date($this->input->post('correction_date'));

        $data["report"] = $this->report_model->get_adjustment($sp_params);

        $params = array(
            "date" => $this->input->post('report_date'),
            "type" => 'adjustment'
        );

        $this->session->set_userdata('report', $data['report']);
        $this->session->set_userdata('report_parameters', $params);

        return $data;
    }

}

?>