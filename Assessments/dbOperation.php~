 <?php
ob_start();
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
        $delete_query = "DELETE FROM employee_detail WHERE id=$id";
        $result       = $this->conn->query($delete_query);
        if ($result === true) {
            return true;
        } else {
            return mysqli_error($this->conn);
        }
    }
    public function ReadRecord($id)
    {
        $read_query = "SELECT * FROM employee_detail where id=$id";
        //print_r($read_query);
        //print_r($read_query);
        $result     = $this->conn->query($read_query);
        //print_r($result);
        $row        = $result->fetch_assoc();
        //print_r($row);
        return $row;
        
    }
    public function ListStudents()
    {
        $view_query = "SELECT * FROM employee_detail";
        $resultset  = $this->conn->query($view_query);
        return $resultset;
    }
    
    public function createRecord($data)
    {
        //echo "hii";
        $empName      = $data['empName'];
        $empId        = $data['empId'];
        $designation  = $data['designation'];
        $gender       = $data['gender'];
        $experience   = $data['experience'];
        $grossSalary  = $data['gross_salary'];
        $deduction    = $data['deduction'];
        $lop          = $data['lop'];
        $errorMessage = "";
        $calculation  = new calculate();
        $netSalary    = $calculation->calculation($data);
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
        $empName      = $data['empName'];
        $empId        = $data['empId'];
        $designation  = $data['designation'];
        $gender       = $data['gender'];
        $experience   = $data['experience'];
        $grossSalary  = $data['gross_salary'];
        $deduction    = $data['deduction'];
        $lop          = $data['lop'];
        $errorMessage = "";
        $calculation  = new calculate();
        $netSalary    = $calculation->calculation($data);
        
          //$result_query = $conn->query($result);
        if (mysqli_query($this->conn, $result)) {
            $result =  "UPDATE employee_detail SET empName = '$empName', empId = $empId,designation = '$designation',gender = '$gender',experience = $experience,gross_salary = $grossSalary,deduction = $deduction,lop = $lop,netsal = $netSalary WHERE id = $id";
        
        } else if (!mysqli_query($this->conn, $result)) {
            return false;
        }
        $result = mysqli_query($this->conn, "SELECT * FROM employee_detail WHERE id = $id");
        $res = mysqli_fetch_array($result);
        $empName = $res['empName'];
        $empId = $res['empId'];
        $designation = $res['designation'];
        $gender = $res['gender'];
        $experience = $res['experience'];
        $grossSalary = $res['gross_salary'];
        $deduction = $res['deduction'];
        $lop = $res['lop'];
        $netSalary = $res['netsal'];
    }
}
}

?> 
