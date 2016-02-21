<?php 
session_start();
error_reporting(0);

include "mysql.php";

if (!isset($_POST['code']) || $_POST['code'] == null) {
	header("Location: ../quick?error");
	return;
}

if (!isset($_POST['name']) || $_POST['name'] == null) {
	header("Location: ../quick?error");
	return;
}

$name = $_POST['name'];
$code = $_POST['code'];

$getquizid = mysql_query("SELECT `quizid` FROM `quickquizzes` WHERE `code` = '$code'");
$squizid = mysql_fetch_array($getquizid)[0];
$quiz = $squizid;

$query = mysql_query("INSERT INTO `quickquizzers` (`id`, `name`, `quizid`) VALUES (NULL, '$name', '$quiz')");

$getid = mysql_query("SELECT `id` FROM `quickquizzers` WHERE `name` = '$name' & `quizid` = '$quiz'");
$sid = mysql_fetch_row($getquizid);
$id = $id;

$_SESSION['loggedin'] = true;
$_SESSION['name'] = $name;
$_SESSION['quiz'] = $quiz;
$_SESSION['quickid'] = $id;
$_SESSION['type'] = "quick";

header("Location: /takequiz?q=$quiz");

 ?>