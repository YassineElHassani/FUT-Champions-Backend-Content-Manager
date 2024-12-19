<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "futdb";

$connection = new mysqli($servername, $username, $password, $database);

$connection->set_charset("utf8");
?>
