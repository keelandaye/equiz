<?php session_start(); ?>
<html>
<head>
   <title>Quiz - eQuiz</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <?php 
   if (isset($_SESSION['name']) && $_SESSION['name'] != null) {
      $name = $_SESSION['name'];
   } else {
      $name = "nobody";
   } 

   if (isset($_SESSION['id']) && $_SESSION['id'] != null) {
      $id = $_SESSION['id'];
   }

   if (isset($_GET['q']) && $_GET['q'] != null) {
      $quiz = $_GET['q'];
   }
   if (isset($_SESSION['type']) && $_SESSION['type'] != null) {
      $type = $_SESSION['type'];
   }

  include("methods/mysql.php");

  $getquizname = mysql_query("SELECT `name` FROM `quizzes` WHERE `id` = '$quiz'");
  $quizname = mysql_fetch_row($getquizname)[0];

  $getteacher = mysql_query("SELECT `ownername` FROM `quizzes` WHERE `id` = '$quiz'");
  $teacher = mysql_fetch_row($getteacher)[0];

  $getteacherid = mysql_query("SELECT `owner` FROM `quizzes` WHERE `id` = '$quiz'");
  $teacherid = mysql_fetch_row($getteacherid)[0];

  $getclassid = mysql_fetch_row(mysql_query("SELECT `class` FROM `quizzes` WHERE `id` = '$quiz'"));
  $classid = $getclassid[0];

  $getclassname = mysql_fetch_row(mysql_query("SELECT `class` FROM `classes` WHERE `id` = '$classid'"));
  $classname = $getclassname[0];

  $getquizid = mysql_query("SELECT `id` FROM `quizzes` WHERE `name` = '$quizname' AND `class` = '$classid' AND `owner` = '$teacherid'");
  $quizid = mysql_result($getquizid,0);

  $getquiz = mysql_query("SELECT * FROM `quiz_$quizid`");

   ?>
</head>
<body>
    <div id="navigationbar">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">eQuiz</a>
          </div>

         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           <ul class="nav navbar-nav">
              <li><a href="/">Home</a></li>
            </ul>
         </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </div>

    <div class="container" style="margin-top: 10px;">
    <div class="col-md-3"></div>
    <div id="quiz" class="col-md-6">
      <h1 align="center"><?php echo $quizname; ?></h1>
      <h4 align="center">Assigned by: <strong><?php echo $teacher; ?></strong></h4>
      <br>
      <form action="methods/reviewquiz.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['q']; ?>">
        <?php
        $i = 1;
        while($row = mysql_fetch_array($getquiz)) {
        echo "<br><strong>" . $row["question"] . "<br></strong><input class=\"form-control\"type=\"text\" name =\"". $i . "\">";
        $i++;
        }
        echo "<input type=\"hidden\" name=\"num\" value=\"" . ($i-1) . "\">";
        echo "<input type=\"hidden\" name=\"sid\" value=\"" . $id . "\">";
        echo "<input type=\"hidden\" name=\"sname\" value=\"" . $name . "\">";
        ?>
        <br>
        <input width="20%" type="submit" class="form-control" value="Submit">
      </form>
    </div>
    <div class="col-md-3"></div>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <script src="sweetalert-master/dist/sweetalert-dev.js"></script> 
</body>
</html>