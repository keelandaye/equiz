<?php 
session_start();

if (!isset($_POST['name']) || $_POST['name'] == null) {
	header("Location: ../newquiz?error");
	return;
}

$name = $_POST['name'];
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

$class = $_POST['class'];
$numq = $_POST['q'];

include "mysql.php";
$query = mysql_query("INSERT INTO `quizzes` (`id`, `owner`, `ownername`, `class`, `name`) VALUES ('', '$owner', '$ownername', '$class', '$name');");
$getid = mysql_fetch_row(mysql_query("SELECT `id` FROM `quizzes` WHERE `name` = '$name' AND `class` = '$class' AND `owner` = '$owner'"));
$id = $getid[0];

$createnewtable = mysql_query("CREATE TABLE `$dbname`.`quiz_$id` ( `id` INT NOT NULL AUTO_INCREMENT , `question` TEXT NOT NULL , `answer` TEXT NOT NULL , PRIMARY KEY (`id`) ) ENGINE = InnoDB;");
$createnewatable = mysql_query(genQuery($numq, $id, $dbname)) or die("Error");

$i = 1;
while ($i <= $numq) {
	$q = $_POST[$i . "q"];
	$a = $_POST[$i . "a"];
	$query = mysql_query("INSERT INTO `quiz_$id` (`id`, `question`, `answer`) VALUES ('', '$q', '$a')");
	$i++;
}

function genQuery($numq, $id, $dbname){
	$returnstart = "CREATE TABLE `$dbname`.`quiz_a_$id` ( `id` INT NOT NULL AUTO_INCREMENT , `studentid` INT NOT NULL , `studentname` TEXT NOT NULL,";
	$returnend = " PRIMARY KEY (`id`) ) ENGINE = InnoDB;";
	$i = 1;
	while ($i <= $numq) {
		$returnmid .= " `$i` TEXT NOT NULL,";
		$i++;
	}
	return $returnstart . $returnmid . $returnend;
}

header ("Location: /myquizzes");

 ?>