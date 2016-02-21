<?php 
session_start();
error_reporting(0);

$id = $_SESSION['id'];
$name = $_SESSION['name'];
$classid = $_GET['c'];

include "mysql.php";

$query = mysql_query("DELETE FROM `class_$classid` WHERE `studentid` = '$id'");
$query = mysql_query("DELETE FROm `students` WHERE `studentid` = '$id' AND `classid` = '$classid'");

header("Location: /myclass?leave");

 ?>