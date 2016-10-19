<?php
require 'connection.php';
require 'querybuilder.php';
return new querybuilder(connection::make()); 
?>
