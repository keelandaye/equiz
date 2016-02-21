<?php 
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	$owner = $_SESSION['id'];
	$ownername = $_SESSION['name'];
} else {
	header("Location: ../?loginerror");
	return;
}

if ($_SESSION['type'] == "student") {
	header("Location: ../?studenterror");
}

$q = $_GET['q'];

include "mysql.php";
$query = mysql_query("CREATE TABLE `qquiz_a_$q` LIKE `quiz_a_$q`");
$query = mysql_query("UPDATE `quizzes` SET `qq` = '1' WHERE `quizzes`.`id` = $q");

$code = mt_rand(100000, 999999);

$query = mysql_query("INSERT INTO `quickquizzes` (`id`, `quizid`, `code`) VALUES (NULL, '$q', '$code')");

header ("Location: /qq?q=$q");

 ?>