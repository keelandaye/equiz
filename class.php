<?php session_start(); ?>
<html>
<head>
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

   if (isset($_GET['c']) && $_GET['c'] != null) {
      $class = $_GET['c'];
   }
   if (isset($_SESSION['type']) && $_SESSION['type'] != null) {
      $type = $_SESSION['type'];
   }

  include("methods/mysql.php");

  $getclassname = mysql_query("SELECT `class` FROM `classes` WHERE `id` = '$class'");
  $classname = mysql_fetch_row($getclassname)[0];

  $getteacher = mysql_query("SELECT `ownername` FROM `classes` WHERE `id` = '$class'");
  $teacher = mysql_fetch_row($getteacher)[0];

  $getpassword = mysql_query("SELECT `password` FROM `classes` WHERE `id` = '$class'");
  $password = mysql_fetch_row($getpassword)[0];

  $classtable = "class_" . $class;
  $getstudents = mysql_query("SELECT `studentname` FROM `$classtable`");

  $getquizzes = mysql_query("SELECT * FROM `quizzes` WHERE `class` = '$class'");

  function getTeacherClasses($teacher) {
    $query = mysql_query("SELECT `class`, `id` FROM `classes` WHERE `owner` = '$teacher'");
    return $query;
  }

   ?>
     <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == null) { header("Location: ../?loginerror"); return; }?>
   <title>Class - eQuiz</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <div id="navigationbar">
      <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">eQuiz</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/">Home</a></li>
        <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "teacher") { echo '<li><a href="/myclasses">My Classes</a></li>'; $t = "view";}?>
        <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "student") { echo '<li><a href="/myclass">My Classes</a></li>'; $t = "take";}?>
        <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "teacher") { echo '<li><a href="/myquizzes">My Quizzes</a></li>'; }?>
        <li><a href="#">Public Quizzes</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <p class="navbar-text"><?php 
         if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo 'Logged in as <a href="methods/logout" class="navbar-link">' . $name . '</a>';
         } else {
            echo '<a style="padding: 0px;" class="btn btn-info btn-xs" type="button" href="../login">Login</a>   ';
            echo '<a style="padding: 0px;" class="btn btn-info btn-xs" type="button" href="../register">Register</a>';
         }?></p>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
   </div>
   <h1 align="center"><?php echo $classname; ?></h1>
   <h3 align="center"><?php echo $teacher; ?></h3>
  <div class="col-md-3"></div>
  <div class="col-md-6">
  <br>
  <h4 align="center">Password:</h4><table style="text-align: center;" class="table table-hover table-responsive">
  <tr><td><?php echo $password ?></td></tr></table>
  <h2 align="center">Quizzes</h2>
  <table style="text-align: center;" class="table table-striped table-hover table-bordered table-responsive">
    <?php

    while($row = mysql_fetch_array($getquizzes)) {
      echo "<tr><td><a href=\"" . $t . "quiz?q=" . $row['id'] . "\">" . $row['name'] . "</a></td></tr>";
    }

    ?>
  </table>
  <h2 align="center">Students</h2>
  <table style="text-align: center;" class="table table-striped table-hover table-bordered table-responsive">
    <?php

    while($row = mysql_fetch_array($getstudents)) {
      echo "<tr><td>" . $row['studentname'] . "</td></tr>";
    }

    ?>
  </table>
  <div align="center"><a href="/methods/<?php if ($type == "student") { echo "leaveclass.php/?c=$class"; } else if ($type == "teacher") { echo "deleteclass.php/?c=$class&password=$password"; }?>"><button class="btn btn-primary"><?php if ($type == "student") { echo "Leave"; } else if ($type == "teacher") { echo "Delete"; }?> Class</button></a></div><br>
  </div>
  <div class="col-md-3"></div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="sweetalert-master/dist/sweetalert-dev.js"></script> 
</body>
</html>