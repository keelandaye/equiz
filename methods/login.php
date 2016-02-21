<?php 
session_start();
error_reporting(0);

include "mysql.php";

if (!isset($_POST['email']) || $_POST['email'] == null) {
	header("Location: ../login?error");
	return;
}

if (!isset($_POST['password']) || $_POST['password'] == null) {
	header("Location: ../login?error");
	return;
}

$email = $_POST['email'];
$password = $_POST['password'];

$passwordhash = mysql_query("SELECT `password` FROM `users` WHERE `email` = '$email'");
if (mysql_num_rows($passwordhash) == 0) {
	header("Location: ../login?passworderror");
	return;
}

$spassword = mysql_fetch_row($passwordhash);
if (password_verify($password, $spassword[0])) {
	$getname = mysql_query("SELECT `name` FROM `users` WHERE `email` = '$email'");
	$sname = mysql_fetch_row($getname);
	$name = $sname[0];

	$gettype = mysql_query("SELECT `type` FROM `users` WHERE `email` = '$email'");
	$stype = mysql_fetch_row($gettype);
	$type = $stype[0];

	$getid = mysql_query("SELECT `id` FROM `users` WHERE `email` = '$email'");
	$sid = mysql_fetch_row($getid);
	$id = $sid[0];

	$_SESSION['loggedin'] = true;
	$_SESSION['name'] = $name;
	$_SESSION['email'] = $email;
	$_SESSION['type'] = $type;
	$_SESSION['id'] = $id;

	header("Location: /");
} else {
	header("Location: ../login?passworderror");
}

 ?>