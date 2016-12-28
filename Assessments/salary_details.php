<?php
ob_start();
require 'dbconfig.php';
require 'dbOperation.php';
require 'validation.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
if (!empty($_GET['id'])) {
    $readObject = new DBOperations();
    $read_record = $readObject ->ReadRecord($_GET['id']);
    $empName = $read_record['empName'];
    $id = $_GET['id'];
    
}
if ($_POST) {
    $id = $_POST['id'];     
    $salary = $_POST['salary'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $ValidObject = new validate();
    $resp = $ValidObject->validation_salary($_POST);
    $errorMsg = $resp['message'];
    try {
        if ($resp['status']) {
            $resp = $readObject ->createSalaryRecord($_POST);
            if ($resp) {
                header("location:salary_index.php");
            }
        }
    }
    catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    } 
}
require 'view_salary.php';
?>
