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
        $this->modelObj      = new DBOperations();
        $this->validationObj = new validate();
    }
    
    
    public function listemp()
    {
        $empList = $this->modelObj->ListEmployee();
        require 'listemp.php';
    }
    
    public function addempview()
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
            header('Location:EmpController.php?act=addempview');
        } else {
            unset($_SESSION['errorMsg']);
            $resp = $this->modelObj->createRecord($_POST);
            if ($resp) {
                header('Location:EmpController.php?act=listemp');
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
            $id = $_GET['id'];
        } else {
            header('Location:EmpController.php?act=addSalary');
        }
        
        require 'view_salary.php';
    }
    public function addSalary()
    {
        if ($_POST) {
            $id = $_POST['id'];
            $resp = $this->validationObj->validation_salary($_POST);
            if (!$resp['status']) {
                $_SESSION['errorMsg'] = $resp['message'];
                header('Location:EmpController.php?act=addSalaryView');
            } else {
                unset($_SESSION['errorMsg']);
                $resp = $this->modelObj->createSalaryRecord($_POST);
                //print($resp);
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
    
}
$controllerObj = new EmpController();
if (!isset($_REQUEST['act'])) {
    $action = 'listemp';
} else {
    $action = $_GET['act'];
}
$controllerObj->$action();
?>