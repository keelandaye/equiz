<?php 

session_start();
error_reporting(0);

$id = $_SESSION['id'];
$name = $_SESSION['name'];
$quizid = $_GET['q'];

include "mysql.php";

$query = mysql_query("DROP TABLE `qquiz_a_$quizid`");
$query = mysql_query("UPDATE `quizzes` SET `qq` = '0' WHERE `id` = $quizid");
$query = mysql_query("DELETE FROM `quickquizzes` WHERE `quizid` = '$quizid'");
$query = mysql_query("DELETE FROM `quickquizzers` WHERE `quizid` = '$quizid'");


header("Location: /myquizzes?delete");

 ?>