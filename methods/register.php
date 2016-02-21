<?php
session_start();
error_reporting(0);

if (!isset($_POST['email']) || $_POST['email'] == null) {
	header("Location: ../register?error");
	return;
}

if (!isset($_POST['password']) || $_POST['password'] == null) {
	header("Location: ../register?error");
	return;
}

if (!isset($_POST['name']) || $_POST['name'] == null) {
	header("Location: ../register?error");
	return;
}

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost'=>'10'));
$name = $_POST['name'];
$type = $_POST['type'];

include "mysql.php";
$emailcheck = mysql_query("SELECT `id` FROM `users` WHERE `email` = '$email'") or die("error");
if (mysql_num_rows($emailcheck) != 0) {
	header("Location: ../register?emailerror");
} else {
	$query = mysql_query("INSERT INTO `users` (`id`, `email`, `password`, `name`, `type`) VALUES (NULL, '$email', '$password', '$name', '$type');") or die("There was an error connecting to our database. Please try again later.");
	header ("Location: /");
}

?>