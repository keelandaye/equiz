<?php 
session_start();
error_reporting(0);

if (!isset($_POST['password']) || $_POST['password'] == null) {
	header("Location: ../joinclass?error");
	return;
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
	header("Location: ../?loginerror");
	return;
};

$password = $_POST['password'];
$id = $_SESSION['id'];
$name = $_SESSION['name'];

include "mysql.php";

$getclassid = mysql_query("SELECT `id` FROM `classes` WHERE `password` = '$password'");
if (mysql_num_rows($getclassid) == 0) {
	header("Location: ../joinclass?passworderror");
	return;
}
$getclassname = mysql_query("SELECT `class` FROM `classes` WHERE `password` = '$password'");

$classid= mysql_fetch_row($getclassid)[0];
$classtable = "class_" . $classid;
$classname = mysql_fetch_row($getclassname)[0];

$addstudent = mysql_query("INSERT INTO `$classtable` (`classid`, `studentid`, `studentname`) VALUES (NULL, '$id', '$name')");
$keepstudent = mysql_query("INSERT INTO `students` (`id`, `studentid`, `classid`, `classname`) VALUES (NULL, '$id', '$classid', '$classname')");

header("Location: ../myclass?join");

 ?>