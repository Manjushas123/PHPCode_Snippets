<?php 
require_once 'dbconfig.php';
$id = $_GET['id'];
$result_query = pg_query($dbconn, "SELECT * FROM employee_detail where id =$id");
if (!$result) {
    echo "An error occurred.\n";
    exit;
}
echo "Fetch row: <br>";
while ($row = pg_fetch_row($result_query)) {
 print_r($row["id"]);
}
