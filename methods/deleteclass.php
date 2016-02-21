<?php 

session_start();
error_reporting(0);

$id = $_SESSION['id'];
$name = $_SESSION['name'];
$classid = $_GET['c'];
$password = $_GET['password'];

include "mysql.php";

$query = mysql_query("DROP TABLE `class_$classid`");
$query = mysql_query("DELETE FROM `classes` WHERE `password` = '$password'");
$query = mysql_query("DELETE FROM `students` WHERE `classid` = '$classid'");

header("Location: /myclasses");

 ?>