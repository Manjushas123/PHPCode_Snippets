<?php
ob_start();
session_start();
require 'dbOperation.php';
require 'validation.php';
class EmpController
{
    private $modelObj;
    private $validationObj;
    
    function __construct()
    {
        $this->modelObj = new DBOperations();
        $this->validationObj = new validate();
    }
    
    public function listEmployee()
    {
        $empList = $this->modelObj->ListEmployee();
        require 'listemp.php';
    }
    
    public function addEmployeeView()
    {
        if (!empty($_SESSION['errorMsg'])) {
            $errorMsg = $_SESSION['errorMsg'];
        }
        require 'view_employee.php';
    }
    
    public function addemp()
    {
        $resp = $this->validationObj->validation($_POST);
        if (!$resp['status']) {
            $_SESSION['errorMsg'] = $resp['message'];
            header('Location:EmpController.php?act=addEmployeeView');
        } else {
            unset($_SESSION['errorMsg']);
            $resp = $this->modelObj->createRecord($_POST);
            if ($resp) {
                header('Location:EmpController.php?act=listEmployee');
            } 
        }    
    }
    
    public function listSalary()
    {
        $salaryList = $this->modelObj->ListSalary();
        require 'listSalary.php';
    }
    
    public function addSalaryView()
    {
        if (!empty($_SESSION['errorMsg'])) {
            $errorMsg = $_SESSION['errorMsg'];
        }
        if (isset($_GET['id'])) {
            $employee_details = $this->modelObj->ReadRecordByRow($_GET['id']);
            $empName = $employee_details['empName'];
            $id = $_GET['id'];
        } else {
            header('Location:EmpController.php?act=addSalary');
        }
        require 'view_salary.php';
    }
    
    public function addSalary()
    {
        if ($_POST) {
            $id   = $_POST['id'];
            $resp = $this->validationObj->validation_salary($_POST);
            if (!$resp['status']) {
                $_SESSION['errorMsg'] = $resp['message'];
                header('Location:EmpController.php?act=addSalaryView');
            } else {
                unset($_SESSION['errorMsg']);
                $resp = $this->modelObj->createSalaryRecord($_POST);
                var_dump($resp);
                if ($resp) {
                    header('Location:EmpController.php?act=listSalary');
                } else {
                    echo " failed";
                }
                
            }
            
        }
        
    }
    
    public function delete()
    {
        if (!empty($_GET['id'])) {
            $response_of_Delete = $this->modelObj->DeleteSalary($_GET['id']);
            $response_of_Delete = $this->modelObj->DeleteEmployee($_GET['id']);
            header("location:EmpController.php?act=listSalary");
            var_dump($response_of_Delete);
        }
    }

    public function updateEmpView()
    {
        if (isset($_GET['id'])) {
            $employee_details = $this->modelObj->ReadRecordByRow($_GET['id']);
            $empName = $employee_details['empName'];
            $empId = $employee_details['empId'];
            $designation = $employee_details['designation'];
            $gender = $employee_details['gender'];
            $experience = $employee_details['experience'];
            $grossSalary = $employee_details['gross_salary'];
            $deduction = $employee_details['deduction'];
            $lop = $employee_details['lop'];
            $netSalary = $employee_details['netsal'];
            $id = $_GET['id'];
        }
        
        require 'view_edit_employee.php';
    }
    
    public function updateEmp()
    { 
        $resp = $this->validationObj->validation($_POST);
        if (!$resp['status']) {
            $_SESSION['errorMsg'] = $resp['message'];
            header('Location:EmpController.php?act=updateEmpView');
        } else {
            unset($_SESSION['errorMsg']);
            
            $resp = $this->modelObj->update($_POST);
            var_dump($resp);
            if ($resp) {
                header('Location:EmpController.php?act=listEmployee');
            }
            
        }
    }

    public function updateSalaryView()
    {
        if (!empty($_SESSION['errorMsg'])) {
            $errorMsg = $_SESSION['errorMsg'];
            print_r($errorMsg);
        }
        if (isset($_GET['id'])) {
            $salary_details = $this->modelObj->ReadRecordByRow($_GET['id']);            
            $empName = $salary_details['empName'];
            $salary = $salary_details['salary'];
            $day = $salary_details['day'];
            $month = $salary_details['month'];
            $year = $salary_details['year'];
            $id = $_GET['id'];
        }
        
        require 'view_edit_salary.php';
        
    }
    
    public function updateSalary()
    {
        $resp = $this->validationObj->validation_salary($_POST);
        
        if (!$resp['status']) {
            echo "hiii";
            $_SESSION['errorMsg'] = $resp['message'];
            header('Location:EmpController.php?act=updateSalaryView');
        } else {
            unset($_SESSION['errorMsg']);        
            $resp = $this->modelObj->update_salary($_POST);
            echo $resp;
            if ($resp) {
                header('Location:EmpController.php?act=listSalary');
            } else {
                echo "failed";
            }
            
        }
    }
    
    public function read()
    {
        if (!empty($_GET['id'])) {
            $salary_details = $this->modelObj->listSalary($_GET['id']);
            $employee_details = $this->modelObj->ReadRecord($_GET['id']);
            $empName = $employee_details['empName'];
            $empId = $employee_details['empId'];
            $designation = $employee_details['designation'];
            $gender = $employee_details['gender'];
            $experience = $employee_details['experience'];
            $grossSalary = $employee_details['gross_salary'];
            $deduction = $employee_details['deduction'];
            $lop = $employee_details['lop'];
            $netSalary = $employee_details['netsal'];
            echo "<table border =5px>";
            echo "<h1> Salary Details </h1>";
            foreach ($salary_details as $salary_detail_employee) {
                echo "<tr>";
                echo "<th> Salary </th>";
                echo "<td>";
                echo $salary_detail_employee['salary'];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th> Day </th>";
                echo "<td>";
                echo $salary_detail_employee['day'];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th> Month </th>";
                echo "<td>";
                echo $salary_detail_employee['month'];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th> Year</th>";
                echo "<td>";
                echo $salary_detail_employee['year'];
                echo "</td>";
                echo "</tr>";
            }
        }
        require 'view_object.php';   
    } 
}


$controllerObj = new EmpController();
if (!isset($_REQUEST['act'])) {
    $action = 'listEmployee';
} else {
    $action = $_GET['act'];
}

$controllerObj->$action();

?>