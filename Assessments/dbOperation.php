<?php
require('calculation.php');
class DBOps 
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
		    die("Unable to connect database" .mysqli_error($this->conn));
		}
		
	}
	
	public function Delete($id)
	{
		$delete_query = "DELETE FROM employee_detail WHERE id=$id"; 
	    $result = $this->conn->query($delete_query);
	    if ($result === true) {
	    	return true;
	    } else {
	  		return mysqli_error($this->conn);
	    }
	}
	public function ReadRecord($id)
	{
		$read_query = "SELECT * FROM employee_detail where id=$id";
		$result = $this->conn->query($read_query);
		$row = $result->fetch_assoc();
		return $row;
		
	}

	public function ListStudents()
	{
		$view_query = "SELECT * FROM employee_detail";
		$resultset = $this->conn->query($view_query);
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
		$netSalary = $calculation->calculation($inputdata['subject1'], $inputdata['subject2'], $inputdata['subject3']);
		$insert_query = "INSERT INTO employee_detail(empName,empId,designation,gender,experience,gross_salary,deduction,lop,netsal) VALUES('$empName',$empId,
        '$designation','$gender',$experience,$grossSalary,$deduction,$lop,$netSalary)";
        if (mysqli_query($this->conn, $insert_query)) {
            return true;
        } else if (!mysqli_query($this->conn, $insert_query)) {
            return false;
        }
		
	}
}



?>