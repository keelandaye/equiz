<?php

  include("mysql.php");

  $quiz = $_POST['id'];

  $getquizname = mysql_query("SELECT `name` FROM `quizzes` WHERE `id` = '$quiz'");
  $quizname = mysql_result($getquizname,0);

  $getteacher = mysql_query("SELECT `ownername` FROM `quizzes` WHERE `id` = '$quiz'");
  $teacher = mysql_result($getteacher,0);

  $getclassid = mysql_query("SELECT `class` FROM `quizzes` WHERE `id` = '$quiz'");
  $classid = mysql_result($getclassid,0);

  $getclassname = mysql_query("SELECT `class` FROM `classes` WHERE `id` = '$classid'");
  $classname = mysql_result($getclassname,0);

  $getquizid = mysql_query("SELECT `id` FROM `quizzes` WHERE `name` = '$quizname' AND `class` = '$classid'");
  $quizid = mysql_result($getquizid,0);

  $getqq = mysql_query("SELECT `qq` FROM `quizzes` WHERE `name` = '$quizname' AND `class` = '$classid'");
  $qq = mysql_result($getqq,0);

  $getquiz = mysql_query("SELECT * FROM `quiz_$quizid`");

  function getAnswer($question) {
    $query = mysql_query("SELECT `answer` FROM `quiz_$quizid` WHERE `id` = '$question'");
    return mysql_result($query,0);
  }

  $num = $_POST['num'];

  $id = $_POST['sid'];

  $name = $_POST['sname'];

  // function genQuery($numq, $id, $dbname, $name){
  //   $returnstart = "INSERT INTO `btys`.`quiz_a_$id` (`id`, `studentid`, `studentname`";
  //   $returnmid2 = ") VALUES (NULL, '$id', '$name'";
  //   $returnend = ")";
  //   $i = 1;
  //   while ($i <= $numq) {
  //     $returnmid .= ", `$i`";
  //     $returnmid3 .= ", ''";
  //    $i++;
  //   }
  //   return $returnstart . $returnmid . $returnmid2 . $returnmid3 . $returnend;
  // }

  // $i = 1;
  // $query = mysql_query(genQuery($num, $quizid, $dbname, $name));
  // echo genQuery($num, $quizid, $dbname, $name) . "<br>";
  $answers = array(
      "id"  => "NULL",
      "studentid" => $id,
      "studentname" => $name
    );
  $i = 1;
  while ($i <= $num) {
    $a = $_POST[$i];
    $answers[$i] = "$a";
    $i++;
  }
  $columns = "`" . implode("`, `",array_keys($answers)) . "`";
  $escaped_values = array_map('mysql_real_escape_string', array_values($answers));
  $values  = "\"" . implode("\", \"", $escaped_values) . "\"";
  if ($qq == 1) {
    $sql = "INSERT INTO `qquiz_a_$quizid` ($columns) VALUES ($values)";
  } else {
    $sql = "INSERT INTO `quiz_a_$quizid` ($columns) VALUES ($values)";
  }
  mysql_query($sql) or die("Error");

  header ("Location: ../myclass?quizcomplete");
  

?>