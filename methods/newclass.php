<?php 
session_start();
error_reporting(0);

function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if (!isset($_POST['class']) || $_POST['class'] == null) {
	header("Location: ../newclass?error");
	return;
}

$class = $_POST['class'];
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	$owner = $_SESSION['id'];
	$ownername = $_SESSION['name'];
} else {
	header("Location: ../?loginerror");
	return;
}
$password = generateRandomString();

include "mysql.php";
function passwordCheck($password) {
	$pwcheck = mysql_query("SELECT `id` FROM `classes` WHERE `password` = '$password'");
	if (mysql_num_rows($pwcheck) != 0) {
		$password = generateRandomString();
		passwordCheck();
		return;
	}
}
$query = mysql_query("INSERT INTO `classes` (`id`, `class`, `owner`, `ownername`, `password`) VALUES (NULL, '$class', '$owner', '$ownername', '$password')") or die("ERROR");
$getid = mysql_fetch_row(mysql_query("SELECT `id` FROM `classes` WHERE `password` = '$password'")) or die("error");
$id = $getid[0];

$createnewtable = mysql_query("CREATE TABLE `$dbname`.`class_$id` ( `classid` INT NOT NULL AUTO_INCREMENT , `studentid` TEXT NOT NULL , `studentname` TEXT NOT NULL , PRIMARY KEY (`classid`) ) ENGINE = InnoDB") or die("Error");

header("Location: ../myclasses?success");

 ?>