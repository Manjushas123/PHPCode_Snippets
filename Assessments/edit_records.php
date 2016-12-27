<?php
ob_start();
require 'dbconfig.php';
require 'dbOperation.php';
require 'validation.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
if (!empty($_GET['id'])) {
    $readObject = new DBOperations();
    $employee_details= $readObject->ReadRecord($_GET['id']);
    $errorMsg = $resp['message'];
    $empName = $employee_details['empName'];
    $empId = $employee_details['empId'];
    $designation = $employee_details['designation'];
    $gender = $employee_details['gender'];
    $experience = $employee_details['experience'];
    $grossSalary = $employee_details['gross_salary'];
    $deduction = $employee_details['deduction'];
    $lop = $employee_details['lop'];
    $netSalary = $remployee_detailsow['netsal'];
    $ValueObj = new validate();
    $resp = $ValueObj->validation($_POST);
    require 'view_edit_employee.php';
    try {
        if($resp['status']){
            $resp = $readObject->update($_GET['id']);
            if($resp) {
                header("location:index.php");
            }
        }
    } 
    catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }  
}
?>
