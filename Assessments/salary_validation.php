<?php
Class validate {
function validation($data)
{
    $empName = $data['empName'];
    $salary = $data['salary'];
    $day = $data['day'];
    $month = $data['month'];
    $year = $data['year'];
    $valid  = true;
    $errMsgs = array();
    if (empty($salary) || !preg_match("/^0$|^[-]?[1-9][0-9]*$/", $salary) ) {
        $salaryError = "Please enter the valid Salary";
        $errMsgs['salary'] = $salaryError;
        $valid = false;
    }
    if (empty($day) || !preg_match("/^0$|^[-]?[1-9][0-9]*$/", $day) || $day >31) {
        $dayError = "Please enter the valid day";
        $errMsgs['day'] = $dayError;
        $valid = false;
    }
    if (empty($month) || !preg_match("/^0$|^[-]?[1-9][0-9]*$/", $month) || $month >12 ) {
        $monthError = "Please enter the valid month";
        $errMsgs['month'] = $monthError;
        $valid =false;    
    }
    if (empty($year) || !preg_match("/^0$|^[-]?[1-9][0-9]*$/", $year) ) {
        $yearError = "Please enter the valid year";
        $errMsgs['year'] = $yearError;
        $valid = false;
    }
    $resp = array("status" => $valid,"message" => $errMsgs);
    return $resp;   
}
}
?> 

