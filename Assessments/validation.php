<?php
Class validate {
function validation($data)
{
    $empName = $data['empName'];
    $empId = $data['empId'];
    $designation = $data['designation'];
    $gender = $data['gender'];
    $experience = $data['experience'];
    $grossSalary = $data['gross_salary'];
    $deduction = $data['deduction'];
    $lop = $data['lop'];
    $valid  = true;
    $errMsgs = array();
    if (!preg_match("/^[a-zA-Z'-]+$/", $empName)) {
        $nameError = "Please enter the valid Employee Name";
        $errMsgs['empName'] = $nameError;
        $valid = false;
    }
    if ( !preg_match("/^0$|^[-]?[1-9][0-9]*$/", $empId)) {
        $idError = "Please enter the valid Employee Id";
        $errMsgs['empId'] = $idError;
        $valid = false;
    }
    
    if ( !preg_match("/^0$|^[-]?[1-9][0-9]*$/", $experience)) {
        $experienceError = "Please enter the valid Experience";
        $errMsgs['experience'] = $experienceError;
        $valid =false;
        
    }
    if (!preg_match("/^0$|^[-]?[1-9][0-9]*$/", $grossSalary) || ($grossSalary < ($deduction+$lop)) ) {
        $gsError = "Please enter the valid Gross Salary";
        $errMsgs['gross_salary'] = $gsError;
        $valid = false;
    }
    if (!preg_match("/^0$|^[-]?[1-9][0-9]*$/", $deduction)) {
        $deductionError = "Please enter the valid Deduction";
        $errMsgs['deduction'] = $deductionError;
        $valid = false;
    }
    if ( !preg_match("/^0$|^[-]?[1-9][0-9]*$/", $lop) || $lop > 30) {
        $lopError = "Please enter the valid Lop";
        $errMsgs['lop'] = $lopError;
        $valid  = false;
    }
    $resp = array("status" => $valid,"message" => $errMsgs);
    return $resp;   
}
function validation_salary($data)
{
    $empName = $data['empName'];
    $salary = $data['salary'];
    $day = $data['day'];
    $month = $data['month'];
    $year = $data['year'];
    $valid  = true;
    $errMsgs = array();
    if (!preg_match("/^0$|^[-]?[1-9][0-9]*$/", $salary) ) {
        $salaryError = "Please enter the valid Salary";
        $errMsgs['salary'] = $salaryError;
        $valid = false;
    }
    if (!preg_match("/^0$|^[-]?[1-9][0-9]*$/", $day) || $day >31) {
        $dayError = "Please enter the valid day";
        $errMsgs['day'] = $dayError;
        $valid = false;
    }
    if (!preg_match("/^0$|^[-]?[1-9][0-9]*$/", $month) || $month >12 ) {
        $monthError = "Please enter the valid month";
        $errMsgs['month'] = $monthError;
        $valid =false;    
    }
    if (!preg_match("/^0$|^[-]?[1-9][0-9]*$/", $year) ) {
        $yearError = "Please enter the valid year";
        $errMsgs['year'] = $yearError;
        $valid = false;
    }
    $resp = array("status" => $valid,"message" => $errMsgs);
    return $resp;   
}
}
?> 

