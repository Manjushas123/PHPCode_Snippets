<?php
require('calculation.php');
class DBOperations
{
    private $db_hostname = 'localhost';
    private $db_username = 'root';
    private $db_password = 'compass';
    private $db_name = 'mytodo';
    private $conn;
    private $resp;
    public function __construct()
    {
        $this->conn = mysqli_connect($this->db_hostname, $this->db_username, $this->db_password, $this->db_name);
        if (!$this->conn) {
            die("Unable to connect database" . mysqli_error($this->conn));
        }   
    }
    public function Delete($id)
    {
        $delete_query = "DELETE employee_detail ,salary_details from employee_detail e INNER JOIN salary_details el on e.id=el.id where e.id = {$id}";
        $result       = $this->conn->query($delete_query);
        if ($result === true) {
            return true;
        } else {
            return mysqli_error($this->conn);
        }
    }
    public function ReadRecord($id)
    {
        $read_query = "SELECT * from employee_detail e LEFT OUTER JOIN salary_details el on e.id = el.id where e.id = {$id}";
        $result = $this->conn->query($read_query);
        $row = $result->fetch_assoc();
        return $row;    
    }
    public function ListStudents()
    {
        $view_query = "SELECT * FROM employee_detail";
        $resultset  = $this->conn->query($view_query);
        return $resultset;
    }
     public function ListSalary()
    {
        $view_query = "SELECT * FROM salary_details";
        $resultset  = $this->conn->query($view_query);
        return $resultset;
    }
    public function createRecord($data)
    {
        $empName = $data['empName'];
        $empId = $data['empId'];
        $designation = $data['designation'];
        $gender = $data['gender'];
        $experience = $data['experience'];
        $grossSalary = $data['gross_salary'];
        $deduction = $data['deduction'];
        $lop = $data['lop'];
        $errorMessage = "";
        $calculation = new calculate();
        $netSalary = $calculation->calculation($data);
        $insert_query = "INSERT INTO employee_detail(empName,empId,designation,gender,experience,gross_salary,deduction,lop,netsal) VALUES('$empName',$empId,
        '$designation','$gender',$experience,$grossSalary,$deduction,$lop,$netSalary)";
        
        if (mysqli_query($this->conn, $insert_query)) {
            return true;
        } else if (!mysqli_query($this->conn, $insert_query)) {
            return false;
        }    
    }
    public function update($id)
    {
        $empName = $_POST['empName'];
        $empId = $_POST['empId'];
        $designation = $_POST['designation'];
        $gender = $_POST['gender'];
        $experience = $_POST['experience'];
        $grossSalary = $_POST['gross_salary'];
        $deduction = $_POST['deduction'];
        $lop = $_POST['lop'];
        $errorMessage = "";
        $calculation = new calculate();
        $netSalary = $calculation->calculation($_POST);
        $result_query = "UPDATE  employee_detail SET empName = '$empName', empId = $empId, designation = '$designation',gender = '$gender',experience = $experience,gross_salary = $grossSalary,deduction = $deduction,lop = $lop,netsal = $netSalary WHERE id = $id";
        $result  = $this->conn->query($result_query);
        if ($result) {
            return true; 
        } else {
            return false;
        }   
    }
    public function createSalaryRecord($data)
    {
        //echo "hii";
        $id = $data['id'];
        $empName = $data['empName'];
        $salary = $data['salary'];
        $day = $data['day'];
        $month = $data['month'];
        $year = $data['year'];
        $insertQuery = "INSERT INTO salary_details(id,empName,salary,day,month,year) VALUES($id,'$empName',$salary,
        $day,$month,$year)";
        //print($insertQuery);
        $result  = $this->conn->query($insertQuery);
        if ($result) {
            return true; 
        } else {
            return false;
        }          
    }
}
?> 
