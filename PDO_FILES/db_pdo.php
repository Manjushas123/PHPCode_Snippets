<?php
$database = require 'bootstrap.php';
$tasks = $query->selectAll('todos');
require 'db_pdonew.php';
?> 
