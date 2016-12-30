    <html>
    <table>
    <body bgcolor = #DEE2A3>
    <tr>
    <th>ID </th>
    <th>Employee Name</th>
    <th>Employee Id</th>
    <th>Designation</th>
    <th>Gender</th>
    <th>Experience</th>
    <th>Gross Salary</th>
    <th>Deduction</th>
    <th>LOP</th>
    <th>Net Salary</th>
    </tr>
    <?php
    foreach($empList as $employee_details) {
        echo "<tr>
        <td>".$employee_details['id']."</td>
        <td>".$employee_details["empName"]."</td>
        <td>".$employee_details["empId"]."</td>
        <td>".$employee_details["designation"]."</td>
        <td>".$employee_details["gender"]."</td>
        <td>".$employee_details["experience"]."</td>
        <td>".$employee_details["gross_salary"]."</td>
        <td>".$employee_details["deduction"]."</td>
        <td>".$employee_details["lop"]."</td>
        <td>".$employee_details["netsal"]."</td>";
        echo '<td width = 250>';
        echo "<b>";
        ?>
        <td width=250>
        <a href="viewObject.php?id=<?php echo $employee_details['id'] ?>">Read</a>
        <a href="edit_records.php?id=<?php echo $employee_details['id'] ?>">Edit</a>
        <a href="EmpController.php?act=addSalaryView&id=<?php echo $employee_details['id'] ?>">Salary </a>
        </td>
<?php
echo "<tr/>";
    }
    ?>
    <b> <p align = "center" > <a href = "employee_form.php"> Return to the Create Page </a></p></b>
     <b> <p align = "center" > <a href = "salary_index.php"> Salary Details </a></p></b>
    <h1 align = "center">Employee Details </h1>
    </table>
    </body>
   
?>
