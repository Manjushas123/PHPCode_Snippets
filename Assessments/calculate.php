<?php
if (isset($_POST['netsalary'])) {
    $calculate=$_POST['gross_salary']-($_POST['deduction']+ $_POST['lop']);
    echo $calculate;
}
?>