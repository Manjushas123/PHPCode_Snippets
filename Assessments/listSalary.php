    <html>
    <table>
    <body bgcolor = #DEE2A3>
    <tr>
    <th>ID </th>
    <th>Salary</th>
    <th>Day</th>
    <th>Month</th>
    <th>Year</th>
    <?php
    foreach ($salaryList as $salary_details) {
        echo "<tr>
        <td>" . $salary_details['id'] . "</td>
        <td>" . $salary_details["salary"] . "</td>
        <td>" . $salary_details["day"] . "</td>
        <td>" . $salary_details["month"] . "</td>
        <td>" . $salary_details["year"] . "</td>";
        echo '<td width = 250>';
        echo "<b>";
?>
       <td>
        
<a href="EmpController.php?act=delete&id=<?php echo $salary_details['id'] ?>">Delete </a>
<a href="EmpController.php?act=updateSalaryView&id=<?php echo $salary_details['id'] ?>">Edit </a>
</td>      
<?php
    }
?>
   <b> <p align = "center" > <a href = "EmpController.php?act=listEmployee"> Back </a></p></b>
    <h1 align = "center">Employee Salary</h1>
    </table>
    </body>
   
