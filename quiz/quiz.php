<?php 

$score = 0;

$percentage = $score / 10;
$percentage = $percentage * 100;
$percentage = $percentage . "%";

$answer1 = $_POST['1'];
$answer2 = $_POST['2'];

header("Location: results.php?answer1=" . $answer1 . "&answer2=" . $answer2 . "&percentage=" . $percentage);

 ?>