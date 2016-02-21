<?php
error_reporting(0);

$conn = mysql_connect('localhost', 'root', '') or die("There was an error connecting to our database. Please try again later.");
$dbname = "btys";
$db = mysql_select_db($dbname, $conn) or die("There was an error connecting to our database. Please try again later.");

?>