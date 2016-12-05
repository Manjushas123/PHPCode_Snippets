<?php
function calculation($data)
{  
    $empName = $data['empName'];
    $empId = $data['empId'];
    $designation = $data['designation'];
    $gender = $data['gender'];
    $experience = $data['experience'];
    $grossSalary = $data['gross_salary'];
    $deduction = $data['deduction'];
    $lop = $data['lop'];
    $calculate = $grossSalary / 30;
    $netSalary = $grossSalary - (($calculate * $lop) + $deduction);
    return $netSalary;
}
?>
