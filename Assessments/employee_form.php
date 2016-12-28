<?php;
ob_start();

require 'dbOperation.php';
require 'validation.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 

if(isset($_POST['submit'])){

    $DbObj = new DBOperations();
    $ValueObj = new validate();
    $empName = $_POST['empName'];
    $empId = $_POST['empId'];
    $designation = $_POST['designation'];
    $gender = $_POST['gender'];
    $experience = $_POST['experience'];
    $grossSalary = $_POST['gross_salary'];
    $deduction = $_POST['deduction'];
    $lop = $_POST['lop'];
    $resp = $ValueObj->validation($_POST);
    $errorMsg = $resp['message'];
    //print($errorMsg);
    try {
        if ($resp['status']) {
            $resp = $DbObj->createRecord($_POST);
            if ($resp) {
                header('Location:index.php');
            }
        }
    }
    catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    } 
}

require 'view_employee.php';
?>
