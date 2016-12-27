<?php
ob_start();
require 'dbconfig.php';
require 'dbOperation.php';
require 'salary_validation.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
if (!empty($_GET['id'])) {
    $readObject = new DBOperations();
    $salary_details = $readObject->ReadRecord($_GET['id']);
    $errorMsg = $resp['message'];
    $id = $salary_details['id'];  
    $empName = $salary_details['empName'];
    $salary = $salary_details['salary'];
    $day = $salary_details['day'];
    $month = $salary_details['month'];
    $year = $salary_details['year'];
    $ValueObj = new validate();
    $resp = $ValueObj->validation($_POST);
    require 'view_edit_salary.php';

    try {
        if($resp['status']){
            $resp = $readObject->update_salary($_GET['id']);
            if($resp) {
                header("location:salary_index.php");
            }
        }
    } 
    catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }  
}
?>
