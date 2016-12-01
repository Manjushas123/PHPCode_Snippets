 <?php
$valid = true;
function validation()
{
 if(isset($_POST['submit'])) {
$empName     = $_POST['empName'];
$empId       = $_POST['empId'];
$designation = $_POST['designation'];
$gender      = $_POST['gender'];
$experience  = $_POST['experience'];
$grossSalary = $_POST['gross_salary'];
$deduction   = $_POST['deduction'];
$lop         = $_POST['lop'];
$calculate   = $grossSalary / 30;
$netSalary   = $grossSalary - (($calculate * $lop) + $deduction);
$valid = true;
//$GLOBALS['valid'];
if (empty($empName) || !preg_match("/^[a-zA-Z'-]+$/", $empName)) {
    $nameError = "Please enter the valid Employee Name";
    echo $nameError
    $valid     = false;
    echo "<br/>";
}
if (empty($empId) || !preg_match("/^0$|^[-]?[1-9][0-9]*$/", $empId)) {
    $idError = "Please enter the valid Employee Id";
    $valid   = false;
    echo "<br/>";
}
if (empty($designation)) {
    $designationError = "Please enter the valid Designation";
    $valid            = false;
    echo "<br/>";
}
if (empty($gender)) {
    $genderError = "Please enter the Gender";
    $valid       = false;
    echo "<br/>";
    
}
if (empty($experience) || !preg_match("/^0$|^[-]?[1-9][0-9]*$/", $experience)) {
    $experienceError = "Please enter the valid Experience";
    $valid           = false;
    echo "<br/>";
}
if (empty($grossSalary) || !preg_match("/^0$|^[-]?[1-9][0-9]*$/", $grossSalary)) {
    $gsError = "Please enter the valid Gross Salary";
    $valid   = false;
    echo "<br>";
}
if (empty($deduction) || !preg_match("/^0$|^[-]?[1-9][0-9]*$/", $deduction)) {
    $deductionError = "Please enter the valid Deduction";
    $valid          = false;
    echo "<br>";
}
if (empty($lop) || !preg_match("/^0$|^[-]?[1-9][0-9]*$/", $lop) || $lop > 30) {
    $lopError = "Please enter the valid Lop";
    $valid    = false;
    echo "<br>";
}
}
}
validation();
?> 
