<?php 

session_start();
error_reporting(0);

$id = $_SESSION['id'];
$name = $_SESSION['name'];
$quizid = $_GET['q'];

include "mysql.php";

$query = mysql_query("DROP TABLE `quiz_$quizid`");
$query = mysql_query("DROP TABLE `quiz_a_$quizid`");
$query = mysql_query("DELETE FROM `quizzes` WHERE `id` = '$quizid'");


header("Location: /myquizzes?delete");

 ?>