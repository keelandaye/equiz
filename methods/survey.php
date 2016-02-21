<?php 
session_start();
error_reporting(0);

if (isset($_GET['1'])) {
	$name = $_GET['name'];
	$email = $_GET['email'];
	$q1 = $_GET['1'];
	$q2 = $_GET['2'];
	$q3 = $_GET['3'];
	$q4 = $_GET['4'];
	$q5 = $_GET['5'];
}

include "mysql.php";

$query = mysql_query("INSERT INTO `$dbname`.`survey` (`id`, `name`, `email`, `1`, `2`, `3`, `4`, `5`) VALUES (NULL, '$name', '$email', '$q1', '$q2', '$q3', '$q4', '$q5');");

header("Location: /?survey")

 ?>