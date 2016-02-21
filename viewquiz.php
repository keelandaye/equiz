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

   if (isset($_GET['q']) && $_GET['q'] != null) {
      $quiz = $_GET['q'];
   }
   if (isset($_SESSION['type']) && $_SESSION['type'] != null) {
      $type = $_SESSION['type'];
   }

   if ($_SESSION['type'] == "student") {
  header("Location: ../?studenterror");
}

  include("methods/mysql.php");

  $getquizname = mysql_query("SELECT `name` FROM `quizzes` WHERE `id` = '$quiz'");
  $quizname = mysql_fetch_row($getquizname)[0];

  $getteacher = mysql_query("SELECT `ownername` FROM `quizzes` WHERE `id` = '$quiz'");
  $teacher = mysql_fetch_row($getteacher)[0];

  $getclassid = mysql_fetch_row(mysql_query("SELECT `class` FROM `quizzes` WHERE `id` = '$quiz'"));
  $classid = $getclassid[0];

  $getclassname = mysql_fetch_row(mysql_query("SELECT `class` FROM `classes` WHERE `id` = '$classid'"));
  $classname = $getclassname[0];

  $getquizid = mysql_fetch_array(mysql_query("SELECT `id` FROM `quizzes` WHERE `name` = '$quizname' AND `class` = '$classid' AND `owner` = '$id'"));
  $quizid = $getquizid[0];

  $getqq = mysql_query("SELECT `qq` FROM `quizzes` WHERE `name` = '$quizname' AND `class` = '$classid'");
  $qq = mysql_result($getqq,0);

  if ($qq == 1) {
    $getquiz = mysql_query("SELECT * FROM `quiz_$quizid`");
    $getquizanswers = mysql_query("SELECT * FROM `qquiz_a_$quizid`");
} else {
  $getquiz = mysql_query("SELECT * FROM `quiz_$quizid`");
  $getquizanswers = mysql_query("SELECT * FROM `quiz_a_$quizid`");
}

  function getStudentId($name, $id) {
    echo 'quiz_a_'.$id.'<br>';
    echo $name;
    $query = mysql_query("SELECT `studentid` FROM `quiz_a_$id` WHERE `studentname` = '$name'") or die ("Error");
    return $query[0];
  }

   ?>
     <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == null) { header("Location: ../?loginerror"); return; }?>
   <title>View Quiz - eQuiz</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css">
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
        <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "teacher") { echo '<li><a href="/myclasses">My Classes</a></li>'; }?>
        <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "student") { echo '<li><a href="/myclass">My Classes</a></li>'; }?>
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
   <h1 align="center"><?php echo $quizname; ?></h1>
   <h3 align="center"><?php echo $teacher; ?></h3>
  <div class="col-md-3"></div>
  <div class="col-md-6">
  <br>
  <h4 align="center">Class:</h4><table style="text-align: center;" class="table table-hover table-responsive">
  <tr><td><?php echo $classname ?></td></tr></table>
  <h2 align="center">Quiz</h2>
  <table style="text-align: center;" class="table table-striped table-hover table-bordered table-responsive">
    <tr><th>Question</th><th>Answer</th></tr>
    <?php
    while($row = mysql_fetch_array($getquiz)) {
      echo "<tr><td>" . $row["question"] . "</td><td>" . $row["answer"] ."</td></tr>";
    }
    ?>
  </table>
  <br>
  <h2 align="center">Students</h2>
  <h4 align="center">Click to view results</h4>
  <table style="text-align: center;" class="table table-striped table-hover table-bordered table-responsive">
    <?php
    while($row = mysql_fetch_array($getquizanswers)) {
      echo "<tr><td><a href=\"/viewresults?q=" . $_GET['q'] . "&s=" . $row['studentid'] . "\">" . $row["studentname"] . "</a></td></tr>";
    }
    ?>
  </table>
  <div align="center"><button onclick="deleteWarning()" class="btn btn-primary"><?php if ($type == "student") { echo "Leave"; } else if ($type == "teacher") { echo "Delete"; }?> Quiz</button></div><br>
  <div align="center"><a href="/methods/quickquiz.php?q=<?php echo $_GET['q']; ?>"><button class="btn btn-warning">Quick Quiz (Beta)</button></a></div><br>
  </div>
  <div class="col-md-3"></div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="sweetalert-master/dist/sweetalert-dev.js"></script>
   <script>
   function deleteWarning() {
    swal({   title: "Are you sure?",   text: "This will permanently delete all questions and scores.",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#A80000",   confirmButtonText: "Delete",   closeOnConfirm: true },
      function(isConfirm) { if(isConfirm) { window.location.replace("/methods/deletequiz.php/?q=<?php echo $quizid; ?>") }});
   }
   </script>
</body>
</html>