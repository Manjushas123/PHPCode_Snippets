<html>
<head>
<title> Salary Details </title>
<style>
.button {
    background-color: #fc0905;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<body bgcolor = #DEE2A3>
<form method = "post" action= "">
<input type="hidden" name="id" value="<?php echo $id ?>" />
<table>
<b><a href = "index.php">Go to the Index Page </a></b>
<h1 align = "center" border-style ="solid"> Employee CRUD Application </h1>
<tr> <th> Employee Name </th> <td> <input id = "text" name = "empName"  value="<?php
echo $empName;
?>" /> <?php
echo (!empty($errorMsg) ? $errorMsg['empName'] : '');
?></td></tr>
<tr> <th> Salary </th> <td><input id = "number" name = "salary"  value = "<?php
echo $salary;
?>" /><?php
echo (!empty($errorMsg['salary']) ? $errorMsg['salary'] : '');
?></td></tr>
<tr> <th> Day </th> <td><input id = "number" name = "day"  value = "<?php
echo $day;
?>" /><?php
echo (!empty($errorMsg['day']) ? $errorMsg['day'] : '');
?></td></tr>
<tr> <th> Month </th> <td><input id = "number" name = "month"  value = "<?php
echo $month;
?>"/><?php
echo (!empty($errorMsg['month']) ? $errorMsg['month'] : '');
?></td></tr>
<tr> <th> Year</th> <td><input id = "number" name = "year" value = "<?php
echo $year;
?>" /> <?php
echo (!empty($errorMsg['year']) ? $errorMsg['year'] : '');
?></td></tr>
<tr> <td><p align ="center"><input type = "submit" class = "button" name = "submit" value = "Create" /></td></tr>
</table>
</form>
<p align="center"></p>
</body>
</html>
